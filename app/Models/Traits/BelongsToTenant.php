<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Services\TenantManager;

trait BelongsToTenant
{
    protected static function bootBelongsToTenant()
    {
        static::addGlobalScope('tenant', function (Builder $builder) {

            $tenant = app(TenantManager::class)->tenant();

            if ($tenant) {
                $builder->where(
                    $builder->getModel()->getTable().'.tenant_id',
                    $tenant->id
                );
            }
        });

        static::creating(function ($model) {

            $tenant = app(TenantManager::class)->tenant();

            if ($tenant && empty($model->tenant_id)) {
                $model->tenant_id = $tenant->id;
            }
        });
    }
}
