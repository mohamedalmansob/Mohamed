<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;

class EmailVerificationController extends Controller
{
    public function verify(Request $request, int $id, string $hash)
    {
        $user = User::findOrFail($id);

        // التحقق من تطابق بصمة البريد الإلكتروني
        if (! hash_equals(sha1($user->getEmailForVerification()), $hash)) {
            abort(403, 'رابط التحقق غير صالح.');
        }

        // التأكد من أن البريد لم يتم تغييره أو تأكيده سابقاً
        if (! $user->hasVerifiedEmail()) {
            if ($user->markEmailAsVerified()) {
                event(new Verified($user));
            }
        }

        return redirect()
            ->route('login')
            ->with('status', 'تم تأكيد بريدك الإلكتروني بنجاح. يمكنك الآن تسجيل الدخول إلى منصة مسبار.');
    }
}
