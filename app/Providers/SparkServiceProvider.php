<?php

namespace App\Providers;

use Carbon\Carbon;
use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Your Company',
        'product' => 'Your Product',
        'street' => 'PO Box 111',
        'location' => 'Your Town, NY 12345',
        'phone' => '555-555-5555',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = null;

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'jackson@jsnightingale.com'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
      Spark::afterLoginRedirectTo('/dashboard');

      Spark::useStripe()->noCardUpFront()->trialDays(10);
        Spark::freePlan()
            ->features([
                'First', 'Second', 'Third'
            ]);
        Spark::plan('Basic', 'provider-id-1')
            ->price(10)
            ->features([
                'First', 'Second', 'Third'
            ]);

            Spark::createUsersWith(function ($request) {
                $user = Spark::user();

                $data = $request->all();

                $user->forceFill([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'last_read_announcements_at' => Carbon::now(),
                    'trial_ends_at' => Carbon::now()->addDays(Spark::trialDays()),
                ])->save();

                return $user;
            });

            Spark::validateUsersWith(function () {
              return [
                  'name' => 'required|max:255',
                  'email' => 'required|email|max:255|unique:users',
                  'password' => 'required|confirmed|min:6',
                  'terms' => 'required|accepted'
              ];
            });
    }
}
