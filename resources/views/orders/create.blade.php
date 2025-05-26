@extends('layout.public')

@section('content')
    <h2 class="h4 fw-semibold mb-4">Naruči: {{ $tea->naziv }}</h2>

    <form action="{{ route('orders.store', $tea->id) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        <input type="hidden" name="tea_id" value="{{ $tea->id }}">
        <input type="hidden" id="cena-jedinica" value="{{ $tea->cena }}">

        <div class="mb-3">
            <label for="kolicina" class="form-label">Količina</label>
            <input type="number" name="kolicina" id="kolicina" value="1" min="1"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ukupna cena:</label>
            <p id="ukupna-cena" class="fs-5 fw-semibold">{{ $tea->cena }} RSD</p>
        </div>

        <button type="submit" class="btn btn-primary">
            Naruči
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

