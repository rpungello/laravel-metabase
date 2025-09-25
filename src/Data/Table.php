<?php

namespace Rpungello\Metabase\Data;

use Illuminate\Support\Collection;
use Illuminate\Support\ItemNotFoundException;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class Table extends Data
{
    /**
     * @param  Collection<Field>  $fields
     */
    public function __construct(
        public string $name,
        public ?string $description,
        #[DataCollectionOf(Field::class)]
        public Collection $fields,
    ) {}

    /**
     * @throws ItemNotFoundException
     */
    public function getField(string $name): Field
    {
        return $this->fields->firstOrFail(fn (Field $field) => $field->name === $name);
    }
}
