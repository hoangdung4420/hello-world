<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class LimitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $level = (string)Auth::user()->level_id;
        $pos = strpos($role, $level);
        if($pos !== false){
            return $next($request);
        }else{
            return redirect()->route('admin.user.edit',Auth::user()->id);
        }
    }
}
