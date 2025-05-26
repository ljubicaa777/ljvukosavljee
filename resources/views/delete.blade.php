@extends("layout/public")

@section("title")
Potvrda brisanja čaja
@endsection

@section("content")
<div class="row justify-content-center">
    <div class="col-md-6 text-center">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Brisanje čaja: <b>{{ $tea->naziv }}</b></h5>
            </div>
            <div class="card-body">
                <p>Da li ste sigurni da želite da obrišete ovaj čaj?</p>
                <form action="{{ route('tea.destroy', $id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Obriši</button>
                    <a href="{{ route('proizvodi') }}" class="btn btn-secondary">Otkaži</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
