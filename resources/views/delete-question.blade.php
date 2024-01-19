@extends('global.main-head')
<section class="dashboard-edit-data pt-5">
    <div class="container pt-5">
        <div class="row justify-content-center text-center mb-3 mt-5">
            <div class="col-6">
                <b>
                    <h2>Apakah anda yakin ingin menghapus soal berikut</h2>
                </b>
                <p class="mt-2">Seluruh jawaban soal ini akan terhapus</p>
            </div>
        </div>
        <div class="row content justify-content-center">
            <div class="col-3">
                <div class="cardz text-center">
                    <p>{{ $dataQuestion->name }}</p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-3">
                <form action="/delete-question/{{ $dataQuestion->id }}}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-dangerz mt-5">Hapus Data</button>
                </form>
            </div>
        </div>
    </div>
</section>
