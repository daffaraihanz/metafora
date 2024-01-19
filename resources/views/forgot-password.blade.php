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
    <div class="content pt-5">
        <div class="container">
            <div class="row text-start">
                <div class="col-1">
                    <img class="img-fluid" src="{{ asset('medias/images/forgot-password.png') }}" alt="logo">
                </div>
            </div>
            <div class="row text-start justify-content-start">
                <div class="col-6">
                    <h2>Lupa Password</h2>
                    <p>Kode verifikasi akan dikirimkan ke nomer whatsapp di bawah ini, pastikan nomer whatsapp dan email
                        anda
                        sesuai </p>
                </div>
            </div>
            {{-- <div class="row text-center mt-4">
                <div class="col">
                    <img class="img-fluid" src="{{ asset('medias/icons/minat-dan-bakat.svg') }}" alt="logo">
                </div>
            </div> --}}
            <form action="/forgot-password" method="POST">
                @csrf
                <div class="row text-start justify-content-start mt-3">
                    <div class="col-4 text-start">
                        <div class="mb-4">
                            <b>
                                <p>Email Pendaftaran</p>
                            </b>
                            <input type="email" class="form-control mt-2" id="email" name="email"
                                placeholder="cth: drzaki2002@gmail.com">
                        </div>
                    </div>
                    <div class="col-4 text-start">
                        <div>
                            <b>
                                <p>No Whatsapp Anda</p>
                            </b>
                            <div class="d-flex align-items-center input-whatsapp mt-2">
                                <p>+62</p>
                                <input type="number" class="form-control" id="whatsapp" name="whatsapp"
                                    placeholder="cth: 85876247850">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger" style="border-radius: 15px; width:100%;" role="alert">
                                @foreach ($errors->all() as $error)
                                    <p class="text-danger">- {{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                @if (session()->get('dataNoEmail') == 1)
                    <div class="alert alert-danger" style="border-radius: 15px; width:100%;" role="alert">
                        <p class="text-danger">Email belum terdaftar</p>
                    </div>
                @endif
                <div class="row text-start">
                    <div class="col">
                        <button type="submit" class="btn-primary mt-5">Kirim Sekarang</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
