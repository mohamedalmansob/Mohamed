
@extends('layouts.app')

@section('content')
<section id="view-login" class="auth-pattern min-h-screen flex items-center justify-center p-4 lg:p-8">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-2xl p-8 lg:p-10 border border-slate-200/20">

        <!-- شعار مسبار المصغر -->
        <div class="flex flex-col items-center text-center mb-6">
            <div class="w-20 h-20 rounded-full p-1 bg-gradient-to-tr from-[#0A1E46] via-[#0088FF] to-[#FF7A00] shadow-lg mb-3">
                <div class="w-full h-full bg-white rounded-full flex items-center justify-center">
                    <svg viewBox="0 0 120 120" class="w-14 h-14">
                        <path d="M 28 50 A 35 35 0 0 1 85 32" fill="none" stroke="#0EA5E9" stroke-width="4" stroke-linecap="round"/>
                        <rect x="42" y="62" width="7" height="15" rx="2" fill="#6E2CF2"/>
                        <rect x="53" y="54" width="7" height="23" rx="2" fill="#0A1E46"/>
                        <rect x="64" y="45" width="7" height="32" rx="2" fill="#0088FF"/>
                        <line x1="45" y1="52" x2="94" y2="26" stroke="#FF7A00" stroke-width="4" stroke-linecap="round"/>
                        <circle cx="95" cy="25" r="6" fill="#FF7A00"/>
                    </svg>
                </div>
            </div>

            <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full mb-2">
                الخطوة 2 من 2 • بوابة الدخول
            </span>

            <h2 class="text-2xl font-extrabold text-misbar-navy">
                مرحباً بعودتك إلى مسبار
            </h2>

            <p class="text-xs text-slate-500 mt-1">
                سجّل الدخول للوصول إلى مساحة عمل
                <strong class="text-floria-rose">فلوريا | Floria</strong>
            </p>
        </div>

        <!-- نموذج تسجيل الدخول الحقيقي -->
        <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
            @csrf

            <!-- البريد الإلكتروني -->
            <div>
                <label for="login-email" class="block text-xs font-bold text-slate-700 mb-1.5">
                    البريد الإلكتروني
                </label>

                <div class="relative">
                    <i class="fa-regular fa-envelope absolute right-3.5 top-3 text-slate-400 text-sm"></i>

                    <input
                        id="login-email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        dir="ltr"
                        class="w-full pr-10 pl-3 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:border-sky-500"
                    >
                </div>

                @error('email')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- كلمة المرور -->
            <div>
                <div class="flex justify-between items-center mb-1.5">
                    <label for="login-password" class="block text-xs font-bold text-slate-700">
                        كلمة المرور
                    </label>

                    <button
                        type="button"
                        onclick="showToast('استعادة كلمة المرور غير مفعّلة حالياً')"
                        class="text-[11px] text-sky-600 cursor-pointer hover:underline bg-transparent border-0 p-0"
                    >
                        نسيت كلمة المرور؟
                    </button>
                </div>

                <div class="relative">
                    <i class="fa-solid fa-lock absolute right-3.5 top-3 text-slate-400 text-sm"></i>

                    <input
                        id="login-password"
                        name="password"
                        type="password"
                        required
                        autocomplete="current-password"
                        class="w-full pr-10 pl-3 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:border-sky-500"
                    >
                </div>

                @error('password')
                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- تذكر جلسة الدخول -->
            <div class="flex items-center justify-between text-xs text-slate-600">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input
                        type="checkbox"
                        name="remember"
                        value="1"
                        checked
                        class="accent-sky-600 rounded"
                    >
                    <span>تذكر جلسة الدخول</span>
                </label>

                <span
                    class="px-2 py-0.5 rounded bg-purple-100 text-purple-700 font-bold"
                    id="login-plan-badge"
                >
                    باقة Business
                </span>
            </div>

            <!-- زر تسجيل الدخول -->
            <button
                type="submit"
                class="w-full py-3.5 rounded-xl misbar-gradient hover:opacity-95 text-white font-extrabold text-sm shadow-lg shadow-indigo-900/20 flex items-center justify-center gap-2 transition"
            >
                <i class="fa-solid fa-right-to-bracket"></i>
                <span>تسجيل الدخول إلى لوحة التحكم</span>
            </button>

        </form>

        <!-- إنشاء حساب -->
        <div class="mt-6 pt-4 border-t border-slate-100 text-center">
            <p class="text-xs text-slate-500">
                ليس لديك حساب بعد؟

                <a
                    href="{{ route('register') }}"
                    class="text-purple-600 font-bold hover:underline mr-1"
                >
                    العودة لإنشاء حساب جديد
                </a>
            </p>
        </div>

    </div>
</section>
@endsection
