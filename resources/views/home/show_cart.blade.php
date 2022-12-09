@extends('home.layout.main')

@section('content')


    <div class="row">
        <div class="col-md-6">
            <div class="row justify-content-center">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button class="close" type="button" data-dismis="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>


    @if ($cart->count())
        <div class="row justify-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="col-md-12 m-3">
                        <h1 style="font-size: 24px; font-weight: bold" class="m-2">Keranjang</h1>
                        {{-- <div class="form-check m-3">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Pilih Semua
                                    </label>
                                </div> --}}
                        <hr style="color: grey; border: 2px solid rgba(180, 180, 180, 0.219); border-radius: 20px"
                            width="95%">

                    </div>

                    <div class="col-sm-8 col-lg-12 m-3">
                        <?php $totalprice = 0; ?>
                        <?php $totalquantity = 0; ?>
                        @foreach ($cart as $cart)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <div style="display: flex; justify-content: space-between" class="mr-5">
                                    <label class="form-check-label ml-5 mb-2" for="flexCheckDefault">
                                        <h1>Nama Penjual/Toko</h1>
                                    </label>
                                    <a onclick="return confirm('are you sure')" class="justify-content-end"
                                        href="{{ url('remove_cart', $cart->id) }}">Hapus
                                    </a>
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <div class="row row-cols-2 ml-2">
                                    <div class="col-sm-4 col-md-2">
                                        <a href="/product_details/{{ $cart->product_id }}">
                                            <img src="{{ asset('storage/' . $cart->image) }}" width="100%"
                                                style=" border-radius: 10px">
                                        </a>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <a href="/product_details/{{ $cart->product_id }}">
                                            <h1 style="font-size: 18px; font-weight: bold">{{ $cart->product_title }}</h1>
                                        </a>
                                        <p>Rp{{ number_format($cart->price, 3, '.', '.') }}</p>
                                        <p>Quantity {{ $cart->quantity }}</p>
                                        {{-- <a onclick="return confirm('are you sure')"
                                            href="{{ url('remove_cart', $cart->id) }}">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a> --}}
                                        {{-- <input type="number" name="quantity" id="" value="1" min="1" style="height: 30%; width: 15%; color: grey"> --}}
                                    </div>
                                    {{-- <div class="col-md-1">
                                        <a onclick="return confirm('are you sure')"
                                            href="{{ url('remove_cart', $cart->id) }}"><i class="bi bi-trash3-fill"></i></a>
                                    </div> --}}
                                </div>
                                {{-- <div class="row justify-content-end">
                                    <div class="col-md-12">
                                        <a onclick="return confirm('are you sure')"
                                            href="{{ url('remove_cart', $cart->id) }}" style="text-align: end"><i class="bi bi-trash3-fill" style="text-align: end"></i></a>
                                    </div>
                                </div> --}}
                            </div>
                            <hr style="color: grey; border: 2px solid rgba(180, 180, 180, 0.219); border-radius: 20px"
                                width="95%">
                            <?php $totalprice = $totalprice + $cart->price; ?>
                            <?php $totalquantity = $totalquantity + $cart->quantity; ?>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="col-lg-12 m-3">
                        {{-- <h1 style="font-size: 24px; font-weight: bold" class="mb-2">Total</h1> --}}
                        <h1 style="font-size: 18px; font-weight: bold" class="my-3">Ringkasan Belanja</h1>
                        <div class="mr-5"
                            style="display: flex; justify-content: space-between; font-size: 16px; width: 90%">
                            <span>Total Harga ({{ $totalquantity }} Barang)</span>
                            <span>Rp{{ number_format($totalprice, 3, '.', '.') }}</span>
                        </div>

                        <hr style="color: grey; border: 1px solid rgba(180, 180, 180, 0.219); border-radius: 20px"
                            width="90%" class="mt-2">

                        <div class="my-3 mr-5"
                            style="display: flex; justify-content: space-between; font-size: 16px; font-weight: bold; width: 90%">
                            <span>Total Harga :</span>
                            <span>Rp{{ number_format($totalprice, 3, '.', '.') }}</span>
                        </div>


                        <a href="{{ url('order') }}" class="btn btn-success btn-sm"
                            style="width: 90%; font-weight: bold; font-size: 100%">Beli {{ $totalquantity }}</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-center m-5">
            <div class="col-md-4 text-center">
                <img src="/images/keranjang-kosong.svg">
                <h1 style="font-size: 20px; font-weight: bold; color: grey" class="m-2">Keranjang belanjamu masih kosong
                </h1>
                <a href="/" class="btn btn-success text-center" style="border-radius: 10px">Ayoo mulai belanja</a>
            </div>
        </div>
    @endif


@endsection
