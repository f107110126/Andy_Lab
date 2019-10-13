<?php

namespace App\Http\Middleware;

use App\AuthAndPermission\Role;
use Closure;

class RoleAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // get user role permissions
        $role = auth()->user()->role->first();
        if ($role === null) abort(404);
        $permissions = $role->permissions;

        // get requested action
        $actionName = class_basename($request->route()->getActionName());

        // check if requested action is in permissions list
        foreach ($permissions as $permission) {
            $_namespaces_chunks = explode('\\', $permission->controller);
            $controller = end($_namespaces_chunks);
            if ($actionName == $controller . '@' . $permission->method):
                // authorized request
                return $next($request);
            endif;
        }

        // none authorized request
        return response('Unauthorized Action', 403);

        // return $next($request);
    }
}
