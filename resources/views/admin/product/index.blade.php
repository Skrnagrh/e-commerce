@extends('admin.partials.main')

@section('content')
    <div class="content-wrapper">
        <div class="row mx-3">
            <div class="col-md-12 mt-4">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <a href="/admin/product/create" class="btn btn-success">Add Product</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Category Table</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Product Title</th>
                                    <th>Product Category</th>
                                    <th>Product Quatity</th>
                                    <th>Product Price</th>
                                    <th>Product Discount</th>
                                    <th>Image</th>
                                    <th style="width: 40px" colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->discount_price }}</td>
                                        <td><img src="{{ asset('storage/' . $product->image) }}" height="10%"
                                                width="20%"></td>
                                        <td><a href="/admin/product/{{ $product->title }}" class="badge bg-success"><i
                                                    class="nav-icon fas fa-eye"></i> Show</a></span>
                                        </td>
                                        <td><a href="/admin/product/{{ $product->title }}/edit"
                                                class="badge bg-warning text-light"><i
                                                    class="nav-icon fas fa-pen text-light"></i> Edit</a></td>
                                        <td>
                                            <form action="/admin/product/{{ $product->title }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="badge bg-danger border-0"
                                                    onclick="return confirm('Are you sure?')"><i
                                                        class="nav-icon fas fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        <div class="justify-content-between pagination-sm">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
