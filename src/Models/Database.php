<?php

namespace Rpungello\Metabase\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;
use Phiki\Transformers\Meta;
use Rpungello\Metabase\Data\DatabaseMetadata;
use Rpungello\Metabase\Facades\Metabase;

class Database extends Model
{
    protected $table = 'metabase';

    protected $fillable = [
        'source_type',
        'source_id',
        'database_id',
        'schema_version',
    ];

    protected $casts = [
        'database_id' => 'integer',
        'schema_version' => 'integer',
    ];

    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function toData(): Database
    {
        return Metabase::getDatabase($this->database_id);
    }

    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function getMetadata(): DatabaseMetadata
    {
        return Metabase::getDatabaseMetadata($this->database_id);
    }

    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function getMetabaseTables(): Collection
    {
        return $this->getMetadata()->tables;
    }
}
