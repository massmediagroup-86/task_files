<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SaveUserFile;
use App\Contracts\SaveUserFileContract;

class SaveUserFileServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            SaveUserFileContract::class,
            SaveUserFile::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
