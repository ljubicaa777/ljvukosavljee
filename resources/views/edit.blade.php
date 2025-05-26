@extends("layout/public")

@section("title")
Blog Edit Stranica
@endsection

@section("content")

@if (session("error"))
    <div class="alert alert-danger">
        {{ session("error") }}
    </div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('update', ['id' => $tea->id]) }}">
                    @csrf

                    <div class="mb-3">
                        <label for="naziv">Naziv</label>
                        <input type="text" value="{{ $tea->naziv }}" class="form-control" name="naziv" id="naziv">
                    </div>

                    <div class="mb-3">
                        <label for="opis">Sadržaj</label>
                        <textarea name="opis" class="form-control" rows="10" id="opis">{{ $tea->opis }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="cena">Cena</label>
                        <input type="number" value="{{ $tea->cena }}" class="form-control" name="cena" id="cena">
                    </div>

                    <div class="mb-3">
                        <label for="category_id">Kategorija</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $tea->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->naziv }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Izmeni</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
