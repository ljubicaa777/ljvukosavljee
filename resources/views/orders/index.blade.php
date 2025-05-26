@extends('layout.public')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2 class="h4 fw-semibold mb-4">Moje narudžbine</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($orders->count())
            <div class="table-responsive bg-white shadow-sm rounded p-3">
                <table class="table table-striped table-bordered mb-0">
                    <thead class="table-light">
                       <tr> 
                        <th>Čaj</th>
                        <th>Količina</th>
                        <th>Ukupno</th>
                        <th>Datum</th>
                        <th>Status</th>
                        <th>Akcije</th>
                       </tr>
                 </thead>
                 <tbody>
                   @foreach($orders as $order)
                  <tr>
                     <td>{{ $order->tea->naziv }}</td>
                     <td>{{ $order->kolicina }}</td>
                     <td>{{ number_format($order->ukupno, 2) }}</td>
                     <td>{{ $order->created_at->format('d.m.Y') }}</td>
                     <td>{{ ucfirst($order->status) }}</td>
                     <td><a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Izmeni</a>
                     <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Da li ste sigurni da želite da obrišete porudžbinu?')"> Obrisi</button>
                     </form>
                     </td>
                   </tr>
                   @endforeach
                  </tbody>
              </table>
         </div>
        @else
            <p class="text-muted">Nemate još nijednu narudžbinu.</p>
        @endif
    </div>
@endsection





