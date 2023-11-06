<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyAdminCanAccess
{
    /**
     * * Handle an incoming request.
     * @param Request $request
     * @param Closure $next
     * @return Response
     * @throws Exception
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $userWithAccess = Role::where('id', $user->role_id)->whereIn('name', ['super_admin', 'admin'])->first();
        if(!$userWithAccess){
            return redirect()->back()->withErrors('msg', 'Sorry access not allowed');
        }
        return $next($request);
    }
}
