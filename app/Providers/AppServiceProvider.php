<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }
        VerifyEmail::createUrlUsing(function ($notifiable) {
            return URL::temporarySignedRoute(
                'misbar.verification.verify',
                now()->addMinutes(config('auth.verification.expire', 60)),
                [
                    'id' => $notifiable->getKey(),
                    'hash' => sha1($notifiable->getEmailForVerification()),
                ]
            );
        });

        VerifyEmail::toMailUsing(function ($notifiable, string $url) {
            return (new MailMessage)
                ->subject('تأكيد بريدك الإلكتروني - منصة مسبار')
                ->view('emails.verify-email', [
                    'userName' => $notifiable->name,
                    'verificationUrl' => $url,
                ]);
        });
    }
}
