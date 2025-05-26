@extends('layout.admin')

@section('title', 'Brisanje kategorije')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header">Brisanje kategorije: <b>{{ $category->naziv }}</b></div>
        <div class="card-body text-center">
            <p>Da li ste sigurni da želite da obrišete ovu kategoriju?</p>

            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Obriši</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Otkaži</a>
            </form>
        </div>
    </div>
</div>
@endsection
