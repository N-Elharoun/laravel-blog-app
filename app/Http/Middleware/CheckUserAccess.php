<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserAccess
{
     public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated via token
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized: Invalid or missing token'], 401);
        }

        // Check if the user is active (optional, adjust as needed)
        if (isset($user->is_active) && !$user->is_active) {
            return response()->json(['error' => 'Forbidden: User is not active'], 403);
        }

        return $next($request);
    }
}