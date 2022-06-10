<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class TurnSite
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

        $turnOff = DB::table("turn")->first();
        if ($turnOff->status) {
            return redirect('turn');
        }

        return $next($request);

    }
}
