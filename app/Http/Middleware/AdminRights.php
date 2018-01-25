<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminRights
{
    public function handle($request, Closure $next)
    {
    	if (Auth::user() != null)
		{
			if (Auth::check())
			{
				if (Auth::user()->hasAdminRights())
				{
					return $next($request);
				}
			}
		}

		return redirect('/errors/500');
    }
}
