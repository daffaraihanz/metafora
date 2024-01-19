<?php

namespace App\Http\Controllers;

use App\Models\Bab;
use App\Models\User;
use App\Models\Answer;
use App\Models\Aspect;
use App\Models\Histori;
use App\Models\Question;
// use App\Models\ResultScore;
use App\Models\SubAspect;
use App\Models\Registration;
use App\Models\UserTestData;
use Illuminate\Http\Request;
use App\Models\AnswerHistory;
use App\Models\AspectHistory;
use App\Models\ForgotPassword;
use App\Models\UserTestScore;
use App\Models\QuestionHistory;
use App\Models\QuestionPackage;
use App\Models\SubAspectHistory;
use App\Models\UserTestDataHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{

    public function editQuestionPackageFlagConfirmation($id)
    {
        $question_package = QuestionPackage::findOrFail($id);
        return view('/edit-question-package-flag-confirmation', ['dataQuestionPackage' => $question_package]);
    }

    public function updateDashboardBab($id)
    {
        $question_package = QuestionPackage::findOrFail($id);
        $question_package->flag = 'Aktif';
        $question_package->update();

        return redirect('/dashboard-question-package');
    }

    public function storeAspect(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'color' => 'required',
        ];

        $customMessage = [
            'name.required' => 'Mohon isi nama sub aspek sebelum menyimpan',
            'color.required' => 'Mohon pilih warna sebelum menyimpan',
        ];

        $this->validate($request, $rules, $customMessage);

        $aspect = new Aspect();
        $aspect->name = $request->name;
        $aspect->color = $request->color;
        $aspect->total_score = 0;
        $aspect->save();

        // $aspect_history = new AspectHistory();
        // $aspect_history->name = $request->name;
        // $aspect_history->color = $request->color;
        // $aspect_history->total_score = 0;
        // $aspect_history->save();

        return redirect()->to('/dashboard-aspect/' . $id);
    }


    public function storeAddQuestion(Request $request, $id)
    {

        $rules = [
            'questionName' => 'unique:questions,name'
        ];

        $customMessage = [
            'questionName.unique' => 'Soal serupa telah dibuat',
        ];

        $this->validate($request, $rules, $customMessage);
        $question = new Question();
        $question->name = $request->questionName;
        $question->save();

        $inputs =  $request->input('rows');
        foreach ($inputs as $input) {
            Answer::create([
                'name' => $input['answerName'],
                'id_aspects' => $input['id_aspect'],
                'score' => $input['score'],
                'id_question' => $question->id,
            ]);
        }

        $aspect = Aspect::select('id', 'total_score')->get();

        foreach ($aspect as $data) {
            foreach ($inputs as $input) {
                if ($data->id == (int)$input['id_aspect']) {
                    Aspect::where('id', '=', (int)$input['id_aspect'])->increment('total_score', (int)$input['score']);
                }
            }
        };

        return redirect()->to('/dashboard-aspect/' . $id);
    }

    public function addQuestion($id)
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $aspect = Aspect::All();
        $question_package = QuestionPackage::findOrFail($id);
        return view('/add-question', ['dataAspect' => $aspect, 'dataQuestionPackage' => $question_package, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function deleteQuestion($id)
    {
        $question = Question::findOrFail($id);
        return view('/delete-question', ['dataQuestion' => $question]);
    }

    public function destroyQuestion($id)
    {
        $question = Question::findOrFail($id);
        $answer = Answer::where('id_question', '=', $id)->get();

        foreach ($answer as $data) {
            Aspect::where('id', '=', $data->id_aspects)->decrement('total_score', $data->score);
        };

        $answer->each->delete();
        $answer->each->delete();
        $question->delete();

        return redirect('/dashboard-aspect/1');
    }

    public function addAspect($id)
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $question_package = QuestionPackage::findOrFail($id);
        return view('/add-aspect', ['dataQuestionPackage' => $question_package, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function deleteAspect($id)
    {
        $aspect = Aspect::findOrFail($id);
        return view('/delete-aspect', ['dataAspect' => $aspect]);
    }

    public function destroyAspect($id)
    {
        $aspect = Aspect::findOrFail($id);

        $answer = Answer::where('id_aspects', '=', $id)->get();
        $answer->each->delete();
        $question = Question::with('answer')->get();

        foreach ($question as $data) {
            if ($data->answer->count() < 4) {
                $answer2 = Answer::where('id_question', '=', $data->id)->get();
                $answer2->each->delete();
                $data->delete();

                foreach ($answer2 as $data_asnwers) {
                    $aspect_where = Aspect::where('id', '=', $data_asnwers->id_aspects)->first();
                    $aspect_where->total_score = 0;
                    $aspect_where->update();
                }
            }
        }

        $sub_aspect = SubAspect::where('id_aspects', '=', $id)->get();

        $sub_aspect->each->delete();
        $aspect->delete();

        return redirect('/dashboard-aspect/1');
    }

    public function dashboardAspect($id)
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $answer = Answer::all();
        $question_package = QuestionPackage::findOrFail($id);
        $aspect = Aspect::all();

        $question = Question::all();
        $test = Aspect::with(['answer'])->get();
        return view('/dashboard-aspect', ['dataQuestionPackage' => $question_package, 'dataAspect' => $aspect, 'dataAnswer' => $answer, 'dataQuestion' => $question, 'dataTest' => $test, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function editDashboardAspect($idQuestionPackage, $idAspect)
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $aspect = Aspect::findOrFail($idAspect);
        $question_package = QuestionPackage::findOrFail($idQuestionPackage);
        return view('/edit-dashboard-aspect', ['dataAspect' => $aspect, 'dataQuestionPackage' => $question_package, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function updateDashboardAspect(Request $request, $idAspect, $idQuestionPackage)
    {
        $aspect = Aspect::findOrFail($idAspect);
        $aspect->name = $request->name;
        $aspect->color = $request->color;
        $aspect->update();

        return redirect()->to('/dashboard-aspect/' . $idQuestionPackage);
    }

    public function dashboardQuestionPackage()
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $question_package = QuestionPackage::where('id', '=', 1)->first();
        $aspect = Aspect::all();
        $questions = Question::all();
        return view('/dashboard-question-package', ['dataQuestionPackage' => $question_package, 'dataAspect' => $aspect, 'dataQuestion' => $questions, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function editDashboardQuestionPackage($id)
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $question_package = QuestionPackage::findOrFail($id);
        return view('/edit-dashboard-question-package', ['dataQuestionPackage' => $question_package, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function updateDashboardQuestionPackage(Request $request, $id)
    {
        $question_package = QuestionPackage::findOrFail($id);
        $question_package->name = $request->name;
        $question_package->price = $request->price;
        $question_package->end_timer = $request->end_timer;
        $question_package->update();

        return redirect('/dashboard-question-package');
    }

    public function storeQuestionPackage(Request $request)
    {
        $question_package = new QuestionPackage;
        $question_package->name = $request->name;
        $question_package->price = $request->price;
        $question_package->end_timer = $request->end_timer;
        $question_package->flag = $request->flag;
        $question_package->save();

        return redirect('/dashboard-question-package');
    }

    public function addQuestionPackage()
    {
        return view('/add-question-package');
    }

    public function editQuestion($idQue, $idQuestionPackage)
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $question = Question::findOrFail($idQue);
        $question_package = QuestionPackage::findOrFail($idQuestionPackage);
        return view('/edit-question-answer', ['dataQuestion' => $question, 'dataQuestionPackage' => $question_package, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function updateQuestion(Request $request, $idQue, $idQuestionPackage)
    {
        $question = Question::findOrFail($idQue);

        $rules = [
            'questionName' => 'required|unique:questions,name',
        ];

        $customMessage = [
            'questionName.required' => 'Mohon isi seluruh masukan sebelum menyimpan',
            'questionName.unique' => 'Soal serupa telah dibuat',
        ];

        $this->validate($request, $rules, $customMessage);

        $question->name = $request->questionName;
        $question->update();

        return redirect()->to('/dashboard-aspect/' . $idQuestionPackage);
    }

    public function editAnswer($idAns, $idQuestionPackage)
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $answer = Answer::findOrFail($idAns);
        $questionPackage = QuestionPackage::findOrFail($idQuestionPackage);
        return view('/edit-answer', ['dataAnswer' => $answer, 'dataQuestionPackage' => $questionPackage, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function updateAnswer(Request $request, $idAns, $idQuestionPackage)
    {
        $aspect = Aspect::select('id', 'total_score')->get();
        $answer = Answer::findOrFail($idAns);
        $aspect_where = Aspect::where('id', $answer->id_aspects);

        $answer->name = $request->name;

        foreach ($aspect as $data) {
            if ($data->id == $answer->id_aspects) {
                $aspect_where->update([
                    'total_score' => $data->total_score - $answer->score + $request->score,
                ]);
            }
        }

        $answer->score = $request->score;
        $answer->update();


        return redirect()->to('/dashboard-aspect/' . $idQuestionPackage);
    }

    public function updateOtp(Request $request, $id)
    {
        $rules = [
            'otp' => 'required|between:6,6',
        ];

        $customMessage = [
            'otp.required' => 'Mohon isi inputan sebelum menyimpan',
            'otp.between' => 'Mohon isi inputan sebanyak 6 digit',
        ];

        $this->validate($request, $rules, $customMessage);

        $forgot_passwords = ForgotPassword::findOrFail($id);
        $forgot_passwords->otp = $request->otp;
        $forgot_passwords->flag = 2;
        $forgot_passwords->update();

        return redirect('/dashboard-forgot');
    }

    public function addOtp($id)
    {

        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $forgot_passwords = ForgotPassword::with('users')->findOrFail($id);
        return view('/add-otp', ['dataForgot' => $forgot_passwords, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function dashboardForgot()
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $forgot_passwords = ForgotPassword::with('users')->get();
        return view('/dashboard-forgot', ['dataForgot' => $forgot_passwords, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function dashboardUser()
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $user_accounts = User::with(['detail_payments' => function ($value) {
            $value->latest();
        }])->where('role_id', '=', 2)->get();
        return view('/dashboard-user', ['dataUser' => $user_accounts, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function dashboardAdmin()
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $admin_accounts = User::with(['detail_payments' => function ($value) {
            $value->latest();
        }])->where('role_id', '=', 1)->get();
        return view('/dashboard-admin', ['dataUser' => $admin_accounts, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function dashboardRequest()
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $registration_completed = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();

        $registration = Registration::with(['users', 'question_packages'])->get();
        return view('/dashboard-request', ['dataUser' => $registration, 'dataRegistrationCompleted' => $registration_completed, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function dashboardPurchased()
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $registration_completed = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();

        $registration = Registration::with(['users', 'question_packages'])->get();
        return view('/dashboard-purchased', ['dataUser' => $registration, 'dataRegistrationCompleted' => $registration_completed, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function dashboardTest()
    {

        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $registration_completed = Registration::where('flag_journey', '=', 'Siap Tes')->get();

        $registration = Registration::with('users', 'question_packages')->get();
        return view('/dashboard-test', ['dataRegistration' => $registration, 'dataRegistrationCompleted' => $registration_completed, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased,  'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function dashboardCompleted()
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $registration_completed = Registration::with('users')->where('flag_journey', '=', 'Selesai')->get();

        $registration = Registration::orderBy('updated_at', 'desc')->with('users', 'question_packages')->get();
        return view('/dashboard-completed', ['dataRegistration' => $registration, 'dataRegistrationCompleted' => $registration_completed, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function deleteDataDashboardCompleted($id)
    {
        $registration = Registration::findOrFail($id);
        return view('/delete-data-completed', ['dataRegistration' => $registration]);
    }

    public function deleteDataDashboardRequest($id)
    {
        $registration = Registration::findOrFail($id);
        return view('/delete-data-request', ['dataRegistration' => $registration]);
    }

    public function destroyDataDashboardRequest($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect('/dashboard-request');
    }

    public function deleteDataDashboardPurchased($id)
    {
        $registration = Registration::findOrFail($id);
        return view('/delete-data-purchased', ['dataRegistration' => $registration]);
    }

    public function destroyDataDashboardPurchased($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->delete();

        return redirect('/dashboard-purchased');
    }

    public function destroyDataCompleted($id)
    {
        $registration = Registration::findOrFail($id);

        $user_test_score = UserTestScore::where('id_registrations', '=', $id)->get();
        $user_test_data = UserTestData::where('id_registration', '=', $id)->get();

        $answer_history = AnswerHistory::where('id_registrations', '=', $id)->get();
        $aspect_history = AspectHistory::where('id_registrations', '=', $id)->get();
        $question_history = QuestionHistory::where('id_registrations', '=', $id)->get();
        $sub_aspect_history = SubAspectHistory::where('id_registrations', '=', $id)->get();

        $user_test_score->each->delete();
        $user_test_data->each->delete();
        $answer_history->each->delete();
        $aspect_history->each->delete();
        $question_history->each->delete();
        $sub_aspect_history->each->delete();

        $registration->delete();

        return redirect('/dashboard-completed');
    }

    // public function saveData($id)
    // {
    //     $aspect = new Aspect();
    //     $aspect->name = $request->name;
    //     $aspect->color = $request->color;
    //     $aspect->total_score = 0;
    //     $aspect->save();

    //     $registration = Registration::with('users', 'question_packages')->findOrFail($id);
    //     $user_test_data_history_where = UserTestDataHistory::where('id_registration', $id)->get();

    //     $user_test_data_history = new UserTestDataHistory();

    //     foreach($user_test_data_history as $data){
    //         $data->id_answers = $request->name;
    //     }

    //     return redirect('/dashboard-history');
    // }

    public function dashboardHistories($id)
    {
        $incrementIndex = 4;

        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $registration = Registration::with('users', 'question_packages')->findOrFail($id);
        // $aspect = Aspect::all();
        $aspect = AspectHistory::where('id_registrations', $id)->get();

        $question = Question::all();

        $question_history = QuestionHistory::where('id_registrations', $registration->id)->get();

        $answer_history = AnswerHistory::where('id_registrations', $registration->id)->get();

        $user_test_datas = UserTestData::with(['id_registration' => function ($value) use ($id) {
            $value->where('id_users', '=', $id);
        }])->where('id_registration', $id)->get();

        $user_test_score_max = UserTestScore::where('id_registrations', '=', $registration->id)->max('total_score');
        $user_test_score = UserTestScore::where([['total_score', '=', $user_test_score_max], ['id_registrations', '=', $registration->id]])->first();

        $user_test_score_all = UserTestScore::where('id_registrations', '=', $registration->id)->get();

        $sub_aspect = SubAspectHistory::where([['id_aspects', '=', $user_test_score->id_aspects], ['id_registrations', $id]])->get();

        return view('/dashboard-histories', ['dataIncrementIndex' => $incrementIndex, 'dataRegistration' => $registration, 'dataUserTestData' => $user_test_datas, 'dataAspect' => $aspect, 'dataQuestion' => $question,  'dataSubAspect' => $sub_aspect, 'dataUserTestScore' => $user_test_score, 'dataTestScoreAll' => $user_test_score_all, 'dataAnswerHistory' => $answer_history, 'dataQuestionHistory' => $question_history, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function dashboardSubAspect($id)
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $aspect = Aspect::findOrFail($id);
        $sub_aspect = SubAspect::all();
        return view('/dashboard-sub-aspect', ['dataAspect' => $aspect, 'dataSubAspect' => $sub_aspect, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function addDashboardSubAspect($id)
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $aspect = Aspect::findOrFail($id);
        return view('/add-sub-aspect', ['dataAspect' => $aspect, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function storeDashboardSubAspect(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
        ];

        $customMessage = [
            'name.required' => 'Mohon isi nama sub aspek sebelum menyimpan',
        ];

        $this->validate($request, $rules, $customMessage);

        $aspect = Aspect::findOrFail($id);

        $sub_aspect = new SubAspect();
        $sub_aspect->name = $request->name;
        $sub_aspect->id_aspects = $aspect->id;
        $sub_aspect->save();

        // $sub_aspect_history = new SubAspectHistory();
        // $sub_aspect_history->name = $request->name;
        // $sub_aspect_history->id_aspect_histoies = $aspect->id;
        // $sub_aspect_history->save();

        return redirect()->to('/dashboard-sub-aspect/' . $id);
    }

    public function editDashboardSubAspect($idSubAspect, $idAspect)
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $sub_aspect = SubAspect::findOrFail($idSubAspect);
        $aspect = Aspect::findOrFail($idAspect);

        return view('/edit-dashboard-sub-aspect', ['dataSubAspect' => $sub_aspect, 'dataAspect' => $aspect, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function updateDashboardSubAspect(Request $request, $idSubAspect, $idAspect)
    {
        $sub_aspect = SubAspect::findOrFail($idSubAspect);
        $sub_aspect->name = $request->name;
        $sub_aspect->update();

        return redirect()->to('/dashboard-sub-aspect/' . $idAspect);
    }

    public function deleteDashboardSubAspect($idSubAspect, $idAspect)
    {
        $sub_aspect = SubAspect::findOrFail($idSubAspect);
        $aspect = Aspect::findOrFail($idAspect);

        return view('/delete-sub-aspect', ['dataSubAspect' => $sub_aspect, 'dataAspect' => $aspect]);
    }

    public function destroyDashboardSubAspect($idSubAspect, $idAspect)
    {
        $sub_aspect = SubAspect::findOrFail($idSubAspect);
        $sub_aspect->delete();

        return redirect()->to('/dashboard-sub-aspect/' . $idAspect);
    }

    // public function storeDashboardSubAspect(Request $request)
    // {
    //     $sub_aspect = new SubAspect();
    //     $result_score = new ResultScore();
    //     $aspect = Aspect::all();

    //     $sub_aspect->name = $request->name;
    //     $sub_aspect->save();

    //     $inputs =  $request->input('rows');
    //     foreach ($inputs as $input) {
    //         ResultScore::create([
    //             'score_low' => $input['score_low'],
    //             'score_high' => $input['score_high'],
    //             'sub_babs' => $input['sub_babs'],
    //             'id_results' => $result->id,

    //         ]);
    //     }

    //     foreach ($sub_bab as $data) {
    //         $result_score->score_low = $request->score_low;
    //         $result_score->score_high = $request->score_high;
    //         $result_score->id_results = $result->id;
    //         $result_score->id_sub_babs = $data->id;
    //         $result_score->save();
    //     }

    //     return redirect('/dashboard-result');
    // }

    public function delete($id)
    {
        $registration = Registration::findOrFail($id);
        return view('/delete-data', ['dataUser' => $registration]);
    }

    public function destroy($id)
    {
        $destroyData = Registration::findOrFail($id);
        $destroyData->delete();

        return redirect('/dashboard-request');
    }

    public function edit($id)
    {
        $count_dashboard_request = Registration::where('flag_journey', '=', 'Konfirmasi Pembayaran')->get();
        $count_dashboard_purchased = Registration::where('flag_journey', '=', 'Pembayaran Berhasil')->get();
        $count_dashboard_test = Registration::where('flag_journey', '=', 'Siap Tes')->get();
        $count_dashboard_completed = Registration::where('flag_journey', '=', 'Selesai')->get();
        $count_dashboard_forgot = ForgotPassword::all();

        $registration = Registration::with(['users'])->findOrFail($id);
        return view('/dashboard-edit-data', ['dataUser' => $registration, 'countRequest' => $count_dashboard_request, 'countPurchased' => $count_dashboard_purchased, 'countTest' => $count_dashboard_test, 'countCompleted' => $count_dashboard_completed, 'countForgot' => $count_dashboard_forgot]);
    }

    public function update($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->flag_journey = 'Pembayaran Berhasil';
        $registration->update();
        return redirect('/dashboard-purchased');
    }

    public function generateConfirmation($id)
    {
        $registration = Registration::with(['users'])->findOrFail($id);
        return view('/generate-confirmation', ['dataUser' => $registration]);
    }

    public function updateGenerateInformation($id)
    {
        $registration = Registration::findOrFail($id);
        $registration->flag_journey = 'Siap Tes';
        $registration->update();
        return redirect('/dashboard-test');
    }
}
