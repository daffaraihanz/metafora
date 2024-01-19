<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function lpAfterIndex()
    {
        return view('/landing-page-after');
    }

    public function lpBeforeIndex()
    {
        return view('/landing-page');
    }
}
