<?php

namespace App\Providers; 

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Province;
use App\District;
use App\Category;
use App\Level;
use App\Position;
use App\Time;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         View::share('PublicUrl', getenv('TEMPLATE_PUBLIC_URL'));
        View::share('AdminUrl', getenv('TEMPLATE_ADMIN_URL'));
        View::share('Provinces', Province::all());
        View::share('Districts', District::all());
        View::share('Levels', Level::all());
        View::share('Times', Time::all());
        View::share('Positions', Position::all());
        View::share('CategoryParents', Category::where('parent_id',0)->orderBy('name','ASC')->get());
        View::share('CategoryChilds', Category::where('parent_id','!=',0)->get());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
