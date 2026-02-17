<?php

namespace App\Providers;

use App\Models\ContactUs;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.partials.footer', function ($view) {

            $contact_data = ContactUs::first();
            $phone_numbers = $contact_data->telephone;
            $phone_numbers_array = explode( ",", $phone_numbers);

            $emails = $contact_data->email;
            $emails_array = explode( ",", $emails);

            $facebook = $contact_data->facebook;
            $twitter = $contact_data->twitter;
            $instagram = $contact_data->instagram;
            $linkedin = $contact_data->linkedin;


            $view->with([
                'phones'    => $phone_numbers_array,
                'emails'    => $emails_array,
                'facebook'  => $facebook,
                'twitter'   => $twitter,
                'instagram' => $instagram,
                'linkedin'  => $linkedin,

            ]);
        });
    }
}
