<?php

namespace App\Http\Responses;

use Illuminate\Http\RedirectResponse;
use Laravel\Fortify\Contracts\VerifyEmailViewResponse as VerifyEmailViewResponseContract;

class VerifyEmailViewResponse implements VerifyEmailViewResponseContract
{
    public function toResponse($request): RedirectResponse
    {
        return redirect()->route('registration.notice');
    }
}
