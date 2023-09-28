<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Modules\ImageUpload\CloudinaryImageManager;
use App\Modules\ImageUpload\ImageManagerInterface;
use App\Modules\ImageUpload\LocalImageManager;
use Illuminate\Support\ServiceProvider;
use Cloudinary\Cloudinary;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
{
}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        if(config('app.env')==='production'){
            \URL::forceScheme('https');
        }
    }

}
