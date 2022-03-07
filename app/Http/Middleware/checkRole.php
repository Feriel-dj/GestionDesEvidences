<?php

namespace App\Http\Middleware;

use App\Models\UserPermission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
       if($role == 'admin' && auth()->user()->role_id != 'admin'){
            abort(403);
        }
        if($role == 'Enquêteur' && auth()->user()->role_id != 'Enquêteur'){
            abort(403);
        }
        if($role == 'Avocat' && auth()->user()->role_id != 'Avocat'){
            abort(403);
        }
        return $next($request);

        try {
            $userRole = auth()->user()->role_id;
            $currentRouteName = Route::currentRouteName();

            if (UserPermission::isRoleHasRightToAccess($userRole, $currentRouteName)
                || in_array($currentRouteName, $this->defaultUserAccessRole()[$userRole])) {
                return $next($request);
            } else {
                abort(403, 'Action non autorisée.');
            }
        } catch (\Throwable $th) {
            abort(403, 'Action non autorisée.');
        }
    }


private function defaultUserAccessRole()
{
    return [
       
        'admin' => [
             'user-permissions',
        ],
    ];
}
}