<?php

// app/Providers/GuzzleServiceProvider.php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class GuzzleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->instance(Client::class, new Client());
    }
}
