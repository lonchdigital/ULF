<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);
        
        app()->setLocale($locale);
        session()->put('locale', $locale);

        \URL::defaults(['lang' => $locale]);

        $request->route()->forgetParameter('lang');

        if (auth()->user()) {
            auth()->user()->update([
                'language' => $locale
            ]);
        }

        return $next($request);
    }
}
