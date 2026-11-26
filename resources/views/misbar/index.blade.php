@extends('layouts.app')

@section('content')
{{-- @include('misbar.partials.platform-header')
@include('misbar.partials.platform-sidebar') --}}
<!-- ===================================================================== -->
    <!-- الشاشة الأولى: واجهة إنشاء حساب (Sign Up View)                         -->
    <!-- ===================================================================== -->
    <section id="view-signup" class="auth-pattern min-h-screen flex items-center justify-center p-4 lg:p-8">
        <div class="max-w-5xl w-full bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 lg:grid-cols-12 border border-slate-200/20">
            
            <!-- الجانب الأيمن: الهوية البصرية والشعار وقيمة المنصة -->
            <div class="lg:col-span-5 misbar-gradient text-white p-8 lg:p-10 flex flex-col justify-between relative overflow-hidden">
                <!-- دوائر رادار خلفية خفيفة -->
                <div class="absolute -top-20 -left-20 w-72 h-72 rounded-full border border-sky-400/20 pointer-events-none"></div>
                <div class="absolute -top-10 -left-10 w-52 h-52 rounded-full border border-purple-400/20 pointer-events-none"></div>

                <div>
                    <!-- شعار مسبار المرسوم بدقة مطابقاً للصورة -->
                    <div class="bg-white rounded-3xl p-4 w-44 mx-auto lg:mx-0 shadow-xl mb-6 flex flex-col items-center">
                        <svg viewBox="0 0 240 240" class="w-36 h-36" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="ringGrad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#0A1E46"/>
                                    <stop offset="40%" stop-color="#0088FF"/>
                                    <stop offset="75%" stop-color="#6E2CF2"/>
                                    <stop offset="100%" stop-color="#FF7A00"/>
                                </linearGradient>
                                <linearGradient id="waveGrad1" x1="0%" y1="100%" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="#6E2CF2"/>
                                    <stop offset="45%" stop-color="#0A1E46"/>
                                    <stop offset="100%" stop-color="#0099FF"/>
                                </linearGradient>
                                <linearGradient id="orangeRay1" x1="0%" y1="100%" x2="100%" y2="0%">
                                    <stop offset="0%" stop-color="#F59E0B"/>
                                    <stop offset="100%" stop-color="#FF6B00"/>
                                </linearGradient>
                            </defs>
                            <!-- الإطار الدائري المتدرج -->
                            <circle cx="120" cy="120" r="110" fill="#FFFFFF" stroke="url(#ringGrad1)" stroke-width="5"/>
                            <circle cx="22" cy="82" r="5.5" fill="#0A1E46"/>
                            <!-- أقواس الرادار العلوية -->
                            <path d="M 55 95 A 68 68 0 0 1 165 62" fill="none" stroke="#38BDF8" stroke-width="3" stroke-linecap="round" opacity="0.5"/>
                            <path d="M 68 102 A 52 52 0 0 1 154 76" fill="none" stroke="#0EA5E9" stroke-width="3.5" stroke-linecap="round" opacity="0.75"/>
                            <path d="M 82 108 A 36 36 0 0 1 142 90" fill="none" stroke="#0284C7" stroke-width="4" stroke-linecap="round"/>
                            <!-- أعمدة البيانات الصاعدة -->
                            <rect x="85" y="122" width="11" height="22" rx="3" fill="#6E2CF2"/>
                            <rect x="101" y="110" width="11" height="34" rx="3" fill="#0A1E46"/>
                            <rect x="117" y="96" width="11" height="48" rx="3" fill="#0088FF"/>
                            <!-- المنحنى الانسيابي المدمج -->
                            <path d="M 65 135 C 65 115, 95 85, 118 85 C 138 85, 145 118, 165 118 C 182 118, 190 98, 175 86 C 162 76, 145 92, 152 108" fill="none" stroke="url(#waveGrad1)" stroke-width="11" stroke-linecap="round"/>
                            <!-- شعاع المسبار البرتقالي -->
                            <line x1="92" y1="104" x2="188" y2="52" stroke="url(#orangeRay1)" stroke-width="4.5" stroke-linecap="round"/>
                            <circle cx="190" cy="51" r="9.5" fill="url(#orangeRay1)"/>
                            <!-- النص العربي والانجليزي -->
                            <text x="142" y="156" font-family="Cairo, sans-serif" font-weight="900" font-size="27" fill="#0A1E46" text-anchor="middle">مسبار</text>
                            <text x="120" y="180" font-family="Cairo, sans-serif" font-weight="800" font-size="18" letter-spacing="3" fill="#0A1E46" text-anchor="middle">MISB<tspan fill="#FF7A00">A</tspan>R</text>
                            <line x1="42" y1="196" x2="65" y2="196" stroke="#FF7A00" stroke-width="2"/>
                            <text x="120" y="199" font-family="Tajawal, sans-serif" font-weight="700" font-size="9.5" fill="#334155" text-anchor="middle">من عمق البيانات إلى قمة القرار</text>
                            <line x1="175" y1="196" x2="198" y2="196" stroke="#FF7A00" stroke-width="2"/>
                        </svg>
                    </div>

                    <h1 class="text-2xl lg:text-3xl font-extrabold leading-snug mb-3">
                        ابدأ رحلة الذكاء التسويقي لمشروعك
                    </h1>
                    <p class="text-sky-100/90 text-sm leading-relaxed mb-6">
                        منصة عربية متكاملة تربط تحليل السوق والجمهور والمنافسين ببناء الاستراتيجيات وصناعة المحتوى وقياس الأداء في منظومة واحدة.
                    </p>
                </div>

                <div class="space-y-3 text-xs bg-white/10 backdrop-blur-md p-4 rounded-2xl border border-white/15">
                    <div class="flex items-center gap-2.5">
                        <span class="w-6 h-6 rounded-full bg-amber-500 text-slate-950 font-bold flex items-center justify-center shrink-0">1</span>
                        <span>بناء الحمض النووي للعلامة التجارية (Brand DNA)</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <span class="w-6 h-6 rounded-full bg-sky-400 text-slate-950 font-bold flex items-center justify-center shrink-0">2</span>
                        <span>توليد الاستراتيجيات والحملات الإعلانية المدعومة بالبيانات</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <span class="w-6 h-6 rounded-full bg-purple-400 text-slate-950 font-bold flex items-center justify-center shrink-0">3</span>
                        <span>تقييم جودة المحتوى قبل النشر وتشخيص المشكلات التسويقية</span>
                    </div>
                </div>
            </div>

            <!-- الجانب الأيسر: نموذج إنشاء الحساب -->
            <div class="lg:col-span-7 p-8 lg:p-10 flex flex-col justify-center">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <span class="text-xs font-bold text-purple-600 bg-purple-50 px-3 py-1 rounded-full">الخطوة 1 من 2 • إنشاء حساب جديد</span>
                        <h2 class="text-2xl font-extrabold text-misbar-navy mt-2">إنشاء حساب ومساحة عمل</h2>
                    </div>
                    <button onclick="switchAuthView('login')" class="text-xs font-bold text-sky-600 hover:text-sky-700 underline">
                        لديك حساب؟ تسجيل الدخول
                    </button>
                </div>

                <form onsubmit="handleSignUp(event)" class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">الاسم الكامل</label>
                            <div class="relative">
                                <i class="fa-regular fa-user absolute right-3.5 top-3 text-slate-400 text-sm"></i>
                                <input id="signup-name" type="text" required value="مؤسسة مشروع فلوريا" class="w-full pr-10 pl-3 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">البريد الإلكتروني</label>
                            <div class="relative">
                                <i class="fa-regular fa-envelope absolute right-3.5 top-3 text-slate-400 text-sm"></i>
                                <input id="signup-email" type="email" required value="hello@floria-sanaa.com" class="w-full pr-10 pl-3 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20" dir="ltr">
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">اسم مساحة العمل / المشروع</label>
                            <div class="relative">
                                <i class="fa-solid fa-briefcase absolute right-3.5 top-3 text-slate-400 text-sm"></i>
                                <input id="signup-workspace" type="text" required value="فلوريا | Floria — صنعاء" class="w-full pr-10 pl-3 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20">
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">كلمة المرور</label>
                            <div class="relative">
                                <i class="fa-solid fa-lock absolute right-3.5 top-3 text-slate-400 text-sm"></i>
                                <input id="signup-password" type="password" required value="••••••••••" class="w-full pr-10 pl-3 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20">
                            </div>
                        </div>
                    </div>

                    <!-- اختيار الباقة (SaaS Tiers) -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2">اختر باقة الاشتراك المناسبة لمشروعك</label>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2.5">
                            <label class="cursor-pointer">
                                <input type="radio" name="plan" value="Creator" class="peer sr-only">
                                <div class="p-3 rounded-xl border border-slate-200 peer-checked:border-sky-600 peer-checked:bg-sky-50 transition text-center">
                                    <span class="block text-xs font-extrabold text-misbar-navy">Creator</span>
                                    <span class="text-[11px] text-slate-500">صناع المحتوى</span>
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="plan" value="Business" checked class="peer sr-only">
                                <div class="p-3 rounded-xl border-2 border-purple-600 bg-purple-50/60 peer-checked:border-purple-600 peer-checked:bg-purple-50 transition text-center relative">
                                    <span class="absolute -top-2 left-2 bg-amber-500 text-white text-[9px] font-bold px-1.5 py-0.5 rounded-full">موصى به</span>
                                    <span class="block text-xs font-extrabold text-purple-900">Business</span>
                                    <span class="text-[11px] text-purple-700">المشاريع والشركات</span>
                                </div>
                            </label>
                            <label class="cursor-pointer col-span-2 sm:col-span-1">
                                <input type="radio" name="plan" value="Agency" class="peer sr-only">
                                <div class="p-3 rounded-xl border border-slate-200 peer-checked:border-sky-600 peer-checked:bg-sky-50 transition text-center">
                                    <span class="block text-xs font-extrabold text-misbar-navy">Agency</span>
                                    <span class="text-[11px] text-slate-500">وكالات التسويق</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="pt-2 flex flex-col sm:flex-row gap-3">
                        <button type="submit" class="flex-1 py-3.5 px-6 rounded-xl misbar-gradient hover:opacity-95 text-white font-extrabold text-sm shadow-lg shadow-indigo-900/20 flex items-center justify-center gap-2 transition">
                            <span>إنشاء الحساب والمتابعة لتسجيل الدخول</span>
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                    </div>
                </form>

                <div class="mt-6 pt-5 border-t border-slate-100 flex flex-wrap items-center justify-between gap-2 text-xs text-slate-500">
                    <span>تم تجهيز بيانات مشروع <strong>فلوريا (Floria)</strong> مسبقاً للمعاينة</span>
                  
                </div>
            </div>
        </div>
    </section>

    <!-- ===================================================================== -->
    <!-- الشاشة الثانية: واجهة تسجيل الدخول (Login View)                       -->
    <!-- ===================================================================== -->
    <section id="view-login" class="hidden auth-pattern min-h-screen flex items-center justify-center p-4 lg:p-8">
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
                <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full mb-2">الخطوة 2 من 2 • بوابة الدخول</span>
                <h2 class="text-2xl font-extrabold text-misbar-navy">مرحباً بعودتك إلى مسبار</h2>
                <p class="text-xs text-slate-500 mt-1">سجّل الدخول للوصول إلى مساحة عمل <strong class="text-floria-rose">فلوريا | Floria</strong></p>
            </div>

            <form onsubmit="handleLogin(event)" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1.5">البريد الإلكتروني</label>
                    <div class="relative">
                        <i class="fa-regular fa-envelope absolute right-3.5 top-3 text-slate-400 text-sm"></i>
                        <input id="login-email" type="email" required value="hello@floria-sanaa.com" class="w-full pr-10 pl-3 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:border-sky-500" dir="ltr">
                    </div>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <label class="block text-xs font-bold text-slate-700">كلمة المرور</label>
                        <button type="button" onclick="showToast('استعادة كلمة المرور غير مفعّلة في نسخة المعاينة')" class="text-[11px] text-sky-600 cursor-pointer hover:underline bg-transparent border-0 p-0">نسيت كلمة المرور؟</button>
                    </div>
                    <div class="relative">
                        <i class="fa-solid fa-lock absolute right-3.5 top-3 text-slate-400 text-sm"></i>
                        <input id="login-password" type="password" required value="••••••••••" class="w-full pr-10 pl-3 py-2.5 rounded-xl border border-slate-300 text-sm focus:outline-none focus:border-sky-500">
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs text-slate-600">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" checked class="accent-sky-600 rounded">
                        <span>تذكر جلسة الدخول</span>
                    </label>
                    <span class="px-2 py-0.5 rounded bg-purple-100 text-purple-700 font-bold" id="login-plan-badge">باقة Business</span>
                </div>

                <button type="submit" class="w-full py-3.5 rounded-xl misbar-gradient hover:opacity-95 text-white font-extrabold text-sm shadow-lg shadow-indigo-900/20 flex items-center justify-center gap-2 transition">
                    <i class="fa-solid fa-right-to-bracket"></i>
                    <span>تسجيل الدخول إلى لوحة التحكم</span>
                </button>
            </form>

            <div class="mt-6 pt-4 border-t border-slate-100 text-center">
                <p class="text-xs text-slate-500">
                    ليس لديك حساب بعد؟
                    <button onclick="switchAuthView('signup')" class="text-purple-600 font-bold hover:underline mr-1">العودة لإنشاء حساب جديد</button>
                </p>
            </div>
        </div>
    </section>

    <!-- ===================================================================== -->
    <!-- الشاشة الثالثة: منصة مسبار المتكاملة (Full MISBAR Workspace)          -->
    <!-- ===================================================================== -->
    <div id="view-platform" class="hidden flex-1 flex flex-col">
        
        <!-- الشريط العلوي للمنصة -->
        @include('misbar.partials.platform-header')

        <!-- جسم المنصة: القائمة الجانبية + محتوى الوحدات -->
        <div class="flex-1 max-w-[1440px] w-full mx-auto px-4 lg:px-8 py-6 flex flex-col lg:flex-row gap-6">
            
            <!-- القائمة الجانبية (Sidebar) -->
            @include('misbar.partials.platform-sidebar')

            <!-- منطقة عرض الوحدات الرئيسية -->
            <main class="flex-1 min-w-0 space-y-6">

                <!-- ========================================================= -->
                <!-- الوحدة 1: العقل التسويقي المركزي والمساعد المحادثي         -->
                <!-- ========================================================= -->
                <div id="unit-brain" class="unit-section space-y-6">
                    <!-- بانر ترحيبي -->
                    <div class="misbar-gradient text-white rounded-3xl p-6 lg:p-8 shadow-lg relative overflow-hidden">
                        <div class="relative z-10 flex flex-wrap items-center justify-between gap-4">
                            <div class="max-w-2xl">
                                <span class="text-xs font-bold bg-white/15 text-amber-300 px-3 py-1 rounded-full">Marketing Brain • العقل التسويقي المركزي</span>
                                <h1 class="text-2xl lg:text-3xl font-extrabold mt-3">خارطة القرارات الذكية لمشروع «فلوريا | Floria»</h1>
                                <p class="text-sm text-sky-100 mt-2 leading-relaxed">
                                    قام مسبار بتحليل الخطة التسويقية لفلوريا في صنعاء، وربط نقاط القوة (التخصيص اليدوي بالأسماء والتواريخ) مع الفرص المتاحة لبناء أول حملة إطلاق عالية التحويل.
                                </p>
                            </div>
                            <button onclick="switchUnit('strategy')" class="px-5 py-3 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-extrabold text-sm shadow-lg flex items-center gap-2 transition shrink-0">
                                <i class="fa-solid fa-rocket"></i>
                                <span>استعراض أول إعلان وحملة لفلوريا</span>
                            </button>
                        </div>
                    </div>

                    <!-- بطاقات القرارات والتوصيات الذكية المبنية على PDF فلوريا -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div onclick="showEvidence(0)" class="card-elevated cursor-pointer rounded-2xl p-5 border-r-4 border-r-pink-600">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-bold text-pink-700 bg-pink-50 px-2.5 py-1 rounded-lg">أولوية 1 • معالجة ضعف الانتشار</span>
                                <span class="text-xs text-slate-400">اضغط للتفاصيل</span>
                            </div>
                            <h3 class="font-extrabold text-misbar-navy text-base mb-1.5">إطلاق حملة "تفاصيل تحمل أسماءكم" في صنعاء</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">التركيز على منتج مزدوج (إطار مخصص بالاسم والتاريخ + باقة زهور مصغرة) لرفع قيمة السلة وجذب العرائس والخريجات.</p>
                        </div>

                        <div onclick="showEvidence(1)" class="card-elevated cursor-pointer rounded-2xl p-5 border-r-4 border-r-purple-600">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-bold text-purple-700 bg-purple-50 px-2.5 py-1 rounded-lg">أولوية 2 • استغلال الفرص</span>
                                <span class="text-xs text-slate-400">اضغط للتفاصيل</span>
                            </div>
                            <h3 class="font-extrabold text-misbar-navy text-base mb-1.5">شراكات استراتيجية مع مصورات العرائس وقاعات صنعاء</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">تقديم عينات هدايا مخصصة لمصورات الأعراس وصالونات التجميل في صنعاء مقابل التوصية المباشرة لعميلاتهن.</p>
                        </div>

                        <div onclick="showEvidence(2)" class="card-elevated cursor-pointer rounded-2xl p-5 border-r-4 border-r-sky-600">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-bold text-sky-700 bg-sky-50 px-2.5 py-1 rounded-lg">أولوية 3 • تسريع التحويل</span>
                                <span class="text-xs text-slate-400">اضغط للتفاصيل</span>
                            </div>
                            <h3 class="font-extrabold text-misbar-navy text-base mb-1.5">تفعيل كتالوج واتساب المنظم وأبرز القصص (Highlights)</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">تحويل الاستفسارات في إنستغرام مباشرة إلى كتالوج واتساب موضح به النطاقات السعرية وخيارات التخصيص.</p>
                        </div>

                        <div onclick="showEvidence(3)" class="card-elevated cursor-pointer rounded-2xl p-5 border-r-4 border-r-amber-500">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs font-bold text-amber-700 bg-amber-50 px-2.5 py-1 rounded-lg">أولوية 4 • إدارة المخاطر</span>
                                <span class="text-xs text-slate-400">اضغط للتفاصيل</span>
                            </div>
                            <h3 class="font-extrabold text-misbar-navy text-base mb-1.5">تقييد خيارات التخصيص وتوثيق قاعدة بيانات العملاء</h3>
                            <p class="text-xs text-slate-600 leading-relaxed">تقديم قوالب تخصيص محددة (اللون، الاسم، العبارة، التاريخ) لتقليل وقت التنفيذ اليدوي وبناء سجل للعملاء السابقين.</p>
                        </div>
                    </div>

                    <!-- صندوق تفسير البيانات المستند إليها -->
                    <div id="brain-evidence-panel" class="bg-slate-900 text-white rounded-2xl p-5 border border-slate-800">
                        <div class="flex items-center gap-2 text-sky-400 font-bold text-xs mb-1.5">
                            <i class="fa-solid fa-database"></i>
                            <span>الأساس التحليلي للتوصية المختارة (من ملف خطة فلوريا):</span>
                        </div>
                        <p id="brain-evidence-content" class="text-sm text-slate-200 leading-relaxed">
                            انقر على أي بطاقة من التوصيات الأربع أعلاه لعرض الربط الدقيق بين نقاط القوة والضعف والفرص التي استند إليها العقل التسويقي لمسبار.
                        </p>
                    </div>

                    <!-- المساعد التسويقي المحادثي (Marketing Assistant) -->
                    <div class="card-elevated rounded-2xl p-6">
                        <h3 class="text-base font-extrabold text-misbar-navy mb-3 flex items-center gap-2">
                            <i class="fa-solid fa-robot text-purple-600"></i>
                            <span>المساعد التسويقي الذكي لفلوريا (Marketing Assistant)</span>
                        </h3>
                        <div class="flex flex-wrap gap-2 mb-3">
                            <button onclick="askFloriaAssistant('ما هي أفضل هدية نروج لها في أول حملة لفلوريا؟')" class="text-xs bg-pink-50 hover:bg-pink-100 text-pink-800 px-3 py-1.5 rounded-lg font-semibold border border-pink-200 transition">ما أفضل منتج لأول حملة؟</button>
                            <button onclick="askFloriaAssistant('كيف نعالج مشكلة تقليد التصاميم من المنافسين؟')" class="text-xs bg-purple-50 hover:bg-purple-100 text-purple-800 px-3 py-1.5 rounded-lg font-semibold border border-purple-200 transition">كيف نحمي تصاميمنا من التقليد؟</button>
                            <button onclick="askFloriaAssistant('كيف نقيس نجاح فلوريا بعيداً عن عدد المتابعين؟')" class="text-xs bg-sky-50 hover:bg-sky-100 text-sky-800 px-3 py-1.5 rounded-lg font-semibold border border-sky-200 transition">ما أهم مؤشرات قياس النجاح؟</button>
                        </div>
                        <div class="flex gap-2">
                            <input id="assistant-query" type="text" placeholder="اسأل المساعد التسويقي أي سؤال حول خطة فلوريا..." class="flex-1 bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-purple-500">
                            <button onclick="submitAssistantQuery()" class="px-5 py-2.5 rounded-xl misbar-gradient text-white font-bold text-sm">إرسال</button>
                        </div>
                        <div id="assistant-reply" class="hidden mt-4 p-4 rounded-xl bg-indigo-50/70 border border-indigo-200 text-sm text-slate-800 leading-relaxed"></div>
                    </div>
                </div>

                <!-- ========================================================= -->
                <!-- الوحدة 2: هوية العلامة التجارية (Brand DNA - نموذج العميل) -->
                <!-- ========================================================= -->
                <div id="unit-brand" class="unit-section hidden space-y-6">
                    <div class="card-elevated rounded-3xl p-6 lg:p-8 border-t-4 border-t-pink-600">
                        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                            <div>
                                <span class="text-xs font-extrabold text-pink-600 bg-pink-50 px-3 py-1 rounded-full">Brand Intelligence • بناء الحمض النووي للعلامة التجارية</span>
                                <h2 class="text-2xl font-extrabold text-misbar-navy mt-2">إعداد وتخصيص ملف العلامة التجارية (Brand DNA)</h2>
                                <p class="text-xs text-slate-500 mt-1">أدخل بيانات علامتك التجارية أو عدّلها ليقوم العقل التسويقي بمواءمة جميع الوحدات والمحتوى تلقائياً.</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <button onclick="resetFloriaBrandDNA()" class="px-3.5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold border border-slate-200 transition">
                                    <i class="fa-solid fa-rotate-right ml-1"></i> استعادة بيانات فلوريا
                                </button>
                                <button onclick="saveBrandDNA()" class="px-4 py-2.5 rounded-xl misbar-gradient text-white text-xs font-bold shadow hover:opacity-95 transition">
                                    <i class="fa-solid fa-floppy-disk ml-1"></i> حفظ وتحديث Brand DNA
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                            <!-- العمود الأيمن: نموذج الإدخال التفاعلي للعميل (5 محاور مطلوبة) -->
                            <div class="lg:col-span-7 space-y-4">
                                
                                <!-- 1. اسم العلامة التجارية -->
                                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200">
                                    <div class="flex items-center gap-2 mb-2">
                                        <span class="w-6 h-6 rounded-full misbar-gradient text-white text-xs font-extrabold flex items-center justify-center">1</span>
                                        <label class="text-xs font-extrabold text-misbar-navy">اسم العلامة التجارية والشعار اللفظي</label>
                                    </div>
                                    <input id="dna-name-field" type="text" value="فلوريا | Floria — لمسات تُزهر بالجمال" placeholder="أدخل اسم علامتك التجارية..." class="w-full bg-white border border-slate-300 rounded-xl px-3.5 py-2.5 text-sm font-bold text-misbar-navy focus:outline-none focus:border-sky-500">
                                </div>

                                <!-- 2. القطاع والمنتجات والخدمات -->
                                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-3">
                                    <div class="flex items-center gap-2">
                                        <span class="w-6 h-6 rounded-full misbar-gradient text-white text-xs font-extrabold flex items-center justify-center">2</span>
                                        <label class="text-xs font-extrabold text-misbar-navy">القطاع والمنتجات والخدمات</label>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <div>
                                            <span class="block text-[11px] font-bold text-slate-600 mb-1">القطاع / المجال</span>
                                            <select id="dna-sector-field" class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs font-bold text-slate-800 focus:outline-none focus:border-sky-500">
                                                <option value="الهدايا اليدوية والتصاميم المخصصة" selected>الهدايا اليدوية والتصاميم المخصصة</option>
                                                <option value="التجارة الإلكترونية والمتاجر">التجارة الإلكترونية والمتاجر</option>
                                                <option value="المقاهي والمطاعم والضيافة">المقاهي والمطاعم والضيافة</option>
                                                <option value="الخدمات التقنية والبرمجيات">الخدمات التقنية والبرمجيات</option>
                                                <option value="التجميل والأزياء">التجميل والأزياء</option>
                                                <option value="الرعاية الصحية والعيادات">الرعاية الصحية والعيادات</option>
                                            </select>
                                        </div>
                                        <div>
                                            <span class="block text-[11px] font-bold text-slate-600 mb-1">النطاق الجغرافي الأساسي</span>
                                            <input id="dna-geo-field" type="text" value="صنعاء (مع إمكانية التوسع)" class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs font-bold text-slate-800 focus:outline-none focus:border-sky-500">
                                        </div>
                                    </div>
                                    <div>
                                        <span class="block text-[11px] font-bold text-slate-600 mb-1">المنتجات والخدمات الرئيسية</span>
                                        <textarea id="dna-products-field" rows="2" placeholder="اكتب منتجاتك وخدماتك..." class="w-full bg-white border border-slate-300 rounded-xl px-3.5 py-2 text-xs text-slate-700 leading-relaxed focus:outline-none focus:border-sky-500">إطارات تذكارية يدوية مخصصة بالأسماء والعبارات والتواريخ، باقات زهور مصغرة مدمجة مع الإطارات، بطاقات إهداء وتغليف أنيق للمناسبات (أعراس، تخرج، أعياد).</textarea>
                                    </div>
                                </div>

                                <!-- 3. الميزات التنافسية والقيمة المقدمة + الهوية البصرية والألوان -->
                                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-3">
                                    <div class="flex items-center gap-2">
                                        <span class="w-6 h-6 rounded-full misbar-gradient text-white text-xs font-extrabold flex items-center justify-center">3</span>
                                        <label class="text-xs font-extrabold text-misbar-navy">الميزات التنافسية والقيمة المقدمة + الهوية البصرية والألوان</label>
                                    </div>
                                    <div>
                                        <span class="block text-[11px] font-bold text-slate-600 mb-1">الميزة التنافسية والقيمة المقدمة (UVP)</span>
                                        <textarea id="dna-uvp-field" rows="2" class="w-full bg-pink-50/60 border border-pink-200 rounded-xl px-3.5 py-2 text-xs font-bold text-pink-950 leading-relaxed focus:outline-none focus:border-pink-500">في فلوريا، لا نهدي قطعة فحسب، بل نصنع تفاصيل تحمل أسماءكم، مشاعركم، وذكرياتكم، لتبقى أجمل اللحظات حاضرة حتى بعد مرور الزمن.</textarea>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                                        <div>
                                            <span class="block text-[11px] font-bold text-slate-600 mb-1.5">ألوان الهوية البصرية (اختر ألوان علامتك)</span>
                                            <div class="flex items-center gap-3 bg-white p-2.5 rounded-xl border border-slate-300">
                                                <div class="flex items-center gap-1.5">
                                                    <input type="color" id="dna-color-primary" value="#BE185D" onchange="updateBrandPreviewColors()" class="w-7 h-7 rounded cursor-pointer border-0">
                                                    <span class="text-[11px] text-slate-600 font-semibold">الأساسي</span>
                                                </div>
                                                <div class="flex items-center gap-1.5">
                                                    <input type="color" id="dna-color-secondary" value="#D97706" onchange="updateBrandPreviewColors()" class="w-7 h-7 rounded cursor-pointer border-0">
                                                    <span class="text-[11px] text-slate-600 font-semibold">الثانوي</span>
                                                </div>
                                                <div class="flex items-center gap-1.5">
                                                    <input type="color" id="dna-color-accent" value="#FDF2F8" onchange="updateBrandPreviewColors()" class="w-7 h-7 rounded cursor-pointer border border-slate-200">
                                                    <span class="text-[11px] text-slate-600 font-semibold">الخلفية</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="block text-[11px] font-bold text-slate-600 mb-1.5">الطابع البصري وشخصية العلامة</span>
                                            <input id="dna-visual-style" type="text" value="أنيق، ناعم، رومانسي، بصمة تغليف مميزة" class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs text-slate-700 focus:outline-none focus:border-sky-500">
                                        </div>
                                    </div>
                                </div>

                                <!-- 4. نبرة الصوت وأسلوب الكتابة -->
                                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-3">
                                    <div class="flex items-center gap-2">
                                        <span class="w-6 h-6 rounded-full misbar-gradient text-white text-xs font-extrabold flex items-center justify-center">4</span>
                                        <label class="text-xs font-extrabold text-misbar-navy">نبرة الصوت وأسلوب الكتابة (Tone of Voice)</label>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <div>
                                            <span class="block text-[11px] font-bold text-slate-600 mb-1">النبرة المعتمدة</span>
                                            <select id="dna-tone-field" class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs font-bold text-slate-800 focus:outline-none focus:border-sky-500">
                                                <option value="عاطفية، دافئة، راقية، وتلامس المشاعر" selected>عاطفية، دافئة، راقية، وتلامس المشاعر</option>
                                                <option value="احترافية، رسمية، وموثوقة">احترافية، رسمية، وموثوقة</option>
                                                <option value="ودودة، شبابية، وعصرية">ودودة، شبابية، وعصرية</option>
                                                <option value="ملهمة وإبداعية">ملهمة وإبداعية</option>
                                            </select>
                                        </div>
                                        <div>
                                            <span class="block text-[11px] font-bold text-slate-600 mb-1">اللغة واللهجة المفضلة</span>
                                            <select id="dna-dialect-field" class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs font-bold text-slate-800 focus:outline-none focus:border-sky-500">
                                                <option value="عربية فصحى معاصرة بلمسة دافئة" selected>عربية فصحى معاصرة بلمسة دافئة</option>
                                                <option value="لهجة يمنية / صنعانية محببة">لهجة يمنية / صنعانية محببة</option>
                                                <option value="لهجة خليجية">لهجة خليجية</option>
                                                <option value="مزيج فصحى ومحلية">مزيج فصحى ومحلية</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- 5. الأهداف التسويقية والتجارية -->
                                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-2.5">
                                    <div class="flex items-center gap-2">
                                        <span class="w-6 h-6 rounded-full misbar-gradient text-white text-xs font-extrabold flex items-center justify-center">5</span>
                                        <label class="text-xs font-extrabold text-misbar-navy">الأهداف التسويقية والتجارية</label>
                                    </div>
                                    <textarea id="dna-goals-field" rows="3" class="w-full bg-white border border-slate-300 rounded-xl px-3.5 py-2 text-xs text-slate-700 leading-relaxed focus:outline-none focus:border-sky-500">1. بناء علامة تجارية معروفة وموثوقة في مجال الهدايا اليدوية في صنعاء.
2. زيادة الوعي باسم فلوريا ومنتجاتها لدى الجمهور المستهدف.
3. جذب العملاء وتحويل الاستفسارات إلى طلبات فعلية.
4. تحقيق دخل وأرباح مستدامة مع الحفاظ على جودة المنتجات.</textarea>
                                </div>
                            </div>

                            <!-- العمود الأيسر: البطاقة الذكية المولدة لملف Brand DNA -->
                            <div class="lg:col-span-5 space-y-4">
                                <div class="bg-gradient-to-br from-[#0A1E46] to-[#1E1B4B] text-white rounded-2xl p-5 shadow-lg">
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="text-xs font-bold text-amber-400"><i class="fa-solid fa-dna ml-1"></i> بطاقة Brand DNA النشطة</span>
                                        <span class="text-[10px] bg-emerald-500/20 text-emerald-300 px-2.5 py-0.5 rounded-full border border-emerald-400/30 font-bold">مُزامنة مع كافة الوحدات</span>
                                    </div>

                                    <!-- معاينة الهوية البصرية والألوان -->
                                    <div id="dna-live-card" class="rounded-xl p-4 bg-white/10 border border-white/15 space-y-3 text-xs">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <strong id="preview-dna-title" class="text-base font-extrabold text-white block">فلوريا | Floria</strong>
                                                <span id="preview-dna-sector" class="text-sky-300 text-[11px]">الهدايا اليدوية والتصاميم المخصصة</span>
                                            </div>
                                            <div class="flex items-center gap-1.5">
                                                <span id="swatch-1" class="w-6 h-6 rounded-full border-2 border-white shadow" style="background-color: #BE185D;"></span>
                                                <span id="swatch-2" class="w-6 h-6 rounded-full border-2 border-white shadow" style="background-color: #D97706;"></span>
                                                <span id="swatch-3" class="w-6 h-6 rounded-full border-2 border-white shadow" style="background-color: #FDF2F8;"></span>
                                            </div>
                                        </div>
                                        <div class="pt-2 border-t border-white/10">
                                            <span class="text-slate-300 block text-[11px]">القيمة المقدمة (UVP):</span>
                                            <p id="preview-dna-uvp" class="text-slate-100 font-semibold mt-0.5 leading-relaxed">في فلوريا، لا نهدي قطعة فحسب، بل نصنع تفاصيل تحمل أسماءكم، مشاعركم، وذكرياتكم...</p>
                                        </div>
                                        <div class="pt-2 border-t border-white/10 flex flex-wrap gap-2">
                                            <span id="preview-dna-tone" class="bg-purple-500/30 border border-purple-400/40 px-2.5 py-1 rounded-lg text-[11px]">النبرة: عاطفية ودافئة</span>
                                            <span id="preview-dna-geo" class="bg-sky-500/30 border border-sky-400/40 px-2.5 py-1 rounded-lg text-[11px]">النطاق: صنعاء</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- ركائز التموضع الذهني الأربعة -->
                                <div class="bg-slate-50 rounded-2xl p-5 border border-slate-200 space-y-3">
                                    <h3 class="font-extrabold text-misbar-navy text-sm border-b border-slate-200 pb-2">ركائز التموضع الذهني المستخرجة</h3>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 text-xs">
                                        <div class="bg-white p-3 rounded-xl border border-slate-200">
                                            <span class="text-pink-600 font-extrabold block mb-0.5"><i class="fa-solid fa-heart ml-1"></i> علامة تصنع مشاعر</span>
                                            <p class="text-slate-600 text-[11px]">هدية تحمل رسالة وقصة إنسانية.</p>
                                        </div>
                                        <div class="bg-white p-3 rounded-xl border border-slate-200">
                                            <span class="text-purple-600 font-extrabold block mb-0.5"><i class="fa-solid fa-wand-sparkles ml-1"></i> تهتم بالتفاصيل</span>
                                            <p class="text-slate-600 text-[11px]">دقة تناسق الألوان وبصمة التغليف.</p>
                                        </div>
                                        <div class="bg-white p-3 rounded-xl border border-slate-200">
                                            <span class="text-sky-600 font-extrabold block mb-0.5"><i class="fa-solid fa-signature ml-1"></i> علامة مخصصة</span>
                                            <p class="text-slate-600 text-[11px]">الأسماء والعبارات والتواريخ الخاصة.</p>
                                        </div>
                                        <div class="bg-white p-3 rounded-xl border border-slate-200">
                                            <span class="text-amber-600 font-extrabold block mb-0.5"><i class="fa-solid fa-gem ml-1"></i> علامة أنيقة</span>
                                            <p class="text-slate-600 text-[11px]">تقديم بصري راقٍ يرفع قيمة الهدية.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========================================================= -->
                <!-- الوحدات 3 و 4: رادار السوق (تحليل المتغيرات والفرص) وذكاء الجمهور -->
                <!-- ========================================================= -->
                <div id="unit-radar_audience" class="unit-section hidden space-y-6">
                    
                    <!-- القسم الأول: رادار السوق (Market Radar) -->
                    <div class="card-elevated rounded-3xl p-6 border-t-4 border-t-sky-500">
                        <div class="flex flex-wrap items-center justify-between gap-4 mb-5">
                            <div>
                                <span class="text-xs font-extrabold text-sky-600 bg-sky-50 px-3 py-1 rounded-full">Market Radar • الوحدة الثالثة</span>
                                <h2 class="text-xl font-extrabold text-misbar-navy mt-2">رادار السوق: تحليل المتغيرات واكتشاف الفرص</h2>
                                <p class="text-xs text-slate-500 mt-1">رصد الاتجاهات التسويقية، المواسم، التغيرات في سلوك المستهلك، والفرص غير المخدومة في سوق صنعاء.</p>
                            </div>
                            <button onclick="scanMarketOpportunities()" class="px-4 py-2.5 rounded-xl misbar-gradient text-white font-bold text-xs shadow flex items-center gap-2 hover:opacity-95 transition">
                                <i class="fa-solid fa-radar"></i>
                                <span>تحديث رادار السوق واكتشاف الفرص</span>
                            </button>
                        </div>

                        <!-- بطاقات رادار السوق -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs" id="market-radar-cards">
                            <div class="p-4 rounded-2xl bg-emerald-50/70 border border-emerald-200 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="font-extrabold text-emerald-700"><i class="fa-solid fa-arrow-trend-up ml-1"></i> اتجاه صاعد +72%</span>
                                        <span class="text-[10px] bg-white text-emerald-700 px-2 py-0.5 rounded-full border border-emerald-200 font-bold">موسمي</span>
                                    </div>
                                    <h3 class="font-extrabold text-misbar-navy text-sm mb-1.5">هدايا التخرج والزفاف المخصصة بالاسم</h3>
                                    <p class="text-slate-600 leading-relaxed">ارتفاع الطلب في صنعاء على الإطارات التذكارية التي تجمع بين الاسم والتاريخ وعبارة التهنئة بدلاً من الهدايا التقليدية الجاهزة.</p>
                                </div>
                                <div class="mt-3 pt-2 border-t border-emerald-200/60 text-[11px] font-bold text-emerald-800">
                                    الإجراء المقترح: إطلاق باقة التخرج والزفاف المزدوجة
                                </div>
                            </div>

                            <div class="p-4 rounded-2xl bg-sky-50/70 border border-sky-200 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="font-extrabold text-sky-700"><i class="fa-solid fa-bullseye ml-1"></i> فجوة غير مخدومة</span>
                                        <span class="text-[10px] bg-white text-sky-700 px-2 py-0.5 rounded-full border border-sky-200 font-bold">فرصة عالية</span>
                                    </div>
                                    <h3 class="font-extrabold text-misbar-navy text-sm mb-1.5">دمج الإطار التذكاري مع باقة زهور مصغرة</h3>
                                    <p class="text-slate-600 leading-relaxed">معظم المشاريع المنافسة تبيع الإطارات منفردة أو الباقات منفردة؛ دمج المنتجين مع بصمة تغليف موحدة يمنح فلوريا تميزاً فورياً.</p>
                                </div>
                                <div class="mt-3 pt-2 border-t border-sky-200/60 text-[11px] font-bold text-sky-800">
                                    الإجراء المقترح: اعتماد المنتج المزدوج كمنتج رئيسي
                                </div>
                            </div>

                            <div class="p-4 rounded-2xl bg-amber-50/70 border border-amber-200 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="font-extrabold text-amber-700"><i class="fa-solid fa-triangle-exclamation ml-1"></i> متغير سوقي</span>
                                        <span class="text-[10px] bg-white text-amber-700 px-2 py-0.5 rounded-full border border-amber-200 font-bold">سلوك الشراء</span>
                                    </div>
                                    <h3 class="font-extrabold text-misbar-navy text-sm mb-1.5">حساسية السعر وسرعة الرد عبر واتساب</h3>
                                    <p class="text-slate-600 leading-relaxed">العملاء يفضّلون معرفة النطاقات السعرية وخيارات التخصيص بوضوح في كتالوج واتساب قبل التواصل، وتزداد التحويلات عند الشراكة مع مصورات العرائس.</p>
                                </div>
                                <div class="mt-3 pt-2 border-t border-amber-200/60 text-[11px] font-bold text-amber-800">
                                    الإجراء المقترح: تفعيل كتالوج واتساب بالأسعار الواضحة
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- القسم الثاني: ذكاء الجمهور (Audience Intelligence) -->
                    <div class="card-elevated rounded-3xl p-6 border-t-4 border-t-purple-600">
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-5">
                            <div>
                                <span class="text-xs font-extrabold text-purple-600 bg-purple-50 px-3 py-1 rounded-full">Audience Intelligence • الوحدة الرابعة</span>
                                <h2 class="text-xl font-extrabold text-misbar-navy mt-2">ذكاء الجمهور: شرائح العملاء ورحلة العميل (Buyer Personas)</h2>
                                <p class="text-xs text-slate-500 mt-1">تحليل الاحتياجات، الدوافع الشرائية، الاعتراضات، والرسائل المناسبة لكل شريحة في صنعاء.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-xs mb-6">
                            <div class="p-4 rounded-2xl bg-pink-50/60 border border-pink-200">
                                <div class="w-9 h-9 rounded-xl bg-pink-600 text-white flex items-center justify-center mb-3"><i class="fa-solid fa-ring"></i></div>
                                <h3 class="font-extrabold text-misbar-navy text-sm mb-1">1. العرائس</h3>
                                <p class="text-slate-600 mb-2"><strong>الدافع:</strong> تخليد يوم الملكة والزفاف بتذكار يحمل الأسماء والتاريخ.<br><strong>الاعتراض:</strong> القلق من تأخر التسليم.</p>
                                <span class="inline-block bg-white px-2 py-0.5 rounded text-pink-700 font-bold border border-pink-200">إنستغرام + مصورات الأعراس</span>
                            </div>

                            <div class="p-4 rounded-2xl bg-purple-50/60 border border-purple-200">
                                <div class="w-9 h-9 rounded-xl bg-purple-600 text-white flex items-center justify-center mb-3"><i class="fa-solid fa-graduation-cap"></i></div>
                                <h3 class="font-extrabold text-misbar-navy text-sm mb-1">2. الخريجات</h3>
                                <p class="text-slate-600 mb-2"><strong>الدافع:</strong> توثيق فرحة التخرج بإطار أنيق مع باقة زهور للتصوير.<br><strong>الاعتراض:</strong> البحث عن سعر مناسب.</p>
                                <span class="inline-block bg-white px-2 py-0.5 rounded text-purple-700 font-bold border border-purple-200">ريلز إنستغرام + تيك توك</span>
                            </div>

                            <div class="p-4 rounded-2xl bg-sky-50/60 border border-sky-200">
                                <div class="w-9 h-9 rounded-xl bg-sky-600 text-white flex items-center justify-center mb-3"><i class="fa-solid fa-user-group"></i></div>
                                <h3 class="font-extrabold text-misbar-navy text-sm mb-1">3. الصديقات</h3>
                                <p class="text-slate-600 mb-2"><strong>الدافع:</strong> تقديم هدية غير تقليدية تعبّر عن الصداقة بتغليف فاخر.<br><strong>الاعتراض:</strong> الحيرة في اختيار العبارة.</p>
                                <span class="inline-block bg-white px-2 py-0.5 rounded text-sky-700 font-bold border border-sky-200">ستوري إنستغرام + واتساب</span>
                            </div>

                            <div class="p-4 rounded-2xl bg-amber-50/60 border border-amber-200">
                                <div class="w-9 h-9 rounded-xl bg-amber-500 text-white flex items-center justify-center mb-3"><i class="fa-solid fa-house-heart"></i></div>
                                <h3 class="font-extrabold text-misbar-navy text-sm mb-1">4. الأمهات وأفراد الأسرة</h3>
                                <p class="text-slate-600 mb-2"><strong>الدافع:</strong> هدايا ذات قيمة عاطفية عالية في الأعياد والمناسبات العائلية.<br><strong>الاعتراض:</strong> سهولة الطلب.</p>
                                <span class="inline-block bg-white px-2 py-0.5 rounded text-amber-700 font-bold border border-amber-200">واتساب + توصيات العائلة</span>
                            </div>
                        </div>

                        <!-- خريطة رحلة العميل (Customer Journey) -->
                        <div class="bg-slate-50 rounded-2xl p-4 border border-slate-200">
                            <span class="text-xs font-extrabold text-misbar-navy block mb-3"><i class="fa-solid fa-route text-purple-600 ml-1"></i> تحليل رحلة العميل (Customer Journey) في فلوريا:</span>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 text-xs">
                                <div class="bg-white p-3.5 rounded-xl border border-slate-200">
                                    <span class="font-extrabold text-sky-600 block mb-1">1. مرحلة الاكتشاف والوعي (Awareness)</span>
                                    <p class="text-slate-600">مشاهدة ريلز التغليف وصناعة الإطار على إنستغرام $\leftarrow$ الرسالة: <em>"هدية تحمل اسمك وتروي قصتك"</em>.</p>
                                </div>
                                <div class="bg-white p-3.5 rounded-xl border border-slate-200">
                                    <span class="font-extrabold text-purple-600 block mb-1">2. مرحلة الاهتمام والمقارنة (Consideration)</span>
                                    <p class="text-slate-600">تصفح أبرز القصص (Highlights) وكتالوج واتساب $\leftarrow$ الرسالة: <em>"خيارات تخصيص واضحة وأسعار شفافة"</em>.</p>
                                </div>
                                <div class="bg-white p-3.5 rounded-xl border border-slate-200">
                                    <span class="font-extrabold text-emerald-600 block mb-1">3. مرحلة القرار والولاء (Decision & Loyalty)</span>
                                    <p class="text-slate-600">تأكيد الطلب واستلام الهدية بتغليف فلوريا $\leftarrow$ تشجيع العميلة على مشاركة صورة الهدية للتوصية.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========================================================= -->
                <!-- الوحدة 5: مختبر المنافسين (البطائق + مصفوفة المقارنة)    -->
                <!-- ========================================================= -->
                <div id="unit-competitors" class="unit-section hidden space-y-6">
                    <div class="card-elevated rounded-3xl p-6 border-t-4 border-t-indigo-600">
                        <div class="flex flex-wrap items-center justify-between gap-4 mb-5">
                            <div>
                                <span class="text-xs font-extrabold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full">Competitor Intelligence • الوحدة الخامسة</span>
                                <h2 class="text-xl font-extrabold text-misbar-navy mt-2">مختبر المنافسين وتحليل الفجوات التنافسية</h2>
                                <p class="text-xs text-slate-500 mt-1">مقارنة علامتك التجارية بالمنافسين في السوق لاكتشاف الفجوات وتحويلها إلى فرص نمو.</p>
                            </div>
                            <button onclick="openAddCompetitorForm()" class="px-4 py-2.5 rounded-xl misbar-gradient text-white font-bold text-xs shadow flex items-center gap-2 hover:opacity-95 transition">
                                <i class="fa-solid fa-plus"></i>
                                <span>إضافة منافس للمصفوفة</span>
                            </button>
                        </div>

                        <!-- البطائق الثلاث العلوية (مطابقة لتصميم البطائق المرجعي) -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs mb-6">
                            <!-- بطاقة 1: إطار أخضر -->
                            <div class="p-4 rounded-2xl bg-emerald-50/60 border-2 border-emerald-400/80 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="font-extrabold text-emerald-700"><i class="fa-solid fa-arrow-trend-up ml-1"></i> اتجاه صاعد +68%</span>
                                        <span class="text-[11px] text-slate-500 font-bold">موسمي</span>
                                    </div>
                                    <h3 class="font-extrabold text-misbar-navy text-sm mb-1.5">باقات التذكار المزدوجة (إطار + زهور)</h3>
                                    <p class="text-slate-600 leading-relaxed">تزايد بحث العملاء في صنعاء عن هدايا تجمع بين الإطار التذكاري المخصص بالاسم وباقة زهور مصغرة بتغليف متكامل.</p>
                                </div>
                            </div>

                            <!-- بطاقة 2: إطار أزرق سماوي -->
                            <div class="p-4 rounded-2xl bg-sky-50/60 border-2 border-sky-400/80 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="font-extrabold text-sky-700"><i class="fa-solid fa-bullseye ml-1"></i> فجوة غير مخدومة</span>
                                        <span class="text-[11px] text-slate-500 font-bold">فرصة عالية</span>
                                    </div>
                                    <h3 class="font-extrabold text-misbar-navy text-sm mb-1.5">محتوى كواليس التخصيص (Reels)</h3>
                                    <p class="text-slate-600 leading-relaxed">70% من المنافسين يركزون على نشر صور المنتجات الجاهزة فقط دون توثيق قصة الهدية ومراحل كتابة الأسماء والتغليف.</p>
                                </div>
                            </div>

                            <!-- بطاقة 3: إطار برتقالي / كهرماني -->
                            <div class="p-4 rounded-2xl bg-amber-50/60 border-2 border-amber-400/80 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="font-extrabold text-amber-700"><i class="fa-solid fa-triangle-exclamation ml-1"></i> تنبيه تنافسي</span>
                                        <span class="text-[11px] text-slate-500 font-bold">تسعير وتوصيل</span>
                                    </div>
                                    <h3 class="font-extrabold text-misbar-navy text-sm mb-1.5">تقليد التصاميم وسرعة التوصيل</h3>
                                    <p class="text-slate-600 leading-relaxed">بعض المنافسين يقلّدون التصاميم بأسعار أقل؛ الحل في ابتكار بصمة تغليف خاصة بفلوريا وتوضيح الأسعار في كتالوج واتساب.</p>
                                </div>
                            </div>
                        </div>

                        <!-- نموذج إضافة منافس جديد (مخفي افتراضياً) -->
                        <div id="add-competitor-box" class="hidden mb-6 p-4 rounded-2xl bg-slate-50 border border-slate-300 space-y-3 text-xs">
                            <div class="flex items-center justify-between">
                                <strong class="text-misbar-navy text-sm">إضافة منافس جديد إلى مصفوفة المقارنة</strong>
                                <button onclick="document.getElementById('add-competitor-box').classList.add('hidden')" class="text-slate-400 hover:text-rose-600"><i class="fa-solid fa-xmark"></i></button>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-4 gap-3">
                                <input id="comp-name" type="text" placeholder="اسم المنافس..." class="bg-white border border-slate-300 rounded-xl px-3 py-2">
                                <input id="comp-strength" type="text" placeholder="نقاط القوة لديه..." class="bg-white border border-slate-300 rounded-xl px-3 py-2">
                                <input id="comp-weakness" type="text" placeholder="نقاط الضعف / الفجوة..." class="bg-white border border-slate-300 rounded-xl px-3 py-2">
                                <input id="comp-score" type="number" min="1" max="100" value="65" placeholder="قوة المحتوى (من 100)" class="bg-white border border-slate-300 rounded-xl px-3 py-2">
                            </div>
                            <button onclick="addCompetitorRow()" class="px-4 py-2 rounded-xl misbar-gradient text-white font-bold">حفظ في المصفوفة</button>
                        </div>

                        <!-- مصفوفة المقارنة التنافسية (Competitor Matrix) بنفس التصميم والأعمدة -->
                        <div class="rounded-2xl border border-slate-200 overflow-hidden bg-white shadow-sm">
                            <div class="px-5 py-4 bg-slate-50 border-b border-slate-200 flex flex-wrap items-center justify-between gap-2">
                                <h3 class="font-extrabold text-misbar-navy text-base">مصفوفة المقارنة التنافسية (Competitor Matrix)</h3>
                                <span class="text-[11px] text-slate-500">
                                    <i class="fa-solid fa-shield-halved text-emerald-600 ml-1"></i>
                                    مبني على البيانات العامة والمعلنة والمصادر المصرح بها فقط
                                </span>
                            </div>

                            <div class="overflow-x-auto">
                                <table class="w-full text-right text-xs">
                                    <thead class="bg-slate-100/80 text-slate-700 font-extrabold border-b border-slate-200">
                                        <tr>
                                            <th class="py-3.5 px-4">العلامة التجارية</th>
                                            <th class="py-3.5 px-4">نقاط القوة</th>
                                            <th class="py-3.5 px-4">نقاط الضعف / الفجوة</th>
                                            <th class="py-3.5 px-4 text-center">قوة المحتوى</th>
                                            <th class="py-3.5 px-4">التوصية المضادة من مسبار</th>
                                        </tr>
                                    </thead>
                                    <tbody id="competitor-matrix-body" class="divide-y divide-slate-200">
                                        <tr class="bg-sky-50/40">
                                            <td class="py-3.5 px-4 font-extrabold text-sky-700">مشروعك (فلوريا | Floria)</td>
                                            <td class="py-3.5 px-4 text-slate-700">صناعة يدوية + تخصيص بالأسماء والتواريخ + تغليف أنيق</td>
                                            <td class="py-3.5 px-4 text-slate-600">ضعف الانتشار الأولي وقلة الفيديوهات التعريفية</td>
                                            <td class="py-3.5 px-4 text-center">
                                                <span class="inline-block px-2.5 py-1 rounded-lg bg-emerald-100 text-emerald-800 font-extrabold">88/100</span>
                                            </td>
                                            <td class="py-3.5 px-4 font-bold text-amber-600">إطلاق حملة «تفاصيل تحمل أسماءكم» + ريلز كواليس التغليف</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50">
                                            <td class="py-3.5 px-4 font-extrabold text-misbar-navy">المنافس الأول (متجر لمسة تذكار)</td>
                                            <td class="py-3.5 px-4 text-slate-700">انتشار واسع وعدد متابعين كبير في صنعاء</td>
                                            <td class="py-3.5 px-4 text-slate-600">تصاميم نمطية مكررة وتأخر في الرد على الاستفسارات</td>
                                            <td class="py-3.5 px-4 text-center">
                                                <span class="inline-block px-2.5 py-1 rounded-lg bg-amber-100 text-amber-800 font-extrabold">76/100</span>
                                            </td>
                                            <td class="py-3.5 px-4 text-slate-700 font-semibold">التركيز على سرعة الرد عبر كتالوج واتساب والتخصيص حسب الطلب</td>
                                        </tr>
                                        <tr class="hover:bg-slate-50">
                                            <td class="py-3.5 px-4 font-extrabold text-misbar-navy">المنافس الثاني (هدايا الورد)</td>
                                            <td class="py-3.5 px-4 text-slate-700">أسعار اقتصادية وعروض موسمية مستمرة</td>
                                            <td class="py-3.5 px-4 text-slate-600">ضعف الهوية البصرية والتغليف وعدم دمج الإطارات مع الزهور</td>
                                            <td class="py-3.5 px-4 text-center">
                                                <span class="inline-block px-2.5 py-1 rounded-lg bg-rose-100 text-rose-800 font-extrabold">54/100</span>
                                            </td>
                                            <td class="py-3.5 px-4 text-slate-700 font-semibold">إبراز بصمة تغليف فلوريا الفاخرة والمنتج المزدوج (إطار + باقة)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- ملخص SWOT من وثيقة فلوريا -->
                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4 text-xs">
                            <div class="p-4 rounded-2xl bg-emerald-50/60 border border-emerald-200">
                                <h3 class="font-extrabold text-emerald-900 text-sm mb-1.5"><i class="fa-solid fa-circle-plus ml-1"></i> نقاط القوة الداخلية لفلوريا</h3>
                                <p class="text-emerald-950 leading-relaxed">منتجات مصنوعة يدوياً بطابع خاص • تخصيص بالأسماء والعبارات والتواريخ • تنوع المنتجات • اهتمام دقيق بالتفاصيل والتغليف.</p>
                            </div>
                            <div class="p-4 rounded-2xl bg-rose-50/60 border border-rose-200">
                                <h3 class="font-extrabold text-rose-900 text-sm mb-1.5"><i class="fa-solid fa-shield-virus ml-1"></i> التهديدات ونقاط الضعف المرصودة</h3>
                                <p class="text-rose-950 leading-relaxed">ضعف الانتشار الأولي • تقليد التصاميم • تقلب أسعار المواد الخام • عدم وجود قاعدة بيانات منظمة للعملاء السابقين.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========================================================= -->
                <!-- الوحدة 6: بناء الاستراتيجية التسويقية (10 عناصر + أول إعلان) -->
                <!-- ========================================================= -->
                <div id="unit-strategy" class="unit-section hidden space-y-6">
                    <div class="card-elevated rounded-3xl p-6 lg:p-8 border-t-4 border-t-orange-500">
                        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                            <div>
                                <span class="text-xs font-extrabold text-orange-600 bg-orange-50 px-3 py-1 rounded-full">Marketing Strategy Builder • الوحدة السادسة</span>
                                <h2 class="text-2xl font-extrabold text-misbar-navy mt-2">بناء الاستراتيجية التسويقية المتكاملة وأول إعلان لفلوريا</h2>
                                <p class="text-xs text-slate-500 mt-1">تحويل نتائج تحليل السوق والجمهور والمنافسين إلى خطة عمل من 10 عناصر قابلة للتنفيذ.</p>
                            </div>
                            <span class="px-3.5 py-1.5 rounded-xl bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-extrabold">
                                <i class="fa-solid fa-circle-check ml-1"></i> مستوفية لجميع بنود مسبار
                            </span>
                        </div>

                        <!-- العناصر العشرة لبناء الاستراتيجية التسويقية حسب وثيقة مسبار -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-3 mb-8 text-xs">
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200">
                                <span class="font-extrabold text-misbar-navy block mb-1">1. الأهداف التسويقية</span>
                                <p class="text-slate-600">بناء الوعي بفلوريا في صنعاء وتحويل الاستفسارات إلى 60+ طلباً شهرياً.</p>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200">
                                <span class="font-extrabold text-misbar-navy block mb-1">2. الجمهور المستهدف</span>
                                <p class="text-slate-600">العرائس، الخريجات، الصديقات، والأمهات في مدينة صنعاء.</p>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200">
                                <span class="font-extrabold text-misbar-navy block mb-1">3. التموضع التسويقي</span>
                                <p class="text-slate-600">علامة أنيقة تصنع مشاعر وذكريات مخصصة بالاسم والتاريخ وليست مجرد هدية.</p>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200">
                                <span class="font-extrabold text-misbar-navy block mb-1">4. الرسائل والقيمة التنافسية</span>
                                <p class="text-slate-600">«لا نهدي قطعة فحسب، بل نصنع تفاصيل تحمل أسماءكم ومشاعركم».</p>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200">
                                <span class="font-extrabold text-misbar-navy block mb-1">5. القنوات التسويقية</span>
                                <p class="text-slate-600">إنستغرام (ريلز + ستوري)، كتالوج واتساب، وتيك توك.</p>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200">
                                <span class="font-extrabold text-misbar-navy block mb-1">6. الاستراتيجيات المناسبة</span>
                                <p class="text-slate-600">التسويق بالمحتوى العاطفي، المنتج المزدوج، والشراكة مع مصورات العرائس.</p>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200">
                                <span class="font-extrabold text-misbar-navy block mb-1">7. خطة الحملات</span>
                                <p class="text-slate-600">حملة الإطلاق «تفاصيل تحمل أسماءكم» تليها حملات التخرج والأعراس.</p>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200">
                                <span class="font-extrabold text-misbar-navy block mb-1">8. توزيع المهام والميزانية</span>
                                <p class="text-slate-600">60% إعلانات ريلز، 25% عينات لمصورات الأعراس، 15% تطوير التغليف.</p>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200">
                                <span class="font-extrabold text-misbar-navy block mb-1">9. مؤشرات الأداء (KPIs)</span>
                                <p class="text-slate-600">الوصول، الاستفسارات، نسبة التحويل لطلبات فعلية، وهامش الربح.</p>
                            </div>
                            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-200">
                                <span class="font-extrabold text-misbar-navy block mb-1">10. الجدول الزمني للتنفيذ</span>
                                <p class="text-slate-600">خطة مرحلية من 4 أسابيع (التجهيز البصري $\leftarrow$ الإطلاق $\leftarrow$ التوسع).</p>
                            </div>
                        </div>

                        <!-- بطاقة تفاصيل الحملة الأولى ونص الإعلان الأول لفلوريا -->
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                            <!-- العمود الأيمن: هيكل الحملة -->
                            <div class="lg:col-span-5 space-y-4">
                                <div class="bg-pink-50/70 p-4 rounded-2xl border border-pink-200">
                                    <span class="text-[11px] font-bold text-pink-700 block">أول حملة تسويقية مقترحة لفلوريا</span>
                                    <h3 class="text-lg font-extrabold text-misbar-navy mt-0.5">حملة «تفاصيل تحمل أسماءكم» ✨</h3>
                                    <p class="text-xs text-slate-600 mt-1">الهدف: زيادة الوعي باسم فلوريا في صنعاء وتحويل الاستفسارات إلى طلبات فعلية.</p>
                                </div>

                                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-3 text-xs">
                                    <div>
                                        <span class="text-slate-500 block font-bold">العرض والمنتج المحوري (Product Bundle):</span>
                                        <p class="text-slate-800 font-semibold mt-0.5">باقة التذكار المزدوجة: إطار يدوي مخصص (بالاسم + العبارة + التاريخ) + باقة زهور مصغرة + بطاقة إهداء ببصمة تغليف فلوريا.</p>
                                    </div>
                                    <div>
                                        <span class="text-slate-500 block font-bold">الشريحة المستهدفة في الإعلان:</span>
                                        <p class="text-slate-800 font-semibold mt-0.5">العرائس، الخريجات، والصديقات في مدينة صنعاء (توصيل سريع وآمن).</p>
                                    </div>
                                    <div>
                                        <span class="text-slate-500 block font-bold">مسار التحويل (Conversion Funnel):</span>
                                        <p class="text-slate-800 font-semibold mt-0.5">إعلان ريلز ممول على إنستغرام $\leftarrow$ الانتقال إلى كتالوج واتساب المنظم $\leftarrow$ تأكيد التخصيص والطلب.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- العمود الأيسر: نص الإعلان الأول الجاهز للنشر -->
                            <div class="lg:col-span-7 bg-gradient-to-br from-[#0A1E46] to-[#1E1B4B] text-white rounded-2xl p-6 flex flex-col justify-between shadow-lg">
                                <div>
                                    <div class="flex items-center justify-between mb-4">
                                        <span class="text-xs font-bold bg-orange-500 text-white px-3 py-1 rounded-full">
                                            <i class="fa-solid fa-star ml-1"></i> نص الإعلان الأول لفلوريا (Instagram & WhatsApp)
                                        </span>
                                        <button onclick="copyFirstAd()" class="text-xs bg-white/15 hover:bg-white/25 px-3 py-1.5 rounded-lg font-bold transition">
                                            <i class="fa-regular fa-copy ml-1"></i> نسخ الإعلان
                                        </button>
                                    </div>

                                    <div id="floria-first-ad-text" class="bg-white/10 backdrop-blur-sm border border-white/15 rounded-xl p-4 text-sm leading-relaxed space-y-2.5 text-slate-100">
                                        <p class="font-bold text-amber-300">بعض اللحظات تستحق أن تبقى.. لا أن تمرّ عابرة ✨🌸</p>
                                        <p>في <strong>فلوريا | Floria</strong>، لا نقدم مجرد هدية، بل نصنع لكِ قطعة يدوية تحمل <strong>اسمكِ، عبارتكِ الخاصة، وتاريخ أجمل مناسباتكِ</strong> (تخرج، خطوبة، زفاف، أو مفاجأة لصديقة غالية).</p>
                                        <p>🎁 <strong>عرض الإطلاق الخاص في صنعاء:</strong><br>
                                        اطلبي الآن <em>«إطار الذكريات المخصص + باقة زهور مصغرة + بطاقة رسالة»</em> بتغليف فلوريا الأنيق الذي يروي قصتكِ من النظرة الأولى.</p>
                                        <p class="text-sky-300 font-bold">👇 تصفّحي الكتالوج والأسعار واطلبي هديتكِ المخصصة الآن عبر واتساب:<br>
                                        📲 رابط الكتالوج المباشر في البايو أو راسلينا الآن!</p>
                                        <p class="text-xs text-slate-300 pt-1">#فلوريا #لمسات_تزهر_بالجمال #هدايا_صنعاء #هدايا_مخصصة #تخرج_صنعاء #عرائس_صنعاء</p>
                                    </div>
                                </div>

                                <div class="mt-4 pt-3 border-t border-white/15 flex flex-wrap items-center justify-between gap-2 text-xs">
                                    <span class="text-emerald-300 font-bold"><i class="fa-solid fa-check-double ml-1"></i> درجة جودة الإعلان (Content Score): 95/100</span>
                                    <button onclick="sendAdToStudio()" class="px-3.5 py-1.5 rounded-lg bg-sky-500 hover:bg-sky-400 text-slate-950 font-extrabold transition">
                                        تعديل أو إعادة تدوير في الاستوديو ←
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- خطة التنفيذ الزمنية لـ 4 أسابيع -->
                        <div class="mt-8">
                            <h3 class="text-base font-extrabold text-misbar-navy mb-4">الجدول الزمني لتنفيذ استراتيجية فلوريا (الشهر الأول)</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-xs">
                                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                                    <span class="font-extrabold text-purple-700 block mb-1">الأسبوع 1: التجهيز البصري</span>
                                    <p class="text-slate-600 leading-relaxed">توحيد بصمة التغليف، ترتيب أبرز القصص (Highlights) في إنستغرام، وإنشاء كتالوج واتساب بالأسعار.</p>
                                </div>
                                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                                    <span class="font-extrabold text-pink-700 block mb-1">الأسبوع 2: إطلاق الحملة الأولى</span>
                                    <p class="text-slate-600 leading-relaxed">نشر فيديو ريلز يوثق مراحل صناعة الإطار المخصص باليد وتغليفه، وإطلاق الإعلان الممول في صنعاء.</p>
                                </div>
                                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                                    <span class="font-extrabold text-sky-700 block mb-1">الأسبوع 3: الشراكات والتوصيات</span>
                                    <p class="text-slate-600 leading-relaxed">إرسال هدايا ترويجية لـ 3 مصورات عرائس في صنعاء ومشاركة آراء وتصوير أولى العميلات (UGC).</p>
                                </div>
                                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                                    <span class="font-extrabold text-emerald-700 block mb-1">الأسبوع 4: القياس والتحسين</span>
                                    <p class="text-slate-600 leading-relaxed">تحليل نسبة تحويل الاستفسارات إلى طلبات، وحساب هامش الربح لكل منتج لتوسيع الإعلان الفائز.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========================================================= -->
                <!-- الوحدات 7, 8, 11: استوديو المحتوى، التدوير، وتقييم الجودة  -->
                <!-- ========================================================= -->
                <div id="unit-studio" class="unit-section hidden space-y-6">
                    <div class="card-elevated rounded-3xl p-6">
                        <div class="mb-5">
                            <span class="text-xs font-extrabold text-purple-600 bg-purple-50 px-3 py-1 rounded-full">AI Content Studio & Content Score</span>
                            <h2 class="text-xl font-extrabold text-misbar-navy mt-2">استوديو صناعة المحتوى العاطفي لفلوريا وتقييمه</h2>
                            <p class="text-xs text-slate-500 mt-1">محتوى يبيع الفكرة والمشاعر والاحتياج بدلاً من الاكتفاء بعرض صور المنتجات.</p>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                            <div class="lg:col-span-4 space-y-3 bg-slate-50 p-4 rounded-2xl border border-slate-200">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">نوع المحتوى المطلوب</label>
                                    <select id="floria-content-type" class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs font-bold">
                                        <option value="ad">إعلان ترويجي أول (إطار + باقة)</option>
                                        <option value="reels">سيناريو فيديو ريلز (تغليف هدية تخرج)</option>
                                        <option value="whatsapp">رسالة كتالوج واتساب والرد على الاستفسار</option>
                                        <option value="collab">رسالة تعاون لمصورات العرائس في صنعاء</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-1">المناسبة / الشريحة</label>
                                    <select id="floria-occasion" class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs font-bold">
                                        <option value="grad">تخرج (الخريجات وصديقاتهن)</option>
                                        <option value="bride">زفاف / ملكة (العرائس)</option>
                                        <option value="family">هدية عائلية / للأم</option>
                                    </select>
                                </div>
                                <button onclick="generateFloriaStudio()" class="w-full py-3 rounded-xl misbar-gradient text-white font-bold text-xs shadow flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                                    <span>توليد النص بنبرة فلوريا</span>
                                </button>
                            </div>

                            <div class="lg:col-span-8 space-y-4">
                                <div class="bg-white border border-slate-300 rounded-2xl p-4">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-xs font-bold text-misbar-navy">محرر المحتوى التفاعلي</span>
                                        <div class="flex gap-1.5">
                                            <button onclick="repurposeFloria('reels')" class="text-[11px] bg-purple-50 text-purple-700 px-2.5 py-1 rounded-lg font-bold border border-purple-200">تحويل لريلز</button>
                                            <button onclick="repurposeFloria('whatsapp')" class="text-[11px] bg-emerald-50 text-emerald-700 px-2.5 py-1 rounded-lg font-bold border border-emerald-200">تحويل لواتساب</button>
                                        </div>
                                    </div>
                                    <textarea id="floria-editor" rows="5" oninput="scoreFloriaContent()" class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3.5 text-sm leading-relaxed text-slate-800 focus:outline-none focus:border-purple-500">في فلوريا، لا نهدي قطعة فحسب.. بل نصنع تفاصيل تحمل أسماءكم ومشاعركم 🌸✨
إطار تذكاري مصنوع يدوياً باسم الخريجة وتاريخ تخرجها، منسق مع باقة زهور مصغرة وتغليف يحكي قصة فرحتكم.
اطلبي الآن عبر كتالوج واتساب في البايو واستفيدي من التوصيل السريع داخل صنعاء! 🎁📲</textarea>
                                </div>

                                <!-- أداة Content Score -->
                                <div class="bg-emerald-50/70 border border-emerald-200 rounded-2xl p-4 flex flex-col sm:flex-row items-center gap-4">
                                    <div class="w-20 h-20 rounded-full bg-white border-4 border-emerald-500 flex flex-col items-center justify-center shrink-0">
                                        <span id="floria-score-val" class="text-xl font-black text-emerald-600">94</span>
                                        <span class="text-[10px] text-slate-500">من 100</span>
                                    </div>
                                    <div class="flex-1 text-xs space-y-1.5">
                                        <div class="flex items-center justify-between">
                                            <strong class="text-misbar-navy text-sm">تقييم جودة المحتوى (Content Score)</strong>
                                            <span class="px-2.5 py-0.5 rounded-full bg-emerald-600 text-white font-bold">متوافق مع Brand DNA</span>
                                        </div>
                                        <p class="text-slate-700">✓ يلامس الجانب العاطفي (المشاعر والذكريات) بدلاً من الوصف الجاف.</p>
                                        <p class="text-slate-700">✓ يوضح خيارات التخصيص (الاسم والتاريخ) ويحتوي على دعوة واضحة لكتالوج واتساب.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========================================================= -->
                <!-- الوحدة 9: مخطط المحتوى وتنظيم إنستغرام (Content Planner)    -->
                <!-- ========================================================= -->
                <div id="unit-planner" class="unit-section hidden space-y-6">
                    <div class="card-elevated rounded-3xl p-6">
                        <div class="flex flex-wrap items-center justify-between gap-4 mb-5">
                            <div>
                                <span class="text-xs font-extrabold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full">Content Planner & Instagram Structure</span>
                                <h2 class="text-xl font-extrabold text-misbar-navy mt-2">مخطط المحتوى وتنظيم واجهة إنستغرام لفلوريا</h2>
                            </div>
                            <button onclick="suggestFloriaTodayPost()" class="px-4 py-2 rounded-xl bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs shadow">
                                <i class="fa-solid fa-lightbulb ml-1"></i> ماذا أنشر اليوم؟
                            </button>
                        </div>

                        <!-- تقسيم أبرز القصص (Highlights) من خطة فلوريا -->
                        <div class="mb-6 bg-pink-50/50 p-4 rounded-2xl border border-pink-200">
                            <span class="text-xs font-extrabold text-pink-800 block mb-2.5">تنظيم أبرز القصص (Instagram Highlights) الموصى به في خطة فلوريا:</span>
                            <div class="flex flex-wrap gap-2 text-xs">
                                <span class="px-3 py-1.5 rounded-full bg-white border border-pink-200 font-bold text-misbar-navy">🖼️ الإطارات المخصصة</span>
                                <span class="px-3 py-1.5 rounded-full bg-white border border-pink-200 font-bold text-misbar-navy">💐 باقات + إطارات</span>
                                <span class="px-3 py-1.5 rounded-full bg-white border border-pink-200 font-bold text-misbar-navy">👰 هدايا العرائس</span>
                                <span class="px-3 py-1.5 rounded-full bg-white border border-pink-200 font-bold text-misbar-navy">🎓 هدايا التخرج</span>
                                <span class="px-3 py-1.5 rounded-full bg-white border border-pink-200 font-bold text-misbar-navy">🎀 بصمة التغليف</span>
                                <span class="px-3 py-1.5 rounded-full bg-white border border-pink-200 font-bold text-misbar-navy">💬 آراء عميلات صنعاء</span>
                            </div>
                        </div>

                        <div id="floria-today-suggestion" class="hidden mb-5 p-4 rounded-2xl bg-amber-50 border border-amber-300 text-xs flex items-center justify-between gap-3">
                            <div>
                                <strong class="text-amber-900 block">💡 اقتراح اليوم لفلوريا:</strong>
                                <span class="text-slate-700">تصوير مقطع ريلز مدته 12 ثانية يظهر لحظة كتابة الاسم والتاريخ على الإطار ثم ربط شريطة التغليف مع موسيقى هادئة.</span>
                            </div>
                            <button onclick="addFloriaPostToCalendar()" class="px-3 py-2 rounded-xl bg-amber-600 text-white font-bold shrink-0">+ إضافة للتقويم</button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs" id="floria-calendar-grid">
                            <!-- تعبئة ديناميكية -->
                        </div>
                    </div>
                </div>

                <!-- ========================================================= -->
                <!-- الوحدات 12, 13: مؤشرات الأداء (KPIs) ومحاكي الحملة         -->
                <!-- ========================================================= -->
                <div id="unit-analytics" class="unit-section hidden space-y-6">
                    <div class="card-elevated rounded-3xl p-6">
                        <div class="mb-5">
                            <span class="text-xs font-extrabold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">Performance Analytics & Simulator • مؤشرات خطة فلوريا</span>
                            <h2 class="text-xl font-extrabold text-misbar-navy mt-2">لوحة مؤشرات الأداء ومحاكي ميزانية الإعلان الأول</h2>
                            <p class="text-xs text-slate-500 mt-1">لا نقيس نجاح فلوريا بعدد المتابعين فقط، بل بمدى تحول الاستفسارات إلى طلبات فعلية مربحة.</p>
                        </div>

                        <!-- المؤشرات الثمانية من الصفحة 4 من PDF فلوريا -->
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-6 text-xs">
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                                <span class="text-slate-500 block">الوصول (Reach)</span>
                                <strong class="text-xl font-black text-misbar-navy">14,800</strong>
                                <span class="text-[11px] text-emerald-600 block mt-0.5">في صنعاء</span>
                            </div>
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                                <span class="text-slate-500 block">الاستفسارات (واتساب)</span>
                                <strong class="text-xl font-black text-sky-600">215</strong>
                                <span class="text-[11px] text-slate-500 block mt-0.5">سؤال عن السعر والتخصيص</span>
                            </div>
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                                <span class="text-slate-500 block">تحويل الاستفسارات لطلبات</span>
                                <strong class="text-xl font-black text-purple-600">28.5%</strong>
                                <span class="text-[11px] text-emerald-600 block mt-0.5">61 طلباً منفذاً</span>
                            </div>
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200">
                                <span class="text-slate-500 block">هامش الربح المحقق</span>
                                <strong class="text-xl font-black text-amber-600">42%</strong>
                                <span class="text-[11px] text-slate-500 block mt-0.5">أعلى طلب: إطار + باقة</span>
                            </div>
                        </div>

                        <!-- محاكي الحملة الإعلانية الأولى لفلوريا -->
                        <div class="bg-slate-900 text-white rounded-2xl p-6 grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                            <div class="lg:col-span-6 space-y-3">
                                <span class="text-xs font-bold text-amber-400">Campaign Simulator • محاكي ميزانية إعلان فلوريا</span>
                                <h3 class="text-lg font-extrabold">اختبر ميزانية إعلانك الممول على إنستغرام في صنعاء</h3>
                                <div>
                                    <div class="flex justify-between text-xs mb-1">
                                        <span>الميزانية الإعلانية المقترحة:</span>
                                        <strong id="floria-budget-display" class="text-amber-400 text-sm">$50</strong>
                                    </div>
                                    <input id="floria-budget-slider" type="range" min="15" max="300" step="5" value="50" oninput="simulateFloriaAd()" class="w-full">
                                </div>
                                <p class="text-[11px] text-slate-400">* هذه الأرقام توقعات تقديرية لمساعدتك في التخطيط وليست نتائج مضمونة.</p>
                            </div>

                            <div class="lg:col-span-6 grid grid-cols-3 gap-3 text-center">
                                <div class="bg-white/10 p-3.5 rounded-xl border border-white/10">
                                    <span class="text-[11px] text-slate-300 block">الوصول التقديري</span>
                                    <strong id="floria-sim-reach" class="text-lg font-black text-white">12,500</strong>
                                </div>
                                <div class="bg-white/10 p-3.5 rounded-xl border border-white/10">
                                    <span class="text-[11px] text-slate-300 block">استفسارات واتساب</span>
                                    <strong id="floria-sim-inquiries" class="text-lg font-black text-sky-400">110</strong>
                                </div>
                                <div class="bg-white/10 p-3.5 rounded-xl border border-white/10">
                                    <span class="text-[11px] text-slate-300 block">الطلبات المتوقعة</span>
                                    <strong id="floria-sim-orders" class="text-lg font-black text-emerald-400">30</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ========================================================= -->
                <!-- الوحدات 10, 14: ذكاء صوت العميل وغرفة الإنقاذ التسويقي     -->
                <!-- ========================================================= -->
                <div id="unit-voice_rescue" class="unit-section hidden space-y-6">
                    <div class="card-elevated rounded-3xl p-6 border-t-4 border-t-rose-600">
                        <span class="text-xs font-extrabold text-rose-600 bg-rose-50 px-3 py-1 rounded-full">Marketing Rescue Room • غرفة الإنقاذ التسويقي</span>
                        <h2 class="text-xl font-extrabold text-misbar-navy mt-2 mb-4">معالجة التحديات والمخاطر الخاصة بمشروع فلوريا</h2>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-5 text-xs">
                            <button onclick="selectFloriaRescue('season')" class="p-3.5 rounded-xl bg-rose-50 border-2 border-rose-500 text-right font-bold text-misbar-navy">
                                📉 انخفاض الطلب خارج مواسم التخرج والأعراس
                            </button>
                            <button onclick="selectFloriaRescue('copycat')" class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 hover:border-rose-400 text-right font-bold text-misbar-navy">
                                🎨 تقليد التصاميم من المنافسين
                            </button>
                            <button onclick="selectFloriaRescue('delivery')" class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 hover:border-rose-400 text-right font-bold text-misbar-navy">
                                🚚 مخاطر تأخر التوصيل أو تلف الإطارات
                            </button>
                        </div>

                        <div id="floria-rescue-box" class="bg-slate-50 p-5 rounded-2xl border border-slate-200 text-xs space-y-2.5 leading-relaxed">
                            <!-- تعبئة ديناميكية -->
                        </div>
                    </div>
                </div>

                <!-- ========================================================= -->
                <!-- قسم إدارة الباقات والمستخدمين (SaaS Plans & RBAC)          -->
                <!-- ========================================================= -->
                <div id="unit-admin" class="unit-section hidden space-y-6">
                    <div class="card-elevated rounded-3xl p-6 lg:p-8 border-t-4 border-t-amber-500">
                        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                            <div>
                                <span class="text-xs font-extrabold text-amber-700 bg-amber-50 px-3 py-1 rounded-full">SaaS & RBAC Management • نموذج العمل والصلاحيات</span>
                                <h2 class="text-2xl font-extrabold text-misbar-navy mt-2">إدارة باقات الاشتراك وفريق العمل</h2>
                                <p class="text-xs text-slate-500 mt-1">التحكم في باقة مساحة العمل، حدود التوكنز، وصلاحيات أعضاء الفريق (مدير، استراتيجي، كاتب محتوى، مراجع).</p>
                            </div>
                            <div class="bg-slate-900 text-white px-4 py-2.5 rounded-2xl text-xs">
                                <span class="text-slate-400 block text-[10px]">استهلاك الذكاء الاصطناعي (Tokens)</span>
                                <strong class="text-amber-400">34,500 / 100,000 توكن</strong>
                            </div>
                        </div>

                        <!-- باقات الاشتراك الخمس (من وثيقة مسبار) -->
                        <h3 class="text-sm font-extrabold text-misbar-navy mb-3">مستويات الاشتراك في منصة مسبار (SaaS Tiers)</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3 mb-8 text-xs">
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
                                <div>
                                    <span class="font-black text-misbar-navy text-sm block">Free</span>
                                    <span class="text-[11px] text-slate-500">تجربة الوظائف الأساسية بإمكانات محدودة</span>
                                    <ul class="mt-2.5 space-y-1 text-[11px] text-slate-600">
                                        <li>• مشروع واحد (Brand)</li>
                                        <li>• مستخدم واحد</li>
                                        <li>• 10,000 توكن شهرياً</li>
                                    </ul>
                                </div>
                                <button onclick="changeWorkspacePlan('Free')" class="mt-3 w-full py-1.5 rounded-xl bg-white border border-slate-300 font-bold hover:bg-slate-100">تفعيل الباقة</button>
                            </div>

                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
                                <div>
                                    <span class="font-black text-sky-700 text-sm block">Creator</span>
                                    <span class="text-[11px] text-slate-500">لصناع المحتوى والمسوقين المستقلين</span>
                                    <ul class="mt-2.5 space-y-1 text-[11px] text-slate-600">
                                        <li>• 3 مشاريع (Brands)</li>
                                        <li>• استوديو المحتوى + التقييم</li>
                                        <li>• 40,000 توكن شهرياً</li>
                                    </ul>
                                </div>
                                <button onclick="changeWorkspacePlan('Creator')" class="mt-3 w-full py-1.5 rounded-xl bg-white border border-slate-300 font-bold hover:bg-slate-100">تفعيل الباقة</button>
                            </div>

                            <div class="p-4 rounded-2xl bg-purple-50/70 border-2 border-purple-600 flex flex-col justify-between relative">
                                <span class="absolute -top-2.5 left-3 bg-purple-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">الباقة النشطة</span>
                                <div>
                                    <span class="font-black text-purple-900 text-sm block">Business</span>
                                    <span class="text-[11px] text-purple-700">للشركات والمشاريع المتكاملة (مثل فلوريا)</span>
                                    <ul class="mt-2.5 space-y-1 text-[11px] text-slate-700">
                                        <li>• 5 مشاريع + 5 أعضاء فريق</li>
                                        <li>• جميع الوحدات الـ 14</li>
                                        <li>• 100,000 توكن شهرياً</li>
                                    </ul>
                                </div>
                                <button onclick="changeWorkspacePlan('Business')" class="mt-3 w-full py-1.5 rounded-xl misbar-gradient text-white font-bold">مفعّلة حالياً</button>
                            </div>

                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
                                <div>
                                    <span class="font-black text-indigo-800 text-sm block">Agency</span>
                                    <span class="text-[11px] text-slate-500">لوكالات التسويق التي تدير عدة عملاء</span>
                                    <ul class="mt-2.5 space-y-1 text-[11px] text-slate-600">
                                        <li>• مساحات عمل غير محدودة</li>
                                        <li>• نظام المراجعة والموافقات</li>
                                        <li>• 350,000 توكن شهرياً</li>
                                    </ul>
                                </div>
                                <button onclick="changeWorkspacePlan('Agency')" class="mt-3 w-full py-1.5 rounded-xl bg-white border border-slate-300 font-bold hover:bg-slate-100">ترقية للباقة</button>
                            </div>

                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
                                <div>
                                    <span class="font-black text-amber-700 text-sm block">Enterprise</span>
                                    <span class="text-[11px] text-slate-500">للمؤسسات الكبيرة والتكاملات المتقدمة</span>
                                    <ul class="mt-2.5 space-y-1 text-[11px] text-slate-600">
                                        <li>• صلاحيات RBAC مخصصة</li>
                                        <li>• تكاملات API مباشرة</li>
                                        <li>• سعة توكنز مخصصة</li>
                                    </ul>
                                </div>
                                <button onclick="changeWorkspacePlan('Enterprise')" class="mt-3 w-full py-1.5 rounded-xl bg-white border border-slate-300 font-bold hover:bg-slate-100">طلب تفعيل</button>
                            </div>
                        </div>

                        <!-- إدارة المستخدمين والصلاحيات (RBAC) -->
                        <div class="bg-slate-50 rounded-2xl p-5 border border-slate-200">
                            <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                                <h3 class="text-sm font-extrabold text-misbar-navy">أعضاء فريق مساحة عمل «فلوريا» والصلاحيات</h3>
                                <div class="flex flex-wrap gap-2 text-xs">
                                    <input id="new-member-name" type="text" placeholder="اسم العضو الجديد..." class="bg-white border border-slate-300 rounded-xl px-3 py-1.5">
                                    <select id="new-member-role" class="bg-white border border-slate-300 rounded-xl px-3 py-1.5 font-bold">
                                        <option value="كاتب محتوى (Content Creator)">كاتب محتوى (Content Creator)</option>
                                        <option value="مراجع ومعتمد (Reviewer)">مراجع ومعتمد (Reviewer)</option>
                                        <option value="استراتيجي تسويق (Strategist)">استراتيجي تسويق (Strategist)</option>
                                        <option value="مدير حساب (Admin)">مدير حساب (Admin)</option>
                                    </select>
                                    <button onclick="addWorkspaceMember()" class="px-3.5 py-1.5 rounded-xl misbar-gradient text-white font-bold">+ دعوة عضو</button>
                                </div>
                            </div>

                            <div class="overflow-x-auto bg-white rounded-xl border border-slate-200">
                                <table class="w-full text-right text-xs">
                                    <thead class="bg-slate-100 text-slate-700 font-extrabold">
                                        <tr>
                                            <th class="py-2.5 px-4">العضو</th>
                                            <th class="py-2.5 px-4">البريد الإلكتروني</th>
                                            <th class="py-2.5 px-4">الدور والصلاحية</th>
                                            <th class="py-2.5 px-4">الحالة</th>
                                        </tr>
                                    </thead>
                                    <tbody id="workspace-members-body" class="divide-y divide-slate-200">
                                        <tr>
                                            <td class="py-3 px-4 font-bold text-misbar-navy">مؤسسة مشروع فلوريا</td>
                                            <td class="py-3 px-4 text-slate-500" dir="ltr">hello@floria-sanaa.com</td>
                                            <td class="py-3 px-4"><span class="px-2.5 py-0.5 rounded-full bg-purple-100 text-purple-800 font-bold">مالك المساحة (Owner)</span></td>
                                            <td class="py-3 px-4 text-emerald-600 font-bold">نشط</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 font-bold text-misbar-navy">أخصائية التسويق والمحتوى</td>
                                            <td class="py-3 px-4 text-slate-500" dir="ltr">marketing@floria-sanaa.com</td>
                                            <td class="py-3 px-4"><span class="px-2.5 py-0.5 rounded-full bg-sky-100 text-sky-800 font-bold">استراتيجي تسويق (Strategist)</span></td>
                                            <td class="py-3 px-4 text-emerald-600 font-bold">نشط</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 font-bold text-misbar-navy">منسقة الطلبات والتواصل</td>
                                            <td class="py-3 px-4 text-slate-500" dir="ltr">orders@floria-sanaa.com</td>
                                            <td class="py-3 px-4"><span class="px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800 font-bold">كاتب محتوى (Content Creator)</span></td>
                                            <td class="py-3 px-4 text-emerald-600 font-bold">نشط</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    
                <p class="text-[10px] text-slate-400 text-center pt-2">نسخة معاينة تفاعلية: التغييرات محلية في المتصفح ولا تُحفظ في قاعدة بيانات.</p>

    <!-- إشعار Toast -->
    <div id="app-toast" class="fixed bottom-5 left-5 z-50 hidden">
        <div class="bg-misbar-navy text-white px-4 py-3 rounded-2xl shadow-xl border border-sky-400/30 flex items-center gap-2.5 text-xs font-bold">
            <i class="fa-solid fa-circle-check text-emerald-400 text-base"></i>
            <span id="app-toast-msg">تم التنفيذ بنجاح</span>
        </div>
    </div>
@endsection
