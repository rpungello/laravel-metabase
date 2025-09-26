<?php

namespace Rpungello\Metabase\Data;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;
use Illuminate\Support\ItemNotFoundException;
use Rpungello\Metabase\Facades\Metabase;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class DatabaseMetadata extends Data
{
    /**
     * @param  Collection<int, Table>  $tables
     */
    public function __construct(
        public ?int $id,
        public array $features,
        public string $name,
        #[DataCollectionOf(Table::class)]
        public Collection $tables,
    ) {}

    /**
     * @throws ItemNotFoundException
     */
    public function getTable(string $name): Table
    {
        return $this->tables->firstOrFail(fn (Table $table) => $table->name === $name);
    }

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
