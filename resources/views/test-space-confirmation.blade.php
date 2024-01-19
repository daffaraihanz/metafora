@extends('global.main-head')
<section class="dashboard-edit-data">
    <div class="container">
        <div class="row justify-content-center text-center mb-3 pt-5">
            <div class="col-6">
                <b>
                    <h2>Apakah anda yakin ingin menyelesaikan pemeriksaan minat dan bakat ?</h2>
                </b>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-12">
                {{-- <form action="/dashboard-update-data-purchased/{{ $dataUser->id }}" method="POST">
                    @csrf
                    @method('PUT') --}}
                <button type="submit" class="btn btn-secondaryz mt-4 me-2">Kembali Mengerjakan</button>
                <button type="submit" class="btn btn-primary mt-4 ms-2">Selesaikan Sekarang</button>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</section>
