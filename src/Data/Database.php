<?php

namespace Rpungello\Metabase\Data;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Rpungello\Metabase\Enums\Engine;
use Rpungello\Metabase\Facades\Metabase;
use Spatie\LaravelData\Data;

class Database extends Data
{
    public function __construct(
        public string $name,
        public Engine $engine,
        public Connection $details,
        public ?string $description = null,
        public ?int $id = null,
        public array $features = [],
    ) {}

    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function syncSchema(): bool
    {
        return Metabase::syncSchema($this->id);
    }

    /**
     * @throws RequestException
     * @throws ConnectionException
     */
    public function scanValues(): bool
    {
        return Metabase::scanValues($this->id);
    }
}
