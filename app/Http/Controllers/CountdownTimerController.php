<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountdownTimer;
use App\Models\QuestionPackage;

class CountdownTimerController extends Controller
{
    public function create()
    {
        return view('/create-timer');
    }

    public function update(Request $request)
    {
        $timer_id = '1';
        $timer = CountdownTimer::findOrNew($timer_id);
        $timer->launch_date = $request->date_time;
        $timer->status = $request->timer_status;
        $timer->save();
        dd('Timer has been updated successfully!');
    }

    public function view()
    {
        $findtime = QuestionPackage::where('id', 1)->value('end_timer');
        return view('/view-timer', ['time' => $findtime]);
    }
}
