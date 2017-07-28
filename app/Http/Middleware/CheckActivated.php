<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckActivated
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
        if(Auth::check())
            if(Auth::user()->seller->aktiviran == 0){
                Session::flash('warning', 'Вашиот продавачки статус мора да биде потврден од администратор.');
                return response('/');
            }
        return $next($request);
    }
}
