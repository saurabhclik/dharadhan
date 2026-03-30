<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'razorpay_payment_id',
        'razorpay_order_id',
        'razorpay_signature',
        'order_id',
        'amount',
        'currency',
        'status',
        'payment_method',
        'plan_type',
        'plan_duration',
        'description',
        'metadata',
        'utr_number',
        'payment_screenshot',
        'paid_at',
        'refunded_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'metadata' => 'array',
        'paid_at' => 'datetime',
        'refunded_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSuccessful($query)
    {
        return $query->where('status', 'paid');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    public function isSuccessful(): bool
    {
        return $this->status === 'paid';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function markAsPaid(array $data = []): void
    {
        $this->update(array_merge([
            'status' => 'paid',
            'paid_at' => now(),
        ], $data));
    }

    public function markAsFailed(array $data = []): void
    {
        $this->update(array_merge([
            'status' => 'failed',
        ], $data));
    }

    public function getFormattedAmountAttribute(): string
    {
        return $this->currency . ' ' . number_format($this->amount, 2);
    }
}