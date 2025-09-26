<?php

namespace Rpungello\Metabase\Data;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Rpungello\Metabase\Facades\Metabase;
use Spatie\LaravelData\Data;

class Database extends Data
{
    public function __construct(
        public ?int $id,
        public string $name,
        public ?string $description,
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
