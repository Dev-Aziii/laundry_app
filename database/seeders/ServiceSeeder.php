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
            'image1' => 'images/services/laundry-img1.jpg',
            'image2' => 'images/services/laundry-img1.png',
            'duration' => '2-3 ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('services')->insert([
            'service_name' => 'Dry Cleaning Service',
            'price_per_kg' => 30.99,
            'description' => 'Professional dry cleaning for all your delicate garments.',
            'image1' => 'images/services/laundry-img2.png',
            'image2' => 'images/services/laundry-img1.jpg',
            'duration' => '2-3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
