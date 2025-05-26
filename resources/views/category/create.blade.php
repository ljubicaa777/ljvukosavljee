@extends('layout.admin')

@section('title', 'Dodaj kategoriju')

@section('content')
<div class="container">
    <h2 class="my-4">Dodaj novu kategoriju</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="naziv" class="form-label">Naziv kategorije</label>
            <input type="text" name="naziv" id="naziv" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="opis" class="form-label">Opis kategorije</label>
            <textarea class="form-control summernote" name="opis" id="opis" cols="30" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Sačuvaj</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Nazad</a>
    </form>
</div>
@endsection

@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200
        });
    });
</script>
@endsection
