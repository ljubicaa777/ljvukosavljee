@extends("layout.public")

@section("title", "Ponuda čajeva")

@section("content")
<div class="container">
    <h2 class="mb-4 text-center">Naša ponuda</h2>
    <div class="row">
        @foreach ($teas as $tea)
            <div class="col-md-4 mb-4">
                <div class="card h-100 text-center">
                    <img src="{{ asset($tea->slika) }}" class="card-img-top" alt="{{ $tea->naziv }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $tea->naziv }}</h5>
                        <p class="card-text">{{ $tea->opis }}</p>
                        <p class="fw-bold">{{ number_format($tea->cena, 2) }} RSD</p>
                        <a href="{{ route('teas.show', $tea->id) }}" class="btn btn-primary">Opširnije</a>
                        <a href="{{ route('orders.create', $tea->id) }}" class="btn btn-success">Naruci</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection