<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run()
    {

        DB::table('services')->insert([
            'service_name' => 'Laundry Service',
            'price_per_kg' => 20.99,
            'description' => 'We offer high-quality laundry services with fast turnaround time.',
            'image1' => 'services/78v8uEvpOp2tceAiHO7xqk7g8ifaYrpFuo7xPQ8k.jpg',
            'duration' => '2-3 ',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('services')->insert([
            'service_name' => 'Dry Cleaning Service',
            'price_per_kg' => 30.99,
            'description' => 'Professional dry cleaning for all your delicate garments.',
            'image1' => 'services/Gl0hTqdIN3fonc6kHO84iWMc6sTYzRJHY8k4NWl0.png',
            'duration' => '2-3',
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
