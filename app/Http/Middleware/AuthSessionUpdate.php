<?php

namespace App\Http\Middleware;

use App\Models\UserAuthToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthSessionUpdate
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        if(auth()->check()) {
//            (new UserAuthToken())->updateByUserId(auth()->id(), [
//                'token_expiry' => getSessionLifeTime()
//            ]);
//        }
        return $next($request);
    }
}
