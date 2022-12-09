@extends('home.layout.main')

@section('content')

<div class="row justify-center">
    <div class="col-md-4">
        <h1 style="font-size: 28px; font-weight: bold">Nama toko yang unik, selalu terlihat menarik</h1>
        <h6>Gunakan nama yang singkat dan sederhana agar tokomu mudah dingat pembeli.</h6>
        <img src="/images/shop.png" alt="">
    </div>
    <div class="col-md-4">
        <h1>Halo, <strong>{{ Auth()->user()->name }}</strong> ayo isi detail tokomu!</h1>
        <form action="{{ url('add_toko') }}" method="post">
            @csrf
            <div class="mb-3">
              <label for="text" class="form-label">Nomor Hp</label>
              <input type="text" class="form-control" id="nohp" value="{{ Auth()->user()->phone }}" readonly>
            </div>
            <div class="mb-3">
              <label for="name" class="form-label">Nama Toko</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
              <label for="address" class="form-label">address Toko</label>
              <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="mb-3">
              <label for="infotoko" class="form-label">Info Toko</label>
              <input type="text" class="form-control" id="infotoko" name="infotoko">
            </div>
            <div class="mb-3">
              <label for="infotoko" class="form-label">User type</label>
              <input type="number" class="form-control" id="usertoko" name="usertoko" value="1" max="1" min="1" readonly>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>

@endsection