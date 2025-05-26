<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dodaj caj') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-5">
                    <form class="d-flex flex-column gap-4" action="{{ route('product_create') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="naziv">Naziv</label>
                            <input type="text" class="form-control" name="naziv" id="naziv">
                        </div>

                        <div class="form-group">
                            <label for="opis">Opis</label>
                            <textarea class="form-control summernote" name="opis" id="opis" cols="30" rows="5"></textarea>
                       </div>
  
                        <div class="form-group">
                            <label for="cena">Cena</label>
                            <input type="number" class="form-control" name="cena" id="cena">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Kategorija</label>
                            <select name="category_id" class="form-control" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->naziv }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Slika</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>

                        <button class="btn btn-primary">Dodaj caj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200
        });
    });
</script> -->

</x-app-layout>
