<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check())
            return redirect('login');

        $user = Auth::user();
        $roles = $user->roles->pluck('name');
        
        foreach ($roles as $rol){
            if($rol == 'Administrator' || $rol == 'Minister' || $rol == 'Operator')
                return $next($request);
        }
        return redirect()->route('index')->with('info','¡Lo sentimos! No tiene los permisos suficientes para acceder');
    }
}