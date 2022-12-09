{{-- <x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Ubah Kata Sandi') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Pastikan akun Anda menggunakan kata sandi yang kuat agar tetap aman.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-12 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('Kata sandi lama') }}" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" placeholder="{{ __('Kata sandi lama') }}" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-12 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('Kata sandi baru') }}" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" placeholder="{{ __('Kata sandi baru') }}"/>
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-12 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="{{ __('Konfirmasi kata sandi baru') }}" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" placeholder="{{ __('Konfirmasi kata sandi baru') }}"/>
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>
    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>

</x-jet-form-section> --}}

<x-jet-form-section submit="updatePassword">
    <div class="row">
        <div class="col-md-6">
            
        </div>
    </div>

    <x-slot name="title">
        {{ __('Ubah Kata Sandi') }}
    </x-slot>
    
    <x-slot name="description">
        {{ __('Pastikan akun Anda menggunakan kata sandi yang kuat agar tetap aman.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-12 sm:col-span-4">
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" placeholder="{{ __('Kata sandi lama') }}" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-12 sm:col-span-4">
            <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" placeholder="{{ __('Kata sandi baru') }}"/>
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-12 sm:col-span-4">
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" placeholder="{{ __('Konfirmasi kata sandi baru') }}"/>
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>
    
    <x-slot name="actions">
        <button type="button" class="btn bg-danger text-light btn-sm" data-bs-dismiss="modal">Batal</button>
        <x-jet-button>
            {{ __('Simpan') }}
        </x-jet-button>
    </x-slot>

</x-jet-form-section>
