<?php

namespace Rpungello\Metabase\Models;

use Illuminate\Database\Eloquent\Model;

class Database extends Model
{
    protected $fillable = [
        'model_type',
        'model_id',
        'database_id',
        'schema_version',
    ];

    protected $casts = [
        'database_id' => 'integer',
        'schema_version' => 'integer',
    ];
}
