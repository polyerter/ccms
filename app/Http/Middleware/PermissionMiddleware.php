<?php

namespace App\Http\Middleware;

use Closure;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (!$request->user()->hasPermission($permission)) {
            $name = $request->user()->getPermissionDisplayName($permission);
            return abort(404)->with('error', 'Не достаточно прав! Для операции: "' . $name . '"');
        }
        return $next($request);
    }
}
