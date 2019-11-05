<?php

namespace App\Console\Commands;

use App\Jobs\expiredListings;
use App\Listing;
use Carbon\Carbon;
use Illuminate\Console\Command;

class sendExpiredListings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:expiredListings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to users whos listings have expired today.';

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
        $expiredListings = $this->getExpiredListings();

        foreach($expiredListings as $listing)
        {
            expiredListings::dispatch($listing)->onQueue('emails');
        }

        return true;
    }

    protected function getExpiredListings()
    {
        return Listing::enabled()
            ->where('expiry_notification', '=', 0)
            ->where('expired_at', '=', Carbon::now()->format('Y-m-d 00:00:00'))
            ->get();
    }
}
