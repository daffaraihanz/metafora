<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\QuestionPackage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class UserHistoryController extends Controller
{
    public function index($id)
    {

        $registration_null = Registration::where('id_users', '=', Auth::user()->id)->count() == 0;

        // dd($registration_null);

        $decrypt = Crypt::decrypt($id);

        $registration_latest = Registration::where('id_users', '=', Auth::user()->id)->latest()->first();
        // $registration = Registration::where('id_users', '=', Auth::user()->id)->get();

        $registration = Registration::orderBy('updated_at', 'desc')->where('id_users', '=', Auth::user()->id)->get();

        $user = User::with(['detail_payments'])->findOrFail($decrypt);
        $question_package = QuestionPackage::where('id', 1)->first();

        return view('/user-history', ['dataUser' => $user, 'dataQuestion' => $question_package, 'dataRegistrationLatest' => $registration_latest, 'dataRegistration' => $registration, 'dataRegistrationNull' => $registration_null]);
    }
}
