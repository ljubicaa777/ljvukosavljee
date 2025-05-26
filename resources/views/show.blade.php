@extends("layout.public")

@section("title", $tea->naziv)

@section("content")
<div class="container">
    <h2 class="mb-3">{{ $tea->naziv }}</h2>
    
    <img src="{{ asset($tea->slika) }}" alt="{{ $tea->naziv }}" class="img-fluid mb-3" style="max-height: 300px; object-fit: cover;">
    
    <p>{{ $tea->opis }}</p>
    
    <p class="fw-bold">{{ number_format($tea->cena, 2) }} RSD</p>

    <a href="{{ route('teas.index') }}" class="btn btn-secondary mt-3">Nazad na ponudu</a>
</div>
@endsection 