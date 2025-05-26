<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder; 
use App\Models\Item;  


class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item=new Item();
        $item->order_id='1';
        $item->tea_id='1';
        $item->kolicina='2';
        $item->cena='450';

        $item->save();

        $item=new Item();
        $item->order_id='2';
        $item->tea_id='4';
        $item->kolicina='1';
        $item->cena='1000';

        $item->save(); 

        $item=new Item();
        $item->order_id='3';
        $item->tea_id='6';
        $item->kolicina='2';
        $item->cena='400';

        $item->save(); 

        $item=new Item();
        $item->order_id='4';
        $item->tea_id='2';
        $item->kolicina='1';
        $item->cena='600';

        $item->save();
    }
}
