<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Lead;
use Illuminate\Support\Facades\Log;

class FetchCrmLeads extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crm:fetch-leads';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch leads from CRM API and insert into local database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Fetching CRM leads...');

        try 
        {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer OXpROcBEl0JYqCO6XwW4'
            ])->get('https://crm.dharadhan.com/api/realestate/fetch-lead');

            if (!$response->successful()) 
            {
                $this->error('Failed to fetch leads from CRM API. Status: ' . $response->status());
                Log::error('CRM API fetch failed', [
                    'status' => $response->status(), 
                    'body' => $response->body()
                ]);
                return 1;
            }

            $data = $response->json();
            if (!isset($data['status']) || $data['status'] !== 200) 
            {
                $this->error('API returned error: ' . ($data['message'] ?? 'Unknown error'));
                Log::error('CRM API error', ['data' => $data]);
                return 1;
            }
            $leadData = $data['data'] ?? null;

            if (!$leadData || !is_array($leadData)) 
            {
                $this->info('No leads available to fetch');
                return 0;
            }

            $this->info('Lead received: ' . ($leadData['name'] ?? 'unknown') . ' - ' . ($leadData['phone'] ?? 'no phone'));
            $this->info('Lead UUID: ' . ($leadData['uuid'] ?? 'not provided'));
            if (empty($leadData['phone'])) 
            {
                $this->error('Lead skipped: phone number is required');
                Log::warning('Lead skipped - no phone number', ['data' => $leadData]);
                return 1;
            }

            $existingLead = Lead::where('phone', $leadData['phone'])->first();

            if ($existingLead) 
            {
                $this->info('Lead already exists with phone: ' . $leadData['phone']);
                $updateData = [];
                
                if (!empty($leadData['name'])) 
                {
                    $updateData['name'] = $leadData['name'];
                }
                if (!empty($leadData['email'])) 
                {
                    $updateData['email'] = $leadData['email'];
                }
                if (!empty($leadData['property_location'])) 
                {
                    $updateData['location'] = $leadData['property_location'];
                }
                if (!empty($leadData['property_type'])) 
                {
                    $updateData['interest'] = $leadData['property_type'];
                }
                if (!empty($leadData['notes']) || !empty($leadData['last_comment'])) 
                {
                    $updateData['message'] = $leadData['notes'] ?? $leadData['last_comment'];
                }
                if (!empty($leadData['status'])) 
                {
                    $updateData['status'] = strtolower($leadData['status']);
                }
                
                if (!empty($updateData)) 
                {
                    $updateData['updated_at'] = now();
                    $existingLead->update($updateData);
                    $this->info('Lead updated: ' . $existingLead->id);
                } 
                else 
                {
                    $this->info('No new information to update');
                }
                
                return 0;
            }
            $userId = null;
            $leadUuid = $leadData['uuid'] ?? null;
            
            if (!empty($leadUuid)) 
            {
                $this->info('Looking for user with unique_id: ' . $leadUuid);
                $user = DB::table('users')->where('unique_id', $leadUuid)->first();
                
                if ($user) 
                {
                    $userId = $user->id;
                    $this->info('Found matching user: ID ' . $userId . ' (Name: ' . ($user->name ?? 'N/A') . ')');
                } 
                else 
                {
                    $this->warn('No user found with unique_id: ' . $leadUuid);
                    Log::warning('User not found for uuid', ['uuid' => $leadUuid]);
                }
            } 
            else 
            {
                $this->warn('No UUID provided in lead data');
            }
            if (!$userId) 
            {
                $userId = 1;
                $this->info('Using default user ID: ' . $userId);
            }
            $insertData = [
                'name' => $leadData['name'] ?? null,
                'email' => $leadData['email'] ?? null,
                'phone' => $leadData['phone'],
                'location' => $leadData['property_location'] ?? $leadData['name_of_location'] ?? null,
                'interest' => $leadData['property_type'] ?? $leadData['type'] ?? null,
                'message' => $leadData['notes'] ?? $leadData['last_comment'] ?? null,
                'status' => isset($leadData['status']) ? strtolower($leadData['status']) : 'new',
                'user_id' => $userId,
                'created_at' => !empty($leadData['lead_date']) ? date('Y-m-d H:i:s', strtotime($leadData['lead_date'])) : now(),
                'updated_at' => now(),
            ];

            $this->info('Inserting lead with user_id: ' . $userId);
            $this->info('Insert data: ' . json_encode($insertData, JSON_PRETTY_PRINT));
            $lead = Lead::create($insertData);

            $this->info('Lead inserted successfully: ID ' . $lead->id);
            $this->info('Name: ' . ($lead->name ?? 'N/A'));
            $this->info('Phone: ' . $lead->phone);
            $this->info('Assigned User ID: ' . $userId);
            $this->info('CRM leads fetch completed successfully.');

            return 0;
            
        } 
        catch (\Exception $e) 
        {
            $this->error('Error fetching leads: ' . $e->getMessage());
            Log::error('CRM fetch leads error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return 1;
        }
    }
}