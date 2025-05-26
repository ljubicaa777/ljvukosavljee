<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tea;
use App\Models\Order;

class OrderController extends Controller
{
    public function create(Tea $tea)
    {
        if (auth()->user()->role_id !== 1) {
            abort(403); // samo za obične korisnike
        }

        return view('orders.create', compact('tea'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role_id !== 1) {
            abort(403);
        }

        $request->validate([
            'tea_id' => 'required|exists:teas,id',
            'kolicina' => 'required|integer|min:1',
        ]);

        $tea = Tea::findOrFail($request->tea_id);
        $ukupno = $tea->cena * $request->kolicina;

        // Postavljamo status "na čekanju" kao podrazumevanu vrednost
        $status = 'na čekanju';

        Order::create([
            'user_id' => auth()->id(),
            'tea_id' => $tea->id,
            'kolicina' => $request->kolicina,
            'ukupno' => $ukupno,
            'status' => $status,
        ]);

        return redirect()->route('orders.index')->with('success', 'Uspešno ste naručili čaj.');
    }

    public function index()
    {
        if (auth()->user()->role_id !== 1) {
            abort(403);
        }

        $orders = auth()->user()->orders()->with('tea')->latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function indexAdmin()
    {
        $orders = Order::with('tea', 'user')->latest()->get();
        return view('admin.order_index', compact('orders')); // koristi order_index
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:prihvaćena,neprihvaćena,na čekanju',
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Status uspešno ažuriran.');
    }

    public function edit(Order $order)
    {
        if (auth()->id() !== $order->user_id) {
            abort(403, 'Nemate dozvolu za izmenu ove porudžbine.');
        }

        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
{
    if (auth()->id() !== $order->user_id) {
        abort(403);
    }

    $request->validate([
        'kolicina' => 'required|integer|min:1',
    ]);

    // Pronađi čaj za koji je narudžbina
    $tea = $order->tea;

    // Izračunaj novu ukupnu cenu
    $ukupno = $request->kolicina * $tea->cena;

    // Ažuriraj porudžbinu
    $order->update([
        'kolicina' => $request->kolicina,
        'ukupno' => $ukupno,
        'status' => 'na čekanju',
    ]);

    return redirect()->route('orders.index')->with('success', 'Porudžbina uspešno izmenjena.');
}



    public function destroy(Order $order)
    {
        if (auth()->id() !== $order->user_id) {
            abort(403);
        }

        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Porudžbina obrisana.');
    }
}

