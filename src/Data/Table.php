<?php

namespace Rpungello\Metabase\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class Table extends Data
{
    /**
     * @param string $name
     * @param string|null $description
     * @param Field[] $fields
     */
    public function __construct(
        public string $name,
        public ?string $description,
        #[DataCollectionOf(Field::class)]
        public array $fields,
    ) {}
}
