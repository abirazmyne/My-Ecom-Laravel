<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Customer;
use Session;
use Illuminate\Support\ServiceProvider;

use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['website.master'], function ($view){
           $view->with([
               'categories'=> Category::all(),
               'customer' =>  Customer::find(Session::get('customer_id')),
                   ]);
        });
    }
}
