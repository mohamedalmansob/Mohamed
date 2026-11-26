@extends('layouts.workspace')

@section('workspace-content')
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
                            <a href="{{ route('workspace.strategy') }}" class="px-5 py-3 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-extrabold text-sm shadow-lg flex items-center gap-2 transition shrink-0">
                                <i class="fa-solid fa-rocket"></i>
                                <span>استعراض أول إعلان وحملة لفلوريا</span>
                            </a>
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
@endsection
