<?php

namespace Curicows\LaravelSeederManager;

use Illuminate\Support\Facades\Facade;

/**
 * @see LaravelSeederManager
 */
class LaravelSeederManagerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-seeder-manager';
    }
}
