<?php

namespace Rpungello\Metabase\Data;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class Table extends Data
{
    public function __construct(
        public string $name,
        public ?string $description,
        #[DataCollectionOf(Field::class)]
        public array $fields,
    ){}
}
