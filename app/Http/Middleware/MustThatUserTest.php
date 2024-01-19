<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MustThatUserTest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $registration = Registration::where('id', $request->id)->first();

        if ($registration->id_users == Auth::user()->id && $registration->flag_journey == 'Siap Tes') {
            return $next($request);
        } else {
            abort(404);
        }
    }
}
