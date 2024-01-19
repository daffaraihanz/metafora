@extends('global.main-head')
<section class="test-rules">
    <x-header />
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Tata Cara Pengerjaan</h2>
                </div>
            </div>
            <div class="row payment-steps-wrapper mt-3">
                <div class="col">
                    <p class="mb-3">Jawablah soal berdasarkan preferensi kamu atau yang paling mencerminkan kamu</p>
                    <p class="mb-3">Tidak ada jawaban benar atau salah</p>
                    <p class="mb-3">Klik tombol selanjutnya untuk menyimpan jawaban</p>
                    <p class="mb-3">Saat waktu habis, secara automatis akan menyelesaikan proses pemeriksaan minat dan
                        bakat</p>
                    <p class="mb-3">Sangat direkomendasikan melakukan konsultasi lanjutan untuk mengetahui lebih jelas
                        potensi minat dan bakat kamu</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="d-flex">
                        <form action="/test-space/{{ $dataRegistration->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn-primary ms-2">Mulai Tes Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
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
