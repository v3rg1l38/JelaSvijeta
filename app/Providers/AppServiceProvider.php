<?php

namespace App\Providers;

use App\Models\Language;
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
        $languages = Language::all()->toArray();
        $locales = [];

        foreach($languages as $language) {
            $locales[] = $language['locale'];
        }

        config()->set('translatable.locales', $locales);
    }
}
