<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Answer;
use App\Models\Aspect;
// use App\Models\Result;
use App\Models\Helper;
use App\Models\Histori;
use App\Models\Question;
use App\Models\SubAspect;
use App\Models\Registration;
use App\Models\UserTestData;
use Illuminate\Http\Request;
use App\Models\AnswerHistory;
use App\Models\AspectHistory;
use App\Models\UserTestScore;
use App\Models\QuestionHistory;
use App\Models\QuestionPackage;
use App\Models\SubAspectHistory;
use App\Models\UserTestDataHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Support\Facades\Storage;

class TestSpaceController extends Controller
{


    public function updateValueHelperPrev($idReg)
    {

        Helper::where('id_registrations', '=', $idReg)->decrement('value', 1);

        return redirect()->to('/test-space/' . $idReg);
    }

    public function updateValueHelperNext(Request $request, $idQue, $idReg)
    {

        // $decrypt = Crypt::decrypt($idEncrypt);

        $registration = Registration::findOrFail($idReg);
        $data_score = Answer::where('id', '=', $request->id_answers)->first();

        $question = Question::where('id', $idQue)->first();

        if ($data_score != null) {
            $answer_histories = AnswerHistory::where([['name', $data_score->name], ['id_registrations', $idReg], ['name_question', $question->name]])->first();
        }

        $user_test_data_answers_id = UserTestData::select('id_answers', 'id_questions', 'id_registration')->get();
        $user_test_data_all_check_value = UserTestData::where([['id_questions', '=', $idQue], ['id_registration', '=', $idReg]])->count() > 0;


        if ($user_test_data_all_check_value) {
            foreach ($user_test_data_answers_id as $data) {
                if ($data->id_answers != $request->id_answers && $data->id_questions == $idQue && $data->id_registration == $registration->id) {
                    $user_test_data_answers_where = UserTestData::where([['id_questions', '=', $idQue], ['id_registration', '=', $idReg]]);
                    $user_test_data_answers_where->update([
                        'id_answers' => $request->id_answers,
                        'score' => $data_score->score,
                        'id_aspects' => $answer_histories->id_aspects,
                        'id_answer_histories' => $answer_histories->id,
                    ]);
                }
            }
        } else {
            $user_test_data = new UserTestData;

            $user_test_data->id_answers = $request->id_answers;
            $user_test_data->id_questions = $idQue;
            $user_test_data->id_registration = $registration->id;

            if ($data_score == null) {
                $user_test_data->id_answer_histories = 0;
                $user_test_data->score = 0;
                $user_test_data->id_aspects = 0;
                $user_test_data->save();
            } else {
                if ($data_score != null) {
                    $user_test_data->id_answer_histories = $answer_histories->id;

                    $user_test_data->score = $data_score->score;
                    $user_test_data->id_aspects = $answer_histories->id_aspects;
                    $user_test_data->save();
                }
                if ($user_test_data->score == 0) {
                    $user_test_data->score = $data_score->score;
                    $user_test_data->id_aspects = $answer_histories->id_aspects;
                    $user_test_data->update();
                }
            }

            // $user_test_scores = new UserTestScore;
            // if ($data_score == null) {
            //     $user_test_scores->total_score = 0;
            // } else {
            //     $user_test_scores->total_score = $data_score->score;
            //     $user_test_scores_where = UserTestScore::where([['id_aspects', '=', $data_score->id_aspects], ['id_registrations', '=', $registration->id]]);
            //     $user_test_scores_where_first = UserTestScore::where([['id_aspects', '=', $data_score->id_aspects], ['id_registrations', '=', $registration->id]])->select('total_score')->first();
            //     $aspect_where = Aspect::where('id', $data_score->id_aspects)->first();
            //     $user_test_scores_where->update([
            //         'total_score' => $data_score->score + $user_test_scores_where_first->total_score,
            //         'aspect_names' => $aspect_where->name,
            //         'aspect_total_scores' => $aspect_where->total_score,
            //         'aspect_colors' => $aspect_where->color,
            //         'id_question' => $question->id,
            //     ]);
            // }
        }


        // Helper::where('id_registrations', $registration->id)->first()->increment('value', 1);

        Helper::where('id_registrations', '=', $idReg)->increment('value', 1);


        return redirect()->to('/test-space/' . $idReg)->withInput();
    }

    public function doneValueHelperNext(Request $request, $idQue, $idReg)
    {
        $registration = Registration::findOrFail($idReg);
        $data_score = Answer::where('id', '=', $request->id_answers)->first();

        $question = Question::where('id', $idQue)->first();

        $registration->flag_journey = 'Selesai';
        $registration->flag_test = 3;
        $registration->updated_at = Carbon::now();
        $registration->update();

        $user_test_data_answers_id = UserTestData::select('id_answers', 'id_questions', 'id_registration')->get();
        $user_test_data_all_check_value = UserTestData::where([['id_questions', '=', $idQue], ['id_registration', '=', $idReg]])->count() > 0;

        if ($user_test_data_all_check_value) {
            foreach ($user_test_data_answers_id as $data) {
                if ($data->id_answers != $request->id_answers && $data->id_questions == $idQue && $data->id_registration == $registration->id) {
                    $user_test_data_answers_where = UserTestData::where([['id_questions', '=', $idQue], ['id_registration', '=', $idReg]]);
                    $user_test_data_answers_where->update([
                        'id_answers' => $request->id_answers,
                        'id_aspects' => $data_score->id_aspects,
                    ]);
                }
            }
        } else {
            $user_test_data = new UserTestData;
            $user_test_data->id_answers = $request->id_answers;
            $user_test_data->id_questions = $idQue;
            $user_test_data->id_registration = $registration->id;

            if ($data_score == null) {
                $user_test_data->id_answer_histories = 0;

                $user_test_data->score = 0;
                $user_test_data->id_aspects = 0;
                $user_test_data->save();
            } else {
                if ($data_score != null) {
                    $answer_histories = AnswerHistory::where([['name', $data_score->name], ['id_registrations', $idReg], ['name_question', $question->name]])->first();
                    $user_test_data->id_answer_histories = $answer_histories->id;

                    $user_test_data->score = $data_score->score;
                    $user_test_data->id_aspects = $answer_histories->id_aspects;
                    $user_test_data->save();
                }
                if ($user_test_data->score == 0) {
                    $user_test_data->score = $data_score->score;
                    $user_test_data->id_aspects = $answer_histories->id_aspects;
                    $user_test_data->update();
                }
            }
        }



        $user_test_scores_where = UserTestScore::where('id_registrations', $idReg)->get();
        $user_test_data_where = UserTestData::where('id_registration', $idReg)->get();


        foreach ($user_test_scores_where as $dataScore) {
            foreach ($user_test_data_where as $dataTest) {
                if ($dataScore->id_aspects == $dataTest->id_aspects) {
                    UserTestScore::where([['id_registrations', $idReg], ['id_aspects', $dataTest->id_aspects]])->first()->increment('total_score',  $dataTest->score);
                }
            }
        }

        return redirect()->route('result', $idReg)->withInput();
    }


    public function testSpace(Request $request, $id)
    {

        // $decrypt = Crypt::decrypt($idEncrypt);

        $registration = Registration::findOrFail($id);
        $registration->flag_test = 2;
        $registration->save();

        $helper_all = Helper::where('id_registrations', $id)->get();
        $count_helper_all = count($helper_all);

        if ($count_helper_all != 1) {
            $reset_helper = new Helper();
            $reset_helper->value = 0;
            $reset_helper->id_registrations = $id;
            $reset_helper->save();
        }

        $user_test_data_all_check = UserTestData::select('id_questions')->get();
        $user_test_data_all_check_value = $user_test_data_all_check->where('id_questions', '=', $id)->count() > 0;

        $findtime = Registration::where('id', '=', $id)->value('timer');
        $question_package = QuestionPackage::all();
        $helperPagination_all = Helper::where('id_registrations', $id)->first();
        $helperPagination = $helperPagination_all->value;

        $helperTopPagination = $helperPagination_all->value + 1;
        $userTestIdRegistration = UserTestData::where('id_registration', '=', $id)->get();
        $firstId = Question::select('id')->first();
        $lastQuestion = Question::orderBy('id', 'desc')->first();
        $allQuestion = Question::all();

        $allLala = Answer::with('user_test_datas')->get();

        // $question = Question::where('id', '=', $firstId->id + $helperPagination->value)->get();


        // $lala = Answer::with(['user_test_datas' => function ($value) use ($id) {
        //     $value->where('id_registration', '=', $id);
        // }])->where('id_question', '=', $firstId->id + $helperPagination->value)->get();
        $poke = UserTestData::where('id_registration', '=', $id)->get();
        // $answer = Answer::where('id_question', '=', $firstId->id + $helperPagination->value)->get();


        $answer_hitories_all = AnswerHistory::where('id_registrations', $id)->get();
        $answers = Answer::with('aspects')->get();
        $count_answer_hitories = count($answer_hitories_all);
        $count_answers = count($answers);

        $question_hitories_all = QuestionHistory::where('id_registrations', $id)->get();
        $question_all = Question::all();
        $count_question_histories = count($question_hitories_all);
        $count_question = count($question_all);

        $sub_aspect_histories_all = SubAspectHistory::where('id_registrations', $id)->get();
        $sub_aspect_all = SubAspect::all();
        $count_sub_aspect_histories = count($sub_aspect_histories_all);
        $count_sub_aspect = count($sub_aspect_all);

        $aspect_histories_all = AspectHistory::where('id_registrations', $id)->get();
        $aspect_all = Aspect::all();
        $count_aspect_histories = count($aspect_histories_all);
        $count_aspect = count($aspect_all);

        if ($count_aspect_histories != $count_aspect) {
            foreach ($aspect_all as $data) {
                $aspect_histories = new AspectHistory();

                $aspect_histories->name = $data->name;
                $aspect_histories->color = $data->color;
                $aspect_histories->total_score = $data->total_score;

                $aspect_histories->id_registrations = $registration->id;

                $aspect_histories->save();
            }
        }

        if ($count_question_histories != $count_question) {
            foreach ($question_all as $data) {
                $question_hitories = new QuestionHistory();

                $question_hitories->name = $data->name;
                $question_hitories->id_registrations = $registration->id;

                $question_hitories->save();
            }
        }

        if ($count_answer_hitories != $count_answers) {
            $aspect_histories_filled = AspectHistory::where('id_registrations', $id)->get();
            foreach ($answers as $data) {
                $answer_hitories = new AnswerHistory();

                foreach ($aspect_histories_filled as $dataAspHis) {
                    if ($dataAspHis->name == $data->aspects->name) {
                        $answer_hitories->id_aspects = $dataAspHis->id;
                    }
                }
                $answer_hitories->name = $data->name;
                $answer_hitories->score = $data->score;

                $answer_hitories->id_registrations = $registration->id;

                foreach ($question_all as $dataQue) {
                    if ($dataQue->id == $data->id_question) {
                        $answer_hitories->name_question = $dataQue->name;
                    }
                }

                $answer_hitories->save();
            }
        }

        if ($count_sub_aspect_histories != $count_sub_aspect) {
            foreach ($sub_aspect_all as $data) {
                $sub_aspect_history = new SubAspectHistory;
                $sub_aspect_history->name = $data->name;
                $sub_aspect_history->id_registrations = $registration->id;
                $aspect_where = Aspect::where('id', $data->id_aspects)->first();
                foreach ($aspect_histories_all as $data_aspect_histories_all) {
                    if ($aspect_where->name == $data_aspect_histories_all->name) {
                        $sub_aspect_history->id_aspects = $data_aspect_histories_all->id;
                        $sub_aspect_history->save();
                    }
                }
            }
        }

        $aspect_score = Aspect::all();
        $aspect_histories_score = AspectHistory::where('id_registrations', $id)->get();

        $user_test_score_where = UserTestScore::where('id_registrations', '=', $registration->id)->get();

        $count_aspect = count($aspect_score);
        $count_user_test_score_where = count($user_test_score_where);

        if ($count_aspect != $count_user_test_score_where) {
            foreach ($aspect_score as $data) {
                $user_test_score = new UserTestScore;

                foreach ($aspect_histories_score as $dataAsp) {
                    if ($dataAsp->name == $data->name) {
                        $user_test_score->id_aspects = $dataAsp->id;
                    }
                }

                $user_test_score->aspect_names = $data->name;
                $user_test_score->aspect_total_scores = $data->total_score;
                $user_test_score->aspect_colors = $data->color;

                $user_test_score->id_registrations = $registration->id;
                $user_test_score->total_score = 0;
                $user_test_score->save();
            }
        }


        return view('/test-space', ['dataFirstId' => $firstId, 'dataHelper' => $helperPagination, 'dataUserTestIdRegistration' => $userTestIdRegistration, 'dataLastQuestion' => $lastQuestion, 'dataQuestionPackage' => $question_package, 'time' => $findtime, 'dataAllQuestion' => $allQuestion, 'dataHelperTopPagination' => $helperTopPagination, 'dataRegistration' => $registration, 'dataPoke' => $poke, 'dataHelper' => $helperPagination, 'dataAllLala' => $allLala]);
    }

    public function testSpaceConfirmation()
    {
        // $registration = Registration::where('id_users', '=', Auth::user()->id)->first();

        // $user_test_score_max = UserTestScore::max('total_score');
        // $user_test_score = UserTestScore::with('sub_babs')->where([['total_score', '=', $user_test_score_max], ['id_registrations', '=', $registration->id]])->first();

        return view('/test-space-confirmation');
    }

    public function result($id)
    {

        $user_test_score_max = UserTestScore::where('id_registrations', '=', $id)->max('total_score');
        $user_test_score = UserTestScore::where([['total_score', '=', $user_test_score_max], ['id_registrations', '=', $id]])->first();
        $sub_aspect = SubAspectHistory::where('id_aspects', '=', $user_test_score->id_aspects)->get();

        return view('/result', ['dataUserTestScore' => $user_test_score, 'dataSubAspect' => $sub_aspect]);
    }

    public function resultTimeOut()
    {

        $registration_latest = Registration::where('id_users', '=', Auth::user()->id)->latest()->first();
        $user_test_score_max = UserTestScore::where('id_registrations', '=', $registration_latest->id)->max('total_score');
        $user_test_score = UserTestScore::with('aspects')->where([['total_score', '=', $user_test_score_max], ['id_registrations', '=', $registration_latest->id]])->first();
        $sub_aspect = SubAspectHistory::where('id_aspects', '=', $user_test_score->id_aspects)->get();

        $registration_latest->flag_journey = 'Selesai';
        $registration_latest->update();

        $user_test_scores_where = UserTestScore::where('id_registrations', $registration_latest->id)->get();
        $user_test_data_where = UserTestData::where('id_registration', $registration_latest->id)->get();


        foreach ($user_test_scores_where as $dataScore) {
            foreach ($user_test_data_where as $dataTest) {
                if ($dataScore->id_aspects == $dataTest->id_aspects) {
                    UserTestScore::where([['id_registrations', $registration_latest->id], ['id_aspects', $dataTest->id_aspects]])->first()->increment('total_score',  $dataTest->score);
                }
            }
        }

        return view('/result-timeout', ['dataUserTestScore' => $user_test_score, 'dataSubAspect' => $sub_aspect]);
    }

    public function testRules($id)
    {
        // $decrypt = Crypt::decrypt($id);
        $registration = Registration::findOrFail($id);

        return view('/test-rules', ['dataRegistration' => $registration]);
    }
}
