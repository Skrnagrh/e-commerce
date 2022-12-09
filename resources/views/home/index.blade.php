@extends('home.layout.main')
@section('content')
    <div class="row row-cols-2 m-3 mt-5">
        @foreach ($product as $product)
            <div class="col-sm-6 col-md-2 my-2" style="cursor: pointer;">
                <a href="/product_details/{{ $product->id }}">
                    <div class="card shadow-sm" style="border-radius: 10px; height: 100%;">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                            style="border-radius: 10px 10px 0 0; max-height: 50%">
                        <div class="m-2">
                            <h5 class="card-title font-weight mb-1">{{ $product->title }}</h5>
                            <p class="card-text">
                                @if ($total = (1 - $product->discount_price / 100) * $product->price)
                                    @if ($product->discount_price == 0)
                                        {{-- <h6 class="mb-2">
                                            Rp {{ number_format($total, 3, '.', '.') }}
                                        </h6>
                                        <span class="badge bg-danger text-light mr-1 mb-2">{{ $product->discount_price }}
                                            %</span>
                                        <span style="text-decoration: line-through; color: black">
                                            Rp {{ $product->price }}
                                        </span> --}}
                                        <h6 class="mb-2">
                                            Rp {{ $product->price }}
                                        </h6>
                                    @else
                                        <h6 class="mb-2">
                                            Rp {{ number_format($total, 3, '.', '.') }}
                                        </h6>
                                        <span class="badge bg-danger text-light mr-1 mb-2">{{ $product->discount_price }}
                                            %</span>
                                        <span style="text-decoration: line-through; color: black">
                                            Rp {{ $product->price }}
                                        </span>
                                        {{-- <h6 class="mb-2">
                                            Rp {{ $product->price }}
                                        </h6> --}}
                                    @endif
                                @endif
                            </p>
                            {{-- <form action="{{ url('add_cart', $product->id) }}" method="post">
                                @csrf
                                <input type="number" name="quantity" id="" value="1" min="1"
                                    style="width: 100px" hidden="">
                                <input type="submit" value="add to Cart" value="1"
                                    class="btn bg-success text-light btn-sm" style="width: 100%">
                            </form> --}}

                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection

{{-- <div class="box shadow">
                <div class="option_container">
                    <div class="options">
                        <a href="/product_details/{{ $product->id }}" class="option1">
                            Detail
                        </a>
                        <form action="{{ url('add_cart', $product->id) }}" method="post">
                            @csrf
                            <input type="number" name="quantity" id="" value="1" min="1"
                                style="width: 100px" hidden="">
                            <input type="submit" value="add to Cart" value="1" class="">
                        </form>
                    </div>
                </div>
                <div class="img-box full">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="">
                </div>
                <div class="card-body">
                    <p>
                        {{ $product->title }}
                    </p>


                    @if ($total = ($product->discount_price / 100) * $product->price)
                        @if ($setelah_disc = $product->price - $total)
                            <h6>
                                Rp {{ $setelah_disc }}
                            </h6>

                            <span class="badge bg-danger text-light">{{ $product->discount_price }} %</span>

                            <span style="text-decoration: line-through;">
                                Rp {{ $product->price }}
                            </span>
                        @endif
                    @else
                        <h6>
                            Rp {{ $product->price }}
                        </h6>
                    @endif
                </div>
            </div> --}}
