<?php

namespace Rpungello\Metabase\Data;

use Spatie\LaravelData\Data;

class Connection extends Data
{
    public function __construct(
        public ?string $host = null,
        public ?int $port = null,
        public ?string $dbname = null,
        public ?string $user = null,
        public ?string $password = null
    ) {}
}
