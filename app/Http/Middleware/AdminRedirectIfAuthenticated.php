<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class AdminRedirectIfAuthenticated {
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */

    public function handle( $request, Closure $next, $guard = null ) {
        if ( $guard == 'admin' && Auth::guard( $guard )->check() ) {
            return redirect( '/admin' );
        }
        if ( Auth::guard( $guard )->check() ) {
            return redirect( '/home' );
        }

        return $next( $request );
    }
}
