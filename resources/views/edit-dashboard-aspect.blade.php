<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my-dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!--  Body Wrapper -->
    <section class="dashboard-request">
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">
            <section class="left-side">
                <aside class="left-sidebar">
                    <!-- Sidebar scroll-->
                    <div>
                        <div class="brand-logo d-flex align-items-center justify-content-between">
                            <a href="./index.html" class="text-nowrap logo-img">
                                <img src="{{ asset('medias/images/metafora.svg') }}" alt="logo">
                            </a>
                            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                                <i class="ti ti-x fs-8"></i>
                            </div>
                        </div>
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                            <ul id="sidebarnav">
                                <li class="nav-small-cap">
                                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                    <span class="hide-menu">STATUS</span>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/dashboard-request" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-layout-dashboard "></i>
                                        </span>
                                        <span class="hide-menu">Konfirmasi Pembayaran</span>
                                        @if (count($countRequest) != 0)
                                            <div
                                                style="border-radius:200px;padding:0px 10px;background-color:red !important;">
                                                <span>{{ count($countRequest) }}</span>
                                            </div>
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/dashboard-purchased" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-layout-dashboard"></i>
                                        </span>
                                        <span class="hide-menu">Pembayaran Berhasil</span>
                                        @if (count($countPurchased) != 0)
                                            <div
                                                style="border-radius:200px;padding:0px 10px;background-color:red !important;">
                                                <span>{{ count($countPurchased) }}</span>
                                            </div>
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/dashboard-test" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-layout-dashboard"></i>
                                        </span>
                                        <span class="hide-menu">Siap Tes</span>
                                        @if (count($countTest) != 0)
                                            <div
                                                style="border-radius:200px;padding:0px 10px;background-color:red !important;">
                                                <span class="text-white">{{ count($countTest) }}</span>
                                            </div>
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/dashboard-completed" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-layout-dashboard"></i>
                                        </span>
                                        <span class="hide-menu">Tes Selesai</span>
                                        @if (count($countCompleted) != 0)
                                            <div
                                                style="border-radius:200px;padding:0px 10px;background-color:red !important;">
                                                <span class="text-white">{{ count($countCompleted) }}</span>
                                            </div>
                                        @endif
                                    </a>
                                </li>
                                <li class="nav-small-cap">
                                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                    <span class="hide-menu">BANK SOAL</span>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link active" href="/dashboard-question-package"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-layout-dashboard"></i>
                                        </span>
                                        <span class="hide-menu">Paket Soal</span>
                                    </a>
                                </li>
                                <li class="nav-small-cap">
                                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                    <span class="hide-menu">AKUN</span>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/dashboard-forgot" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-layout-dashboard"></i>
                                        </span>
                                        <span class="hide-menu">Lupa Password</span>
                                        @if (count($countForgot) != 0)
                                            <div
                                                style="border-radius:200px;padding:0px 10px;background-color:red !important;">
                                                <span class="text-white">{{ count($countForgot) }}</span>
                                            </div>
                                        @endif
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/dashboard-user" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-layout-dashboard"></i>
                                        </span>
                                        <span class="hide-menu">Pengguna</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="/dashboard-admin" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-layout-dashboard"></i>
                                        </span>
                                        <span class="hide-menu">Admin</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- End Sidebar navigation -->
                    </div>
                    <!-- End Sidebar scroll-->
                </aside>
            </section>
            <!--  Sidebar End -->
            <!--  Main wrapper -->
            <div class="body-wrapper ">
                <section class="dashboard-header">
                    <div class="container px-5 py-3">
                        <div class="row justify-content-between align-items-center mt-3">
                            <div class="col">
                                <div class="d-flex">
                                    <h4>Edit Aspek</h4>
                                </div>
                            </div>
                            <div class="col text-end">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <h5>{{ Auth::user()->name }}</h5>
                                        <div class="d-flex align-items-center">
                                            <img class="img-fluid mx-2" width=""
                                                src="{{ asset('medias/images/avatar.png') }}" alt="logo">
                                            <i class="fa-solid fa-caret-down"></i>
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="/logout" class="btn btn-outline-danger mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section style="height:100vh;" class="right-side px-5 pt-4">
                    <form action="/dashboard-aspect-edit/{{ $dataAspect->id . '/' . $dataQuestionPackage->id }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col">
                                <label for="exampleInputEmail1" class="form-label">Warna Kategori</label>
                            </div>
                        </div>
                        <div class="row payment-method-wrapper">
                            <div class="col-12">
                                <div class="d-flex">
                                    <div class="me-2">
                                        <input value="#605F4C" type="radio" class="btn-check" name="color"
                                            id="color1" autocomplete="off"
                                            @if ($dataAspect->color == '#605F4C') checked @endif>
                                        <label class="btn btn-outline-success" for="color1">
                                            <div class="color1"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#0094FF" type="radio" class="btn-check" name="color"
                                            id="color2" autocomplete="off"
                                            @if ($dataAspect->color == '#0094FF') checked @endif>
                                        <label class="btn btn-outline-success" for="color2">
                                            <div class="color2"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#399E2D" type="radio" class="btn-check" name="color"
                                            id="color3" autocomplete="off"
                                            @if ($dataAspect->color == '#399E2D') checked @endif>
                                        <label class="btn btn-outline-success" for="color3">
                                            <div class="color3"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#FFA726" type="radio" class="btn-check" name="color"
                                            id="color4" autocomplete="off"
                                            @if ($dataAspect->color == '#FFA726') checked @endif>
                                        <label class="btn btn-outline-success" for="color4">
                                            <div class="color4"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#FF2D92" type="radio" class="btn-check" name="color"
                                            id="color5" autocomplete="off"
                                            @if ($dataAspect->color == '#FF2D92') checked @endif>
                                        <label class="btn btn-outline-success" for="color5">
                                            <div class="color5"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#14505C" type="radio" class="btn-check" name="color"
                                            id="color6" autocomplete="off"
                                            @if ($dataAspect->color == '#14505C') checked @endif>
                                        <label class="btn btn-outline-success" for="color6">
                                            <div class="color6"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#FF6354" type="radio" class="btn-check" name="color"
                                            id="color7" autocomplete="off"
                                            @if ($dataAspect->color == '#FF6354') checked @endif>
                                        <label class="btn btn-outline-success" for="color7">
                                            <div class="color7"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#FF1EE8" type="radio" class="btn-check" name="color"
                                            id="color8" autocomplete="off"
                                            @if ($dataAspect->color == '#FF1EE8') checked @endif>
                                        <label class="btn btn-outline-success" for="color8">
                                            <div class="color8"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#FFD335" type="radio" class="btn-check" name="color"
                                            id="color9" autocomplete="off"
                                            @if ($dataAspect->color == '#FFD335') checked @endif>
                                        <label class="btn btn-outline-success" for="color9">
                                            <div class="color9"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#0922dd" type="radio" class="btn-check" name="color"
                                            id="color10" autocomplete="off"
                                            @if ($dataAspect->color == '#0922dd') checked @endif>
                                        <label class="btn btn-outline-success" for="color10">
                                            <div class="color10"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row payment-method-wrapper mt-3">
                            <div class="col">
                                <div class="d-flex">
                                    <div class="me-2">
                                        <input value="#6B0077" type="radio" class="btn-check" name="color"
                                            id="color11" autocomplete="off"
                                            @if ($dataAspect->color == '#6B0077') checked @endif>
                                        <label class="btn btn-outline-success" for="color11">
                                            <div class="color11"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#040404" type="radio" class="btn-check" name="color"
                                            id="color12" autocomplete="off"
                                            @if ($dataAspect->color == '#040404') checked @endif>
                                        <label class="btn btn-outline-success" for="color12">
                                            <div class="color12"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#DDC3A4" type="radio" class="btn-check" name="color"
                                            id="color13" autocomplete="off"
                                            @if ($dataAspect->color == '#DDC3A4') checked @endif>
                                        <label class="btn btn-outline-success" for="color13">
                                            <div class="color13"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#B4B61A" type="radio" class="btn-check" name="color"
                                            id="color14" autocomplete="off"
                                            @if ($dataAspect->color == '#B4B61A') checked @endif>
                                        <label class="btn btn-outline-success" for="color14">
                                            <div class="color14"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#77CFBE" type="radio" class="btn-check" name="color"
                                            id="color15" autocomplete="off"
                                            @if ($dataAspect->color == '#77CFBE') checked @endif>
                                        <label class="btn btn-outline-success" for="color15">
                                            <div class="color15"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#0076A1" type="radio" class="btn-check" name="color"
                                            id="color16" autocomplete="off"
                                            @if ($dataAspect->color == '#0076A1') checked @endif>
                                        <label class="btn btn-outline-success" for="color16">
                                            <div class="color16"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#F4B8C0" type="radio" class="btn-check" name="color"
                                            id="color17" autocomplete="off"
                                            @if ($dataAspect->color == '#F4B8C0') checked @endif>
                                        <label class="btn btn-outline-success" for="color17">
                                            <div class="color17"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#353E7C" type="radio" class="btn-check" name="color"
                                            id="color18" autocomplete="off"
                                            @if ($dataAspect->color == '#353E7C') checked @endif>
                                        <label class="btn btn-outline-success" for="color18">
                                            <div class="color18"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#EDD5F7" type="radio" class="btn-check" name="color"
                                            id="color19" autocomplete="off"
                                            @if ($dataAspect->color == '#EDD5F7') checked @endif>
                                        <label class="btn btn-outline-success" for="color19">
                                            <div class="color19"></div>
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input value="#C8E2EB" type="radio" class="btn-check" name="color"
                                            id="color20" autocomplete="off"
                                            @if ($dataAspect->color == '#C8E2EB') checked @endif>
                                        <label class="btn btn-outline-success" for="color20">
                                            <div class="color20"></div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Sub Bab</label>
                                    <input name="name" type="text" class="form-control"
                                        value="{{ $dataAspect->name }}" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="{{ asset('js/test.js') }}">
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

</body>

</html>
