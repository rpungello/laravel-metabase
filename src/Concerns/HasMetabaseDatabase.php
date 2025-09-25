<?php

namespace Rpungello\Metabase\Concerns;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Rpungello\Metabase\Models\Database;

trait HasMetabaseDatabase
{
    public function metabase(): MorphOne
    {
        return $this->morphOne(Database::class, 'model');
    }
}
