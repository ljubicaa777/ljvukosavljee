<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function list() {
        return view("product_list", [  
            "teas" => Tea::all(),
            "trenutni_korisnik" => Auth::user()
        ]);
    }

    public function add() {
        return view('product_add', [  
            "categories" => Category::all()
        ]);
    }

    public function create(Request $request) {
        $request->validate([
            'naziv' => 'required|string|max:100',
            'cena' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'opis' => 'required|string',
            'slika' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $tea = new Tea();

        $tea->naziv = $request->input("naziv");
        $tea->opis = $request->input("opis");
        $tea->category_id = $request->input("category_id");
        $tea->user_id = Auth::user()->id;
        $tea->cena = $request->input("cena");

        if ($request->hasFile("slika")) {
            $imageFile = $request->file("slika");
            $imageName = time() . "." . $imageFile->getClientOriginalExtension();
            $imagePath = $imageFile->storeAs("product_images", $imageName, 'public');
            $tea->image = $imagePath;
        }

        $tea->save();

        return redirect()->route('proizvodi')->with("success", "Proizvod je uspešno sačuvan");  
    } 

    public function edit($id) {
    $tea = Tea::findOrFail($id);
    $categories = Category::all();
    return view("edit", compact("tea", "categories"));  // dodaš categories u compact
}

    public function update(Request $request, $id) {
    if (empty($request->naziv) || empty($request->opis)) {
        return redirect()->back()->with("error", "Naziv i opis su obavezni!");
    }

    $tea = Tea::findOrFail($id);
    $tea->naziv = $request->naziv;
    $tea->opis = $request->opis;

    if (!empty($request->cena)) {
        $tea->cena = $request->cena;
    }

    if (!empty($request->category_id)) {
        $tea->category_id = $request->category_id;
    }

    $tea->save();

    return redirect(url("/"))->with("info", "Izmene su uspešno sačuvane!");
}


    public function delete($id) {
        return view("delete", [
            "id" => $id,
            "tea" => Tea::findOrFail($id),
        ]);
    }

    public function destroy($id) {
        $tea = Tea::findOrFail($id);
        $tea->delete();

        return redirect()->route('proizvodi')->with("success", "Čaj je uspešno obrisan iz baze!");
    } 

     public function notAuth() {
        return view('auth.not-auth');
    } 

    public function chart() {
    $data = DB::table('orders')
        ->select(DB::raw('DATE(created_at) as datum'), DB::raw('SUM(ukupno) as ukupno'))
        ->groupBy(DB::raw('DATE(created_at)'))
        ->orderBy('datum', 'ASC')
        ->get();

    return view('admin.chart', compact('data'));
}
}

