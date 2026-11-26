@extends('layouts.workspace')

@section('workspace-content')
<div id="unit-brand" class="unit-section space-y-6">
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
                                <a href="{{ route('content.create') }}" class="px-4 py-2.5 rounded-xl bg-purple-50 hover:bg-purple-100 text-purple-700 text-xs font-bold border border-purple-200 transition">الانتقال إلى توليد المحتوى</a>
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
@endsection
