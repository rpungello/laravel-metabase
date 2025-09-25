<?php

namespace Rpungello\Metabase\Data;

use Spatie\LaravelData\Data;

class Database extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public ?string $description,
        public array $features,
    ) {}
}
