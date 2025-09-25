<?php

namespace Rpungello\Metabase\Data;

use Spatie\LaravelData\Data;

class Field extends Data
{
    public function __construct(
        public string $name,
        public ?string $description,
        public string $database_type,
        public ?string $semantic_type,
        public ?string $coercion_strategy,
        public ?int $fk_target_field_id,
        public string $visibility_type,
        public string $display_name,
        public string $base_type,
    ) {}
}
