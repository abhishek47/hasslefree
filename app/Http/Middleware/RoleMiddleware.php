<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
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
          if($request->is('admin*')) {
            if(Auth::guest())
            {
                return redirect('/');
            }
            if (!$request->user()->hasRole('admin')) {
               return redirect('/');
            }
            
            if (!$request->user()->can('access_backend')) {
               return redirect('/');
            }
            
            
       }
       return $next($request);
    }   
}