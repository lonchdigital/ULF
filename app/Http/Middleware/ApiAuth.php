<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuth extends Middleware
{
    /**
     * Determine if the user is logged in to any of the given guards.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function authenticate($request, array $guards)
    {
        $token = $request->query('api_token') ?? $request->header('api_token');

        $username = $request->header('php-auth-user');
        $password = $request->header('php-auth-pw');

        if (empty($token)) {
            $token = $request->input('api_token');
        }

        if (empty($token)) {
            $token = $request->bearerToken();
        }

        $checkBearerToken = $token === config('api_auth.token');
        $checkBasicAuth = $username === config('api_auth.username') && $password === config('api_auth.password');

        if ($checkBearerToken || $checkBasicAuth) return;

        $this->unauthenticated($request, $guards);
    }
}
