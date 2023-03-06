<?php

namespace App\Providers;

use App\Models\SocialMedia;
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
        // Using view composer to set following variables globally
        if(auth()->check()) {
            view()->composer('*',function($view) {
                $view->with('linkedin', SocialMedia::where('user_id', auth()>user()->id)->where('name', 'linkedin')->first());
                $view->with('facebook', SocialMedia::where('user_id', auth()>user()->id)->where('name', 'facebook')->first());
                $view->with('instagram', SocialMedia::where('user_id', auth()>user()->id)->where('name', 'instagram')->first());
                $view->with('github', SocialMedia::where('user_id', auth()>user()->id)->where('name', 'github')->first());
            });
        } else {
            view()->composer('*',function($view) {
                $view->with('linkedin', SocialMedia::where('user_id', 1)->where('name', 'linkedin')->first());
                $view->with('facebook', SocialMedia::where('user_id', 1)->where('name', 'facebook')->first());
                $view->with('instagram', SocialMedia::where('user_id', 1)->where('name', 'instagram')->first());
                $view->with('github', SocialMedia::where('user_id', 1)->where('name', 'github')->first());
            });
        }
    }
}
