<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="justify-between">

    <div class="hidden sm:flex sm:items-center sm:ml-12">


        {{-- <div class="relative"> --}}
        <x-jet-dropdown align="right" width="48">
            <x-slot name="trigger">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    {{-- <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" /> --}}
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" class="h-8 w-8 rounded-full">
                @else
                    <span class="inline-flex" style="cursor: pointer;">
                        {{ Auth::user()->name }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                @endif
            </x-slot>

            <x-slot name="content">
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Account') }}
                </div>

                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                    {{ __('Profile') }}
                </x-jet-dropdown-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                        {{ __('API Tokens') }}
                    </x-jet-dropdown-link>
                @endif

                <div class="border-t border-gray-100"></div>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();"><i
                            class="mdi mdi-logout"></i>
                        {{ __('Log Out') }}
                    </x-jet-dropdown-link>
                </form>
            </x-slot>
        </x-jet-dropdown>
        {{-- </div> --}}
    </div>

    </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
    </div>
</nav>
