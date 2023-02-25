<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Models\ManagementAccess\Role;
use App\Models\User;


class AuthGates
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = \Auth::user(); // Get all user data by session

        // Check validation middleware
        // System on or off
        // User active or not
        if(!app()->runningInConsole() && $user) {
            
            $roles = Role::with('permission')->get();
            $permissionArray = [];

            // Looping for each role
            foreach($roles as $role) {
                
                // Nested looping for validation foreach role permissions
                foreach($role->permissions as $permission) {

                $permissionArray[$permission->title][] = $role->id;
                };
            }
        }
        return $next($request);
    }
}
