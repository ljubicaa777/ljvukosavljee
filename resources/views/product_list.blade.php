@extends('layout.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Prikaz svih proizvoda</h1>
<a href="{{ route('product_add') }}" class="btn btn-primary mb-3">Add product</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive"> 
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Naziv</th>
                        <th>Opis</th>
                        <th>Cena</th>
                        <th>Category</th>
                        <th>User</th>
                        <th>Slika</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th colspan="2">Opcije</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teas as $tea)
                        <tr>
                            <td>{{ $tea->id }}</td>
                            <td>{{ $tea->naziv }}</td>
                            <td>{{ $tea->opis }}</td>
                            <td>{{ $tea->cena }}</td>
                            <td>{{ $tea->category->naziv }}</td>
                            <td>{{ $tea->user->email }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $tea->image) }}" style="width: 100px;" alt="{{ $tea->naziv }}">
                            </td>
                            <td>{{ $tea->created_at }}</td>
                            <td>{{ $tea->updated_at }}</td>
                            <td><a href="{{ route('tea.delete', $tea->id) }}" class="btn btn-danger">Delete</a></td>
                            <td><a href="{{ route('edit', $tea->id) }}" class="btn btn-primary">Edit</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>
</div>
@endsection
