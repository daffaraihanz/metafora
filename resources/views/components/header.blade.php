<header class="headerz">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <a href="/landing-page-after">
                    <img src="{{ asset('medias/images/metafora.svg') }}" alt="logo">
                </a>
            </div>
            <div class="col">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="d-flex align-items-center justify-content-end profil-wrapper">
                        <strong>
                            <p class="text-uppercase">{{ Auth::user()->name }}</p>
                        </strong>
                        <div>
                            <img class="img-fluid" width="" src="{{ asset('medias/images/avatar.png') }}"
                                alt="logo">
                            <i class="fa-solid fa-caret-down"></i>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end profil-dropdown" aria-labelledby="drop2">
                    <ul>
                        <li>
                            @php
                                $encryptId = Crypt::encrypt(Auth::User()->id);
                            @endphp
                            <a href="/user-history/{{ $encryptId }}">
                                <p class="mb-0 fs-3">Riwayat Pemeriksaan</p>
                            </a>
                        </li>
                        <li>
                            <a href="/logout">
                                <p class="mb-0 fs-3 text-danger">Keluar</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
