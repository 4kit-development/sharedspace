<?php

namespace App\Console\Commands;

use App\Jobs\expiringListings;
use App\Listing;
use Carbon\Carbon;
use Illuminate\Console\Command;

class sendExpiringListings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:expiringListings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to users whos listings are going to expire in 7 days.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $expiringListings = $this->getExpiringListings();

        foreach($expiringListings as $listing)
        {
            expiringListings::dispatch($listing)->onQueue('emails');
        }

        return true;
    }

    protected function getExpiringListings()
    {
        return Listing::enabled()
            ->where('expired_at', '=', Carbon::now()->addDays(7)->format('Y-m-d 00:00:00'))
            ->get();
    }
}
