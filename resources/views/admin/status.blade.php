<form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="d-flex align-items-center gap-2">
    @csrf
    @method('PATCH')
    <select name="status" class="form-select form-select-sm" style="width: auto;">
        <option value="na čekanju" {{ $order->status == 'na čekanju' ? 'selected' : '' }}>Na čekanju</option>
        <option value="prihvaćena" {{ $order->status == 'prihvaćena' ? 'selected' : '' }}>Prihvaćena</option>
        <option value="neprihvaćena" {{ $order->status == 'neprihvaćena' ? 'selected' : '' }}>Neprihvaćena</option>
    </select>
    <button type="submit" class="btn btn-sm btn-primary">Sačuvaj</button>
</form>
