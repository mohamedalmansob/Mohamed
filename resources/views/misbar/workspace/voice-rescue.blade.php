@extends('layouts.workspace')

@section('workspace-content')
<div id="unit-voice_rescue" class="unit-section space-y-6">
                    <div class="card-elevated rounded-3xl p-6 border-t-4 border-t-rose-600">
                        <span class="text-xs font-extrabold text-rose-600 bg-rose-50 px-3 py-1 rounded-full">Marketing Rescue Room • غرفة الإنقاذ التسويقي</span>
                        <h2 class="text-xl font-extrabold text-misbar-navy mt-2 mb-4">معالجة التحديات والمخاطر الخاصة بمشروع فلوريا</h2>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-5 text-xs">
                            <button onclick="selectFloriaRescue('season')" class="p-3.5 rounded-xl bg-rose-50 border-2 border-rose-500 text-right font-bold text-misbar-navy">
                                📉 انخفاض الطلب خارج مواسم التخرج والأعراس
                            </button>
                            <button onclick="selectFloriaRescue('copycat')" class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 hover:border-rose-400 text-right font-bold text-misbar-navy">
                                🎨 تقليد التصاميم من المنافسين
                            </button>
                            <button onclick="selectFloriaRescue('delivery')" class="p-3.5 rounded-xl bg-slate-50 border border-slate-200 hover:border-rose-400 text-right font-bold text-misbar-navy">
                                🚚 مخاطر تأخر التوصيل أو تلف الإطارات
                            </button>
                        </div>

                        <div id="floria-rescue-box" class="bg-slate-50 p-5 rounded-2xl border border-slate-200 text-xs space-y-2.5 leading-relaxed">
                            <!-- تعبئة ديناميكية -->
                        </div>
                    </div>
                </div>
@endsection
