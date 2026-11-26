@extends('layouts.workspace')

@section('workspace-content')
<div id="unit-competitors" class="unit-section space-y-6">
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
@endsection
