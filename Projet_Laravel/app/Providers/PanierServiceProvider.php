<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\PanierInterfaceRepository;
use App\Repositories\PanierSessionRepository;


class PanierServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        $this->app->bind(PanierInterfaceRepository::class, PanierSessionRepository::class);
    }

    
}
