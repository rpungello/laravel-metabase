<?php

namespace Rpungello\Metabase\Data;

use Illuminate\Support\Collection;
use Illuminate\Support\ItemNotFoundException;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;

class DatabaseMetadata extends Data
{
    /**
     * @param  Collection<Table>  $tables
     */
    public function __construct(
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
}
