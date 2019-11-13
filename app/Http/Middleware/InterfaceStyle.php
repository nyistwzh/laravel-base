<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Http\Middleware;

use Closure;

class InterfaceStyle
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if ('java' == config('back-system.interface_style')) {
            if (isset($GLOBALS['error_handle'])) {
                $content         = $GLOBALS['error_handle'];
                $content['data'] = $content['data'] ?? [];

                return response()->json(json_encode($content));
            }

            return $response;
        }

        return $response;
    }
}
