<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $langs = ['ar', 'en', 'ku'];
        
        $local = $request->header('Accept-Language');
        $localization = in_array($local, $langs, true) ? $local : 'en';
        app()->setLocale($localization);
        return $next($request);
    }
}
