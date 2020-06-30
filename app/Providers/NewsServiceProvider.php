<?php

namespace App\Providers;

use App\Services\News\AdminNewsService;
use App\Services\News\GuestNewsService;
use App\Services\News\UserNewsService;
use App\Support\Abstracts\NewsServiceInterface;
use App\Support\ACL\Roles;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class NewsServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Inject GuestNewsService by default
        $this->app->bind(NewsServiceInterface::class, function ($app) {
            return new GuestNewsService();
        });

        //When authenticated, replace with respective NewsService based on user's role
        Event::listen(Authenticated::class, function ($event) {
            $this->app->bind(NewsServiceInterface::class, function ($app) use ($event) {
                if ($event->user->hasRole(Roles::ADMIN))
                    return new AdminNewsService();
                else
                    return new UserNewsService();
            });

        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
