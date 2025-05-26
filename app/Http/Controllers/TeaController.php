<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tea;

class TeaController extends Controller
{
    public function show($id)
    {
        $tea = Tea::findOrFail($id);
        return view('show', ['tea' => $tea]);
    }

    public function index()
    {
        $teas = Tea::all(); 
        return view('index', ['teas' => $teas]);
        // $teas = Tea::where('featured', false)->get();
        // return view('index', ['teas' => $teas]);
    }
}

