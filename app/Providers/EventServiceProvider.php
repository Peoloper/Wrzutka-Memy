<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Mem;
use App\Observers\CommentObserver;
use App\Observers\MemObserver;
use App\Observers\UserObserver;
use App\Observers\CategoryObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Comment::observe(CommentObserver::class);
        Mem::observe(MemObserver::class);
        Category::observe(CategoryObserver::class);
    }
}
