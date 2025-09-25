<?php

namespace Rpungello\Metabase\Data;

use Rpungello\Metabase\Enums\Display;
use Rpungello\Metabase\Enums\NumberSeparator;
use Spatie\LaravelData\Data;

class FieldSettings extends Data
{
    public function __construct(
        public ?NumberSeparator $number_separators,
        public ?Display $view_as
    ){}
}
