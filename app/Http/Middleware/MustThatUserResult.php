<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MustThatUserResult
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $registration = Registration::where('id', $request->id)->first();

        if ($registration != null) {
            if ($registration->id_users == Auth::user()->id && $registration->flag_journey == 'Selesai') {
                return $next($request);
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
    }
}
