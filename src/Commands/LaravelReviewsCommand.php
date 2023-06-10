<?php

namespace Mbsoft31\LaravelReviews\Commands;

use Illuminate\Console\Command;

class LaravelReviewsCommand extends Command
{
    public $signature = 'laravel-reviews';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
