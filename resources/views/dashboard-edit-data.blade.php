@extends('global.main-head')
<section class="dashboard-edit-data">
    <div class="container">
        <div class="row content pt-5 mb-5 justify-content-center align-items-center">
            <div class="col-3">
                <div class="cardz text-center flag-before">
                    <p>STATUS SEKARANG</p>
                    <hr>
                    <p>{{ $dataUser->flag_journey }}</p>
                </div>
            </div>
            <div class="col-1 text-center">
                <img width="70%" class="img-fluid" src="{{ asset('medias/images/arrow-status.png') }}" alt="logo">
            </div>
            <div class="col-3">
                <div class="cardz text-center flag-after">
                    <p>STATUS BERIKUTNYA</p>
                    <hr>
                    <p>Pembayaran Berhasil</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center mb-3">
            <div class="col-6">
                <b>
                    <h2>Apakah anda yakin ingin meneruskan data berikut ke status berikutnya</h2>
                </b>
            </div>
        </div>
        <div class="row content justify-content-center">
            <div class="col-3">
                <div class="cardz text-center">
                    <p>NAMA</p>
                    <hr>
                    <p>{{ $dataUser->users->name }}</p>
                </div>
            </div>
            <div class="col-3">
                <div class="cardz text-center">
                    <p>WHATSAPP</p>
                    <hr>
                    <p>{{ $dataUser->whatsapp }}</p>
                </div>
            </div>
            <div class="col-3">
                <div class="cardz text-center">
                    <p>HARGA</p>
                    <hr>
                    <p>{{ $dataUser->question_packages->price }}</p>
                </div>
            </div>
            <div class="col-3">
                <div class="cardz text-center">
                    <p>METODE PEMBAYARAN</p>
                    <hr>
                    <p>{{ $dataUser->payment_method }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-3">
                <form action="/dashboard-update-data-request/{{ $dataUser->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary mt-5">Teruskan Data</button>
                </form>
            </div>
        </div>
    </div>
</section>
