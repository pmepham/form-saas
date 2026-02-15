<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Services\TenantManager;

class IdentifyTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $tenant = Auth::user()->tenant;
            if (!$tenant) {
                throw new \RuntimeException('Tenant not set or user cannot access it.');
            }
            app(TenantManager::class)->setTenant($tenant);
        }

        return $next($request);
    }
}
