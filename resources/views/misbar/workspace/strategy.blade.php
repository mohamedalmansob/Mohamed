@extends('layouts.workspace')

@section('workspace-content')
<div id="unit-strategy" class="unit-section space-y-6">
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
@endsection
