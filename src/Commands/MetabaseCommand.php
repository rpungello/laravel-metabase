<?php

namespace Rpungello\Metabase\Commands;

use Illuminate\Console\Command;

class MetabaseCommand extends Command
{
    public $signature = 'laravel-metabase';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
