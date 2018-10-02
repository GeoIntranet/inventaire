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

        if ($request->session()->has('user')) {
            if($request->session()->get('user')->ip == $_SERVER['REMOTE_ADDR']){
                return $next($request);
            }
            $request->session()->forget('user');
        }
        else {
            $user = User::where('ip',$_SERVER['REMOTE_ADDR'])->with('settings')->get();
            $countedUser = $user->count();
            if($countedUser === 1){
                $request->session()->put('user', $user->first());
                $request->session()->put('setting', $user->first()->settings);
                return $next($request);
            }
        }
        abort('404');
    }
}
