@extends('layout.public')

@section('content')
    <h2 class="h4 fw-semibold mb-4">Izmeni porudžbinu: {{ $order->tea->naziv }}</h2>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @elseif (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('orders.update', $order->id) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <input type="hidden" id="cena-jedinica" value="{{ $order->tea->cena }}">

        <div class="mb-3">
            <label for="kolicina" class="form-label">Količina</label>
            <input type="number" name="kolicina" id="kolicina" value="{{ $order->kolicina }}" min="1"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ukupna cena:</label>
            <p id="ukupna-cena" class="fs-5 fw-semibold">{{ $order->tea->cena * $order->kolicina }} RSD</p>
        </div>

        <button type="submit" class="btn btn-primary">
            Sačuvaj izmene
        </button>
    </form>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cena = parseFloat(document.getElementById('cena-jedinica').value);
        const kolicinaInput = document.getElementById('kolicina');
        const ukupnaCenaEl = document.getElementById('ukupna-cena');

        function updateCena() {
            const kolicina = parseInt(kolicinaInput.value) || 1;
            ukupnaCenaEl.textContent = (cena * kolicina).toFixed(2) + ' RSD';
        }

        kolicinaInput.addEventListener('input', updateCena);
        updateCena();
    });
</script>
@endpush

