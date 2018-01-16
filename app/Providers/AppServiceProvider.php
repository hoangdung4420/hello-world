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
use App\User;
use App\Job;
use App\About;
use Auth;
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
        View::share('Companies', User::where('level_id',3)->get());
        View::share('CategoryParents', Category::where('parent_id',0)->orderBy('name','ASC')->get());
        View::share('CategoryChilds', Category::where('parent_id','!=',0)->get());
        View::share('SumCompanies', User::where('level_id',3)->count());
        View::share('SumCandidates', User::where('level_id',4)->count());
        View::share('SumJobs', Job::count());
        $arAbout=About::all();
        foreach($arAbout as $ar){
            $artt[$ar->title] = $ar->detail;
          }
        View::share('arAbouts', $artt);
        if(Auth::check()){
            die();
                $oItem = Company::where('user_id',Auth::user()->id)->get();
                $id_hoso = $oItem[0]->id_company;
            }
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
