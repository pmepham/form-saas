<?php

namespace App\Services;

use App\Models\Tenant;

class TenantManager
{
    protected ?Tenant $tenant = null;

    public function setTenant(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    public function tenant(): ?Tenant
    {
        return $this->tenant;
    }
}
