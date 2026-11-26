@extends('layouts.workspace')

@section('workspace-content')
<div id="unit-planner" class="unit-section space-y-6">
                    <div class="card-elevated rounded-3xl p-6">
                        <div class="flex flex-wrap items-center justify-between gap-4 mb-5">
                            <div>
                                <span class="text-xs font-extrabold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full">Content Planner & Instagram Structure</span>
                                <h2 class="text-xl font-extrabold text-misbar-navy mt-2">مخطط المحتوى وتنظيم واجهة إنستغرام لفلوريا</h2>
                            </div>
                            <button onclick="suggestFloriaTodayPost()" class="px-4 py-2 rounded-xl bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs shadow">
                                <i class="fa-solid fa-lightbulb ml-1"></i> ماذا أنشر اليوم؟
                            </button>
                        </div>

                        <!-- تقسيم أبرز القصص (Highlights) من خطة فلوريا -->
                        <div class="mb-6 bg-pink-50/50 p-4 rounded-2xl border border-pink-200">
                            <span class="text-xs font-extrabold text-pink-800 block mb-2.5">تنظيم أبرز القصص (Instagram Highlights) الموصى به في خطة فلوريا:</span>
                            <div class="flex flex-wrap gap-2 text-xs">
                                <span class="px-3 py-1.5 rounded-full bg-white border border-pink-200 font-bold text-misbar-navy">🖼️ الإطارات المخصصة</span>
                                <span class="px-3 py-1.5 rounded-full bg-white border border-pink-200 font-bold text-misbar-navy">💐 باقات + إطارات</span>
                                <span class="px-3 py-1.5 rounded-full bg-white border border-pink-200 font-bold text-misbar-navy">👰 هدايا العرائس</span>
                                <span class="px-3 py-1.5 rounded-full bg-white border border-pink-200 font-bold text-misbar-navy">🎓 هدايا التخرج</span>
                                <span class="px-3 py-1.5 rounded-full bg-white border border-pink-200 font-bold text-misbar-navy">🎀 بصمة التغليف</span>
                                <span class="px-3 py-1.5 rounded-full bg-white border border-pink-200 font-bold text-misbar-navy">💬 آراء عميلات صنعاء</span>
                            </div>
                        </div>

                        <div id="floria-today-suggestion" class="hidden mb-5 p-4 rounded-2xl bg-amber-50 border border-amber-300 text-xs flex items-center justify-between gap-3">
                            <div>
                                <strong class="text-amber-900 block">💡 اقتراح اليوم لفلوريا:</strong>
                                <span class="text-slate-700">تصوير مقطع ريلز مدته 12 ثانية يظهر لحظة كتابة الاسم والتاريخ على الإطار ثم ربط شريطة التغليف مع موسيقى هادئة.</span>
                            </div>
                            <button onclick="addFloriaPostToCalendar()" class="px-3 py-2 rounded-xl bg-amber-600 text-white font-bold shrink-0">+ إضافة للتقويم</button>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs" id="floria-calendar-grid">
                            <!-- تعبئة ديناميكية -->
                        </div>
                    </div>
                </div>
@endsection
