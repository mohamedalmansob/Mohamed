@extends('layouts.workspace')

@section('workspace-content')
<div id="unit-studio" class="unit-section space-y-6">
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
@endsection
