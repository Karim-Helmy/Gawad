<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard)
    {
        //dd(request()->header());

        if ($request->authorization) {

            $request->offsetSet('authorization', $request->authorization);

        } elseif (request()->header('authorization') != null) {

            $request->offsetSet('authorization', request()->header('authorization'));

        } else {

            return response()->json([
                'status' => 401,
                'message' => trans("admin.token_needed"),
            ]);
        }

        if (auth()->guard($guard)->check()) {
            return $next($request);
        }

        return response()->json([
            'status' => 404,
            'message' => trans("admin.must_login"),
        ]);

    }


}
