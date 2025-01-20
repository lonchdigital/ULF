<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrimRouteSuffix
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->is('admin*')) {
            return $next($request);
        }

        $path = $request->path();
        $allowedSuffixes = [
            'index.php',
            'home.php5',
            'index.html',
            'home.html',
            'index.htm',
            'home.htm',
            'home',
            '*',
        ];

        foreach ($allowedSuffixes as $suffix) {
            if (str_ends_with($path, $suffix) ) {
                $path = rtrim($path, '/' . $suffix) . '/';

                if($path == '/') {
                    return redirect(config('app.url'), 301);
                }

                return redirect(config('app.url') . '/' . $path, 301);
            }
        }

        $segments = $request->segments();

        $lastSegment = end($segments);

        if (is_numeric($lastSegment)) {
            array_pop($segments);

            $newUrl = implode('/', $segments) . '/';

            return redirect(config('app.url') . '/' . $newUrl, 301);
        }

        return $next($request);
    }
}
