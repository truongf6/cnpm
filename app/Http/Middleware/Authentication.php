<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Authentication
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
        if (!$request->cookie('userid')) {
            return redirect()->route('client.login.index')
                    ->with('msg', 'Yêu cầu đăng nhập để sử dụng chức năng này.')
                    ->with('type', 'Error');
        }

        return $next($request);
    }
}
