<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dodaj novi caj') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">
                <form method="POST" action="{{ route('product_create') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="naziv" class="block font-medium text-sm text-gray-700">Naziv</label>
                        <input type="text" name="naziv" id="naziv" class="form-control" required>
                    </div>

                     <div class="form-group">
                            <label for="opis">Opis</label>
                            <textarea class="form-control summernote" name="opis" id="opis" cols="30" rows="5"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="cena" class="block font-medium text-sm text-gray-700">Cena</label>
                        <input type="number" name="cena" id="cena" class="form-control" min="0" step="0.01" required>
                    </div>

                    <div class="mb-4">
                        <label for="category_id" class="block font-medium text-sm text-gray-700">Kategorija</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->naziv }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block font-medium text-sm text-gray-700">Slika</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Sačuvaj</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Summernote -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200
        });
    });
</script>

</x-app-layout>
