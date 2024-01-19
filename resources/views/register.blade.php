@extends('global.main-head')
<section class="auth">
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <a href="./landing-page-after">
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
                        <h2>Silahkan daftar untuk
                            melanjutkan</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3 ps-4" style="border-radius: 15px" role="alert">
                                @foreach ($errors->all() as $error)
                                    - {{ $error }} <br>
                                @endforeach
                            </div>
                        @endif
                        <form action="/register" method="POST">
                            @csrf
                            <div class="form-group mt-4">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Masukan Disini">
                            </div>
                            <div class="form-group mt-3">
                                <label>Nama Lengkap</label>
                                <input id="name" name="name" type="text" class="form-control"
                                    placeholder="Masukan Disini">
                            </div>
                            <div class="form-group mt-3">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukan Disini">
                            </div>
                            <div class="form-group d-none">
                                <label for="role">Role</label>
                                <input type="text" class="form-control" id="role_id" name="role_id" value="2"
                                    placeholder="Masukan Disini">
                            </div>
                            <button type="submit" class="btn-primary mt-5">Daftar Sekarang </button>
                            <div class="d-flex mt-3">
                                <p class="pe-1">Sudah Punya Akun?</p>
                                <a href="./login">Masuk Disini</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-7 rightImageWrapper">
                    <img class="img-fluid" src="{{ asset('medias/images/register.png') }}" alt="logo">
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
