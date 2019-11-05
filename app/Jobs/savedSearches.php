<?php

namespace App\Jobs;

use App\Console\Commands\SavedSearch;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mailjet\LaravelMailjet\Facades\Mailjet;
use Mailjet\Resources;

class savedSearches implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $listings;

    /**
     * Create a new job instance.
     *
     * @param $titles
     * @param $listings
     */
    public function __construct($listings)
    {
        $this->listings = $listings;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dd($this->listings['items']);
        $mj = Mailjet::getClient();
        $body = [
            'FromEmail' => "jackson@sharedspace.co.nz",
            'FromName' => "SharedSpace.co.nz",
            'Subject' => "Look what we found.",
            'MJ-TemplateID' => '660823',
            'MJ-TemplateLanguage' => true,
            'Recipients' => [['Email' => "jackson@jsnightingale.com"]],
            'Vars' => [
                "Category_title" => $this->listings[0]->category->name,
                "Region_title" => $this->listings[0]->region->name,
                "District_title" => $this->listings[0]->district->name,
                "Suburb_title" => $this->listings[0]->suburb,
                "Keywords_searched" => $this->listings[0]->keyword,
                "items" => $this->listings,
            ]
        ];

        $response =  $mj->post(Resources::$Email, ['body' => $body]);
        $response->success() && var_dump($response->getData());
    }
}
