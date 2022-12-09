@extends('admin.partials.main')

@section('content')
    <div class="content-wrapper">
        
        <div class="container">
            <div class="row">
                <div class="col-md-4 mt-4 ml-5">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Category</h3>
                        </div>
                        <form method="post" action="/admin/category" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" required autofocus value="{{ old('name') }}" placeholder="Category Name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <hr class="mb-2">
                                    <a href="/dashboard/categories" class="btn btn-danger my-1" > Back
                                    </a>
                                    <button type="submit" class="btn btn-outline-success my-1 ml-1">Save
                                        Post</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-7 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category Table</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                    <tr>
                                        <th style="width: 10px">No</th>
                                        <th>Category Name</th>
                                        <th style="width: 40px" colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td><span class="badge bg-success"><i class="nav-icon fas fa-eye"></i></span>
                                            </td>
                                            <td><span class="badge bg-warning"><i
                                                        class="nav-icon fas fa-pen text-light"></i></span></td>
                                            <td>
                                                <form action="/admin/category/{{ $category->id }}" method="post"
                                                    class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="badge bg-danger border-0"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="nav-icon fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <div class="justify-content-between pagination-sm">
                                {{ $categories->links() }}
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
