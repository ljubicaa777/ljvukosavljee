<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;  


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order=new Order();
        $order->ukupno='900.00';
        $order->user_id='1';
        $order->tea_id='2';

        $order->save();

        $order=new Order();
        $order->ukupno='1000.00';
        $order->user_id='1';
        $order->tea_id='2';

        $order->save(); 

        $order=new Order();
        $order->ukupno='800.00';
        $order->user_id='1'; 
        $order->tea_id='2';

        $order->save();

        $order=new Order();
        $order->ukupno='600.00';
        $order->user_id='1';
        $order->tea_id='2'; 
        
        $order->save();

    }
}
