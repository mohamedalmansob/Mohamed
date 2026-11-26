<header class="sticky top-0 z-40 bg-white border-b border-slate-200 px-4 lg:px-8 py-3 shadow-sm">
    <div class="max-w-[1440px] mx-auto flex flex-wrap items-center justify-between gap-4">

        <!-- الشعار وهوية المنصة -->
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center overflow-hidden shrink-0">
                <img src="{{ asset('images/misbar-logo.jpg') }}"
                     alt="شعار مسبار MISBAR"
                     class="w-full h-full object-contain rounded-full">
            </div>
            <div>
                <div class="flex items-center gap-2">
                    <span class="text-lg font-black text-misbar-navy tracking-wide">مسبار <span class="text-[#0A2540]">MISB<span class="text-[#F97316]">A</span>R</span></span>
                    <span class="bg-gradient-to-r from-[#0A2540] via-[#0284C7] to-[#EA580C] bg-clip-text text-transparent">من عمق البيانات إلى قمة القرار</span>
                </div>
                <p class="text-[11px] text-slate-500">منظومة الذكاء التسويقي وصناعة المحتوى</p>
            </div>
        </div>

        <!-- بطاقة المشروع النشط -->
        <div class="flex items-center gap-3 bg-gradient-to-l from-pink-50 via-purple-50 to-sky-50 px-4 py-2 rounded-2xl border border-pink-200/80">
            <div id="nav-brand-icon" class="w-8 h-8 rounded-xl bg-pink-600 text-white flex items-center justify-center shadow-sm">
                <i class="fa-solid fa-spa"></i>
            </div>
            <div class="text-xs">
                <div class="flex items-center gap-1.5">
                    <strong class="text-misbar-navy font-extrabold" id="nav-brand-name">فلوريا | Floria</strong>
                    <span id="nav-brand-geo" class="text-[10px] bg-pink-600 text-white px-2 py-0.5 rounded-full font-bold">صنعاء</span>
                </div>
                <span id="nav-brand-tagline" class="text-slate-600 text-[11px]">لمسات تُزهر بالجمال • هدايا يدوية مخصصة</span>
            </div>
        </div>

        <!-- أدوات المستخدم وتسجيل الخروج -->
        <div class="flex items-center gap-3">
            <button type="button" onclick="goBackSafely('{{ route('workspace') }}')" class="px-3 py-2 rounded-xl bg-white hover:bg-slate-50 text-slate-600 text-xs font-bold border border-slate-200">رجوع</button>
            <a href="{{ route('workspace.admin') }}" id="nav-plan-badge" class="hidden md:inline-block text-xs font-bold px-3 py-1.5 rounded-xl bg-purple-100 text-purple-800 border border-purple-200 hover:bg-purple-200 transition cursor-pointer">
                باقة Business
            </a>
            <a href="{{ route('login') }}" onclick="logoutToLogin(); return false;" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-rose-50 text-slate-700 hover:text-rose-600 text-xs font-bold flex items-center gap-1.5 transition border border-slate-200">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span>تسجيل الخروج</span>
            </a>
        </div>
    </div>
</header>