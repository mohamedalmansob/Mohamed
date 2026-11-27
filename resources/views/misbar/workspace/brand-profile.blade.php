
@extends('layouts.workspace')

@section('workspace-content')

@php
    $sections = [
        ['key' => 'basic_info', 'number' => '01', 'title' => 'معلومات العلامة', 'icon' => 'fa-building'],
        ['key' => 'vision_mission_values', 'number' => '02', 'title' => 'الرؤية والرسالة والقيم', 'icon' => 'fa-bullseye'],
        ['key' => 'visual_identity', 'number' => '03', 'title' => 'الهوية البصرية', 'icon' => 'fa-palette'],
        ['key' => 'personality', 'number' => '04', 'title' => 'شخصية العلامة', 'icon' => 'fa-face-smile'],
        ['key' => 'communication', 'number' => '05', 'title' => 'نبرة التواصل', 'icon' => 'fa-comments'],
        ['key' => 'positioning', 'number' => '06', 'title' => 'التموضع والقيمة', 'icon' => 'fa-gem'],
        ['key' => 'goals', 'number' => '07', 'title' => 'الأهداف', 'icon' => 'fa-chart-line'],
    ];
@endphp

<div id="brand-profile-page"
     data-ai-url="{{ $aiUrl }}"
     data-approval-urls='@json($approvalUrls)'
     data-workspace-id="{{ $workspaceId }}"
     data-csrf-token="{{ csrf_token() }}">

<!-- مساعد الذكاء الاصطناعي الموحد -->
<section class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm space-y-4"
         data-brand-ai-assistant>

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">

        <div class="flex items-start gap-3">
            <span class="w-11 h-11 shrink-0 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-lg">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
            </span>

            <div>
                <h2 class="text-sm font-extrabold text-misbar-navy">
                    مساعد الذكاء الاصطناعي
                </h2>

                <p class="text-xs text-slate-500 mt-1 leading-6">
                    يحلل البيانات المدخلة والمرفقات في جميع الأقسام،
                    ويقترح تعبئة الحقول المناسبة بناءً على محتواها.
                </p>
            </div>
        </div>

        <button
            type="button"
            id="brand-profile-ai-analyze"
            data-brand-ai-analyze
            class="shrink-0 inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-misbar-blue text-white text-xs font-extrabold hover:opacity-90 transition"
        >
            <i class="fa-solid fa-wand-magic-sparkles"></i>
            تحليل البيانات والمرفقات
        </button>

    </div>

    <div id="brand-profile-ai-status"
         data-brand-ai-status
         class="hidden rounded-xl border p-3 text-xs leading-6"
         role="status"
         aria-live="polite">
    </div>

    <p class="text-[10px] text-slate-400 leading-5">
        الاقتراحات اختيارية ومؤقتة. لن تتغير بياناتك المدخلة تلقائيًا،
        ولن تُحفظ أي اقتراحات دون موافقتك.
    </p>

</section>
<!-- نهاية مساعد الذكاء الاصطناعي الموحد -->

    {{-- عنوان الصفحة --}}
    <div class="card-elevated rounded-3xl p-6 lg:p-7 border-t-4 border-t-sky-500">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">
            <div>
                <div class="inline-flex items-center gap-2 bg-sky-50 text-sky-700 px-3 py-1.5 rounded-full text-xs font-extrabold">
                    <i class="fa-solid fa-layer-group"></i>
                    Brand Intelligence
                </div>

                <h1 class="text-2xl lg:text-3xl font-extrabold text-misbar-navy mt-3">
                    ملف العلامة التجارية
                </h1>

                <p class="text-sm text-slate-500 mt-2 leading-7 max-w-2xl">
                    أنشئ ملفًا متكاملًا لعلامتك التجارية، وراجع معلوماتها واعتمدها
                    لتكون المرجع الأساسي الذي تستند إليه وحدات منصة مسبار.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-3">
                <div class="bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5">
                    <span class="block text-[10px] text-slate-500 font-bold">إصدار الملف المعتمد</span>
                    <strong class="text-lg text-misbar-navy">0</strong>
                </div>

                <div class="bg-amber-50 border border-amber-200 rounded-xl px-4 py-2.5">
                    <span class="block text-[10px] text-amber-700 font-bold">حالة الملف</span>
                    <strong class="text-xs text-amber-800">لم يبدأ الإعداد</strong>
                </div>
            </div>
        </div>

        {{-- مؤشر التقدم --}}
        <div class="mt-7">
            <div class="flex items-center justify-between mb-2">
                <span class="text-xs font-bold text-slate-600">تقدم إعداد الملف</span>
                <span id="brand-profile-progress-text" class="text-xs font-extrabold text-sky-600">0 من 7 أقسام</span>
            </div>

            <div class="w-full h-2.5 bg-slate-100 rounded-full overflow-hidden">
                <div id="brand-profile-progress-bar"
                     class="h-full bg-gradient-to-l from-sky-500 to-purple-600 rounded-full transition-all duration-300"
                     style="width: 0%">
                </div>
            </div>
        </div>
    </div>

    {{-- التنقل بين الأقسام --}}
    <div class="card-elevated rounded-2xl p-3 lg:p-4">
        <div class="flex items-center justify-between gap-3 mb-3 px-1">
            <h2 class="text-sm font-extrabold text-misbar-navy">أقسام ملف العلامة التجارية</h2>
            <span class="text-[10px] text-slate-400">سبعة أقسام مستقلة</span>
        </div>

        <div class="flex gap-2 overflow-x-auto pb-2" role="tablist" aria-label="أقسام ملف العلامة التجارية">
            @foreach($sections as $index => $section)
                <button
                    type="button"
                    class="brand-profile-tab flex-shrink-0 min-w-[145px] lg:min-w-0 lg:flex-1 text-right rounded-xl border px-3 py-3 transition
                    {{ $index === 0 ? 'active bg-sky-50 border-sky-300 text-sky-800' : 'bg-white border-slate-200 text-slate-600 hover:bg-slate-50' }}"
                    data-tab="{{ $section['key'] }}"
                    role="tab"
                    aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                    aria-controls="panel-{{ $section['key'] }}"
                >
                    <div class="flex items-center gap-2">
                        <span class="w-8 h-8 rounded-lg flex items-center justify-center
                            {{ $index === 0 ? 'bg-sky-100 text-sky-700' : 'bg-slate-100 text-slate-500' }}">
                            <i class="fa-solid {{ $section['icon'] }}"></i>
                        </span>

                        <span class="min-w-0">
                            <span class="block text-[10px] opacity-60 font-bold">{{ $section['number'] }}</span>
                            <span class="block text-[11px] font-extrabold whitespace-nowrap">{{ $section['title'] }}</span>
                        </span>
                    </div>

                    <span class="brand-profile-tab-status block mt-2 text-[10px] font-bold text-slate-400">
                        لم يبدأ
                    </span>
                </button>
            @endforeach
        </div>
    </div>

    {{-- محتوى الأقسام --}}
    <div class="card-elevated rounded-3xl p-5 lg:p-8">

        {{-- القسم الأول: المعلومات الأساسية --}}
        <section id="panel-basic_info" class="brand-profile-panel space-y-6" role="tabpanel">

            <div class="flex items-start gap-3 border-b border-slate-100 pb-5">
                <div class="w-11 h-11 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-building"></i>
                </div>
                <div>
                    <h2 class="text-lg font-extrabold text-misbar-navy">معلومات العلامة التجارية</h2>
                    <p class="text-xs text-slate-500 mt-1">المعلومات الأساسية التي تعرّف العلامة ونشاطها ومنتجاتها.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-extrabold text-slate-700 mb-2">اسم العلامة التجارية</label>
                    <input type="text" name="name" data-profile-field
                           placeholder="أدخل الاسم الرسمي للعلامة"
                           class="brand-profile-input">
                </div>

                <div>
                    <label class="block text-xs font-extrabold text-slate-700 mb-2">الاسم باللغة الأخرى (إن وجد)</label>
                    <input type="text" name="international_name" data-profile-field
                           placeholder="الاسم باللغة الإنجليزية مثلًا"
                           class="brand-profile-input">
                </div>

                <div>
                    <label class="block text-xs font-extrabold text-slate-700 mb-2">مجال النشاط</label>
                    <input type="text" name="industry" data-profile-field
                           placeholder="ما المجال الذي تعمل فيه العلامة؟"
                           class="brand-profile-input">
                </div>

                <div>
                    <label class="block text-xs font-extrabold text-slate-700 mb-2">النطاق الجغرافي</label>
                    <input type="text" name="geo_scope" data-profile-field
                           placeholder="المدينة أو المنطقة أو الأسواق المستهدفة"
                           class="brand-profile-input">
                </div>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">وصف النشاط التجاري</label>
                <textarea name="business_description" data-profile-field rows="4"
                          placeholder="اشرح طبيعة النشاط، وما الذي تقدمه العلامة، وكيف تعمل..."
                          class="brand-profile-input"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-extrabold text-slate-700 mb-2">المنتجات الرئيسية</label>
                    <textarea name="products" data-profile-field rows="4"
                              placeholder="أدخل المنتجات التي تقدمها العلامة، ويمكنك ذكر كل منتج في سطر..."
                              class="brand-profile-input"></textarea>
                </div>

                <div>
                    <label class="block text-xs font-extrabold text-slate-700 mb-2">الخدمات المقدمة</label>
                    <textarea name="services" data-profile-field rows="4"
                              placeholder="أدخل الخدمات التي تقدمها العلامة..."
                              class="brand-profile-input"></textarea>
                </div>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">معلومات إضافية</label>
                <textarea name="additional_information" data-profile-field rows="3"
                          placeholder="أي معلومات أخرى ترى أنها ضرورية لفهم العلامة..."
                          class="brand-profile-input"></textarea>
            </div>

            @include('misbar.workspace.partials.brand-profile-assets', ['sectionKey' => 'basic_info'])
        </section>

        {{-- القسم الثاني: الرؤية والرسالة والقيم --}}
        <section id="panel-vision_mission_values" class="brand-profile-panel hidden space-y-6" role="tabpanel">

            <div class="flex items-start gap-3 border-b border-slate-100 pb-5">
                <div class="w-11 h-11 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <div>
                    <h2 class="text-lg font-extrabold text-misbar-navy">الرؤية والرسالة والقيم</h2>
                    <p class="text-xs text-slate-500 mt-1">ما الذي تطمح العلامة إلى تحقيقه؟ وما رسالتها والمبادئ التي توجهها؟</p>
                </div>
            </div>

            <div class="rounded-2xl border border-purple-200 bg-purple-50/50 p-4">
                <div class="flex items-center gap-2 text-purple-800 text-xs font-extrabold">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    المساعد الذكي
                </div>
                <p class="text-xs text-purple-700 leading-6 mt-2">
                    يمكن للمساعد تحليل معلومات النشاط والمنتجات والخدمات لمساعدتك
                    في صياغة رؤية ورسالة وقيم مقترحة. جميع النتائج تظل اقتراحات
                    تحتاج إلى مراجعتك، ولا تعتمد تلقائيًا.
                </p>
                <div class="mt-3 text-[10px] text-purple-500 font-bold">سيتم تفعيل المساعد بعد ربط خدمة الذكاء الاصطناعي.</div>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">رؤية العلامة التجارية</label>
                <textarea name="vision" data-profile-field rows="3"
                          placeholder="إلى أين تطمح العلامة أن تصل مستقبلًا؟"
                          class="brand-profile-input"></textarea>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">رسالة العلامة التجارية</label>
                <textarea name="mission" data-profile-field rows="3"
                          placeholder="ما الغرض الأساسي من وجود العلامة؟ وما القيمة التي تقدمها؟"
                          class="brand-profile-input"></textarea>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">القيم الأساسية</label>
                <textarea name="values" data-profile-field rows="4"
                          placeholder="اكتب القيم التي تلتزم بها العلامة، ويمكنك وضع كل قيمة في سطر مستقل..."
                          class="brand-profile-input"></textarea>
            </div>

            @include('misbar.workspace.partials.brand-profile-assets', ['sectionKey' => 'vision_mission_values'])
        </section>

        {{-- القسم الثالث: الهوية البصرية --}}
        <section id="panel-visual_identity" class="brand-profile-panel hidden space-y-6" role="tabpanel">

            <div class="flex items-start gap-3 border-b border-slate-100 pb-5">
                <div class="w-11 h-11 rounded-xl bg-pink-50 text-pink-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-palette"></i>
                </div>
                <div>
                    <h2 class="text-lg font-extrabold text-misbar-navy">الهوية البصرية</h2>
                    <p class="text-xs text-slate-500 mt-1">العناصر المرئية التي تميز العلامة وتحدد مظهرها.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-extrabold text-slate-700 mb-2">الشعار اللفظي (Tagline)</label>
                    <input type="text" name="tagline" data-profile-field
                           placeholder="العبارة التعريفية للعلامة"
                           class="brand-profile-input">
                </div>

                <div>
                    <label class="block text-xs font-extrabold text-slate-700 mb-2">الخطوط المستخدمة</label>
                    <input type="text" name="fonts" data-profile-field
                           placeholder="أسماء الخطوط أو وصفها"
                           class="brand-profile-input">
                </div>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">ألوان الهوية البصرية</label>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-slate-50 rounded-xl border border-slate-200 p-3">
                        <label class="block text-[11px] font-bold text-slate-600 mb-2">اللون الأساسي</label>
                        <input type="color" name="primary_color" data-profile-field value="#0A1E46"
                               class="w-full h-11 rounded-lg cursor-pointer">
                    </div>

                    <div class="bg-slate-50 rounded-xl border border-slate-200 p-3">
                        <label class="block text-[11px] font-bold text-slate-600 mb-2">اللون الثانوي</label>
                        <input type="color" name="secondary_color" data-profile-field value="#0088FF"
                               class="w-full h-11 rounded-lg cursor-pointer">
                    </div>

                    <div class="bg-slate-50 rounded-xl border border-slate-200 p-3">
                        <label class="block text-[11px] font-bold text-slate-600 mb-2">اللون المساعد</label>
                        <input type="color" name="accent_color" data-profile-field value="#F1F5F9"
                               class="w-full h-11 rounded-lg cursor-pointer">
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">وصف الهوية البصرية</label>
                <textarea name="visual_description" data-profile-field rows="3"
                          placeholder="صف الطابع البصري للعلامة، وطريقة استخدام الشعار والألوان..."
                          class="brand-profile-input"></textarea>
            </div>

            <div class="rounded-2xl border border-sky-200 bg-sky-50/50 p-4">
                <div class="flex items-center gap-2 text-sky-800 text-xs font-extrabold">
                    <i class="fa-solid fa-eye"></i>
                    تحليل الهوية البصرية
                </div>
                <p class="text-xs text-sky-700 leading-6 mt-2">
                    يمكن للمساعد تحليل الشعار والصور والمواد البصرية المرفقة،
                    واقتراح وصف للألوان والأسلوب والعناصر المرئية. ستبقى نتائجه
                    منفصلة عن بياناتك حتى تراجعها.
                </p>
                <div class="mt-3 text-[10px] text-sky-600 font-bold">سيتم تفعيل التحليل بعد ربط خدمة تحليل الصور.</div>
            </div>

            @include('misbar.workspace.partials.brand-profile-assets', ['sectionKey' => 'visual_identity'])
        </section>

        {{-- القسم الرابع: شخصية العلامة --}}
        <section id="panel-personality" class="brand-profile-panel hidden space-y-6" role="tabpanel">

            <div class="flex items-start gap-3 border-b border-slate-100 pb-5">
                <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-face-smile"></i>
                </div>
                <div>
                    <h2 class="text-lg font-extrabold text-misbar-navy">شخصية العلامة التجارية</h2>
                    <p class="text-xs text-slate-500 mt-1">الصفات الإنسانية والانطباعات التي تعكس هوية العلامة.</p>
                </div>
            </div>

            <div class="rounded-2xl border border-purple-200 bg-purple-50/50 p-4">
                <div class="flex items-center gap-2 text-purple-800 text-xs font-extrabold">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    المساعد الذكي
                </div>
                <p class="text-xs text-purple-700 leading-6 mt-2">
                    يمكن تحليل المعلومات المعتمدة عن نشاط العلامة ورؤيتها وهويتها
                    البصرية واقتراح سمات تعبر عن شخصيتها.
                </p>
                <div class="mt-3 text-[10px] text-purple-500 font-bold">الاقتراحات المستقبلية لن تُعتمد إلا بعد مراجعتك.</div>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">وصف شخصية العلامة</label>
                <textarea name="personality_description" data-profile-field rows="4"
                          placeholder="كيف تصف شخصية علامتك؟ وما الصفات التي تريد أن ترتبط بها؟"
                          class="brand-profile-input"></textarea>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">الصفات التي تميز العلامة</label>
                <textarea name="personality_traits" data-profile-field rows="3"
                          placeholder="مثل: موثوقة، مبتكرة، قريبة من العملاء..."
                          class="brand-profile-input"></textarea>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">الانطباع المطلوب لدى الجمهور</label>
                <textarea name="desired_perception" data-profile-field rows="3"
                          placeholder="كيف تريد أن يصف الجمهور علامتك؟"
                          class="brand-profile-input"></textarea>
            </div>

            @include('misbar.workspace.partials.brand-profile-assets', ['sectionKey' => 'personality'])
        </section>

        {{-- القسم الخامس: نبرة التواصل --}}
        <section id="panel-communication" class="brand-profile-panel hidden space-y-6" role="tabpanel">

            <div class="flex items-start gap-3 border-b border-slate-100 pb-5">
                <div class="w-11 h-11 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-comments"></i>
                </div>
                <div>
                    <h2 class="text-lg font-extrabold text-misbar-navy">نبرة التواصل وأسلوب الكتابة</h2>
                    <p class="text-xs text-slate-500 mt-1">كيف تتحدث العلامة مع جمهورها عبر مختلف القنوات؟</p>
                </div>
            </div>

            <div class="rounded-2xl border border-purple-200 bg-purple-50/50 p-4">
                <div class="flex items-center gap-2 text-purple-800 text-xs font-extrabold">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    المساعد الذكي
                </div>
                <p class="text-xs text-purple-700 leading-6 mt-2">
                    يمكن للمساعد اقتراح نبرة التواصل وأسلوب الكتابة بالاستناد إلى
                    شخصية العلامة والجمهور والمعلومات المعتمدة في الأقسام السابقة.
                </p>
                <div class="mt-3 text-[10px] text-purple-500 font-bold">الاقتراحات غير معتمدة حتى تراجعها.</div>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">وصف نبرة التواصل</label>
                <textarea name="tone_description" data-profile-field rows="3"
                          placeholder="صف الطريقة التي تتحدث بها العلامة مع جمهورها..."
                          class="brand-profile-input"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-xs font-extrabold text-slate-700 mb-2">اللغة المفضلة</label>
                    <input type="text" name="language" data-profile-field
                           placeholder="العربية، الإنجليزية..."
                           class="brand-profile-input">
                </div>

                <div>
                    <label class="block text-xs font-extrabold text-slate-700 mb-2">اللهجة المفضلة</label>
                    <input type="text" name="dialect" data-profile-field
                           placeholder="الفصحى، صنعانية، خليجية..."
                           class="brand-profile-input">
                </div>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">أسلوب الكتابة</label>
                <textarea name="writing_style" data-profile-field rows="3"
                          placeholder="كيف يجب أن تُكتب المنشورات والرسائل والنصوص التسويقية؟"
                          class="brand-profile-input"></textarea>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">عبارات أو أساليب مفضلة</label>
                <textarea name="preferred_expressions" data-profile-field rows="3"
                          placeholder="أمثلة على عبارات أو أساليب ترغب في استخدامها..."
                          class="brand-profile-input"></textarea>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">عبارات أو أساليب يجب تجنبها</label>
                <textarea name="avoided_expressions" data-profile-field rows="3"
                          placeholder="عبارات أو أساليب لا تناسب العلامة..."
                          class="brand-profile-input"></textarea>
            </div>

            @include('misbar.workspace.partials.brand-profile-assets', ['sectionKey' => 'communication'])
        </section>

        {{-- القسم السادس: التموضع والقيمة المقدمة --}}
        <section id="panel-positioning" class="brand-profile-panel hidden space-y-6" role="tabpanel">

            <div class="flex items-start gap-3 border-b border-slate-100 pb-5">
                <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-gem"></i>
                </div>
                <div>
                    <h2 class="text-lg font-extrabold text-misbar-navy">الميزة التنافسية والتموضع والقيمة المقدمة</h2>
                    <p class="text-xs text-slate-500 mt-1">ما الذي يميز العلامة؟ ولماذا يختارها العميل؟</p>
                </div>
            </div>

            <div class="rounded-2xl border border-purple-200 bg-purple-50/50 p-4">
                <div class="flex items-center gap-2 text-purple-800 text-xs font-extrabold">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    المساعد الذكي
                </div>
                <p class="text-xs text-purple-700 leading-6 mt-2">
                    يمكن للمساعد تحليل المنتجات والخدمات والجمهور والمعلومات المعتمدة
                    لاقتراح عناصر التميز والقيمة المقدمة والتموضع المحتمل.
                    لا تُعامل أي نتيجة على أنها حقيقة قبل مراجعتك.
                </p>
                <div class="mt-3 text-[10px] text-purple-500 font-bold">سيتم تفعيل المساعد لاحقًا.</div>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">الميزة التنافسية</label>
                <textarea name="competitive_advantage" data-profile-field rows="3"
                          placeholder="ما الذي يميز العلامة عن البدائل المنافسة؟"
                          class="brand-profile-input"></textarea>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">القيمة المقدمة للعميل</label>
                <textarea name="value_proposition" data-profile-field rows="3"
                          placeholder="ما القيمة أو الفائدة التي يحصل عليها العميل؟"
                          class="brand-profile-input"></textarea>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">أسباب اختيار العملاء للعلامة</label>
                <textarea name="reasons_to_choose" data-profile-field rows="3"
                          placeholder="ما الأسباب التي تجعل العميل يختار هذه العلامة؟"
                          class="brand-profile-input"></textarea>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">معلومات عن المنافسين والبدائل</label>
                <textarea name="competitor_context" data-profile-field rows="3"
                          placeholder="اذكر المنافسين أو البدائل التي تعرفها، وأوجه الاختلاف إن وجدت..."
                          class="brand-profile-input"></textarea>
            </div>

            @include('misbar.workspace.partials.brand-profile-assets', ['sectionKey' => 'positioning'])
        </section>

        {{-- القسم السابع: الأهداف --}}
        <section id="panel-goals" class="brand-profile-panel hidden space-y-6" role="tabpanel">

            <div class="flex items-start gap-3 border-b border-slate-100 pb-5">
                <div class="w-11 h-11 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center text-lg">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <div>
                    <h2 class="text-lg font-extrabold text-misbar-navy">الأهداف التسويقية والتجارية</h2>
                    <p class="text-xs text-slate-500 mt-1">النتائج التي تسعى العلامة إلى تحقيقها على المدى القريب والبعيد.</p>
                </div>
            </div>

            <div class="rounded-2xl border border-purple-200 bg-purple-50/50 p-4">
                <div class="flex items-center gap-2 text-purple-800 text-xs font-extrabold">
                    <i class="fa-solid fa-wand-magic-sparkles"></i>
                    المساعد الذكي
                </div>
                <p class="text-xs text-purple-700 leading-6 mt-2">
                    يمكن للمساعد اقتراح أهداف تسويقية وتجارية انطلاقًا من طبيعة
                    النشاط والمنتجات والخدمات والميزة التنافسية والمعلومات المعتمدة.
                    يجب مراجعة كل هدف قبل اعتماده.
                </p>
                <div class="mt-3 text-[10px] text-purple-500 font-bold">سيتم تفعيل المساعد لاحقًا.</div>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">الأهداف التجارية</label>
                <textarea name="business_goals" data-profile-field rows="4"
                          placeholder="ما النتائج التجارية التي تسعى العلامة لتحقيقها؟"
                          class="brand-profile-input"></textarea>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">الأهداف التسويقية</label>
                <textarea name="marketing_goals" data-profile-field rows="4"
                          placeholder="ما النتائج التسويقية التي تريد الوصول إليها؟"
                          class="brand-profile-input"></textarea>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">الأولويات الحالية</label>
                <textarea name="current_priorities" data-profile-field rows="3"
                          placeholder="ما أهم الأولويات التي ينبغي التركيز عليها حاليًا؟"
                          class="brand-profile-input"></textarea>
            </div>

            <div>
                <label class="block text-xs font-extrabold text-slate-700 mb-2">الإطار الزمني والتوقعات</label>
                <textarea name="goals_timeframe" data-profile-field rows="3"
                          placeholder="اذكر الإطار الزمني أو أي توقعات مرتبطة بتحقيق الأهداف..."
                          class="brand-profile-input"></textarea>
            </div>

            @include('misbar.workspace.partials.brand-profile-assets', ['sectionKey' => 'goals'])
        </section>

        {{-- أزرار التنقل --}}
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-slate-100 mt-8 pt-5">
            <button type="button" id="brand-profile-previous"
                    class="px-5 py-2.5 rounded-xl bg-slate-100 text-slate-700 text-xs font-extrabold hover:bg-slate-200 transition">
                <i class="fa-solid fa-arrow-right ml-1"></i>
                القسم السابق
            </button>

            <span id="brand-profile-current-section" class="text-[11px] text-slate-400 font-bold">
                القسم 1 من 7
            </span>

            <button type="button" id="brand-profile-next"
                    class="px-5 py-2.5 rounded-xl misbar-gradient text-white text-xs font-extrabold hover:opacity-90 transition">
                القسم التالي
                <i class="fa-solid fa-arrow-left mr-1"></i>
            </button>
        </div>
    </div>

    {{-- تنبيه توضيحي --}}
    <div class="rounded-2xl bg-sky-50 border border-sky-200 p-4 flex items-start gap-3">
        <i class="fa-solid fa-circle-info text-sky-600 mt-0.5"></i>
        <p class="text-xs text-sky-800 leading-6">
            هذه مرحلة بناء واجهة الإدخال. لم يتم تفعيل الحفظ أو رفع الملفات أو
            اعتماد الأقسام أو خدمات الذكاء الاصطناعي بعد. ستتم إضافة هذه الوظائف
            وربطها بقاعدة البيانات بعد اختبار الواجهة.
        </p>
    </div>

</div>

<style>
    .brand-profile-input {
        width: 100%;
        background: #fff;
        border: 1px solid #cbd5e1;
        border-radius: 12px;
        padding: 11px 13px;
        font-size: 12px;
        color: #334155;
        line-height: 1.8;
        outline: none;
        transition: border-color .2s, box-shadow .2s;
    }

    .brand-profile-input:focus {
        border-color: #0088FF;
        box-shadow: 0 0 0 3px rgba(0, 136, 255, .09);
    }

    .brand-profile-tab.active {
        background: #eff6ff;
        border-color: #7dd3fc;
        color: #075985;
    }

    .brand-profile-tab.active > div > span:first-child {
        background: #dbeafe;
        color: #0369a1;
    }
</style>

<script src="{{ asset('js/brand-profile.js') }}" defer></script>

@endsection
