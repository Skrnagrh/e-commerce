{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
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
                        <div class="text-center">
                            <h1 style="font-size: 20px; font-weight: bold; color: #6FCEAE" class="mb-3">Sayur Shop | Daftar</h1>
                        </div>

                        <x-jet-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="name"
                                    :value="old('name')" required autofocus autocomplete="name" placeholder="Nama lengkap" style="border: 1px solid #6FCEAE">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email"
                                    :value="old('email')" required autofocus placeholder="Alamat email" style="border: 1px solid #6FCEAE">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="password" required
                                    placeholder="Kata sandi" style="border: 1px solid #6FCEAE">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="password_confirmation"
                                    required autocomplete="new-password" placeholder="Konfirmasi kata sandi" style="border: 1px solid #6FCEAE">
                            </div>


                            <button class="btn btn-success btn-user btn-block">
                                {{ __('Daftar') }}
                            </button>

                        </form>
                        <hr style="border: 2px solid #6FCEAE; border-radius: 20px">
                        <div class="text-center">
                            <a class="small text-decoration-none text-success"
                                href="{{ route('login') }}">{{ __('Sudah punya akun') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
