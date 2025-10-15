<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class OrdersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $statusOptions = ['pendente', 'pago', 'cancelado'];

        foreach (range(1, 10) as $i) {
            Order::create([
                'user_id' => $users->random()->id,
                'produto' => "Produto $i",
                'quantidade' => rand(1, 5),
                'valor' => rand(10, 100),
                'status' => $statusOptions[array_rand($statusOptions)],
            ]);
        }
    }
}

