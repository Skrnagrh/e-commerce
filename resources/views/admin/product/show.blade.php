@extends('admin.partials.main')

@section('content')
<div class="content-wrapper">
    <div class="row mx-3">
        <div class="col-md-12 mt-4">
            <div class="row ml-2">
                <div class="col my-3">
                    <a href="/admin/product" class="btn btn-danger"><i class="nav-icon fas fa-arrow-left"></i> Back</a>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-3">
                    <div class="card shadow">
                        <img src="{{ asset('storage/' . $product->image) }}" style="max-height: 100%" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text"><strong>Rp. {{ $product->price }}</strong></p>
                            <p class="card-text badge bg-pink">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{!! $product->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
