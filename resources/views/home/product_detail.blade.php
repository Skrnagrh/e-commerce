@extends('home.layout.main')


@section('content')


    <div class="row">
        <div class="col-md-4">
            <div class="row justify-content-center">
                @if (session()->has('success'))
                    <div class="alert alert-success text-light" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- product --}}
    <div class="card">
        <div class="row justify-content-center m-3">
            <div class="col-md-3" style="cursor: pointer">
                <div class="card" style="border-radius: 10px; border: none">
                    <a data-bs-toggle="modal" data-bs-target="#image">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid"
                            style="border-radius: 10px; width: 100%">
                    </a>
                </div>

                <div class="modal fade" id="image" tabindex="-1" aria-labelledby="Modalimage" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title fs-5" id="staticBackdropLabel">{{ $product->title }}</h4>
                                <button type="button" class="btn-close justify-content-between" data-bs-dismiss="modal"
                                    aria-label="Close"><i class="bi bi-x-lg"></i></button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card" style="border-radius: 10px;">
                    <h1 style="font-size: 24px; font-weight: bold" class="my-3 ml-3">{{ $product->title }}</h1>
                    @if ($total = ($product->discount_price / 100) * $product->price)
                        @if ($setelah_disc = $product->price - $total)
                            <h6 class="mb-2 ml-3" style="font-size: 28px">
                                Rp {{ number_format($setelah_disc, 3, '.', '.') }}
                            </h6>
                            <p>
                                <span class="badge text-danger ml-3"
                                    style="background-color: rgb(252, 212, 212); font-size: 14px; font-weight: 900">{{ $product->discount_price }}
                                    %</span>
                                <span style="text-decoration: line-through; color: black">
                                    Rp {{ $product->price }}
                                </span>
                            </p>
                        @endif
                    @else
                        <h6 class="mb-2 ml-3">
                            Rp {{ $product->price }}
                        </h6>
                    @endif
                    <hr class="mt-2 mx-3" style="border: 2px solid rgba(128, 128, 128, 0.199); border-radius: 20px">

                    <header>
                        <div class="nav nav-underline" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link text-success active my-1" id="tab-details" data-toggle="tab"
                                href="#details" role="tab" aria-controls="nav-home" aria-selected="true"
                                style="font-size: 18px; font-weight: bold">Detail Product</a>
                            <a class="nav-item nav-link text-success my-1" id="tab-info" data-toggle="tab" href="#info"
                                role="tab" aria-controls="nav-profile" aria-selected="false"
                                style="font-size: 18px; font-weight: bold">Info Toko/Penjual</a>
                        </div>
                    </header>

                    <div class="" data-simplebar style="height: 100%;">
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="details" role="tabpanel"
                                aria-labelledby="tab-details">

                                <div class="media media-sm p-4 mb-0">
                                    <div class="media-body">
                                        <a href="">
                                            <p class="title mb-0">{!! $product->description !!}</p>
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="tab-info">

                                <div class="media media-sm p-4 mb-0">
                                    <div class="media-body">
                                        {{-- <a href=""> --}}
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem voluptatibus
                                            dignissimos exercitationem consequatur voluptates recusandae, delectus optio
                                            similique expedita aspernatur provident quasi nulla neque fugit?<span
                                                id="dots">...</span><span id="more">
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem
                                                voluptatibus
                                                dignissimos exercitationem consequatur voluptates recusandae, delectus optio
                                                similique expedita aspernatur provident quasi nulla neque fugit?
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem
                                                voluptatibus
                                                dignissimos exercitationem consequatur voluptates recusandae, delectus optio
                                                similique expedita aspernatur provident quasi nulla neque fugit?
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem
                                                voluptatibus
                                                dignissimos exercitationem consequatur voluptates recusandae, delectus optio
                                                similique expedita aspernatur provident quasi nulla neque fugit?
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quidem
                                                voluptatibus
                                                dignissimos exercitationem consequatur voluptates recusandae, delectus optio
                                                similique expedita aspernatur provident quasi nulla neque fugit?</span></p>
                                        {{-- </a> --}}<button onclick="myFunction()" id="myBtn"
                                            class="text-success">Lihat Selengkapnya</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3" style="border-radius: 10px">
                    <h1 style="font-size: 18px; font-weight: bold">Atur jumlah pembelian</h1>
                    
                    <form action="{{ url('add_cart', $product->id) }}" method="post">
                        @csrf

                        <div class="mt-5">
                            <div class="input-group">
                                <div class="border border-success" style="border-radius: 10px">
                                    <span class="input-group-btn">
                                        <button class="badge btn-number text-danger" data-type="minus"
                                            data-field="quantity" onclick="bagi(); bagi1()">
                                            <i class="mdi mdi-minus-circle" style="font-size: 28px"></i>
                                        </button>
                                    </span>
                                    <input type="text" name="quantity" class="input-number" value="1"
                                        min="1" max="{{ $product->quantity }}"
                                        style="width: 50px; height: 20%; border: none; font-size: 20px; text-align: center"
                                        id="angka2" readonly>
                                    <span class="input-group-btn">
                                        <button class="badge btn-number text-success" data-type="plus"
                                            data-field="quantity" onclick="kali(); kali1()">
                                            <i class="mdi mdi-plus-circle" style="font-size: 28px"></i>
                                        </button>
                                    </span>
                                </div>
                                <span class="input-group-btn m-1" style="font-size: 16px; font-weight: bold">Stock:
                                    {{ $product->quantity }}</span>
                            </div>
                        </div>
                        <p style="font-size: 12px; color: grey" class="m-1">Max. pembelian {{ $product->quantity }}
                            pcs</p>

                        <h2 class="card-text mt-4">
                            @if ($total = (1 - $product->discount_price / 100) * $product->price)
                                {{-- @if ($setelah_disc = $product->price - $total) --}}


                                {{-- <input type="text" value="{{ number_format($total,3,'.','.') }}" id="angka1" hidden> --}}
                                <input type="text" value="{{ $total }}" id="angka1" hidden>

                                {{-- <input type="text" value="{{ $product->price }}" id="sebelum" hidden> --}}
                                <input type="text" value="{{ number_format($product->price, 3, '.', '.') }}"
                                    id="sebelum" hidden>

                                <p style="text-decoration: line-through; color: black; text-align: end;" id="setdisc">
                                    Rp{{ number_format($product->price, 3, '.', '.') }}
                                </p>
                                <div
                                    style="display: flex; justify-content: space-between; font-size: 20px; font-weight: bold">
                                    <span>Subtotal</span>
                                    <span id="hasil">Rp{{ number_format($total, 3, '.', '.') }}</span>
                                </div>
                                {{-- @endif --}}
                            @else
                                <input type="text" value="{{ number_format($product->price, 3, '.', '.') }}"
                                    id="angka1" hidden>
                                <p id="hasil">subtotal Rp{{ number_format($product->price, 3, '.', '.') }}</p>
                            @endif
                        </h2>


                        {{-- <input type="number" name="quantity" id="" value="1" min="1" style="width: 100px"> --}}
                        <input type="submit" value="Keranjang" class="btn btn-outline-success btn-sm mt-2"
                            style="width: 100%">
                    </form>
                    <form action="{{ url('add_cart', $product->id) }}" method="post">
                        @csrf
                        <input type="number" name="quantity" id="" value="1" min="1"
                            style="width: 100px" hidden="">
                        <input type="submit" value="Beli Langsung" class="btn bg-success text-light btn-sm mt-2"
                            style="width: 100%;">
                    </form>
                </div>
            </div>
        </div>

        {{-- <div class="row mt-3">
        <div class="col-md-3">
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top">
                <div class="m-2">
                    <h5 class="card-title font-weight mb-1">{{ $product->title }}</h5>
                    <p class="card-text">
                        @if ($total = ($product->discount_price / 100) * $product->price)
                            @if ($setelah_disc = $product->price - $total)
                                <h6 class="mb-2">
                                    Rp {{ $setelah_disc }}
                                </h6>
                                <span class="badge bg-danger text-light mr-1 mb-2">{{ $product->discount_price }}
                                    %</span>
                                <span style="text-decoration: line-through; color: black">
                                    Rp {{ $product->price }}
                                </span>
                            @endif
                        @else
                            <h6 class="mb-2">
                                Rp {{ $product->price }}
                            </h6>
                        @endif
                    </p>
                    <form action="{{ url('add_cart', $product->id) }}" method="post">
                        @csrf
                        <input type="number" name="quantity" id="" value="1" min="1"
                            style="width: 100px" hidden="">
                        <input type="submit" value="add to Cart" value="1" class="btn btn-success">
                    </form>

                </div>
            </div>

        </div>
        </div> --}}

        {{-- Coment --}}

        {{-- <div style="text-align: center">
        <h1 style="font-size: 30px; text-align: center; padding-top: 20px; padding-bottom: 20px;">
            Comments
        </h1>
        <form action="{{ url('add_comment') }}" method="post" class="mb-3" enctype="multipart/form-data">
            @csrf
            <input type="text" name="productid" value="{{ $product->id }}" hidden>
            <textarea name="comment" id="" placeholder="Comment something here" style="width: 250px; height: 50px"></textarea>

            <div class="input-group control-group increment">
                <input type="file" name="filename[]" class="form-control">
                <div class="input-group-btn">
                    <button class="btn bg-success text-light" type="button"><i
                            class="glyphicon glyphicon-plus"></i>Add</button>
                </div>
            </div>
            <div class="clone hide">
                <div class="control-group input-group" style="margin-top:10px">
                    <input type="file" name="filename[]" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn bg-danger text-light" type="button"><i
                                class="glyphicon glyphicon-remove"></i>
                            Remove</button>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn bg-success text-light btn-sm mt-2" value="Comment">
        </form>
         </div> --}}

        {{-- Ulasan Pembeli --}}
        <div class="row m-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="m-5">
                        <h1 style="font-size: 20px; font-weight: bold; text-transform: uppercase">Ulasan Pembeli
                            ({{ $comment->count() }})</h1>
                        <hr>
                        @foreach ($comment as $comment)
                            @if ($comment->product_id == $product->id)
                                <div class="mt-3 mb-2 text-dark">
                                    <p style="font-size: 18px; font-weight: bold;">{{ $comment->name }}</p>
                                    <p>{{ $comment->comment }}</p>
                                    {{-- <img src="{{ asset('storage/' . $comment->filename) }}" class="img-fluid" width="100px"> --}}
                                    <img src="{{ asset('comment-images/' . $comment->filename) }}" class="img-fluid"
                                        width="100px">

                                    <a href="javascript::void(0);" onclick="reply(this)"
                                        data-Commentid="{{ $comment->id }}"
                                        style="color: black; font-size: 12px">Balas</a>

                                    <a onclick="return confirm('are you sure')"
                                        href="{{ url('delete_comment', $comment->id) }}"
                                        style="color: black; font-size: 12px">Hapus</a>


                                    @foreach ($reply as $rep)
                                        @if ($rep->comment_id == $comment->id)
                                            <div style="padding-left: 5%; padding-bottom: 10px; padding-top: 10px">
                                                <b>{{ $rep->name }}</b> {{ $rep->reply }}
                                                <br>
                                                <a href="javascript::void(0);" onclick="reply(this)"
                                                    data-Commentid="{{ $comment->id }}"
                                                    style="color: black; font-size: 12px">Balas</a>
                                                <a onclick="return confirm('are you sure')"
                                                    href="{{ url('delete_reply', $rep->id) }}"
                                                    style="color: black; font-size: 12px">Hapus</a>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                                <hr>
                            @endif
                        @endforeach

                        <div style="display: none;" class="replyDiv">
                            <form action="{{ url('add_reply') }}" method="post">
                                @csrf
                                <input type="text" id="commentId" name="commentId" hidden="">

                                <textarea placeholder="write something here" style="height: 100px; width: 250px" name="reply"></textarea><br>

                                <button type="submit" class="btn bg-success btn-sm text-light mt-2">reply</button>

                                <a href="javascript::void(0);" onclick="reply_close(this)"
                                    class="btn btn-danger btn-sm mt-2">Close</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Pertanyaan --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h1 style="font-size: 20px; font-weight: bold; text-transform: uppercase">Diskusi ()</h1>
                    </div>
                    @foreach ($question as $question)
                        @if ($question->product_id == $product->id)
                            <div class="card-body text-dark">
                                <div class="card p-3">
                                    <img src="/home/images/user/u8.jpg" class="img-fluid rounded-circle"
                                        style="width: 7%">
                                    <p class="card-title" style="font-size: 18px; font-weight: bold">
                                        {{ $question->name }}
                                    </p>
                                    <p class="card-text">{{ $question->question }}</p>
                                    <a onclick="return confirm('are you sure')"
                                        href="{{ url('delete_question', $question->id) }}"
                                        style="color: black; font-size: 12px">Hapus</a>
                                    <a href="javascript::void(0);" onclick="questreply(this)"
                                        data-Questionid="{{ $question->id }}"
                                        style="color: black; font-size: 12px">Balas</a>

                                    @foreach ($questreply as $questrep)
                                        @if ($questrep->question_id == $question->id)
                                            <div style="background-color: rgba(128, 128, 128, 0.075); border-radius: 10px">
                                                <div style="padding-left: 5%; padding-bottom: 10px; padding-top: 10px;">
                                                    <img src="/home/images/user/u8.jpg" class="img-fluid rounded-circle"
                                                        style="width: 7%">
                                                    <p style="font-size: 18px; font-weight: bold">{{ $questrep->name }}
                                                    </p>
                                                    <p>{{ $questrep->questreply }}</p>
                                                    {{-- <a onclick="return confirm('are you sure')"
                                                href="{{ url('delete_questreply', $questrep->id) }}"
                                                style="color: black; font-size: 12px">Hapus</a>
                                            <a href="javascript::void(0);" onclick="reply(this)"
                                                data-Commentid="{{ $comment->id }}"
                                                style="color: black; font-size: 12px">Balas</a> --}}
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach


                                </div>
                            </div>
                        @endif
                    @endforeach

                    <div style="display: none;" class="questreplyDiv mt-3">
                        <form action="{{ url('questreply') }}" method="post">
                            @csrf

                            <div class="border border-success" style="width: 100%; height: 50%; border-radius: 10px">
                                <div class="input-group">
                                    <input type="text" id="questId" name="questId" hidden="">

                                    <textarea placeholder="Isi komantar disini..." style="width: 100%; height: 50px; border: none; border-radius: 10px"
                                        name="questreply"></textarea><br>
                                </div>
                            </div>

                            <button type="submit" class="btn bg-success btn-sm text-light mt-2">reply</button>

                            <a href="javascript::void(0);" onclick="questreply_close(this)"
                                class="btn btn-danger btn-sm mt-2">Close</a>
                        </form>
                    </div>


                    <div class="card-footer">
                        {{-- <diV class="row justify-content-center">
                        <div class="col-lg-12"> --}}
                        <form action="{{ url('question') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="border border-success" style="width: 100%; height: 50%; border-radius: 10px"> --}}
                            <div class="input-group">
                                <input type="text" name="productid" value="{{ $product->id }}" hidden>
                                <textarea name="question" id="" class="border border-success"
                                    placeholder="Apa yang anda ingin tanyakan mengenai produk ini?"
                                    style="width: 100%; height: 50px; border: none; border-radius: 10px" onclick="quest(this)"></textarea>
                                {{-- <button type="submit" class="btn bg-success text-light" style="border-radius:  0 10px 10px 0; border: none; ">Kirim</button> --}}
                            </div>
                            {{-- </div> --}}
                            <div style="display: none;" class="questDiv m-1">
                                <button type="submit" class="btn bg-success btn-sm text-light mt-2 "
                                    style="border-radius: 5px">Kirim</button>
                                <a href="javascript::void(0);" onclick="quest_close(this)"
                                    class="btn btn-danger btn-sm mt-2">Close</a>
                            </div>
                        </form>
                        {{-- </div>
                    </diV> --}}
                    </div>
                </div>



                {{-- 
            <div class="card">
                <div class="m-5"> --}}

                {{-- @foreach ($question as $question)
                        @if ($question->product_id == $product->id)
                            <div class="mt-3 mb-2 text-dark">
                                <p style="font-size: 18px; font-weight: bold;">{{ $question->name }}</p>
                                <p>{{ $question->question }}</p>

                                <a href="javascript::void(0);" onclick="questreply(this)"
                                    data-Questionid="{{ $question->id }}" style="color: black; font-size: 12px">Balas</a>

                                <a onclick="return confirm('are you sure')"
                                    href="{{ url('delete_question', $question->id) }}"
                                    style="color: black; font-size: 12px">Hapus</a>


                                @foreach ($questreply as $questrep)
                                    @if ($questrep->question_id == $question->id)
                                        <div style="padding-left: 5%; padding-bottom: 10px; padding-top: 10px">
                                            <b>{{ $questrep->name }}</b> {{ $questrep->questreply }}
                                            <br>
                                            <a href="javascript::void(0);" onclick="reply(this)"
                                            data-Commentid="{{ $comment->id }}"
                                            style="color: black; font-size: 12px">Balas</a>
                                            <a onclick="return confirm('are you sure')"
                                                href="{{ url('delete_questreply', $questrep->id) }}"
                                                style="color: black; font-size: 12px">Hapus</a>
                                        </div>
                                    @endif
                                @endforeach

                                <div style="display: none;" class="questreplyDiv">
                                    <form action="{{ url('questreply') }}" method="post">
                                        @csrf
                                        <input type="text" id="questId" name="questId" hidden="">

                                        <textarea placeholder="write something here" style="height: 90%; width: 250px" name="questreply"></textarea><br>

                                        <button type="submit"
                                            class="btn bg-success btn-sm text-light mt-2">reply</button>

                                        <a href="javascript::void(0);" onclick="questreply_close(this)"
                                            class="btn btn-danger btn-sm mt-2">Close</a>
                                    </form>
                                </div>
                            </div>
                            <hr>
                        @endif
                    @endforeach --}}


                {{-- 
                </div>
               
            </div> --}}
            </div>
        </div>

    </div>


    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Lihat Lebih Sedikit";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Lihat Lebih Sedikit";
                moreText.style.display = "inline";
            }
        }
    </script>


    {{-- Buat perhitungan --}}
    <script>
        function kali() {
            var a1 = document.getElementById('angka1').value;
            var a2 = document.getElementById('angka2').value;
            // var total = parseInt(a1) + (parseInt(a1) * parseInt(a2));
            var total = parseFloat(a1) + (parseFloat(a1) * parseFloat(a2));
            document.getElementById('hasil').innerHTML = "Rp" + total.toFixed(3);
        }

        function bagi() {
            var a1 = document.getElementById('angka1').value;
            var a2 = document.getElementById('angka2').value;
            var total = (parseFloat(a1) * parseFloat(a2)) - parseFloat(a1);
            document.getElementById('hasil').innerHTML = "Rp" + total.toFixed(3);
        }

        function kali1() {
            var satu = document.getElementById('sebelum').value;
            var dua = document.getElementById('angka2').value;
            var total = parseFloat(satu) + (parseFloat(satu) * parseFloat(dua));
            document.getElementById('setdisc').innerHTML = "Rp" + total.toFixed(3);
        }

        function bagi1() {
            var satu = document.getElementById('sebelum').value;
            var dua = document.getElementById('angka2').value;
            var total = (parseFloat(satu) * parseFloat(dua)) - parseFloat(satu);
            document.getElementById('setdisc').innerHTML = "Rp" + total.toFixed(3);
        }
    </script>


    <script type="text/javascript">
        $(document).ready(function() {

            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });

        });
    </script>


    {{-- <script type="text/javascript">
        function reply(caller) {

            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
            document.getElementById('commentId').value = $(caller).attr('data-Commentid');
        }

        function reply_close(caller) {
            $('.replyDiv').hide();
        }
    </script>

    <script type="text/javascript">
        function questreply(caller) {

            $('.questreplyDiv').insertAfter($(caller));
            $('.questreplyDiv').show();
            document.getElementById('questId').value = $(caller).attr('data-Questionid');
        }

        function questreply_close(caller) {
            $('.questreplyDiv').hide();
        }
    </script> --}}
    <script type="text/javascript">
        function quest(caller) {

            $('.questDiv').insertAfter($(caller));
            $('.questDiv').show();
            document.getElementById('questId').value = $(caller).attr('data-Questionid');
        }

        function quest_close(caller) {
            $('.questDiv').hide();
        }
    </script>


    {{-- <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script> --}}

@endsection
