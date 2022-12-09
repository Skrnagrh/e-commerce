{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}


@extends('auth.main')

@section('content')
    
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-md-12">
                <div class="p-4">
                    <div class="text-center">
                        <img src="/images/shop.png" width="30%">
                    </div>

                    <div class="my-4 text-sm text-gray-600">
                        {{ __('lupa kata sandi Anda? Tidak masalah. Beri tahu kami alamat email Anda dan kami akan mengirimi Anda tautan setel ulang kata sandi melalui email yang memungkinkan Anda memilih yang baru.') }}
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email" :value="old('email')" required autofocus
                                placeholder=" Masukan alamat email" style="border: 1px solid #6FCEAE">
                        </div>
                        <button class="btn btn-success btn-user btn-block">
                            {{ __('Email kata sandi setel ulang') }}
                        </button>
                    </form>
                    <div class="text-center mt-3">
                        <a class="small text-decoration-none  btn btn-danger btn-user btn-block"
                            href="{{ route('login') }}">{{ __('Batal') }}</a>
                    </div>
                    <hr style="border: 2px solid #6FCEAE; border-radius: 20px">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
