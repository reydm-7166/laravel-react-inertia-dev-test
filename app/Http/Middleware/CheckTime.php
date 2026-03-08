<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CheckTime
{
    /**
     * Filter incoming requests to allow only 9AM to 5OPM.
     *
     * @param Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $timeNow = Carbon::now();
        $start = Carbon::today()->setTime(9, 0); 
        $end   = Carbon::today()->setTime(17, 0);

        if ($timeNow->between($start, $end)) {
            return $next($request);
        }

        return abort(403, 'Access denied. You can only access this page between 9AM to 5PM.');
    }
}
