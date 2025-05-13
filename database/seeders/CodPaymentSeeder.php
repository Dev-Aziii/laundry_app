<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Sale;
use App\Models\Payment;
use App\Models\CodPayment;
use App\Models\Service;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CodPaymentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {
            // Generate a unique reference number
            $ref_no = 'REF' . strtoupper(Str::random(6));

            // Randomly assign user_id to be either 2 or 3
            $user_id = $faker->randomElement([2, 3]);

            // Select a valid service_id
            $service_id = $faker->numberBetween(1, 2); // Adjust based on actual existing services
            $quantity = $faker->numberBetween(5, 20);

            // Create Order
            $order = Order::create([
                'user_id' => $user_id,
                'ref_no' => $ref_no,
                'payment_method' => 'cash_on_delivery',
                'status' => 'pending',
            ]);

            // Create OrderDetail
            OrderDetail::create([
                'order_id' => $order->id,
                'service_id' => $service_id,
                'name' => $faker->name,
                'email' => $faker->email,
                'pick_up_address' => $faker->address,
                'delivery_address' => $faker->address,
                'quantity' => $quantity,
            ]);

            // Calculate amount_due from Service price and quantity
            $amount_due = $this->calculateAmountDue($service_id, $quantity);

            // Create Sale
            $sale = Sale::create([
                'order_id' => $order->id,
                'amount_due' => $amount_due,
            ]);

            // Create Payment
            $payment = Payment::create([
                'sale_id' => $sale->id,
                'type' => 'cash_on_delivery',
            ]);

            // Create CodPayment
            CodPayment::create([
                'payment_id' => $payment->id,
                'receiver_name' => $faker->name,
                'email' => $faker->email,
            ]);
        }
    }

    private function calculateAmountDue($service_id, $quantity)
    {
        $service = Service::find($service_id);

        if (!$service) {
            return 0; // or handle missing service appropriately
        }

        return $service->price_per_kg * $quantity;
    }
}
