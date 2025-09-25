<?php

namespace Rpungello\Metabase\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class DatabaseMetadata extends Data
{
    /**
     * @param array $features
     * @param string $name
     * @param Table[] $tables
     */
    public function __construct(
        public array $features,
        public string $name,
        #[DataCollectionOf(Table::class)]
        public array $tables,
    ) {}
}
