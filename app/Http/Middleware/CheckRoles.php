<?php

namespace KazEDU\Http\Middleware;

use Closure;

class CheckRoles
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
        // Check roles: admin or student
        if ($request->roles_user == 'Admin') {
            return redirect('admin.home');
        } elseif ($request->roles_user == 'Student') {
            return redirect('student.home');
        }

        return $next($request);
    }
}
