<?php
// database/seeders/LocalitySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Locality;

class LocalitySeeder extends Seeder
{
    public function run(): void
    {
        $localities = [
            // Nearby (Roads)
            'nearby' => [
                ['name' => 'Ajmer Road', 'slug' => 'ajmer-road', 'sort_order' => 1],
                ['name' => 'Sikar Road', 'slug' => 'sikar-road', 'sort_order' => 2],
                ['name' => 'Tonk Road', 'slug' => 'tonk-road', 'sort_order' => 3],
                ['name' => 'Amer Road', 'slug' => 'amer-road', 'sort_order' => 4],
            ],

            // Popular Areas
            'popular' => [
                ['name' => 'Malviya Nagar', 'slug' => 'malviya-nagar', 'sort_order' => 1],
                ['name' => 'Mansarovar', 'slug' => 'mansarovar', 'sort_order' => 2],
                ['name' => 'Vaishali Nagar', 'slug' => 'vaishali-nagar', 'sort_order' => 3],
                ['name' => 'Jagatpura', 'slug' => 'jagatpura', 'sort_order' => 4],
                ['name' => 'C-Scheme', 'slug' => 'c-scheme', 'sort_order' => 5],
                ['name' => 'Bani Park', 'slug' => 'bani-park', 'sort_order' => 6],
                ['name' => 'Civil Lines', 'slug' => 'civil-lines', 'sort_order' => 7],
                ['name' => 'Raja Park', 'slug' => 'raja-park', 'sort_order' => 8],
                ['name' => 'Pink City', 'slug' => 'pink-city', 'sort_order' => 9],
                ['name' => 'Shyam Nagar', 'slug' => 'shyam-nagar', 'sort_order' => 10],
                ['name' => 'Sodala', 'slug' => 'sodala', 'sort_order' => 11],
                ['name' => 'Sanganer', 'slug' => 'sanganer', 'sort_order' => 12],
                ['name' => 'Vidhyadhar Nagar', 'slug' => 'vidhyadhar-nagar', 'sort_order' => 13],
                ['name' => 'Pratap Nagar', 'slug' => 'pratap-nagar', 'sort_order' => 14],
                ['name' => 'Mahesh Nagar', 'slug' => 'mahesh-nagar', 'sort_order' => 15],
                ['name' => 'Jawahar Nagar', 'slug' => 'jawahar-nagar', 'sort_order' => 16],
                ['name' => 'Tilak Nagar', 'slug' => 'tilak-nagar', 'sort_order' => 17],
                ['name' => 'Bapu Nagar', 'slug' => 'bapu-nagar', 'sort_order' => 18],
            ],

            // Other Areas
            'other' => [
                ['name' => 'Adarsh Nagar', 'slug' => 'adarsh-nagar', 'sort_order' => 1],
                ['name' => 'Agra Road', 'slug' => 'agra-road', 'sort_order' => 2],
                ['name' => 'Ajmeri Gate', 'slug' => 'ajmeri-gate', 'sort_order' => 3],
                ['name' => 'Ambabari', 'slug' => 'ambabari', 'sort_order' => 4],
                ['name' => 'Bais Godam', 'slug' => 'bais-godam', 'sort_order' => 5],
                ['name' => 'Bajaj Nagar', 'slug' => 'bajaj-nagar', 'sort_order' => 6],
                ['name' => 'Jagatpura Road', 'slug' => 'jagatpura-road', 'sort_order' => 7],
                ['name' => 'Jalupura', 'slug' => 'jalupura', 'sort_order' => 8],
                ['name' => 'Janata Colony', 'slug' => 'janata-colony', 'sort_order' => 9],
                ['name' => 'Jawaharlal Nehru Marg', 'slug' => 'jawaharlal-nehru-marg', 'sort_order' => 10],
                ['name' => 'Jhotwara', 'slug' => 'jhotwara', 'sort_order' => 11],
                ['name' => 'Jhotwara Industrial Area', 'slug' => 'jhotwara-industrial-area', 'sort_order' => 12],
                ['name' => 'Jhotwara Road', 'slug' => 'jhotwara-road', 'sort_order' => 13],
                ['name' => 'Johari Bazar', 'slug' => 'johari-bazar', 'sort_order' => 14],
                ['name' => 'Bapu Bazaar', 'slug' => 'bapu-bazaar', 'sort_order' => 15],
                ['name' => 'Barkat Nagar', 'slug' => 'barkat-nagar', 'sort_order' => 16],
                ['name' => 'Bhawani Singh Road', 'slug' => 'bhawani-singh-road', 'sort_order' => 17],
                ['name' => 'Biseswarji', 'slug' => 'biseswarji', 'sort_order' => 18],
                ['name' => 'Brahmapuri', 'slug' => 'brahmapuri', 'sort_order' => 19],
                ['name' => 'Chandpol', 'slug' => 'chandpol', 'sort_order' => 20],
                ['name' => 'Durgapura', 'slug' => 'durgapura', 'sort_order' => 21],
                ['name' => 'Gangori Bazar', 'slug' => 'gangori-bazar', 'sort_order' => 22],
                ['name' => 'Ghat Darwaza', 'slug' => 'ghat-darwaza', 'sort_order' => 23],
                ['name' => 'Gopalpura', 'slug' => 'gopalpura', 'sort_order' => 24],
                ['name' => 'Indira Bazar', 'slug' => 'indira-bazar', 'sort_order' => 25],
                ['name' => 'Jyothi Nagar', 'slug' => 'jyothi-nagar', 'sort_order' => 26],
                ['name' => 'Kalwar Road', 'slug' => 'kalwar-road', 'sort_order' => 27],
                ['name' => 'Kartarpur', 'slug' => 'kartarpur', 'sort_order' => 28],
                ['name' => 'Khatipura', 'slug' => 'khatipura', 'sort_order' => 29],
                ['name' => 'Mirza Ismail Road', 'slug' => 'mirza-ismail-road', 'sort_order' => 30],
                ['name' => 'Motidungri Marg', 'slug' => 'motidungri-marg', 'sort_order' => 31],
                ['name' => 'Muralipura', 'slug' => 'muralipura', 'sort_order' => 32],
                ['name' => 'New Colony', 'slug' => 'new-colony', 'sort_order' => 33],
                ['name' => 'Ramganj', 'slug' => 'ramganj', 'sort_order' => 34],
                ['name' => 'Sansar Chandra Road', 'slug' => 'sansar-chandra-road', 'sort_order' => 35],
                ['name' => 'Sethi Colony', 'slug' => 'sethi-colony', 'sort_order' => 36],
                ['name' => 'Shastri Nagar', 'slug' => 'shastri-nagar', 'sort_order' => 37],
                ['name' => 'Sindhi Camp', 'slug' => 'sindhi-camp', 'sort_order' => 38],
                ['name' => 'Sirsi Road', 'slug' => 'sirsi-road', 'sort_order' => 39],
                ['name' => 'Sitapura Industrial Area', 'slug' => 'sitapura-industrial-area', 'sort_order' => 40],
                ['name' => 'Subhash Nagar', 'slug' => 'subhash-nagar', 'sort_order' => 41],
                ['name' => 'Sudharshanpura Industrial Area', 'slug' => 'sudharshanpura-industrial-area', 'sort_order' => 42],
                ['name' => 'Surajpol Bazar', 'slug' => 'surajpol-bazar', 'sort_order' => 43],
                ['name' => 'Tonk Phatak', 'slug' => 'tonk-phatak', 'sort_order' => 44],
                ['name' => 'Transport Nagar', 'slug' => 'transport-nagar', 'sort_order' => 45],
                ['name' => 'Nirman Nagar', 'slug' => 'nirman-nagar', 'sort_order' => 46],
                ['name' => 'Mahatma Gandhi Nagar', 'slug' => 'mahatma-gandhi-nagar', 'sort_order' => 47],
                ['name' => 'Vishwakarma Industrial Area', 'slug' => 'vishwakarma-industrial-area', 'sort_order' => 48],
                ['name' => 'Prithviraj Nagar (B Sector)', 'slug' => 'prithviraj-nagar-b-sector', 'sort_order' => 49],
            ],
        ];

        foreach ($localities as $category => $items) {
            foreach ($items as $item) {
                Locality::create([
                    'name' => $item['name'],
                    'slug' => $item['slug'],
                    'category' => $category,
                    'sort_order' => $item['sort_order'],
                    'is_active' => true,
                ]);
            }
        }
    }
}