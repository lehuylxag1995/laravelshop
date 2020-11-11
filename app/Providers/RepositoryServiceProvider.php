<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Menu\MenuRepository;
use App\Repositories\Menu\MenuRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(MenuRepositoryInterface::class, MenuRepository::class);
    }
}
