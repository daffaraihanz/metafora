@extends('global.main-head')
<section class="registration">
    <x-header />
    <div class="content">
        <form action="" method="POST">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <h2>Pendaftaran <br> Pemeriksaan Minat Bakat</h2>
                    </div>
                    <div class="col-4">
                        <div class="warning-info d-flex align-items-center">
                            <i class="fa-solid fa-circle-info pe-2"></i>
                            <h5>
                                Total Pembayaran
                                @foreach ($dataQuestionPackage as $dataQue)
                                    <strong>Rp {{ $dataQue->price }}</strong>
                                @endforeach
                            </h5>
                        </div>
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
                            <p>Pilih Metode Pembayaran</p>
                        </b>
                    </div>
                </div>
                @csrf
                <div class="row payment-method-wrapper">
                    <div class="col-3">
                        <input value="LINK AJA" type="radio" class="btn-check payment1_toggle" name="payment_method"
                            id="payment_method1" autocomplete="off">
                        <label class="btn btn-outline-success" for="payment_method1">LINK AJA</label>
                    </div>
                    <div class="col-3">
                        <input value="SHOPEE PAY" type="radio" class="btn-check payment2_toggle" name="payment_method"
                            id="payment_method2" autocomplete="off">
                        <label class="btn btn-outline-success" for="payment_method2">
                            SHOPEE PAY
                        </label>
                    </div>
                    <div class="col-3">
                        <input value="TRANSFER BANK" type="radio" class="btn-check payment3_toggle"
                            name="payment_method" id="payment_method3" autocomplete="off">
                        <label class="btn btn-outline-success" for="payment_method3">
                            TRANSFER BANK
                        </label>
                    </div>
                </div>
                <div class="payment1 disNone">
                    <div class="row mb-2 mt-4">
                        <div class="col">
                            <b>
                                <p>Cara Pembayaran</p>
                            </b>
                        </div>
                    </div>
                    <div class="row payment-steps-wrapper">
                        <div class="col">
                            <img width="15%" src="{{ asset('medias/images/qr.png') }}" alt="logo">
                            <p class="mt-3">Silahkan scan QRIS diatas</p>
                            <p class="mt-3">Masukan nominal pembayaran sebesar Rp 300.000</p>
                            <p class="mt-3">Kirimkan screenshot bukti pembayaran melalui tombol di bawah</p>
                        </div>
                    </div>
                </div>
                <div class="payment2 disNone">
                    <div class="row mb-2 mt-4">
                        <div class="col">
                            <b>
                                <p>Cara Pembayaran</p>
                            </b>
                        </div>
                    </div>
                    <div class="row payment-steps-wrapper">
                        <div class="col">
                            <img width="15%" src="{{ asset('medias/images/qr.png') }}" alt="logo">
                            <p class="mt-3">Silahkan scan QRIS diatas</p>
                            <p class="mt-3">Masukan nominal pembayaran sebesar Rp 300.000</p>
                            <p class="mt-3">Kirimkan screenshot bukti pembayaran melalui tombol di bawah</p>
                        </div>
                    </div>
                </div>
                <div class="payment3 disNone">
                    <div class="row mb-2 mt-4">
                        <div class="col">
                            <b>
                                <p>Cara Pembayaran</p>
                            </b>
                        </div>
                    </div>
                    <div class="row payment-steps-wrapper">
                        <div class="col">
                            <p>Cari menu transfer bank</p>
                            <p class="mt-3">Masukan rekening tujuan 00126473826327</p>
                            <p class="mt-3">Masukan nominal sebanyak Rp 300.000</p>
                            <p class="mt-3">Kirimkan screenshot bukti pembayaran melalui tombol di bawah</p>
                        </div>
                    </div>
                </div>
                <div class="row mb-2 mt-4">
                    <div class="col">
                        <b>
                            <p>No Whatsapp Anda</p>
                        </b>
                    </div>
                    <div class="col">
                        <b>
                            <p>Tempat Tinggal Saat Ini</p>
                        </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="d-flex align-items-center input-whatsapp">
                            <p>+62</p>
                            <input type="number" class="form-control" id="whatsapp" name="whatsapp"
                                placeholder="cth: 85876247850">
                        </div>
                    </div>
                    <div class="col">
                        @if ($dataRegional != null)
                            <input value="{{ $dataRegional->regional }}" type="text" class="form-control"
                                id="regional" name="regional" placeholder="cth: Purbalingga, Jawa Tengah, Indonesia">
                        @else
                            <input type="text" class="form-control" id="regional" name="regional"
                                placeholder="cth: Purbalingga, Jawa Tengah, Indonesia">
                        @endif
                    </div>
                </div>
                <div class="row mt-3">
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
                <div class="row mt-5">
                    <div class="col">
                        @if ($dataRegistrationNull || $dataRegistrationLatest->flag_journey == 'Selesai')
                            <button type="submit" class="btn-primary" onclick="deleteItem()">
                                Kirim Bukti Pembayaran Disini
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </form>
        <div class="container">
            <div>
                @if ($dataRegistrationNull == false)
                    @if ($dataRegistrationLatest->flag_journey == 'Konfirmasi Pembayaran')
                        <div class="d-flex">
                            <div class="warning-info d-flex align-items-center px-4 me-2">
                                <i class="fa-solid fa-circle-info pe-2"></i>
                                <h5>
                                    Pendaftaran sedang diproses
                                </h5>
                            </div>
                            <a href="https://api.whatsapp.com/send?phone=6285876247840">
                                <button class="btn-primary">Hubungi Admin</button>
                            </a>
                        </div>
                    @endif
                    @if ($dataRegistrationLatest->flag_journey == 'Siap Tes')
                        <div class="d-flex">
                            <div class="warning-info d-flex align-items-center px-4 me-2">
                                <i class="fa-solid fa-circle-info pe-2"></i>
                                <h5>
                                    Selesaikan tes terlebih dahulu untuk membuat pendaftaran baru
                                </h5>
                            </div>
                            <a href="https://api.whatsapp.com/send?phone=6285876247840">
                                <button class="btn-primary">Hubungi Admin</button>
                            </a>
                        </div>
                    @endif
                @endif
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

<script>
    function deleteItem() {
        localStorage.clear();
        localStorage.delete('countdownTime');
    }
</script>
