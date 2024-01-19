@extends('global.main-head')
<section class="test-space">
    <header class="headerz">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <a href="/landing-page-after">
                        <img src="{{ asset('medias/images/metafora.svg') }}" alt="logo">
                    </a>
                </div>
                <div class="col text-center">
                    <div>
                        <h5><strong> Pertanyaan ke {{ $dataHelperTopPagination }}</strong> Dari
                            {{ count($dataAllQuestion) }}</h5>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-end profil-wrapper">
                        <strong>
                            <p class="text-uppercase">{{ Auth::user()->name }}</p>
                        </strong>
                        <div>
                            <img class="img-fluid" width="" src="{{ asset('medias/images/avatar.png') }}"
                                alt="logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="container">
            <div class="row text-center justify-content-center timer-wrapper">
                <div class="col-2">
                    <p>SISA WAKTU</p>
                    <div class="d-flex align-items-center timer justify-content-center mt-2">
                        <i class="fa-solid fa-clock text-white me-2"></i>
                        <h5 id="timer" class="text-white">memuat</h5>
                    </div>
                </div>
            </div>
            <div class="row text-center justify-content-center">
                <div class="col-6">
                    <h4>{{ $dataAllQuestion[$dataHelper]->name }}</h4>
                </div>
            </div>
            @foreach ($dataAllLala as $data)
                @if ($dataAllQuestion[$dataHelper]->id == $data->id_question)
                    <div class="row justify-content-center mb-3">
                        <div class="col-6">
                            <div class="payment-method-wrapper">
                                <input value="{{ $data->id }}" type="radio" class="btn-check" name="id_answers"
                                    id="answer{{ $data->id }}" autocomplete="off" form="getAnswerValue"
                                    @if ($data->user_test_datas != null && $dataRegistration->id == $data->user_test_datas->id_registration) checked @endif>
                                {{-- {{ chr(64 + $loop->iteration) }}. --}}
                                <label id="checkbox-answer" class="btn btn-outline-primary"
                                    for="answer{{ $data->id }}">
                                    {{ $data->name }}</label>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="row justify-content-center text-center mt-5">
                <div class="col-6">
                    <div class="d-flex justify-content-between">
                        @if ($dataHelper != 0)
                            <form action="/update-value-helper-prev/{{ $dataRegistration->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn-secondaryz" type="submit">
                                    <i class="fa-solid fa-angle-left"></i>
                                    Sebelumnya
                                </button>
                            </form>
                        @endif
                        @if ($dataHelper == 0)
                            <form action="#">
                                <div class="btn-secondaryz-disable">
                                    <i class="fa-solid fa-angle-left"></i>
                                    Sebelumnya
                                </div>
                            </form>
                        @endif
                        {{-- @foreach ($dataQuestion as $data) --}}
                        @if ($dataLastQuestion->id == $dataAllQuestion[$dataHelper]->id)
                            <form id="getAnswerValue"
                                action="/update-value-helper-done/{{ $dataAllQuestion[$dataHelper]->id . '/' . $dataRegistration->id }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <button onclick="deleteItem()" class="btn-success" type="submit">
                                    Selesai
                                    <i class="fa-solid fa-flag"></i>
                                </button>
                            </form>
                        @else
                            <form id="getAnswerValue"
                                action="/update-value-helper-next/{{ $dataAllQuestion[$dataHelper]->id . '/' . $dataRegistration->id }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <button class="btn-primary" type="submit">
                                    Selanjutnya
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>
                            </form>
                        @endif
                        {{-- @endforeach --}}
                    </div>
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

<script type="text/javascript">
    var spd = 1000;
    var spdVal = 1;
    var cntDown = localStorage.getItem("countdownTime") || '<?php echo $time; ?>' * 60 * spdVal;
    // var cntDown = '<?php echo $time; ?>' * 60 * spdVal;
    // cntDown += 7;

    var items = [];


    if ('<?php echo $dataRegistration->flag_test; ?> ' == 2) {
        setInterval(function() {
            var mn, sc, ms;
            cntDown--;
            if (cntDown < 0) {
                return false;
            }
            mn = Math.floor((cntDown / spdVal) / 60);
            mn = (mn < 10 ? '0' + mn : mn);
            sc = Math.floor((cntDown / spdVal) % 60);
            sc = (sc < 10 ? '0' + sc : sc);
            ms = Math.floor(cntDown % spdVal);
            ms = (ms < 10 ? '0' + ms : ms);
            var result = mn + ':' + sc;
            document.getElementById('timer').innerHTML = result;

            localStorage.setItem("countdownTime", cntDown.toString());

        }, spd);
    }
</script>

<!-- script for disable url -->


<script type="text/javascript">
    var time = localStorage.getItem("countdownTime") || '<?php echo $time; ?>' * 60 * spdVal + 7;
    var realtime = time * 60000;
    setTimeout(function() {
            alert('Waktu Telah Habis');
            window.location.href = '/result';
        },
        realtime);
</script>
