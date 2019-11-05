<?php

namespace App\Console\Commands;

use App\Jobs\postExpiredListings;
use App\Listing;
use Carbon\Carbon;
use Illuminate\Console\Command;

class sendPostExpiredListings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:postExpiredListings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to users whos listings have expired 2 weeks ago.';

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
        $expiredListings = $this->getPostExpiredListings();

        foreach($expiredListings as $listing)
        {
            postExpiredListings::dispatch($listing)->onQueue('emails');
        }

        return true;
    }

    protected function getPostExpiredListings()
    {
        return Listing::expired()
            ->where('expired_at', '=', Carbon::now()->subDays(14)->format('Y-m-d 00:00:00'))
            ->get();
    }
}
