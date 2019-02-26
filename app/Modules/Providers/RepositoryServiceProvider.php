<?php

namespace App\Modules\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $models = [
            'Category', 'Page', 'Vacancy', 'Company', 'Users', 'Options', 'Employees', 'Jobs'
        ];
        foreach ($models as $model) {
            $this->app->bind('App\\Modules\\'.$model.'\\Repository\\I'.$model, 'App\\Modules\\'.$model.'\\Repository\\'.$model.'Repository');
        }
        //$this->app->bind(\App\Modules\CategoryNews\Repository\ICategoryNews::class, \App\Modules\CategoryNews\Repository\CategoryNewsRepository::class);
        $this->app->bind(\App\Modules\Posts\Repository\IPosts::class, \App\Modules\Posts\Repository\PostsRepository::class);
        $this->app->bind(\App\Modules\Users\Repository\IUser::class, \App\Modules\Users\Repository\UserRepository::class);
        //$this->app->bind(\App\Modules\Vacancy\Repository\IVacancy::class, \App\Modules\Vacancy\Repository\VacancyRepository::class);
    }
}
