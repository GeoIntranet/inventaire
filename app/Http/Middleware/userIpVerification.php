<?php

namespace App\Http\Middleware;


use App\User;
use Closure;

class userIpVerification
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
        $user = User::where('ip',$_SERVER['REMOTE_ADDR'])->get();
        $countedUser = $user->count();
        if ($countedUser !== 1) {
            abort('404');
        }
        $request->session()->put('user', $user);
        return $next($request);
    }
}
