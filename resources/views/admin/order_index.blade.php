@extends('layout.admin')

@section('content')
<h2 class="mb-4">Sve porudžbine</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-responsive">
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Korisnik</th>
            <th>Čaj</th>
            <th>Količina</th>
            <th>Ukupno</th>
            <th>Status</th>
            <th>Izmeni status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->tea->naziv }}</td>
            <td>{{ $order->kolicina }}</td>
            <td>{{ $order->ukupno }}</td>
            <td>{{ ucfirst($order->status) }}</td>
            <td>
                @include('admin.status', ['order' => $order])
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
