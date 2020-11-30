<?php

namespace App\Providers;

use App\FrontendCategoryModel;
use App\FrontendMenuModel;
use Illuminate\Support\Facades\View;
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
        $menus           =FrontendMenuModel::where('parent_id',0)->get();
        $categories           =FrontendCategoryModel::where('parent_id',0)->get();
        View::share('menus',$menus);
        View::share('categories',$categories);
    }
}
