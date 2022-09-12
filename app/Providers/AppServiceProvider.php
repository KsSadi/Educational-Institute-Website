<?php

namespace App\Providers;

use App\Models\GlobalSetting;
use App\Models\Translate;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        if(Schema::hasTable('global_settings')){

            if(GlobalSetting::first()==null)
            {
                $setting=new GlobalSetting();
                $setting->save();
            }
            View::share('global', GlobalSetting::first());
        }
        if(Schema::hasTable('translates')){

            if(Translate::first()==null)
            {
                $setting=new GlobalSetting();
                $setting->save();
            }
            View::share('translate', Translate::first());
        }

    }
}
