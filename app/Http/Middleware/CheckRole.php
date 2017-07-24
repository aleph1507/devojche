<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Product;
use App\Category;

class CheckRole
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
        if($request->user()->isadmin==1)
            return $next($request);
        else{
            Session::flash('warning', 'Не сте администратор на стрната');
            $categories = Category::all();
            $products = Product::all();
            return response()->view('auth.login');
        }
    }
}
