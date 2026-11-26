@extends('layouts.workspace')

@section('workspace-content')
<div id="unit-analytics" class="unit-section space-y-6">
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
@endsection
