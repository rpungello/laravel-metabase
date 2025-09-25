<?php

namespace Rpungello\Metabase\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rpungello\Metabase\Metabase
 */
class Metabase extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Rpungello\Metabase\Metabase::class;
    }
}
