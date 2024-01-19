@extends('global.main-head')
<section class="dashboard-edit-data pt-5">
    <div class="container pt-5">
        <div class="row justify-content-center text-center mb-3 mt-5">
            <div class="col-6">
                <b>
                    <h2>Apakah anda yakin ingin menghapus data berikut</h2>
                </b>
                <p class="mt-2">Data yang telah dihapus tidak bisa dikembalikan</p>
            </div>
        </div>
        <div class="row content justify-content-center">
            <div class="col-3">
                <div class="cardz text-center">
                    <p>NAMA</p>
                    <hr>
                    <p>{{ $dataRegistration->users->name }}</p>
                </div>
            </div>
            <div class="col-3">
                <div class="cardz text-center">
                    <p>WHATSAPP</p>
                    <hr>
                    <p>{{ $dataRegistration->whatsapp }}</p>
                </div>
            </div>
            <div class="col-3">
                <div class="cardz text-center">
                    <p>HARGA</p>
                    <hr>
                    <p>{{ $dataRegistration->question_packages->price }}</p>
                </div>
            </div>
            <div class="col-3">
                <div class="cardz text-center">
                    <p>METODE PEMBAYARAN</p>
                    <hr>
                    <p>{{ $dataRegistration->payment_method }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-3">
                <form action="/destroy-data-request/{{ $dataRegistration->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dangerz mt-5">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</section>
