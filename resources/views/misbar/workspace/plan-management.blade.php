@extends('layouts.workspace')

@section('workspace-content')
<div id="unit-admin" class="unit-section space-y-6">
                    <div class="card-elevated rounded-3xl p-6 lg:p-8 border-t-4 border-t-amber-500">
                        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                            <div>
                                <span class="text-xs font-extrabold text-amber-700 bg-amber-50 px-3 py-1 rounded-full">SaaS & RBAC Management • نموذج العمل والصلاحيات</span>
                                <h2 class="text-2xl font-extrabold text-misbar-navy mt-2">إدارة باقات الاشتراك وفريق العمل</h2>
                                <p class="text-xs text-slate-500 mt-1">التحكم في باقة مساحة العمل، حدود التوكنز، وصلاحيات أعضاء الفريق (مدير، استراتيجي، كاتب محتوى، مراجع).</p>
                            </div>
                            <div class="bg-slate-900 text-white px-4 py-2.5 rounded-2xl text-xs">
                                <span class="text-slate-400 block text-[10px]">استهلاك الذكاء الاصطناعي (Tokens)</span>
                                <strong class="text-amber-400">34,500 / 100,000 توكن</strong>
                            </div>
                        </div>

                        <!-- باقات الاشتراك الخمس (من وثيقة مسبار) -->
                        <h3 class="text-sm font-extrabold text-misbar-navy mb-3">مستويات الاشتراك في منصة مسبار (SaaS Tiers)</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3 mb-8 text-xs">
                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
                                <div>
                                    <span class="font-black text-misbar-navy text-sm block">Free</span>
                                    <span class="text-[11px] text-slate-500">تجربة الوظائف الأساسية بإمكانات محدودة</span>
                                    <ul class="mt-2.5 space-y-1 text-[11px] text-slate-600">
                                        <li>• مشروع واحد (Brand)</li>
                                        <li>• مستخدم واحد</li>
                                        <li>• 10,000 توكن شهرياً</li>
                                    </ul>
                                </div>
                                <button onclick="changeWorkspacePlan('Free')" class="mt-3 w-full py-1.5 rounded-xl bg-white border border-slate-300 font-bold hover:bg-slate-100">تفعيل الباقة</button>
                            </div>

                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
                                <div>
                                    <span class="font-black text-sky-700 text-sm block">Creator</span>
                                    <span class="text-[11px] text-slate-500">لصناع المحتوى والمسوقين المستقلين</span>
                                    <ul class="mt-2.5 space-y-1 text-[11px] text-slate-600">
                                        <li>• 3 مشاريع (Brands)</li>
                                        <li>• استوديو المحتوى + التقييم</li>
                                        <li>• 40,000 توكن شهرياً</li>
                                    </ul>
                                </div>
                                <button onclick="changeWorkspacePlan('Creator')" class="mt-3 w-full py-1.5 rounded-xl bg-white border border-slate-300 font-bold hover:bg-slate-100">تفعيل الباقة</button>
                            </div>

                            <div class="p-4 rounded-2xl bg-purple-50/70 border-2 border-purple-600 flex flex-col justify-between relative">
                                <span class="absolute -top-2.5 left-3 bg-purple-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">الباقة النشطة</span>
                                <div>
                                    <span class="font-black text-purple-900 text-sm block">Business</span>
                                    <span class="text-[11px] text-purple-700">للشركات والمشاريع المتكاملة (مثل فلوريا)</span>
                                    <ul class="mt-2.5 space-y-1 text-[11px] text-slate-700">
                                        <li>• 5 مشاريع + 5 أعضاء فريق</li>
                                        <li>• جميع الوحدات الـ 14</li>
                                        <li>• 100,000 توكن شهرياً</li>
                                    </ul>
                                </div>
                                <button onclick="changeWorkspacePlan('Business')" class="mt-3 w-full py-1.5 rounded-xl misbar-gradient text-white font-bold">مفعّلة حالياً</button>
                            </div>

                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
                                <div>
                                    <span class="font-black text-indigo-800 text-sm block">Agency</span>
                                    <span class="text-[11px] text-slate-500">لوكالات التسويق التي تدير عدة عملاء</span>
                                    <ul class="mt-2.5 space-y-1 text-[11px] text-slate-600">
                                        <li>• مساحات عمل غير محدودة</li>
                                        <li>• نظام المراجعة والموافقات</li>
                                        <li>• 350,000 توكن شهرياً</li>
                                    </ul>
                                </div>
                                <button onclick="changeWorkspacePlan('Agency')" class="mt-3 w-full py-1.5 rounded-xl bg-white border border-slate-300 font-bold hover:bg-slate-100">ترقية للباقة</button>
                            </div>

                            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
                                <div>
                                    <span class="font-black text-amber-700 text-sm block">Enterprise</span>
                                    <span class="text-[11px] text-slate-500">للمؤسسات الكبيرة والتكاملات المتقدمة</span>
                                    <ul class="mt-2.5 space-y-1 text-[11px] text-slate-600">
                                        <li>• صلاحيات RBAC مخصصة</li>
                                        <li>• تكاملات API مباشرة</li>
                                        <li>• سعة توكنز مخصصة</li>
                                    </ul>
                                </div>
                                <button onclick="changeWorkspacePlan('Enterprise')" class="mt-3 w-full py-1.5 rounded-xl bg-white border border-slate-300 font-bold hover:bg-slate-100">طلب تفعيل</button>
                            </div>
                        </div>

                        <!-- إدارة المستخدمين والصلاحيات (RBAC) -->
                        <div class="bg-slate-50 rounded-2xl p-5 border border-slate-200">
                            <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                                <h3 class="text-sm font-extrabold text-misbar-navy">أعضاء فريق مساحة عمل «فلوريا» والصلاحيات</h3>
                                <div class="flex flex-wrap gap-2 text-xs">
                                    <input id="new-member-name" type="text" placeholder="اسم العضو الجديد..." class="bg-white border border-slate-300 rounded-xl px-3 py-1.5">
                                    <select id="new-member-role" class="bg-white border border-slate-300 rounded-xl px-3 py-1.5 font-bold">
                                        <option value="كاتب محتوى (Content Creator)">كاتب محتوى (Content Creator)</option>
                                        <option value="مراجع ومعتمد (Reviewer)">مراجع ومعتمد (Reviewer)</option>
                                        <option value="استراتيجي تسويق (Strategist)">استراتيجي تسويق (Strategist)</option>
                                        <option value="مدير حساب (Admin)">مدير حساب (Admin)</option>
                                    </select>
                                    <button onclick="addWorkspaceMember()" class="px-3.5 py-1.5 rounded-xl misbar-gradient text-white font-bold">+ دعوة عضو</button>
                                </div>
                            </div>

                            <div class="overflow-x-auto bg-white rounded-xl border border-slate-200">
                                <table class="w-full text-right text-xs">
                                    <thead class="bg-slate-100 text-slate-700 font-extrabold">
                                        <tr>
                                            <th class="py-2.5 px-4">العضو</th>
                                            <th class="py-2.5 px-4">البريد الإلكتروني</th>
                                            <th class="py-2.5 px-4">الدور والصلاحية</th>
                                            <th class="py-2.5 px-4">الحالة</th>
                                        </tr>
                                    </thead>
                                    <tbody id="workspace-members-body" class="divide-y divide-slate-200">
                                        <tr>
                                            <td class="py-3 px-4 font-bold text-misbar-navy">مؤسسة مشروع فلوريا</td>
                                            <td class="py-3 px-4 text-slate-500" dir="ltr">hello@floria-sanaa.com</td>
                                            <td class="py-3 px-4"><span class="px-2.5 py-0.5 rounded-full bg-purple-100 text-purple-800 font-bold">مالك المساحة (Owner)</span></td>
                                            <td class="py-3 px-4 text-emerald-600 font-bold">نشط</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 font-bold text-misbar-navy">أخصائية التسويق والمحتوى</td>
                                            <td class="py-3 px-4 text-slate-500" dir="ltr">marketing@floria-sanaa.com</td>
                                            <td class="py-3 px-4"><span class="px-2.5 py-0.5 rounded-full bg-sky-100 text-sky-800 font-bold">استراتيجي تسويق (Strategist)</span></td>
                                            <td class="py-3 px-4 text-emerald-600 font-bold">نشط</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 px-4 font-bold text-misbar-navy">منسقة الطلبات والتواصل</td>
                                            <td class="py-3 px-4 text-slate-500" dir="ltr">orders@floria-sanaa.com</td>
                                            <td class="py-3 px-4"><span class="px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-800 font-bold">كاتب محتوى (Content Creator)</span></td>
                                            <td class="py-3 px-4 text-emerald-600 font-bold">نشط</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
