<?php

namespace App\Providers;

use App\Core\Services\UserService;
use App\Core\Services\UserServiceInterface;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrapFive();
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
        return (new MailMessage)
            ->subject('Подтвердите адрес электронной почты')
            ->line('Нажмите кнопку ниже, чтобы подтвердить свой адрес электронной почты.')
            ->action('Подтвердите адрес электронной почты', $url);
    });
    }
}
