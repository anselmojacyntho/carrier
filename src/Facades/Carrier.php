<?php

namespace AnselmoJacyntho\Carrier\Facades;

use Illuminate\Support\Facades\Facade;

class Carrier extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'carrier';
    }
}
