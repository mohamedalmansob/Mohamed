<aside class="w-full lg:w-72 shrink-0 space-y-4">
                <div class="bg-white rounded-2xl p-3.5 border border-slate-200 shadow-sm">
                    <div class="text-[11px] font-extrabold text-slate-400 px-3 py-1.5 flex items-center justify-between">
                        <span>وحدات منظومة مسبار (14 وحدة)</span>
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    </div>
                    <nav class="flex lg:flex-col gap-1 overflow-x-auto pb-2 lg:pb-0 mt-1" id="platform-sidebar">
                        <a href="{{ route('workspace.brain') }}" data-unit="brain" aria-current="{{ $activeUnit === 'brain' ? 'page' : 'false' }}" class="unit-btn w-full text-right px-3.5 py-2.5 rounded-xl text-xs flex items-center gap-3 transition-all shrink-0 {{ $activeUnit === 'brain' ? 'misbar-gradient text-white shadow font-extrabold' : 'text-slate-700 hover:bg-slate-100 font-bold' }}">
                            <i class="fa-solid fa-brain w-4 text-center text-amber-300"></i>
                            <span>1. العقل التسويقي والمساعد</span>
                        </a>
                        <a href="{{ route('brand-dna.edit') }}" data-unit="brand" aria-current="{{ $activeUnit === 'brand' ? 'page' : 'false' }}" class="unit-btn w-full text-right px-3.5 py-2.5 rounded-xl text-xs flex items-center gap-3 transition-all shrink-0 {{ $activeUnit === 'brand' ? 'misbar-gradient text-white shadow font-extrabold' : 'text-slate-700 hover:bg-slate-100 font-bold' }}">
                            <i class="fa-solid fa-dna w-4 text-center text-pink-600"></i>
                            <span>2. هوية العلامة (Brand DNA)</span>
                        </a>
                        <a href="{{ route('market-radar.index') }}" data-unit="radar_audience" aria-current="{{ $activeUnit === 'radar_audience' ? 'page' : 'false' }}" class="unit-btn w-full text-right px-3.5 py-2.5 rounded-xl text-xs flex items-center gap-3 transition-all shrink-0 {{ $activeUnit === 'radar_audience' ? 'misbar-gradient text-white shadow font-extrabold' : 'text-slate-700 hover:bg-slate-100 font-bold' }}">
                            <i class="fa-solid fa-satellite-dish w-4 text-center text-sky-600"></i>
                            <span>3-4. رادار السوق وذكاء الجمهور</span>
                        </a>
                        <a href="{{ route('workspace.competitors') }}" data-unit="competitors" aria-current="{{ $activeUnit === 'competitors' ? 'page' : 'false' }}" class="unit-btn w-full text-right px-3.5 py-2.5 rounded-xl text-xs flex items-center gap-3 transition-all shrink-0 {{ $activeUnit === 'competitors' ? 'misbar-gradient text-white shadow font-extrabold' : 'text-slate-700 hover:bg-slate-100 font-bold' }}">
                            <i class="fa-solid fa-chess-knight w-4 text-center text-indigo-600"></i>
                            <span>5. مختبر المنافسين (المصفوفة)</span>
                        </a>
                        <a href="{{ route('workspace.strategy') }}" data-unit="strategy" aria-current="{{ $activeUnit === 'strategy' ? 'page' : 'false' }}" class="unit-btn w-full text-right px-3.5 py-2.5 rounded-xl text-xs flex items-center gap-3 transition-all shrink-0 {{ $activeUnit === 'strategy' ? 'misbar-gradient text-white shadow font-extrabold' : 'text-slate-700 hover:bg-slate-100 font-bold' }}">
                            <i class="fa-solid fa-bullhorn w-4 text-center text-orange-500"></i>
                            <span>6. بناء الاستراتيجية وأول إعلان</span>
                            <span class="mr-auto text-[10px] bg-orange-100 text-orange-700 px-1.5 py-0.5 rounded font-extrabold">10 بنود</span>
                        </a>
                        <a href="{{ route('content.create') }}" data-unit="studio" aria-current="{{ $activeUnit === 'studio' ? 'page' : 'false' }}" class="unit-btn w-full text-right px-3.5 py-2.5 rounded-xl text-xs flex items-center gap-3 transition-all shrink-0 {{ $activeUnit === 'studio' ? 'misbar-gradient text-white shadow font-extrabold' : 'text-slate-700 hover:bg-slate-100 font-bold' }}">
                            <i class="fa-solid fa-wand-magic-sparkles w-4 text-center text-purple-600"></i>
                            <span>7-8-11. استوديو المحتوى والتقييم</span>
                        </a>
                        <a href="{{ route('content.calendar') }}" data-unit="planner" aria-current="{{ $activeUnit === 'planner' ? 'page' : 'false' }}" class="unit-btn w-full text-right px-3.5 py-2.5 rounded-xl text-xs flex items-center gap-3 transition-all shrink-0 {{ $activeUnit === 'planner' ? 'misbar-gradient text-white shadow font-extrabold' : 'text-slate-700 hover:bg-slate-100 font-bold' }}">
                            <i class="fa-solid fa-calendar-check w-4 text-center text-indigo-600"></i>
                            <span>9. مخطط المحتوى والتقويم</span>
                        </a>
                        <a href="{{ route('analytics.dashboard') }}" data-unit="analytics" aria-current="{{ $activeUnit === 'analytics' ? 'page' : 'false' }}" class="unit-btn w-full text-right px-3.5 py-2.5 rounded-xl text-xs flex items-center gap-3 transition-all shrink-0 {{ $activeUnit === 'analytics' ? 'misbar-gradient text-white shadow font-extrabold' : 'text-slate-700 hover:bg-slate-100 font-bold' }}">
                            <i class="fa-solid fa-chart-pie w-4 text-center text-emerald-600"></i>
                            <span>12-13. المؤشرات ومحاكي الحملة</span>
                        </a>
                        <a href="{{ route('voice-rescue.index') }}" data-unit="voice_rescue" aria-current="{{ $activeUnit === 'voice_rescue' ? 'page' : 'false' }}" class="unit-btn w-full text-right px-3.5 py-2.5 rounded-xl text-xs flex items-center gap-3 transition-all shrink-0 {{ $activeUnit === 'voice_rescue' ? 'misbar-gradient text-white shadow font-extrabold' : 'text-slate-700 hover:bg-slate-100 font-bold' }}">
                            <i class="fa-solid fa-kit-medical w-4 text-center text-rose-600"></i>
                            <span>10-14. صوت العميل والإنقاذ</span>
                        </a>
                        <div class="hidden lg:block border-t border-slate-200 my-1.5"></div>
                        <a href="{{ route('workspace.admin') }}" data-unit="admin" aria-current="{{ $activeUnit === 'admin' ? 'page' : 'false' }}" class="unit-btn w-full text-right px-3.5 py-2.5 rounded-xl text-xs flex items-center gap-3 transition-all shrink-0 {{ $activeUnit === 'admin' ? 'misbar-gradient text-white shadow font-extrabold' : 'text-slate-700 hover:bg-slate-100 font-bold' }}">
                            <i class="fa-solid fa-users-gear w-4 text-center text-amber-600"></i>
                            <span>إدارة الباقات والمستخدمين</span>
                        </a>
                    </nav>
                </div>

                <!-- بطاقة ملخص حلقة التعلم المستمرة -->
                <div class="hidden lg:block bg-gradient-to-br from-[#0A1E46] to-[#1E1B4B] text-white rounded-2xl p-4 shadow-md">
                    <div class="flex items-center gap-2 text-amber-400 font-bold text-xs mb-2">
                        <i class="fa-solid fa-arrows-spin"></i>
                        <span>حلقة مسبار المترابطة لفلوريا</span>
                    </div>
                    <p class="text-[11px] text-slate-300 leading-relaxed mb-3">
                        تم ربط نقاط ضعف وفرص <strong>فلوريا</strong> (صنعاء) مباشرة باستراتيجية الإطلاق وأول إعلان ترويجي.
                    </p>
                    <div class="grid grid-cols-2 gap-2 text-[11px]">
                        <div class="bg-white/10 p-2 rounded-lg text-center">
                            <span class="block text-sky-300 font-bold">4 شرائح</span>
                            <span class="text-slate-300 text-[10px]">عرائس، خريجات...</span>
                        </div>
                        <div class="bg-white/10 p-2 rounded-lg text-center">
                            <span class="block text-amber-300 font-bold">8 مؤشرات</span>
                            <span class="text-slate-300 text-[10px]">مربوطة بالخطة</span>
                        </div>
                    </div>
                </div>
            </aside>
