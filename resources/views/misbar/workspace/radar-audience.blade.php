@extends('layouts.workspace')

@section('workspace-content')
<div id="unit-radar_audience" class="unit-section space-y-6">
                    
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
@endsection
