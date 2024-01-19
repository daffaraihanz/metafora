@extends('global.main-head')
<section class="auth">
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <a href="./">
                        <img src="{{ asset('medias/images/metafora.svg') }}" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-4">
                    <div class="left-content">
                        <h2>Silahkan login untuk
                            melanjutkan</h2>
                        <form method="POST" action="" class="mt-4">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukan Disini" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukan Disini" required>
                            </div>
                            <a class="forgot-password" href="/forgot-password">Lupa Password ?</a>
                            @if (session()->get('dataResetSuccess') == 1)
                                <div class="alert alert-success mt-3 " style="border-radius: 15px; width:100%;"
                                    role="alert">
                                    <p class="text-success">Password berhasil diperbarui</p>
                                </div>
                            @endif
                            @if (Session::has('status'))
                                <div class="alert alert-danger mt-3 ps-4" style="border-radius: 15px" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif

                            @if (Session::has('registerStatus'))
                                <div class="alert alert-success mt-3 ps-4" style="border-radius: 15px" role="alert">
                                    {{ Session::get('registerMessages') }}
                                </div>
                            @endif
                            <button type="submit" class="btn-primary mt-5">Masuk Sekarang</button>
                            <div class="d-flex mt-3">
                                <p class="pe-1">Belum Punya Akun?</p>
                                <a href="./register">Daftar Disini</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-7 rightImageWrapper">
                    <img class="img-fluid" src="{{ asset('medias/images/login.png') }}" alt="logo">
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
