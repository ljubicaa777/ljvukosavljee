@extends("layout/public")

@section("title")
    Prikaz svih čajeva
@endsection

@section("content")
    @if (session("success"))
        <div class="alert alert-success">
            {{ session("success") }}
        </div>
    @endif

    <header class="pb-3 mb-4 border-bottom">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="fw-bold">Prirodan eliksir</h1>
        
        </div>
    </header>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Izdvajamo iz ponude</h2>
        <div class="row">
            @foreach ($featuredTeas as $tea)
                <div class="col-sm-6 col-md-4 mb-4">
                    <div class="card h-100 text-center">
                        <img src="{{ asset($tea->slika) }}" class="card-img-top" alt="{{ $tea->naziv }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $tea->naziv }}</h5>
                            <p class="card-text">{{ $tea->opis }}</p>
                            <p class="card-text">{{ $tea->cena }} RSD</p>
                            <a href="{{ route('teas.show', $tea->id) }}" class="btn btn-primary mt-2">Opširnije</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
