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
                                    {{-- <h4><a href="/dashboard-bab/{{ $dataQuestionPackage->id }}">Bab
                                            {{ $dataQuestionPackage->name }}</a></h4>
                                    <h4 class="mx-2">></h4> --}}
                                    <h4>Tambah Soal</h4>
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
                                        <a href="./logout"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section style="height: 100vh;" class="right-side px-5 pt-4">
                    <form action="/add-question/{{ $dataQuestionPackage->id }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Deskripsi Soal</label>
                                    <textarea name="questionName" class="form-control" id="exampleFormControlTextarea1" rows="4" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jawaban A</label>
                                    <input name="rows[0][answerName]" type="text" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Kategori Aspek</label>
                                    <select name="rows[0][id_aspect]" class="form-control"
                                        id="exampleFormControlSelect1" required>
                                        <option>Pilih Kategori Aspek</option>
                                        @foreach ($dataAspect as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Skor</label>
                                    <input name="rows[0][score]" type="number" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jawaban B</label>
                                    <input name="rows[1][answerName]" type="text" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Kategori Aspek</label>
                                    <select name="rows[1][id_aspect]" class="form-control"
                                        id="exampleFormControlSelect1" required>
                                        <option>Pilih Kategori Aspek</option>
                                        @foreach ($dataAspect as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Skor</label>
                                    <input name="rows[1][score]" type="number" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jawaban C</label>
                                    <input name="rows[2][answerName]" type="text" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Kategori Aspek</label>
                                    <select name="rows[2][id_aspect]" class="form-control"
                                        id="exampleFormControlSelect1" required>
                                        <option>Pilih Kategori Aspek</option>
                                        @foreach ($dataAspect as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Skor</label>
                                    <input name="rows[2][score]" type="number" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jawaban D</label>
                                    <input name="rows[3][answerName]" type="text" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Kategori Aspek</label>
                                    <select name="rows[3][id_aspect]" class="form-control"
                                        id="exampleFormControlSelect1" required>
                                        <option>Pilih Kategori Aspek</option>
                                        @foreach ($dataAspect as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Skor</label>
                                    <input name="rows[3][score]" type="number" class="form-control"
                                        id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger" style="border-radius: 15px; width:100%;"
                                    role="alert">
                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">- {{ $error }}</p>
                                        {{-- @if (count($errors) > 1)
                                        @break
                                    @endif --}}
                                    @endforeach
                                </div>
                            @endif
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
