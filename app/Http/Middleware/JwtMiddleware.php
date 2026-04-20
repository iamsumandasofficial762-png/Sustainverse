<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class JwtMiddleware
{
    public function handle($request, Closure $next)
    {
        $token = session('jwt_token') ?: $request->bearerToken();

        if (!$token) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'error' => [
                        'message' => 'Session expired. Please login again.',
                    ],
                ], 401);
            }

            return redirect()->route('login');
        }

        try {
            $user = JWTAuth::setToken($token)->authenticate();

            if (!$user) {
                throw new \RuntimeException('Unable to authenticate the current user.');
            }

            // Mark the current request as authenticated without mutating the
            // session on every request. Repeated Auth::login() calls can rotate
            // the session during AJAX uploads and cause the already-rendered
            // form CSRF token to become stale.
            Auth::setUser($user);

        } catch (\Exception $e) {
            Log::warning('JWT middleware authentication failed.', [
                'message' => $e->getMessage(),
                'path' => $request->path(),
            ]);

            session()->forget('jwt_token');

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'error' => [
                        'message' => 'Session expired. Please login again.',
                    ],
                ], 401);
            }

            return redirect()->route('login')
                ->with('error','Session expired. Please login again.');
        }

        return $next($request);
    }
}
