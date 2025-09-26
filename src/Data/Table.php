<?php

namespace Rpungello\Metabase\Data;

use Closure;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ItemNotFoundException;
use Rpungello\Metabase\Facades\Metabase;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class Table extends Data
{
    /**
     * @param  Collection<int, Field>  $fields
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

    /**
     * @param  Closure(Field $field): void  $callback
     *
     * @throws RequestException
     * @throws ConnectionException
     * @throws ItemNotFoundException
     */
    public function updateField(string $name, Closure $callback, bool $throwOnMissing = false): self
    {
        try {
            $field = $this->getField($name);
            $callback($field);
            Metabase::updateField($field);
        } catch (ItemNotFoundException $e) {
            if ($throwOnMissing) {
                throw $e;
            } else {
                Log::warning("Unable to update missing Metabase field $name on $this->name");
            }
        }

        return $this;
    }
}
