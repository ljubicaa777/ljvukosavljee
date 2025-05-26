<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tea;

class PageController extends Controller
{
    public function home()
    { 
        $featuredTeas = Tea::where('featured', true)->take(3)->get();
        return view('strana.list', ['featuredTeas' => $featuredTeas]);
    }

    public function contact()
    {
        return view('contact');
    }
}




//     public function home()
// {
//     // Dohvati sve čajeve iz baze
//     $teas = Tea::all();  // Koristi se `all()` za sve čajeve  

//     return view('strana.list', [
//         'teas' => $teas
//     ]);
// } 

// public function home()
// {
//     $featuredTeas = Tea::take(6)->get();
//     return view('strana.list', [
//         'featuredTeas' => $featuredTeas
//     ]);
// }



    // public function contact()
    // {
    //     return view('contact');
    // }

