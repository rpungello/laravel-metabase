<?php

namespace Rpungello\Metabase\Data;

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

    public function syncSchema(): bool
    {
        return Metabase::syncSchema($this->id);
    }

    public function scanValues(): bool
    {
        return Metabase::scanValues($this->id);
    }
}
