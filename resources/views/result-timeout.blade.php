@extends('global.main-head')
<section class="result">
    <x-header />
    <div class="content">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <img src="{{ asset('medias/images/result.png') }}" alt="logo">
                </div>
            </div>
            <div class="row text-center justify-content-center">
                <div class="col-6">
                    <h2>Selamat Anda Telah Menyelesaikan Psikotes</h2>
                    <p>Berikut adalah hasil minat bakat dan jurusan rekomendasi
                        berdasarkan pengerjaan psikotes Anda</p>
                </div>
            </div>
            <div class="row text-center mt-4">
                <div class="col">
                    <img class="img-fluid" src="{{ asset('medias/icons/minat-dan-bakat.svg') }}" alt="logo">
                </div>
            </div>
            <div class="row text-center justify-content-center mt-3">
                @foreach ($dataSubAspect as $data)
                    <div class="col-4">
                        <div class="cardz text-center">
                            <p>{{ $data->name }}</p>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-3">
                    <div class="cardz text-center">
                        <p>JURUSAN REKOMENDASI</p>
                        <hr>
                        <h5>DKV</h5>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="bot-content">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-8">
                    <div class="d-flex align-items-center">
                        <img class="me-3" src="{{ asset('medias/images/bot-nav.png') }}" alt="logo">
                        <div>
                            <h5 class="text-warning mb-2">#GRATIS BIAYA KONSULTASI !</h5>
                            <h3 class="text-white"><b>Untuk Mengetahui Rekomendasi Jurusan,</b> Konsultasikan lebih
                                lanjut
                                hasil
                                pemeriksaan
                                bersama Psikolog </h3>
                        </div>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <a target="_blank"
                        href="https://wa.me/6285876247840?text=Saya%20ingin%20berkonsultasi%20lebih%20lanjut%20terkait%20hasil%20pemeriksaan%20minat%20dan%20bakat%20dengan%20data%20sebagai%20berikut%20:%0ANama%20Lengkap%20:%20(isi%20disini)%0ATanggal%20Selesai%20Melakukan%20Pemeriksaan%20:%20(isi%20disini)
                        ">
                        <button class="btn-white">Konsultasi Sekarang</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
