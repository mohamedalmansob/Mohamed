@extends('layouts.app')

@section('content')
    <section id="view-signup" class="auth-pattern min-h-screen flex items-center justify-center p-4 lg:p-8">
        <div
            class="max-w-5xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 lg:grid-cols-12 border border-slate-200/20">

            <!-- الجانب الأيمن: الهوية البصرية -->
            <div
                class="lg:col-span-5 misbar-gradient text-white p-8 lg:p-10 flex flex-col justify-between relative overflow-hidden">

                <div class="absolute -top-20 -left-20 w-72 h-72 rounded-full border border-sky-400/20 pointer-events-none">
                </div>
                <div
                    class="absolute -top-10 -left-10 w-52 h-52 rounded-full border border-purple-400/20 pointer-events-none">
                </div>

                <div>
                    <div class="bg-white rounded-3xl p-4 w-44 mx-auto lg:mx-0 shadow-xl mb-6 flex flex-col items-center">
                        <svg viewBox="0 0 240 240" class="w-36 h-36" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="ringGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#0A1E46" />
                                    <stop offset="40%" stop-color="#0088FF" />
                                    <stop offset="75%" stop-color="#6E2CF2" />
                                    <stop offset="100%" stop-color="#FF7A00" />
                                </linearGradient>
                                <linearGradient id="waveGrad1" x1="0%" y1="100%" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="#6E2CF2" />
                                    <stop offset="45%" stop-color="#0A1E46" />
                                    <stop offset="100%" stop-color="#0099FF" />
                                </linearGradient>
                                <linearGradient id="orangeRay1" x1="0%" y1="100%" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="#F59E0B" />
                                    <stop offset="100%" stop-color="#FF6B00" />
                                </linearGradient>
                            </defs>

                            <circle cx="120" cy="120" r="110" fill="#FFFFFF" stroke="url(#ringGrad1)"
                                stroke-width="5" />
                            <circle cx="22" cy="82" r="5.5" fill="#0A1E46" />

                            <path d="M 55 95 A 68 68 0 0 1 165 62" fill="none" stroke="#38BDF8" stroke-width="3"
                                stroke-linecap="round" opacity="0.5" />
                            <path d="M 68 102 A 52 52 0 0 1 154 76" fill="none" stroke="#0EA5E9" stroke-width="3.5"
                                stroke-linecap="round" opacity="0.75" />
                            <path d="M 82 108 A 36 36 0 0 1 142 90" fill="none" stroke="#0284C7" stroke-width="4"
                                stroke-linecap="round" />

                            <rect x="85" y="122" width="11" height="22" rx="3" fill="#6E2CF2" />
                            <rect x="101" y="110" width="11" height="34" rx="3" fill="#0A1E46" />
                            <rect x="117" y="96" width="11" height="48" rx="3" fill="#0088FF" />

                            <path
                                d="M 65 135 C 65 115, 95 85, 118 85 C 138 85, 145 118, 165 118 C 182 118, 190 98, 175 86 C 162 76, 145 92, 152 108"
                                fill="none" stroke="url(#waveGrad1)" stroke-width="11" stroke-linecap="round" />

                            <line x1="92" y1="104" x2="188" y2="52" stroke="url(#orangeRay1)"
                                stroke-width="4.5" stroke-linecap="round" />
                            <circle cx="190" cy="51" r="9.5" fill="url(#orangeRay1)" />

                            <text x="142" y="156" font-family="Cairo, sans-serif" font-weight="900" font-size="27"
                                fill="#0A1E46" text-anchor="middle">مسبار</text>
                            <text x="120" y="180" font-family="Cairo, sans-serif" font-weight="800" font-size="18"
                                letter-spacing="3" fill="#0A1E46" text-anchor="middle">MISB<tspan fill="#FF7A00">A
                                </tspan>R</text>

                            <line x1="42" y1="196" x2="65" y2="196" stroke="#FF7A00"
                                stroke-width="2" />
                            <text x="120" y="199" font-family="Tajawal, sans-serif" font-weight="700" font-size="9.5"
                                fill="#334155" text-anchor="middle">من عمق البيانات إلى قمة القرار</text>
                            <line x1="175" y1="196" x2="198" y2="196" stroke="#FF7A00"
                                stroke-width="2" />
                        </svg>
                    </div>

                    <h1 class="text-2xl lg:text-3xl font-extrabold leading-snug mb-3">
                        ابدأ رحلة الذكاء التسويقي لمشروعك
                    </h1>

                    <p class="text-sky-100/90 text-sm leading-relaxed mb-6">
                        منصة عربية متكاملة تربط تحليل السوق والجمهور والمنافسين ببناء الاستراتيجيات وصناعة المحتوى وقياس
                        الأداء في منظومة واحدة.
                    </p>
                </div>

                <div class="space-y-3 text-xs bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/15">
                    <div class="flex items-center gap-2.5">
                        <span
                            class="w-6 h-6 rounded-full bg-amber-500 text-slate-950 font-bold flex items-center justify-center shrink-0">1</span>
                        <span>بناء الحمض النووي للعلامة التجارية (Brand DNA)</span>
                    </div>

                    <div class="flex items-center gap-2.5">
                        <span
                            class="w-6 h-6 rounded-full bg-sky-400 text-slate-950 font-bold flex items-center justify-center shrink-0">2</span>
                        <span>توليد الاستراتيجيات والحملات الإعلانية المدعومة بالبيانات</span>
                    </div>

                    <div class="flex items-center gap-2.5">
                        <span
                            class="w-6 h-6 rounded-full bg-purple-400 text-slate-950 font-bold flex items-center justify-center shrink-0">3</span>
                        <span>تقييم جودة المحتوى قبل النشر وتشخيص المشكلات التسويقية</span>
                    </div>
                </div>
            </div>

            <!-- الجانب الأيسر: نموذج إنشاء الحساب -->
            <div class="lg:col-span-7 p-8 lg:p-10 flex flex-col justify-center">

                <div class="flex items-center justify-between mb-6 gap-3">
                    <div>
                        <span class="text-xs font-bold text-purple-600 bg-purple-50 px-3 py-1 rounded-full">
                            الخطوة 1 من 2 • إنشاء حساب جديد
                        </span>

                        <h2 class="text-2xl font-extrabold text-misbar-navy mt-2">
                            إنشاء حساب ومساحة عمل
                        </h2>
                    </div>

                    <a href="{{ route('login') }}"
                        class="text-xs font-bold text-sky-600 hover:text-sky-700 underline shrink-0">
                        لديك حساب؟ تسجيل الدخول
                    </a>
                </div>

                <!-- رسالة الأخطاء العامة -->
                @if ($errors->any())
                    <div class="mb-5 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm">
                        <div class="flex items-center gap-2 font-bold mb-2">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            تعذر إنشاء الحساب
                        </div>

                        <p class="text-xs leading-relaxed">
                            يرجى مراجعة الحقول الموضحة أدناه وتصحيح البيانات ثم المحاولة مجدداً.
                        </p>
                    </div>
                @endif

                <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
                    @csrf

                    <!-- الاسم والبريد -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div>
                            <label for="signup-name" class="block text-xs font-bold text-slate-700 mb-1.5">
                                الاسم الكامل
                            </label>

                            <div class="relative">
                                <i class="fa-regular fa-user absolute right-3.5 top-3 text-slate-400 text-sm"></i>

                                <input id="signup-name" name="name" type="text" required maxlength="255"
                                    autocomplete="name" value="{{ old('name') }}"
                                    class="w-full pr-10 pl-3 py-2.5 rounded-xl border {{ $errors->has('name') ? 'border-red-400 bg-red-50' : 'border-slate-300' }} text-sm focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20"
                                    placeholder="أدخل اسمك الكامل">
                            </div>

                            @error('name')
                                <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="signup-email" class="block text-xs font-bold text-slate-700 mb-1.5">
                                البريد الإلكتروني
                            </label>

                            <div class="relative">
                                <i class="fa-regular fa-envelope absolute right-3.5 top-3 text-slate-400 text-sm"></i>

                                <input id="signup-email" name="email" type="email" required maxlength="255"
                                    autocomplete="email" value="{{ old('email') }}"
                                    class="w-full pr-10 pl-3 py-2.5 rounded-xl border {{ $errors->has('email') ? 'border-red-400 bg-red-50' : 'border-slate-300' }} text-sm focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20"
                                    dir="ltr" placeholder="name@example.com">
                            </div>

                            @error('email')
                                <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- اسم مساحة العمل -->
                    <div>
                        <label for="signup-workspace" class="block text-xs font-bold text-slate-700 mb-1.5">
                            اسم مساحة العمل / المشروع
                        </label>

                        <div class="relative">
                            <i class="fa-solid fa-briefcase absolute right-3.5 top-3 text-slate-400 text-sm"></i>

                            <input id="signup-workspace" name="workspace_name" type="text" maxlength="150" required
                                value="{{ old('workspace_name', 'فلوريا | Floria — صنعاء') }}"
                                class="w-full pr-10 pl-3 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20"
                                placeholder="اسم المشروع أو المؤسسة">
                        </div>
                    </div>

                    <!-- كلمة المرور -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <div>
                            <label for="signup-password" class="block text-xs font-bold text-slate-700 mb-1.5">
                                كلمة المرور
                            </label>

                            <div class="relative">
                                <i class="fa-solid fa-lock absolute right-3.5 top-3 text-slate-400 text-sm"></i>

                                <input id="signup-password" name="password" type="password" required
                                    autocomplete="new-password"
                                    class="w-full pr-10 pl-3 py-2.5 rounded-xl border {{ $errors->has('password') ? 'border-red-400 bg-red-50' : 'border-slate-300' }} text-sm focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20"
                                    placeholder="أدخل كلمة المرور">
                            </div>

                            @error('password')
                                <p class="text-xs text-red-600 mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="signup-password-confirmation"
                                class="block text-xs font-bold text-slate-700 mb-1.5">
                                تأكيد كلمة المرور
                            </label>

                            <div class="relative">
                                <i class="fa-solid fa-shield-halved absolute right-3.5 top-3 text-slate-400 text-sm"></i>

                                <input id="signup-password-confirmation" name="password_confirmation" type="password"
                                    required autocomplete="new-password"
                                    class="w-full pr-10 pl-3 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20"
                                    placeholder="أعد كتابة كلمة المرور">
                            </div>
                        </div>
                    </div>

                    <!-- اختيار الباقة -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2">
                            اختر باقة الاشتراك المناسبة لمشروعك
                        </label>

                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5">

                            <label class="cursor-pointer">
                                <input type="radio" name="plan" value="Creator" class="peer sr-only">

                                <div
                                    class="p-3 rounded-xl border border-slate-200 peer-checked:border-sky-600 peer-checked:bg-sky-50 transition text-center">
                                    <span class="block text-xs font-extrabold text-misbar-navy">Creator</span>
                                    <span class="text-[11px] text-slate-500">صناع المحتوى</span>
                                </div>
                            </label>

                            <label class="cursor-pointer">
                                <input type="radio" name="plan" value="Business" checked class="peer sr-only">

                                <div
                                    class="p-3 rounded-xl border-2 border-purple-600 bg-purple-50/60 peer-checked:border-purple-600 peer-checked:bg-purple-50 transition text-center relative">
                                    <span
                                        class="absolute -top-2 left-2 bg-amber-500 text-white text-[9px] font-bold px-1.5 py-0.5 rounded-full">
                                        موصى به
                                    </span>

                                    <span class="block text-xs font-extrabold text-purple-900">Business</span>
                                    <span class="text-[11px] text-purple-700">المشاريع والشركات</span>
                                </div>
                            </label>

                            <label class="cursor-pointer col-span-2 sm:col-span-1">
                                <input type="radio" name="plan" value="Agency" class="peer sr-only">

                                <div
                                    class="p-3 rounded-xl border border-slate-200 peer-checked:border-sky-600 peer-checked:bg-sky-50 transition text-center">
                                    <span class="block text-xs font-extrabold text-misbar-navy">Agency</span>
                                    <span class="text-[11px] text-slate-500">وكالات التسويق</span>
                                </div>
                            </label>

                        </div>
                    </div>

                    <!-- زر إنشاء الحساب -->
                    <div class="pt-2">
                        <button type="submit"
                            class="w-full py-3.5 px-6 rounded-xl misbar-gradient hover:opacity-95 text-white font-extrabold text-sm shadow-lg shadow-indigo-900/20 flex items-center justify-center gap-2 transition">
                            <span>إنشاء الحساب والمتابعة</span>
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                    </div>

                </form>

                <div
                    class="mt-6 pt-5 border-t border-slate-100 flex flex-wrap items-center justify-between gap-2 text-xs text-slate-500">
                    <span>
                        تم تجهيز بيانات مشروع <strong>فلوريا (Floria)</strong> مسبقاً للمعاينة
                    </span>

                    <a href="{{ route('login') }}"
                        class="text-sky-600 hover:text-sky-700 font-bold flex items-center gap-1">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <span>العودة إلى تسجيل الدخول</span>
                    </a>
                </div>

            </div>
        </div>
    </section>
@endsection
