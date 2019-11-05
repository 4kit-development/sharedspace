<?php

namespace App\Jobs;

use App\Listing;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mailjet\LaravelMailjet\Facades\Mailjet;
use Mailjet\Resources;

class expiredListings implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $listing;

    /**
     * Create a new job instance.
     *
     * @param Listing $listing
     */
    public function __construct(Listing $listing)
    {
        $this->listing = $listing;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $mj = Mailjet::getClient();
        $body = [
            'FromEmail' => "jackson@sharedspace.co.nz",
            'FromName' => "SharedSpace.co.nz",
            'Subject' => "Your listing has expired.",
            'MJ-TemplateID' => '627111',
            'MJ-TemplateLanguage' => true,
            'Recipients' => [['Email' => "jackson@jsnightingale.com"]],
            'Vars' => [
                "Listing_id" => $this->listing->id,
                "Listing_title" => $this->listing->title,
                "Link" => 'https://sharedspace.co.nz'
            ]
        ];

        $response =  $mj->post(Resources::$Email, ['body' => $body]);
        $response->success() && var_dump($response->getData());
        if ($response->success()) {
            $this->listing->expiry_notification = 1;
            $this->listing->update();
        }
    }
}
