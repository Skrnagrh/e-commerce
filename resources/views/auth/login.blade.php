{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

@extends('auth.main')

@section('content')
    
<div class="card o-hidden shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="p-4">
                    <div class="text-center">
                        <img src="/images/shop.png" width="30%">
                    </div>
                    <div class="text-center">
                        <h1 style="font-size: 20px; font-weight: bold; color: #6FCEAE" class="mb-5">Sayur Shop | Masuk</h1>
                        <x-jet-validation-errors class="mb-4" />
                        @if (session('status'))
                        <div class="font-medium text-sm text-green">
                            {{ session('status') }}
                        </div>
                    @endif
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control form-control-user" name="email"
                                :value="old('email')" required autofocus
                                placeholder="Alamat email" style="border: 1px solid #6FCEAE">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-user"
                                name="password" placeholder="Kata sandi" style="border: 1px solid #6FCEAE">
                        </div>
                        {{-- <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember
                                    Me</label>
                            </div>
                        </div> --}}
                        <button class="btn btn-success btn-user btn-block">
                            {{ __('Masuk') }}
                        </button>
                    </form>
                    <hr style="border: 2px solid #6FCEAE; border-radius: 20px"">
                    <div class="text-center">

                        @if (Route::has('password.request'))
                            <a class="small text-decoration-none text-dark"
                                href="{{ route('password.request') }}">
                                {{ __('Lupa password?') }}
                            </a>
                        @endif
                    </div>
                    <div class="text-center">
                        <a class="small text-decoration-none text-success"
                            href="{{ route('register') }}">{{ __('Buat akun baru') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
