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
                    <h2>Masukan Kode Verifikasi</h2>
                    <p>Permintaan ganti password telah terkirim, mohon tunggu dan cek whatsapp anda secara berkala untuk
                        mendapatkan kode verifikasi</p>
                </div>
            </div>
            <form action="/send-otp" method="post">
                @csrf
                @method('PUT')
                <div class="row text-start justify-content-start mt-3">
                    <div class="col-6 text-start">
                        <div class="mb-3">
                            <b>
                                <p>Masukan Kode Verifikasi</p>
                            </b>
                            <input type="text" class="form-control mt-2 mb-3" id="email" name="otp"
                                placeholder="cth: H45J65">
                            <p>Tidak mendapatkan kode verifikasi ? <a href="/forgot-password">Hubungi Admin</a></p>
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
                        @if (session()->get('dataOtpFailed') == 1)
                            <div class="alert alert-danger" style="border-radius: 15px; width:100%;" role="alert">
                                <p class="text-danger">Kode verifikasi salah</p>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- {{ $dataWrong }} --}}
                <div class="row text-start">
                    <div class="col">
                        <button type="submit" class="btn-primary mt-5 m">Lanjutkan</button>
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
