@extends('global.main-head')
<section class="forgot-password">
    <header class="headerz">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <a href="/landing-page-after">
                        <img src="{{ asset('medias/images/metafora.svg') }}" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <form action="/reset-password/{{ $dataUser->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="content pt-5">
            <div class="container">
                <div class="row text-start">
                    <div class="col-1">
                        <img class="img-fluid" src="{{ asset('medias/images/forgot-password.png') }}" alt="logo">
                    </div>
                </div>
                <div class="row text-start justify-content-start">
                    <div class="col-6">
                        <h2>Masukan Password Baru</h2>
                    </div>
                </div>
                <div class="row text-start justify-content-start mt-3">
                    <div class="col-6 text-start">
                        <div class="mb-3">
                            <b>
                                <p>Masukan Password Baru</p>
                            </b>
                            <input type="password" class="form-control mt-2 mb-3" id="email" name="password1"
                                placeholder="Ketik disini">
                        </div>
                    </div>
                </div>
                <div class="row text-start justify-content-start mt-3">
                    <div class="col-6 text-start">
                        <div class="mb-3">
                            <b>
                                <p>Masukan Ulang Password Baru</p>
                            </b>
                            <input type="password" class="form-control mt-2 mb-3" id="email" name="password2"
                                placeholder="Ketik disini">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @if (session()->get('dataWrongPassword') == 1)
                            <div class="alert alert-danger" style="border-radius: 15px; width:100%;" role="alert">
                                <p class="text-danger">Password tidak sama</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row text-start">
                    <div class="col">
                        <button type="submit" class="btn-primary mt-5 m">Simpan Password</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

<div class="forbidden">
    <div class="container">
        <div class="row text-center justify-content-center">
            <div class="col-10">
                <img class="img-fluid" src="{{ asset('medias/images/development.png') }}" alt="logo">
                <h1>Tampilan sedang pada tahap pengembangan</h1>
                <p class="mt-2">Mohon maaf, saat ini hanya tersedia untuk tampilan desktop</p>
            </div>
        </div>
    </div>
</div>
