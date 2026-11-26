@extends('layouts.workspace')

@section('workspace-content')
@php
    $visual = $brand->visual_identity ?? [];
    $primaryColor = $visual['primary_color'] ?? '#BE185D';
    $secondaryColor = $visual['secondary_color'] ?? '#D97706';
    $accentColor = $visual['accent_color'] ?? '#FDF2F8';
    $geoScope = $visual['geo_scope'] ?? 'صنعاء (مع إمكانية التوسع)';

    $goalsText = !empty($brand?->business_goals)
        ? implode("\n", $brand->business_goals)
        : "1. بناء علامة تجارية معروفة وموثوقة في مجال الهدايا اليدوية في صنعاء.\n2. زيادة الوعي باسم فلوريا ومنتجاتها لدى الجمهور المستهدف.\n3. جذب العملاء وتحويل الاستفسارات إلى طلبات فعلية.\n4. تحقيق دخل وأرباح مستدامة مع الحفاظ على جودة المنتجات.";

    $defaultPillars = [
        ['title' => 'علامة تصنع مشاعر', 'description' => 'هدية تحمل رسالة وقصة إنسانية.'],
        ['title' => 'تهتم بالتفاصيل', 'description' => 'دقة تناسق الألوان وبصمة التغليف.'],
        ['title' => 'علامة مخصصة', 'description' => 'الأسماء والعبارات والتواريخ الخاصة.'],
        ['title' => 'علامة أنيقة', 'description' => 'تقديم بصري راقٍ يرفع قيمة الهدية.'],
    ];
    $savedPillars = $brand->vision_mission_values['positioning_pillars'] ?? $defaultPillars;
@endphp

<div id="unit-brand" class="unit-section space-y-6">
    @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-2xl text-xs font-bold flex items-center justify-between">
            <span><i class="fa-solid fa-circle-check ml-1.5 text-emerald-600"></i> {{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-rose-50 border border-rose-200 text-rose-800 px-4 py-3 rounded-2xl text-xs font-bold">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="brand-dna-form" action="{{ route('brand-dna.save') }}" method="POST" class="card-elevated rounded-3xl p-6 lg:p-8 border-t-4 border-t-pink-600">
        @csrf

        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
            <div>
                <span class="text-xs font-extrabold text-pink-600 bg-pink-50 px-3 py-1 rounded-full">Brand Intelligence • بناء الحمض النووي للعلامة التجارية</span>
                <h2 class="text-2xl font-extrabold text-misbar-navy mt-2">إعداد وتخصيص ملف العلامة التجارية (Brand DNA)</h2>
                <p class="text-xs text-slate-500 mt-1">أدخل بيانات علامتك التجارية أو ولّدها بالذكاء الاصطناعي ثم راجعها واحفظها لمواءمة جميع الوحدات تلقائياً.</p>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <button type="button" onclick="resetFloriaBrandDNA()" class="px-3.5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold border border-slate-200 transition">
                    <i class="fa-solid fa-rotate-right ml-1"></i> استعادة بيانات فلوريا
                </button>
                <button type="button" id="btn-generate-brand-ai" onclick="generateBrandDNAWithAI()" class="px-4 py-2.5 rounded-xl bg-amber-50 hover:bg-amber-100 text-amber-800 text-xs font-bold border border-amber-200 transition">
                    <i class="fa-solid fa-wand-magic-sparkles ml-1"></i> توليد بالذكاء الاصطناعي 
                </button>
                <button type="submit" class="px-4 py-2.5 rounded-xl misbar-gradient text-white text-xs font-bold shadow hover:opacity-95 transition">
                    <i class="fa-solid fa-floppy-disk ml-1"></i> حفظ وتحديث Brand DNA
                </button>
                @if(Route::has('content.create'))
                    <a href="{{ route('content.create') }}" class="px-4 py-2.5 rounded-xl bg-purple-50 hover:bg-purple-100 text-purple-700 text-xs font-bold border border-purple-200 transition">الانتقال إلى توليد المحتوى</a>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            <!-- العمود الأيمن: نموذج الإدخال التفاعلي -->
            <div class="lg:col-span-7 space-y-4">

                <!-- 1. اسم العلامة التجارية -->
                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-6 h-6 rounded-full misbar-gradient text-white text-xs font-extrabold flex items-center justify-center">1</span>
                        <label for="dna-name-field" class="text-xs font-extrabold text-misbar-navy">اسم العلامة التجارية والشعار اللفظي</label>
                    </div>
                    <input id="dna-name-field" name="name" type="text"
                           value="{{ old('name', $brand->name ?? 'فلوريا | Floria — لمسات تُزهر بالجمال') }}"
                           oninput="syncBrandLivePreview()"
                           placeholder="أدخل اسم علامتك التجارية..."
                           class="w-full bg-white border border-slate-300 rounded-xl px-3.5 py-2.5 text-sm font-bold text-misbar-navy focus:outline-none focus:border-sky-500">
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
                            @php $selectedSector = old('industry', $brand->industry ?? 'الهدايا اليدوية والتصاميم المخصصة'); @endphp
                            <select id="dna-sector-field" name="industry" onchange="syncBrandLivePreview()" class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs font-bold text-slate-800 focus:outline-none focus:border-sky-500">
                                @foreach([
                                    'الهدايا اليدوية والتصاميم المخصصة',
                                    'التجارة الإلكترونية والمتاجر',
                                    'المقاهي والمطاعم والضيافة',
                                    'الخدمات التقنية والبرمجيات',
                                    'التجميل والأزياء',
                                    'الرعاية الصحية والعيادات',
                                ] as $sector)
                                    <option value="{{ $sector }}" @selected($selectedSector === $sector)>{{ $sector }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <span class="block text-[11px] font-bold text-slate-600 mb-1">النطاق الجغرافي الأساسي</span>
                            <input id="dna-geo-field" name="geo_scope" type="text"
                                   value="{{ old('geo_scope', $geoScope) }}"
                                   oninput="syncBrandLivePreview()"
                                   class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs font-bold text-slate-800 focus:outline-none focus:border-sky-500">
                        </div>
                    </div>
                    <div>
                        <span class="block text-[11px] font-bold text-slate-600 mb-1">المنتجات والخدمات الرئيسية</span>
                        <textarea id="dna-products-field" name="products_services" rows="2" placeholder="اكتب منتجاتك وخدماتك..." class="w-full bg-white border border-slate-300 rounded-xl px-3.5 py-2 text-xs text-slate-700 leading-relaxed focus:outline-none focus:border-sky-500">{{ old('products_services', $brand->products_services ?? 'إطارات تذكارية يدوية مخصصة بالأسماء والعبارات والتواريخ، باقات زهور مصغرة مدمجة مع الإطارات، بطاقات إهداء وتغليف أنيق للمناسبات (أعراس، تخرج، أعياد).') }}</textarea>
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
                        <textarea id="dna-uvp-field" name="uvp" rows="2" oninput="syncBrandLivePreview()" class="w-full bg-pink-50/60 border border-pink-200 rounded-xl px-3.5 py-2 text-xs font-bold text-pink-950 leading-relaxed focus:outline-none focus:border-pink-500">{{ old('uvp', $brand->uvp ?? 'في فلوريا، لا نهدي قطعة فحسب، بل نصنع تفاصيل تحمل أسماءكم، مشاعركم، وذكرياتكم، لتبقى أجمل اللحظات حاضرة حتى بعد مرور الزمن.') }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                        <div>
                            <span class="block text-[11px] font-bold text-slate-600 mb-1.5">ألوان الهوية البصرية (اختر ألوان علامتك)</span>
                            <div class="flex items-center gap-3 bg-white p-2.5 rounded-xl border border-slate-300">
                                <div class="flex items-center gap-1.5">
                                    <input type="color" id="dna-color-primary" name="color_primary" value="{{ old('color_primary', $primaryColor) }}" onchange="updateBrandPreviewColors()" class="w-7 h-7 rounded cursor-pointer border-0">
                                    <span class="text-[11px] text-slate-600 font-semibold">الأساسي</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <input type="color" id="dna-color-secondary" name="color_secondary" value="{{ old('color_secondary', $secondaryColor) }}" onchange="updateBrandPreviewColors()" class="w-7 h-7 rounded cursor-pointer border-0">
                                    <span class="text-[11px] text-slate-600 font-semibold">الثانوي</span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <input type="color" id="dna-color-accent" name="color_accent" value="{{ old('color_accent', $accentColor) }}" onchange="updateBrandPreviewColors()" class="w-7 h-7 rounded cursor-pointer border border-slate-200">
                                    <span class="text-[11px] text-slate-600 font-semibold">الخلفية</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <span class="block text-[11px] font-bold text-slate-600 mb-1.5">الطابع البصري وشخصية العلامة</span>
                            <input id="dna-visual-style" name="brand_personality" type="text"
                                   value="{{ old('brand_personality', $brand->brand_personality ?? 'أنيق، ناعم، رومانسي، بصمة تغليف مميزة') }}"
                                   class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs text-slate-700 focus:outline-none focus:border-sky-500">
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
                            @php $selectedTone = old('tone_of_voice', $brand->tone_of_voice ?? 'عاطفية، دافئة، راقية، وتلامس المشاعر'); @endphp
                            <select id="dna-tone-field" name="tone_of_voice" onchange="syncBrandLivePreview()" class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs font-bold text-slate-800 focus:outline-none focus:border-sky-500">
                                @foreach([
                                    'عاطفية، دافئة، راقية، وتلامس المشاعر',
                                    'احترافية، رسمية، وموثوقة',
                                    'ودودة، شبابية، وعصرية',
                                    'ملهمة وإبداعية',
                                ] as $tone)
                                    <option value="{{ $tone }}" @selected($selectedTone === $tone)>{{ $tone }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <span class="block text-[11px] font-bold text-slate-600 mb-1">اللغة واللهجة المفضلة</span>
                            @php $selectedDialect = old('preferred_dialect', $brand->preferred_dialect ?? 'MSA'); @endphp
                            <select id="dna-dialect-field" name="preferred_dialect" class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs font-bold text-slate-800 focus:outline-none focus:border-sky-500">
                                <option value="MSA" @selected($selectedDialect === 'MSA')>عربية فصحى معاصرة بلمسة دافئة</option>
                                <option value="Yemeni" @selected($selectedDialect === 'Yemeni')>لهجة يمنية / صنعانية محببة</option>
                                <option value="Gulf" @selected($selectedDialect === 'Gulf')>لهجة خليجية</option>
                                <option value="Mixed" @selected($selectedDialect === 'Mixed')>مزيج فصحى ومحلية</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- 5. الأهداف التسويقية والتجارية -->
                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 space-y-2.5">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full misbar-gradient text-white text-xs font-extrabold flex items-center justify-center">5</span>
                        <label for="dna-goals-field" class="text-xs font-extrabold text-misbar-navy">الأهداف التسويقية والتجارية</label>
                    </div>
                    <textarea id="dna-goals-field" name="business_goals" rows="3" class="w-full bg-white border border-slate-300 rounded-xl px-3.5 py-2 text-xs text-slate-700 leading-relaxed focus:outline-none focus:border-sky-500">{{ old('business_goals', $goalsText) }}</textarea>
                </div>
            </div>

            <!-- العمود الأيسر: البطاقة الذكية وركائز التموضع الذهني كحقول إدخال -->
            <div class="lg:col-span-5 space-y-4">
                <div class="bg-gradient-to-br from-[#0A1E46] to-[#1E1B4B] text-white rounded-2xl p-5 shadow-lg">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-bold text-amber-400"><i class="fa-solid fa-dna ml-1"></i> بطاقة Brand DNA النشطة</span>
                        <span class="text-[10px] bg-emerald-500/20 text-emerald-300 px-2.5 py-0.5 rounded-full border border-emerald-400/30 font-bold">مُزامنة مع كافة الوحدات</span>
                    </div>

                    <div id="dna-live-card" class="rounded-xl p-4 bg-white/10 border border-white/15 space-y-3 text-xs">
                        <div class="flex items-center justify-between">
                            <div>
                                <strong id="preview-dna-title" class="text-base font-extrabold text-white block">{{ $brand->name ?? 'فلوريا | Floria' }}</strong>
                                <span id="preview-dna-sector" class="text-sky-300 text-[11px]">{{ $brand->industry ?? 'الهدايا اليدوية والتصاميم المخصصة' }}</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <span id="swatch-1" class="w-6 h-6 rounded-full border-2 border-white shadow" style="background-color: {{ $primaryColor }};"></span>
                                <span id="swatch-2" class="w-6 h-6 rounded-full border-2 border-white shadow" style="background-color: {{ $secondaryColor }};"></span>
                                <span id="swatch-3" class="w-6 h-6 rounded-full border-2 border-white shadow" style="background-color: {{ $accentColor }};"></span>
                            </div>
                        </div>
                        <div class="pt-2 border-t border-white/10">
                            <span class="text-slate-300 block text-[11px]">القيمة المقدمة (UVP):</span>
                            <p id="preview-dna-uvp" class="text-slate-100 font-semibold mt-0.5 leading-relaxed">{{ $brand->uvp ?? 'في فلوريا، لا نهدي قطعة فحسب، بل نصنع تفاصيل تحمل أسماءكم، مشاعركم، وذكرياتكم...' }}</p>
                        </div>
                        <div class="pt-2 border-t border-white/10 flex flex-wrap gap-2">
                            <span id="preview-dna-tone" class="bg-purple-500/30 border border-purple-400/40 px-2.5 py-1 rounded-lg text-[11px]">النبرة: {{ $brand->tone_of_voice ?? 'عاطفية ودافئة' }}</span>
                            <span id="preview-dna-geo" class="bg-sky-500/30 border border-sky-400/40 px-2.5 py-1 rounded-lg text-[11px]">النطاق: {{ $geoScope }}</span>
                        </div>
                    </div>
                </div>

                <!-- ركائز التموضع الذهني الأربعة كحقول إدخال قابلة للتعديل والحفظ -->
                <div class="bg-slate-50 rounded-2xl p-5 border border-slate-200 space-y-3">
                    <h3 class="font-extrabold text-misbar-navy text-sm border-b border-slate-200 pb-2">ركائز التموضع الذهني (قابلة للتعديل والحفظ)</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                        @foreach($defaultPillars as $index => $defaultPillar)
                            @php
                                $num = $index + 1;
                                $currentTitle = old("pillar_{$num}_title", $savedPillars[$index]['title'] ?? $defaultPillar['title']);
                                $currentDesc  = old("pillar_{$num}_description", $savedPillars[$index]['description'] ?? $defaultPillar['description']);
                            @endphp
                            <div class="bg-white p-3 rounded-xl border border-slate-200 space-y-2">
                                <span class="text-[11px] font-extrabold text-pink-600 block">الركيزة {{ $num }}</span>
                                <div>
                                    <label for="pillar-{{ $num }}-title" class="block text-[10px] font-bold text-slate-500 mb-1">العنوان</label>
                                    <input id="pillar-{{ $num }}-title" name="pillar_{{ $num }}_title" type="text"
                                           value="{{ $currentTitle }}" oninput="syncPillarsPreview({{ $num }})"
                                           class="w-full bg-slate-50 border border-slate-300 rounded-lg px-2.5 py-1.5 text-xs font-extrabold text-misbar-navy focus:outline-none focus:border-pink-500">
                                </div>
                                <div>
                                    <label for="pillar-{{ $num }}-desc" class="block text-[10px] font-bold text-slate-500 mb-1">الوصف المختصر</label>
                                    <input id="pillar-{{ $num }}-desc" name="pillar_{{ $num }}_description" type="text"
                                           value="{{ $currentDesc }}" oninput="syncPillarsPreview({{ $num }})"
                                           class="w-full bg-slate-50 border border-slate-300 rounded-lg px-2.5 py-1.5 text-[11px] text-slate-700 focus:outline-none focus:border-pink-500">
                                </div>
                                <div class="pt-1.5 border-t border-slate-100">
                                    <span id="preview-pillar-{{ $num }}-title" class="font-extrabold text-misbar-navy block text-[11px]">{{ $currentTitle }}</span>
                                    <p id="preview-pillar-{{ $num }}-desc" class="text-slate-500 text-[10px] leading-relaxed">{{ $currentDesc }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function updateBrandPreviewColors() {
        document.getElementById('swatch-1').style.backgroundColor = document.getElementById('dna-color-primary').value;
        document.getElementById('swatch-2').style.backgroundColor = document.getElementById('dna-color-secondary').value;
        document.getElementById('swatch-3').style.backgroundColor = document.getElementById('dna-color-accent').value;
    }

    function syncPillarsPreview(num) {
        const titleInput = document.getElementById(`pillar-${num}-title`);
        const descInput  = document.getElementById(`pillar-${num}-desc`);
        const titleOut   = document.getElementById(`preview-pillar-${num}-title`);
        const descOut    = document.getElementById(`preview-pillar-${num}-desc`);

        if (titleInput && titleOut) titleOut.textContent = titleInput.value || `الركيزة ${num}`;
        if (descInput && descOut) descOut.textContent = descInput.value;
    }

    function syncBrandLivePreview() {
        document.getElementById('preview-dna-title').textContent = document.getElementById('dna-name-field').value || 'اسم العلامة التجارية';
        document.getElementById('preview-dna-sector').textContent = document.getElementById('dna-sector-field').value;
        document.getElementById('preview-dna-uvp').textContent = document.getElementById('dna-uvp-field').value;
        document.getElementById('preview-dna-tone').textContent = 'النبرة: ' + document.getElementById('dna-tone-field').value;
        document.getElementById('preview-dna-geo').textContent = 'النطاق: ' + document.getElementById('dna-geo-field').value;
    }

    function resetFloriaBrandDNA() {
        document.getElementById('dna-name-field').value = 'فلوريا | Floria — لمسات تُزهر بالجمال';
        document.getElementById('dna-sector-field').value = 'الهدايا اليدوية والتصاميم المخصصة';
        document.getElementById('dna-geo-field').value = 'صنعاء (مع إمكانية التوسع)';
        document.getElementById('dna-products-field').value = 'إطارات تذكارية يدوية مخصصة بالأسماء والعبارات والتواريخ، باقات زهور مصغرة مدمجة مع الإطارات، بطاقات إهداء وتغليف أنيق للمناسبات (أعراس، تخرج، أعياد).';
        document.getElementById('dna-uvp-field').value = 'في فلوريا، لا نهدي قطعة فحسب، بل نصنع تفاصيل تحمل أسماءكم، مشاعركم، وذكرياتكم، لتبقى أجمل اللحظات حاضرة حتى بعد مرور الزمن.';
        document.getElementById('dna-color-primary').value = '#BE185D';
        document.getElementById('dna-color-secondary').value = '#D97706';
        document.getElementById('dna-color-accent').value = '#FDF2F8';
        document.getElementById('dna-visual-style').value = 'أنيق، ناعم، رومانسي، بصمة تغليف مميزة';
        document.getElementById('dna-tone-field').value = 'عاطفية، دافئة، راقية، وتلامس المشاعر';
        document.getElementById('dna-dialect-field').value = 'MSA';
        document.getElementById('dna-goals-field').value = "1. بناء علامة تجارية معروفة وموثوقة في مجال الهدايا اليدوية في صنعاء.\n2. زيادة الوعي باسم فلوريا ومنتجاتها لدى الجمهور المستهدف.\n3. جذب العملاء وتحويل الاستفسارات إلى طلبات فعلية.\n4. تحقيق دخل وأرباح مستدامة مع الحفاظ على جودة المنتجات.";

        [
            { title: 'علامة تصنع مشاعر', desc: 'هدية تحمل رسالة وقصة إنسانية.' },
            { title: 'تهتم بالتفاصيل', desc: 'دقة تناسق الألوان وبصمة التغليف.' },
            { title: 'علامة مخصصة', desc: 'الأسماء والعبارات والتواريخ الخاصة.' },
            { title: 'علامة أنيقة', desc: 'تقديم بصري راقٍ يرفع قيمة الهدية.' },
        ].forEach((p, i) => {
            const num = i + 1;
            document.getElementById(`pillar-${num}-title`).value = p.title;
            document.getElementById(`pillar-${num}-desc`).value = p.desc;
            syncPillarsPreview(num);
        });

        updateBrandPreviewColors();
        syncBrandLivePreview();
    }

    async function generateBrandDNAWithAI() {
        const btn = document.getElementById('btn-generate-brand-ai');
        const originalHtml = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin ml-1"></i> جاري التوليد...';

        try {
            const response = await fetch("{{ route('brand-dna.generate') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('#brand-dna-form input[name="_token"]').value,
                },
                body: JSON.stringify({
                    name: document.getElementById('dna-name-field').value,
                    industry: document.getElementById('dna-sector-field').value,
                    geo_scope: document.getElementById('dna-geo-field').value,
                    products_services: document.getElementById('dna-products-field').value,
                    preferred_dialect: document.getElementById('dna-dialect-field').value,
                }),
            });

            const result = await response.json();
            if (!response.ok || !result.ok) {
                throw new Error(result.message || 'تعذّر توليد بيانات العلامة التجارية.');
            }

            const data = result.data;
            if (data.uvp) document.getElementById('dna-uvp-field').value = data.uvp;
            if (data.brand_personality) document.getElementById('dna-visual-style').value = data.brand_personality;
            if (data.tone_of_voice) {
                const toneSelect = document.getElementById('dna-tone-field');
                const exists = Array.from(toneSelect.options).some(opt => opt.value === data.tone_of_voice);
                if (!exists) {
                    toneSelect.add(new Option(data.tone_of_voice, data.tone_of_voice, true, true));
                } else {
                    toneSelect.value = data.tone_of_voice;
                }
            }
            if (Array.isArray(data.business_goals) && data.business_goals.length) {
                document.getElementById('dna-goals-field').value = data.business_goals.join("\n");
            }
            if (Array.isArray(data.positioning_pillars)) {
                data.positioning_pillars.forEach((pillar, idx) => {
                    const num = idx + 1;
                    const tEl = document.getElementById(`pillar-${num}-title`);
                    const dEl = document.getElementById(`pillar-${num}-desc`);
                    if (tEl && pillar.title) tEl.value = pillar.title;
                    if (dEl && pillar.description) dEl.value = pillar.description;
                    syncPillarsPreview(num);
                });
            }

            syncBrandLivePreview();
        } catch (err) {
            alert(err.message);
        } finally {
            btn.disabled = false;
            btn.innerHTML = originalHtml;
        }
    }
</script>
@endsection