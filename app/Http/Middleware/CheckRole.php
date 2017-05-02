<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;

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
        if ($request->user() === null){
            return response()->view('errors.401', [], 401);
        }
        $action = $request->route()->getAction();
        $roles = isset($action['roles']) ? $action['roles'] : null;

        if($request->user()->hasRoles(Role::whereIn('name',$roles)->get()) || !$roles){
            return $next($request);
        }
        return response()->view('errors.401',[],401);
    }
}
