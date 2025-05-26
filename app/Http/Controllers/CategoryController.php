<?php 
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create() {
        return view('category.create');
    }

    public function store(Request $request) {
        $request->validate(['naziv' => 'required|string|max:255']);
        Category::create(['naziv' => $request->naziv]);
        return redirect()->route('categories.index')->with('success', 'Kategorija uspešno dodata!');
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        $request->validate(['naziv' => 'required|string|max:255']);
        $category = Category::findOrFail($id);
        $category->naziv = $request->naziv;
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Kategorija uspešno izmenjena!');
    }

    public function delete($id) {
        $category = Category::findOrFail($id);
        return view('category.delete', compact('category'));
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategorija je obrisana!');
    }
}

