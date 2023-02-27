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
        $user = \Auth::user(); // Get all user data from current session

        // Check validation middleware
        // System on or off
        // User active or not
        if(!app()->runningInConsole() && $user) {
            
            $roles = Role::with('permission')->get();
            $permissionsArray = [];

            // Looping for each role
            foreach($roles as $role) {
                
                // Nested looping for validation foreach role permissions
                foreach($role->permission as $permission) {

                $permissionsArray[$permissions->title][] = $role->id;
                };
            }

            /* Check if user has any permission, 
            if user has no permissions, Gate will not showing some menu access in Index */
            foreach($permissionsArray as $title => $roles) {
                Gate::define($title, function(\App\Models\User  $user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        }

        // Return all middlware from those foreach
        return $next($request);
    }
}