@extends('layout.admin')

@section('title', 'Izmeni kategoriju')

@section('content')
<div class="container">
    <h2 class="my-4">Izmeni kategoriju</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv kategorije</label>
            <input type="text" name="naziv" class="form-control" value="{{ $category->naziv }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Nazad</a>
    </form>
</div>
@endsection
