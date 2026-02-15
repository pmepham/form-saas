<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\TenantManager;

class EnsureTenant
{
    public function handle(Request $request, Closure $next): Response
    {
        $tenant = app(TenantManager::class)->tenant();
        if (! $tenant) {
            abort(404); // or 403 depending on your preference
        }
        return $next($request);
    }
}
