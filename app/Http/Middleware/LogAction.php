<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Log;
use Auth;

class LogAction
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
        $user = Auth::user();
        Log::create([
            'user' => $user,
            'action' => $request->fullUrl(),
        ]);

        return $next($request);
    }
}
