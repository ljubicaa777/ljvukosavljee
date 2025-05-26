@extends("layout.public")

@section("title")
Potvrda brisanja porudžbine
@endsection

@section("content")
<div class="row justify-content-center">
    <div class="col-md-6 text-center">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Brisanje porudžbine</h5>
            </div>
            <div class="card-body">
                <p>Da li ste sigurni da želite da obrišete ovu porudžbinu korisnika <strong>{{ $order->user->name }}</strong>?</p>
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Obriši</button>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Otkaži</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
