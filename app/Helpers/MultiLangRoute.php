<?php

namespace App\Helpers;

class MultiLangRoute
{
    public static function getMultiLangRoute(string $routeName, array $routeParams = []): string
    {
        $lang = app()->getLocale();

        if ($lang !== config('app.fallback_locale')) {

            return rtrim('/' . $lang . route($routeName, $routeParams, false), '/');
        }

        return route($routeName, $routeParams, false) !== '/'
            ? rtrim(route($routeName, $routeParams, false), '/')
            : route($routeName, $routeParams, false);
    }
}
