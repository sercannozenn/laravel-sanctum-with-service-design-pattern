<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Laravel\Sanctum\PersonalAccessToken;

class sanctumPruneCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yazilim:sanctum_prune';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        PersonalAccessToken::query()
            ->where("last_used_at", "<=" , now()->subMinutes(config("sanctum.expiration")))
            ->delete();

        $this->info("İşlem tamamlanmıştır");
    }
}
