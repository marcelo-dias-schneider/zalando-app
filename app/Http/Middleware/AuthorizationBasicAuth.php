<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\AuthorizationBasicAuth as AuthorizationBasicAuthModel;

class AuthorizationBasicAuth
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
        $basic_auth = $request->header('authorization');
        $app = AuthorizationBasicAuthModel::firstWhere('basic', $basic_auth);
        if (isset($app->basic)) {
            $request->attributes->add(['basic_auth_id' => $app['id']]);
            return $next($request);
        } else {
            return response()->json([
                "errors" => "[API] Invalid Username provided for Basic Auth API access"
            ], 401);
        }
    }
}
