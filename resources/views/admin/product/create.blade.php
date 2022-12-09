@extends('admin.partials.main')

@section('content')
    <div class="content-wrapper">

        <div class="row mx-3">
            <div class="col-md-7 mt-4 ml-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Product</h3>
                    </div>
                    <form method="post" action="/admin/product" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" required autofocus value="{{ old('title') }}"
                                    placeholder="Title">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label " for="image">Image</label>
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select form-control" name="category">
                                    @foreach ($category as $category)
                                        @if (old('category') == $category->name)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="price" class="form-label">price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    id="rupiah" name="price" value="{{ old('price') }}" placeholder="price">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity" class="form-label">quantity</label>
                                <input type="number" min="0"
                                    class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                    name="quantity" value="{{ old('quantity') }}" placeholder="quantity">
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="discount_price" class="form-label">Discount Price</label>
                                <input type="number" class="form-control" id="discount_price" name="discount_price"
                                    value="{{ old('discount_price') }}" placeholder="discount_price">
                            </div>


                            <div class="mb-3">
                                <label for="description" class="form-label">description</label>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                                <trix-editor input="description"></trix-editor>
                            </div>

                        </div>
                        <div class="card-footer">
                            <a href="/admin/product" class="btn btn-danger">
                                <span data-feather="arrow-left"></span> Back
                            </a>
                            <button type="submit" class="btn btn-outline-success "><span data-feather="save"></span> Save
                                Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    {{-- Format Rupiah --}}
    <script>
        var rupiah = document.getElementById("rupiah");
        rupiah.addEventListener("keyup", function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value);
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, "").toString(),
                split = number_string.split(","),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? "." : "";
                rupiah += separator + ribuan.join(".");
            }

            rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
            return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
        }
    </script>
{{-- Menampilkan Gambar Di form --}}
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
