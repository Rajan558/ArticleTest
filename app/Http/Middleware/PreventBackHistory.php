<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class PreventBackHistory
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
        $response = $next($request);
        if (!Session::has('UserId'))
        {
            return redirect('/');
        }
        else
        {
            return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','Sat, 26 Jul 1997 05:00:00 GMT');
        }
        // $response = $next($request);
        // return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
        //         ->header('Pragma','no-cache')
        //         ->header('Expires','Sat, 26 Jul 1997 05:00:00 GMT');
        //return $next($request);
    }
}
