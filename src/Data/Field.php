<?php

namespace Rpungello\Metabase\Data;

use Rpungello\Metabase\Enums\CoercionStrategy;
use Rpungello\Metabase\Enums\SemanticType;
use Rpungello\Metabase\Enums\Visibility;
use Spatie\LaravelData\Data;

class Field extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public ?string $description,
        public string $database_type,
        public ?SemanticType $semantic_type,
        public ?CoercionStrategy $coercion_strategy,
        public ?int $fk_target_field_id,
        public Visibility $visibility_type,
        public string $display_name,
        public string $base_type,
    ) {}
}
