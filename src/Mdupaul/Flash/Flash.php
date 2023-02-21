<?php namespace Mdupaul\Flash;

use Illuminate\Support\Facades\Facade;

class Flash extends Facade
{

    /**
     * Get the binding in the IoC container
     */
    protected static function getFacadeAccessor(): string
    {
        return 'flash';
    }
} 