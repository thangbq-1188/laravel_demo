<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
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
        $this->composeSidebarCategory();
    }

    private function composeSidebarCategory() {
        view()->composer('layouts.app', function($view) {
            $view->with('sidebarCategories', Category::all());
        });
    }
}
