<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facases\Session;

class UserShouldVerifed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //return $next($request);
        $response = $next($request);
        if (Auth::check() && !Auth::user()->is_verifed) {
            Auth::logout();

            Session::flash("flash_notification", [
                "level" => "warning",
                "message" => "Akun Anda Belum aktif. Silahkan klik pada link aktivasi yang telah kami kirim"
                ]);
            return redirect('/login');
        }
        return $response;
    }
}
