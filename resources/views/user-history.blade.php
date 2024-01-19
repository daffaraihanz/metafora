@extends('global.main-head')
<section class="user-history">
    <x-header />
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Riwayat Psikotes</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <b>
                        <p>Tes Tersedia</p>
                    </b>
                </div>
            </div>

            @if ($dataRegistrationNull == false)
                @if (
                    $dataRegistrationLatest->flag_journey == 'Selesai' ||
                        $dataRegistrationLatest->flag_journey == 'Konfirmasi Pembayaran')
                    <div class="row mt-3">
                        <div class="col">
                            <div class="warning-info d-flex align-items-center px-4 me-2">
                                <i class="fa-solid fa-circle-info pe-2"></i>
                                <h5>
                                    Tidak Ada Tes Tersedia
                                </h5>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($dataRegistrationLatest->flag_journey == 'Siap Tes')
                    <div class="row cardz-wrapper mb-4">
                        <div class="col-3">
                            <label>Kode Soal</label>
                            <p>{{ $dataQuestion->name }}</p>
                        </div>
                        <div class="col-2">
                            <label>Harga</label>
                            <p>Rp {{ $dataQuestion->price }}</p>
                        </div>
                        <div class="col-2">
                            <label>Waktu Pengerjaan</label>
                            <p>{{ $dataRegistrationLatest->timer }} Menit</p>
                        </div>
                        <div class="col-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <label>Status</label>
                                    <p>{{ $dataRegistrationLatest->flag_journey }}</p>
                                </div>
                                <a href="/test-rules/{{ $dataRegistrationLatest->id }}">
                                    <button class="btn-primary">Lanjutkan</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
            @if ($dataRegistrationNull)
                <div class="row mt-3">
                    <div class="col">
                        <div class="warning-info d-flex align-items-center px-4 me-2">
                            <i class="fa-solid fa-circle-info pe-2"></i>
                            <h5>
                                Tidak Ada Tes Tersedia
                            </h5>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row mb-2 mt-4">
                <div class="col">
                    <b>
                        <p>Tes Selesai</p>
                    </b>
                </div>
            </div>
            @if ($dataRegistrationNull)
                <div class="row mt-3">
                    <div class="col">
                        <div class="warning-info d-flex align-items-center px-4 me-2">
                            <i class="fa-solid fa-circle-info pe-2"></i>
                            <h5>
                                Tidak Ada Riwayat Tes
                            </h5>
                        </div>
                    </div>
                </div>
            @endif
            @foreach ($dataRegistration as $data)
                @if ($data->flag_journey == 'Selesai')
                    <div class="row cardz-wrapper mb-4 justify-content-between">
                        <div class="col-3">
                            <label>Kode Soal</label>
                            <p>{{ $dataQuestion->name }}</p>
                        </div>
                        <div class="col-2">
                            <label>Harga</label>
                            <p>Rp {{ $dataQuestion->price }}</p>
                        </div>
                        <div class="col-2">
                            <label>Waktu Pengerjaan</label>
                            <p>{{ $data->timer }} Menit</p>
                        </div>
                        <div class="col-2">
                            <label>Tanggal Selesai</label>
                            <p>{{ $data->updated_at }}</p>
                        </div>
                        <div class="col-3 text-end">
                            <a href="/result/{{ $data->id }}">
                                <button class="btn-primary">Lihat Hasil</button>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach

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
