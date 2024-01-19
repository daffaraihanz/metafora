<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Histori;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\QuestionPackage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\RegistrationCreateRequest;
use Carbon\Carbon;

class RegistrationController extends Controller
{
    public function index()
    {

        $user = User::with(['detail_payments'])->where('id', Auth::user()->id)->get();
        $registration_null = Registration::where('id_users', '=', Auth::user()->id)->count() == 0;
        $registration_latest = Registration::where('id_users', '=', Auth::user()->id)->latest()->first();
        $registration = Registration::all();
        $question_package = QuestionPackage::all();

        $regional = User::where('id', Auth::user()->id)->first();


        return view('/registration', ['dataRegistration' => $registration, 'dataQuestionPackage' => $question_package, 'dataUser' => $user, 'dataRegistrationNull' => $registration_null, 'dataRegistrationLatest' => $registration_latest, 'dataRegional' => $regional]);
    }

    public function store(Request $request)
    {

        $question_package = QuestionPackage::where('id', '=', 1)->first();

        $external_uri = 'https://wa.me/6285876247840?text=Saya%20sudah%20melakukan%20pembayaran%20dengan%20data%20sebagai%20berikut%20:%0ANama%20Lengkap%20:%20(isi%20disini)%0AMetode%20Pembayaran%20:%20(isi%20disini)%0AFoto%20Bukti%20Pembayaran%20:%20(upload%20foto%20bukti%20pembayaran)';
        $detail_payments = new Registration;

        $regional = User::where('id', Auth::user()->id)->first();
        $regional->regional = $request->regional;
        $regional->save();

        $rules = [
            'whatsapp' => 'required',
            'payment_method' => 'required',
            'regional' => 'required',
        ];

        $customMessage = [
            'whatsapp.required' => 'No Whatsapp Tidak Boleh Kosong',
            'payment_method.required' => 'Pilih Metode Pembayaran Terlebih Dahulu',
            'regional.required' => 'Tempat Tinggal Saat Ini Tidak Boleh Kosong'
        ];

        $this->validate($request, $rules, $customMessage);

        $detail_payments->id_users = Auth::user()->id;
        $detail_payments->created_at = Carbon::now();
        $detail_payments->id_question_packages = 1;
        $detail_payments->whatsapp = $request->whatsapp;
        $detail_payments->flag_journey = "Konfirmasi Pembayaran";
        $detail_payments->payment_method = $request->payment_method;
        $detail_payments->flag_test = 1;
        $detail_payments->timer = $question_package->end_timer;

        $regional->regional = $request->regional;

        $detail_payments->save();

        redirect()->away($external_uri)->send()->with('_blank');
    }
}
