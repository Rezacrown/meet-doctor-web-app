<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // cek dulu apakah request session, dll masih sesuai dan tidak expire jika terjadi kesalahan dalam request maka akan langsung divalidasi dan di redirect
        if (!$request->expectsJson()) {
            return route('login');
        }

        // redirect to homepage after login / setelah request aman akan di redirect kemana
        return redirect()->route('index');

    }
}
