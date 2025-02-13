<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectToCanonical
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $url = $request->getRequestUri();

        if (!$request->isMethod('GET')) {
            return $next($request);
        }

        if ($request->header('X-Livewire')) {
            return $next($request);
        }

        // Отримання розширення файлу
        $extension = pathinfo($request->path(), PATHINFO_EXTENSION);

        $excludedExtensions = [
            'xml', 'json', 'png', 'jpg', 'jpeg', 'gif', 'bmp',
            'ico', 'tiff', 'webp', 'svg', 'css', 'js', 'woff',
            'woff2', 'eot', 'ttf', 'otf', 'mp3', 'wav', 'mp4',
            'avi', 'mov', 'ogg', 'ogv', 'webm', 'pdf', 'doc',
            'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'zip', 'rar',
            '7z', 'tar', 'gz', 'exe', 'dll', 'bat', 'sh',
        ];

        // Перевірка, чи розширення файлу не входить в масив виключених
        if (!in_array($extension, $excludedExtensions)) {
            $url = request()->getSchemeAndHttpHost() . $_SERVER['REQUEST_URI'];

            if($_SERVER['REQUEST_URI'] == '/') {
                $url = rtrim($url, '/');
            }

            $fUrl = trim(str_replace(':/', '://', trim(preg_replace('/\/+/', '/', $url), '/')));

            if (empty($request->query())) {
                $fUrl = rtrim($fUrl, '/');
            }

            if ($fUrl !== $url) {
                return redirect($fUrl, 301);
            }
        }

        return $next($request);
    }
}
