<?php

namespace App\Http\Middleware;

use Closure;

class adminMiddleware
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
        if(isset($_SESSION['Admin'])){
            if($_SESSION['Admin'] == $_SERVER['REMOTE_ADDR'].'passwordHash'.password()){
                return $next($request);
            }
            else{
                unset($_SESSION['Admin']);
                return redirect('/');
            }
        }
        return redirect('/');
    }
}
