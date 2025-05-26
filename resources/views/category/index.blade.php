@extends('layout.admin')

@section('title', 'Kategorije')

@section('content')
<div class="container">
    <h2 class="my-4">Kategorije</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">Dodaj novu kategoriju</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Naziv</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->naziv }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Izmeni</a>
                        <a href="{{ url('admin/categories/' . $category->id . '/delete') }}" class="btn btn-danger btn-sm">Obriši</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection