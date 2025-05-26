<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tea;  


class TeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
  {
    $tea = new Tea();
    $tea->naziv = 'Lavanda';
    $tea->opis = 'Umirujuci biljni caj';
    $tea->cena = '450.00';
    $tea->category_id = '1';
    $tea->user_id = '1';
    $tea->slika = 'image1.jpg';
    $tea->featured = false;
    $tea->save();

    $tea = new Tea();
    $tea->naziv = 'Hibiskus';
    $tea->opis = 'Osvezavajuci napitak';
    $tea->cena = '450.00';
    $tea->category_id = '1';
    $tea->user_id = '1';
    $tea->slika = 'image2.jpg';
    $tea->featured = true; // ID 2
    $tea->save(); 

    $tea = new Tea();
    $tea->naziv = 'Caj od ruze';
    $tea->opis = 'Caj sa cvetnim aromama';
    $tea->cena = '600.00';
    $tea->category_id = '1';
    $tea->user_id = '2';
    $tea->slika = 'image3.jpg';
    $tea->featured = true; // ID 3
    $tea->save(); 

    $tea = new Tea();
    $tea->naziv = 'Plavi slez';
    $tea->opis = 'Lekoviti caj';
    $tea->cena = '1000.00';
    $tea->category_id = '2';
    $tea->user_id = '2';
    $tea->slika = 'image4.jpg'; 
    $tea->featured = true; // ID 4
    $tea->save(); 

    $tea = new Tea();
    $tea->naziv = 'Zeleni caj';
    $tea->opis = 'Bogat antioksidansima';
    $tea->cena = '400.00';
    $tea->category_id = '1';
    $tea->user_id = '2';
    $tea->slika = 'image5.jpg'; 
    $tea->featured = false;
    $tea->save(); 

    $tea = new Tea();
    $tea->naziv = 'Menta';
    $tea->opis = 'Osvezavajuci caj sa ukusom mente';
    $tea->cena = '400.00';
    $tea->category_id = '2';
    $tea->user_id = '3';
    $tea->slika = 'image6.jpg';
    $tea->featured = false;
    $tea->save();
  }
}
