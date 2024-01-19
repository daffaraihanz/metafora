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
                                    <a class="sidebar-link active" href="/dashboard-request" aria-expanded="false">
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
                                    <a class="sidebar-link" href="/dashboard-question-package" aria-expanded="false">
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
                                <h4>Request Pembayaran</h4>
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
                <section
                    @if (count($dataRegistrationCompleted) > 3) style="padding-bottom: 200px;" @else  style="height: 100vh;" @endif
                    class="right-side px-5 pt-4">
                    @foreach ($dataUser as $data)
                        @if ($data->flag_journey == 'Konfirmasi Pembayaran')
                            <div class="row cardz-wrapper mb-3 align-items-center mb-3">
                                <div class="col-3">
                                    <label>Nama Siswa</label>
                                    <p>{{ $data->users->name }}</p>
                                </div>
                                <div class="col-2">
                                    <label>No Whatsapp</label>
                                    <p>0{{ $data->whatsapp }}</p>
                                </div>
                                <div class="col-2">
                                    <label>Total Harga</label>
                                    <p> Rp {{ $data->question_packages->price }}</p>
                                </div>
                                <div class="col-5">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <label>Metode Pembayaran</label>
                                            <p>{{ $data->payment_method }}</p>
                                        </div>
                                        <div>
                                            <a href="/dashboard-edit-data/{{ $data->id }}">
                                                <button type="button" class="btn btn-primary">Teruskan Data</button>
                                            </a>
                                            <a href="/delete-data-request/{{ $data->id }}">
                                                <button class="btn btn-danger ms-2">Hapus</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
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
