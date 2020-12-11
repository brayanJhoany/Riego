<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rol;
class CheckRolAdmin
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
        $user= Auth::user();
        $roles=Rol::all();
        foreach ($roles as $role) {
            if($role->id == $user->rol_id and $role->nombre == 'Administrador'){
                return $next($request);
            }
        }
        return redirect('/campos');
    }
}
