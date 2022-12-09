{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>
                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout> --}}

{{-- @extends('layouts.main') --}}
@extends('home.layout.main')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

<style>
    /* @media screen and (max-width:900px) {
        .gambar {
            display: none;
        }
    } */
    /* @media screen and (max-width:900px) {
        .row {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    } */
    .row {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

@section('content')
    <div class="row justify-content-center my-5">
        {{-- <div class="col-md-3 col-sm-3">
            <div class="card shadow" style="border-radius: 10px;">
                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" class="img-fluid gambar"
                    style="border-radius: 10px; width: 100%">
                    <a data-bs-toggle="modal" href="#ModalProfile" role="button" class="btn btn-outline-dark mx-3 my-2" style="border-radius: 10px; font-weight: bold">Ubah Profile</a>
                    <a type="button" class="btn btn-outline-success mx-3 mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border-radius: 10px; font-weight: bold">Ubah Kata Sandi</a>
            </div>
        </div> --}}
        <div class="col-md-8 col-sm-10">
            <div class="border shadow" style="border-radius: 10px">
                <header>
                    <div class="nav nav-underline" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="all-tabs" data-toggle="tab" href="#all" role="tab"
                            aria-controls="nav-home" aria-selected="true" style="font-size: 20px; font-weight: bold">Biodata
                            Diri</a>
                        {{-- <a class="nav-item nav-link" id="message-tab" data-toggle="tab" href="#message" role="tab"
                            aria-controls="nav-profile" aria-selected="false">Daftar Alamat</a> --}}
                    </div>
                </header>

                <div class="">
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tabs">
                            {{-- <div class=""> --}}
                            <div class="row p-3">
                                <div class="col-md-3 col-sm-3">
                                    <div class="card shadow" style="border-radius: 10px;">
                                        <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                                            class="img-fluid gambar p-1" style="border-radius: 10px; width: 100%">
                                        <a data-bs-toggle="modal" href="#ModalProfile" role="button"
                                            class="btn btn-outline-dark mx-1 my-1"
                                            style="border-radius: 5px; font-weight: bold">Ubah Profile</a>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-8">
                                    <table class="table table-borderless text-dark mt-5">
                                        <tbody>
                                            {{-- <tr>
                                                <td style="font-size: 20px; font-weight: bold">Biodata Diri</td>
                                                <td><a data-bs-toggle="modal" href="#ModalProfile" role="button"
                                                        class="text-success">Ubah Profile</a></td>
                                            </tr> --}}
                                            <tr>
                                                <td>Nama</td>
                                                <td> {{ Auth()->user()->name }}</td>
                                                {{-- <a data-bs-toggle="modal" href="#ModalNama" role="button" class="text-success">Ubah</a> --}}
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td> {{ Auth()->user()->email }}</td>
                                                {{-- <a data-bs-toggle="modal" href="#ModalEmail" role="button" class="text-success">Ubah</a> --}}
                                            </tr>
                                            <tr>
                                                <td>Nomor Hp</td>
                                                <td> {{ Auth()->user()->phone }} </td>
                                                {{-- <a data-bs-toggle="modal" href="#ModalNohp" role="button" class="text-success">Ubah</a> --}}
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td> {{ Auth()->user()->address }}</td>
                                                {{-- <a data-bs-toggle="modal" href="#ModalNohp" role="button" class="text-success">Ubah</a> --}}
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="mr-5 mt-4" style="display: flex; justify-content: end">
                                        <a type="button" class="btn btn-outline-success mx-1 mb-3" data-bs-toggle="modal"
                                            data-bs-target="#katasandi" style="border-radius: 10px">Ubah Kata Sandi</a>
                                        <a type="button" class="btn btn-outline-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        data-bs-whatever="@mdo" style="border-radius: 10px">Ubah
                                            Biodata</a>
                                        <a type="button" class="btn btn-outline-danger mb-3" style="border-radius: 10px">
                                            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                                                @livewire('profile.delete-user-form')
                                        @endif    
                                        </a>
                            
                                    </div>
                                </div>
                            </div>


                            {{-- </div> --}}

                            {{-- <div class="media media-sm bg-warning-10 p-4 mb-0">
                            <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                    <img src="/home/images/user/user-sm-02.jpg" alt="User Image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="user-profile.html">
                                    <span class="title mb-0">John Doe</span>
                                    <span class="discribe">Extremity sweetness difficult behaviour he
                                        of. On disposal of as landlord horrible. Afraid at highly months
                                        do things on at.</span>
                                    <span class="time">
                                        <time>Just now</time>...
                                    </span>
                                </a>
                            </div>
                            </div> --}}
                        </div>

                        {{-- <div class="tab-pane fade" id="message" role="tabpanel"
                        aria-labelledby="message-tab">

                        <div class="media media-sm p-4 mb-0">
                            <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                    <img src="images/user/user-sm-01.jpg" alt="User Image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="user-profile.html">
                                    <span class="title mb-0">Selena Wagner</span>
                                    <span class="discribe">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit.</span>
                                    <span class="time">
                                        <time>15 min ago</time>...
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="media media-sm p-4 mb-0">
                            <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                    <img src="/home/images/user/user-sm-03.jpg" alt="User Image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="user-profile.html">
                                    <span class="title mb-0">Sagge Hudson</span>
                                    <span class="discribe">On disposal of as landlord Afraid at highly
                                        months do things on at.</span>
                                    <span class="time">
                                        <time>1 hrs ago</time>...
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="media media-sm bg-warning-10 p-4 mb-0">
                            <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                    <img src="/home/images/user/user-sm-02.jpg" alt="User Image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="user-profile.html">
                                    <span class="title mb-0">John Doe</span>
                                    <span class="discribe">Extremity sweetness difficult behaviour he
                                        of. On disposal of as landlord horrible. Afraid
                                        at highly months do things on at.</span>
                                    <span class="time">
                                        <time>Just now</time>...
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="media media-sm p-4 mb-0">
                            <div class="media-sm-wrapper">
                                <a href="user-profile.html">
                                    <img src="/home/images/user/user-sm-04.jpg" alt="User Image">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="user-profile.html">
                                    <span class="title mb-0">Albrecht Straub</span>
                                    <span class="discribe"> Beatae quia natus assumenda laboriosam,
                                        nisi perferendis aliquid consectetur expedita non
                                        tenetur.</span>
                                    <span class="time">
                                        <time>Just now</time>...
                                    </span>
                                </a>
                            </div>
                        </div>

                            </div>
                            <div class="tab-pane fade" id="other" role="tabpanel"
                                aria-labelledby="contact-tab">

                                <div class="media media-sm p-4 bg-light mb-0">
                                    <div class="media-sm-wrapper bg-primary">
                                        <a href="user-profile.html">
                                            <i class="mdi mdi-calendar-check-outline"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="user-profile.html">
                                            <span class="title mb-0">New event added</span>
                                            <span class="discribe">1/3/2014 (1pm - 2pm)</span>
                                            <span class="time">
                                                <time>10 min ago...</time>...
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <div class="media media-sm p-4 mb-0">
                                    <div class="media-sm-wrapper bg-info-dark">
                                        <a href="user-profile.html">
                                            <i class="mdi mdi-account-multiple-check"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="user-profile.html">
                                            <span class="title mb-0">Add request</span>
                                            <span class="discribe">Add Dany Jones as your contact.</span>
                                            <div class="buttons">
                                                <a href="#"
                                                    class="btn btn-sm btn-success shadow-none text-white">accept</a>
                                                <a href="#" class="btn btn-sm shadow-none">delete</a>
                                            </div>
                                            <span class="time">
                                                <time>6 hrs ago</time>...
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <div class="media media-sm p-4 mb-0">
                                    <div class="media-sm-wrapper bg-info">
                                        <a href="user-profile.html">
                                            <i class="mdi mdi-playlist-check"></i>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <a href="user-profile.html">
                                            <span class="title mb-0">Task complete</span>
                                            <span class="discribe">Afraid at highly months do things on
                                                at.</span>
                                            <span class="time">
                                                <time>1 hrs ago</time>...
                                            </span>
                                        </a>
                                    </div>
                                </div>

                            </div> --}}
                    </div>
                </div>
            </div>


            {{-- Profile --}}
            <div class="modal fade" id="ModalProfile" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="ModalProfile" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalProfile">Ubah Photo Profil</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                                    @livewire('profile.update-profile-information-form')
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Kata Sandi --}}
            <div class="modal fade" id="katasandi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="katasandiLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="katasandiLabel">{{ __('Ubah Kata Sandi') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                                @livewire('profile.update-password-form')
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Biodata --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Biodata Diri</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/update_biodata">
                                {{-- @method('get')
                                @csrf --}}
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth()->user()->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ Auth()->user()->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Nomor Hp</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth()->user()->phone }}">
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Alamat</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ Auth()->user()->address }}">
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-danger text-light" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn bg-dark text-light">Simpan</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
