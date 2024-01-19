@extends('global.main-head')

<!DOCTYPE html>
<html lang="en">

@section('main-content')
    <div class="landing-page">
        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img src="{{ asset('medias/images/metafora.svg') }}" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#layanan">Layanan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#faq">FAQ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#kontak">Kontak</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center justify-content-end profil-wrapper">
                                    <strong>
                                        <p class="text-uppercase">{{ Auth::user()->name }}</p>
                                    </strong>
                                    <div class="ms-2">
                                        <img class="img-fluid me-2" width=""
                                            src="{{ asset('medias/images/avatar.png') }}" alt="logo">
                                        <i class="fa-solid fa-caret-down"></i>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profil-dropdown" aria-labelledby="drop2">
                                <ul>
                                    <li>
                                        @php
                                            $test = Crypt::encrypt(Auth::User()->id);
                                        @endphp
                                        <a href="/user-history/{{ $test }}">
                                            <p class="mb-0 fs-3">Riwayat Pemeriksaan</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/logout">
                                            <p class="mb-0 fs-3 text-danger">Keluar</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <section class="jumbotronz">
                    <div class="row text-center justify-content-center">
                        <div class="col-12">
                            <h5>SELAMAT DATANG</h5>
                            <h1>Hindari Terjadinya Salah Jurusan <br>
                                Dengan Mengetahui Minat dan Bakatmu</h1>
                            <p>Platform website untuk mencari minat dan bakat, pemeriksaan psikologi serta konsultasi
                                asesmen
                            </p>
                            <a href="/registration">
                                <button class="btn-primary">
                                    Cari Minat dan Bakatmu Sekarang
                                </button>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
            </section>
        </header>
        <section id="layanan" class="services">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <x-card1 title="Pemeriksaan
                    Minat & Bakat"
                            desc="Hindari terjadinya salah jurusan
                    dengan mencari tahuminat
                    dan bakatmu sekarang" />
                    </div>
                    <div class="col-4">
                        <x-card1 title="Konsultasi
                    Asesmen"
                            desc="Konsultasi lebih lanjut hasil akhir
                        pemeriksaan psikologi bersama
                        psikolog profesional sekarang" />
                    </div>
                    <div class="col-4">
                        <x-card1 title="Pemeriksaan
                    Psikologi"
                            desc="Pahami dan evaluasi perilaku
                        kamu dari berbagai aspek
                        psikologis sekarang" />
                    </div>
                </div>
            </div>
        </section>
        <section class="detail-services">
            <div class="container">
                <x-detail-service image="detail-service1" flexreverse="flex-row" about="TENTANG MENCARI MINAT & BAKAT"
                    title="Cari tahu jurusan yang
                sesuai dengan potensi
                minat dan bakatmu"
                    desc="Hasil dari tes minat dan bakat ini dapat membantu individu membuat keputusan terkait karir, pendidikan, atau pemilihan pekerjaan yang sesuai dengan minat dan bakat mereka." />
                <x-detail-service image="detail-service2" flexreverse="flex-row-reverse" about="TENTANG KONSULTASI ASESMEN"
                    title="Diskusikan hasil pemeriksaan minat
            dan bakat dengan psikolog"
                    desc="Psikolog akan membantu individu untuk memahami hasil minat dan bakat serta jurusan rekomendasi untuk lebih mempersiap
            kan hal apa yang perlu dievaluasi kedepannya" />
                <x-detail-service image="detail-service3" flexreverse="flex-row" about="TENTANG PEMERIKSAAN PSIKOLOGI"
                    title="Pahami dan evaluasi 
                perilaku kamu dari aspek
                aspek psikologis"
                    desc="Pemeriksaan psikologi digunakan untuk mengidentifikasi dan mendiagnosis gangguan mental, gangguan emosional, atau masalah psikologis lainnya yang mungkin dialami oleh individu." />
            </div>
        </section>
        <section id="faq" class="faq">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col">
                        <h2>FAQ</h2>
                        <p>Pertanyaan yang sering ditanyakan</p>
                    </div>
                </div>
                <div class="accordion" id="accordionExample">
                    <x-faq-list heading="headingOne" collapseTarget="collapseOne" collapseControl="collapseOne"
                        title=" Apakah psikotes ini berbayar ?" collapseId="collapseOne" headingNumber="headingOne"
                        desc="Ya, psikotes ini berbayar dengan nominal harga yang bisa dilihat pada halaman pendaftaran pemeriksaan minat dan bakat" />
                    <x-faq-list heading="headingTwo" collapseTarget="collapseTwo" collapseControl="collapseTwo"
                        title="Berapa lama pengerjaan psikotes ini ?" collapseId="collapseTwo" headingNumber="headingTwo"
                        desc="Tersedia waktu pengerjaan selama 120 menit" />
                    <x-faq-list heading="headingThree" collapseTarget="collapseThree" collapseControl="collapseThree"
                        title="Apakah terdapat layanan lain selain psikotes online ?" collapseId="collapseThree"
                        headingNumber="headingThree"
                        desc="Untuk saat ini baru tersedia fitur psikotes online, layanan lainnya bisa menghubungi kontak untuk lebih lanjutnya" />
                </div>
            </div>
        </section>

        <section id="kontak" class="kontak">
            <div class="container">
                <div class="row justify-content-center text-left">
                    <div class="col">
                        <h2>Kontak</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <a href="https://getbootstrap.com/docs/5.2/getting-started/download/">
                            <div class="btn-secondaryz d-flex align-items-center">
                                <img class="img-fluid pe-2" src="{{ asset('medias/icons/somed1.svg') }}" alt="logo">
                                <p>@metafora.consultant</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="https://getbootstrap.com/docs/5.2/getting-started/download/">
                            <div class="btn-secondaryz d-flex align-items-center">
                                <img class="img-fluid pe-2" src="{{ asset('medias/icons/somed2.svg') }}" alt="logo">
                                <p>@metafora.consultant</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="https://getbootstrap.com/docs/5.2/getting-started/download/">
                            <div class="btn-secondaryz d-flex align-items-center">
                                <img class="img-fluid pe-2" src="{{ asset('medias/icons/somed3.svg') }}" alt="logo">
                                <p>@metafora.consultant</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="https://getbootstrap.com/docs/5.2/getting-started/download/">
                            <div class="btn-secondaryz d-flex align-items-center">
                                <img class="img-fluid pe-2" src="{{ asset('medias/icons/somed4.svg') }}" alt="logo">
                                <p>@metafora.consultant</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between">
                            <a class="navbar-brand" href="#">
                                <img src="{{ asset('medias/images/metafora.svg') }}" alt="logo">
                            </a>
                            <hr width="63%">
                            <p>Copyright @2023 Metafora Consultant</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

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
@endsection
