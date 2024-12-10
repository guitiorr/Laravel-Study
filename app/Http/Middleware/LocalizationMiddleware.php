<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocalizationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Mengambil nilai locale dari session
        $locale = session('locale', config('app.locale'));

        // Mengatur locale aplikasi ke nilai yang didapat dari session.
        app()->setLocale($locale);

        //Melanjutkan request ke middleware
        return $next($request);
    }
}
