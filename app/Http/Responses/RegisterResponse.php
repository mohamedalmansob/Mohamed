<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->wantsJson()) {
            return new JsonResponse([
                'message' => 'تم إنشاء حسابك. يرجى تأكيد بريدك الإلكتروني قبل تسجيل الدخول.',
            ], 201);
        }

        return redirect()->route('registration.notice');
    }
}
