<?php

namespace App\Providers;

use App\Http\Controllers\News\INews;

use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\News\NewsRepo;
use Illuminate\Support\ServiceProvider;
use Auth;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        //This method will register the routes necessary to issue access tokens
        //and revoke access tokens, clients, and personal access tokens:
        Passport::routes();
        Passport::tokensExpireIn(now()->addDays(15));

        Passport::refreshTokensExpireIn(now()->addDays(30));

        // Passport::useClientModel(Client::class);
        // Passport::useTokenModel(TokenModel::class);
        // Passport::useAuthCodeModel(AuthCode::class);
        // Passport::usePersonalAccessClientModel(PersonalAccessClient::class);


        $page = '';
        view()->share('page', $page);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
