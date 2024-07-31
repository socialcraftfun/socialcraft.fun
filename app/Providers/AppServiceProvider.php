<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::share('name', 'SocialCraft');
        View::share('site_name', 'Градостроительный сервер • SocialCraft');

        View::share('title', 'Градостроительный сервер • SocialCraft');
        View::share('description', 'От маленьких шагов в игре - к большим в жизни');
        View::share('keywords', 'SocialCraft, minecraft сервер, развитие Minecraft, донат, server, gaming, multiplayer');

        View::share('author', 'Staff');
        View::share('thumbnail', '/img/featured.png');
    }
}
