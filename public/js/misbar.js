let selectedPlan = "Business";

        function escapeHTML(value) {
            return String(value).replace(/[&<>\"']/g, ch => ({'&':'&amp;','<':'&lt;','>':'&gt;','\"':'&quot;',"'":'&#39;'}[ch]));
        }

        function showToast(message) {
            const toast = document.getElementById('app-toast');
            document.getElementById('app-toast-msg').textContent = message;
            toast.classList.remove('hidden');
            setTimeout(() => toast.classList.add('hidden'), 3200);
        }

        // ==========================================
        // 1. التنقل بين صفحات المصادقة ومساحة العمل
        // ==========================================
        function handleSignUp(e) {
            e.preventDefault();
            const email = document.getElementById('signup-email').value;
            const planInput = document.querySelector('input[name="plan"]:checked');
            selectedPlan = planInput ? planInput.value : "Business";
            sessionStorage.setItem('misbarSignupEmail', email);
            sessionStorage.setItem('misbarSelectedPlan', selectedPlan);
            sessionStorage.setItem('misbarNotice', 'هذه معاينة فقط؛ لم يتم إنشاء حساب فعلي. يمكنك متابعة استعراض شاشة الدخول.');
            window.location.assign(window.MISBAR_ROUTES.login);
        }

        function handleLogin(e) {
            e.preventDefault();
            sessionStorage.setItem('misbarNotice', 'المصادقة غير مهيأة في هذه النسخة؛ فُتحت مساحة العمل للمعاينة فقط.');
            window.location.assign(window.MISBAR_ROUTES.workspace);
        }

        function enterPlatformDirectly() {
            sessionStorage.setItem('misbarNotice', 'تم فتح مساحة العمل في وضع المعاينة؛ لا توجد جلسة دخول فعلية.');
            window.location.assign(window.MISBAR_ROUTES.workspace);
        }

        function logoutToLogin() {
            sessionStorage.setItem('misbarNotice', 'لا توجد جلسة دخول فعلية لتسجيل الخروج منها في نسخة المعاينة.');
            window.location.assign(window.MISBAR_ROUTES.login);
        }

        function goBackSafely(fallback) {
            if (document.referrer) {
                const previous = new URL(document.referrer);
                if (previous.origin === window.location.origin && previous.href !== window.location.href) {
                    window.location.assign(previous.href);
                    return;
                }
            }
            if (fallback) {
                window.location.assign(fallback);
                return;
            }
            window.location.assign(window.MISBAR_ROUTES.workspace);
        }

        // ==========================================
        // 2. التنقل بين وحدات المنصة
        // ==========================================
        function switchUnit(unitId) {
            const destination = window.MISBAR_ROUTES.units?.[unitId];
            if (!destination) {
                showToast('هذه الشاشة غير متاحة حالياً.');
                return;
            }
            window.location.assign(destination);
        }

        // ==========================================
        // 3. تفاعلات العقل التسويقي والمساعد
        // ==========================================
        const floriaEvidences = [
            "استند مسبار إلى وجود (ضعف الانتشار ومحدودية الطلبات في مرحلة بناء المشروع) كأبرز نقاط الضعف في ملف فلوريا، لذا اقترح دمج منتجين (إطار مخصص + باقة زهور مصغرة) لرفع جاذبية العرض الأول في صنعاء.",
            "استند مسبار إلى بند (الفرص) في خطة فلوريا: إمكانية التعاون مع مصورات العرائس، قاعات المناسبات، وصالونات التجميل في صنعاء للوصول المباشر للعرائس دون تكاليف إعلانية باهظة.",
            "استند مسبار إلى توصية (إنشاء كتالوج واتساب يحتوي على صور ونطاقات سعرية وتخصيص أبرز القصص في إنستغرام) لتسريع تحويل الاستفسارات إلى طلبات فعلية.",
            "استند مسبار إلى نقطتي ضعف رئيسيتين: (اعتماد الإنتاج اليدوي على الوقت والجهد) و(عدم وجود قاعدة بيانات منظمة للعملاء السابقين)، فاقترح قوالب تخصيص واضحة لتسريع التنفيذ."
        ];

        function showEvidence(idx) {
            document.getElementById('brain-evidence-content').textContent = floriaEvidences[idx];
            showToast('تم عرض تحليل البيانات من خطة فلوريا');
        }

        function askFloriaAssistant(q) {
            document.getElementById('assistant-query').value = q;
            submitAssistantQuery();
        }

        function submitAssistantQuery() {
            const q = document.getElementById('assistant-query').value.trim();
            if (!q) return;
            const box = document.getElementById('assistant-reply');
            box.classList.remove('hidden');
            box.innerHTML = `
                <strong class="text-purple-800 block mb-1"><i class="fa-solid fa-sparkles ml-1"></i> إجابة نموذجية للمعاينة (غير متصلة بخدمة ذكاء اصطناعي):</strong>
                بناءً على خطة <strong>فلوريا | Floria</strong> في صنعاء، يُنصح بالتركيز على <strong>الإطار التذكاري المدمج مع باقة الزهور المصغرة</strong>، وتفعيل <strong>بصمة تغليف خاصة</strong> تميز منتجاتك عن المقلدين، مع قياس النجاح عبر <strong>نسبة تحويل استفسارات واتساب إلى طلبات فعلية</strong> وليس عدد المتابعين فقط.
            `;
        }

        // ==========================================
        // 4. تحديث Brand DNA التفاعلي للعميل
        // ==========================================
        function updateBrandPreviewColors() {
            const c1 = document.getElementById('dna-color-primary').value;
            const c2 = document.getElementById('dna-color-secondary').value;
            const c3 = document.getElementById('dna-color-accent').value;
            document.getElementById('swatch-1').style.backgroundColor = c1;
            document.getElementById('swatch-2').style.backgroundColor = c2;
            document.getElementById('swatch-3').style.backgroundColor = c3;
            document.getElementById('nav-brand-icon').style.backgroundColor = c1;
        }

        function saveBrandDNA() {
            const fullName = document.getElementById('dna-name-field').value.trim();
            const sector = document.getElementById('dna-sector-field').value;
            const geo = document.getElementById('dna-geo-field').value;
            const uvp = document.getElementById('dna-uvp-field').value;
            const tone = document.getElementById('dna-tone-field').value;

            const parts = fullName.split('—');
            const shortName = parts[0].trim() || fullName;
            const tagline = parts[1] ? parts[1].trim() : "هدايا وتصاميم مخصصة";

            document.getElementById('nav-brand-name').textContent = shortName;
            document.getElementById('nav-brand-geo').textContent = geo.split('(')[0].trim();
            document.getElementById('nav-brand-tagline').textContent = `${tagline} • ${sector}`;
            document.getElementById('preview-dna-title').textContent = shortName;
            document.getElementById('preview-dna-sector').textContent = sector;
            document.getElementById('preview-dna-uvp').textContent = uvp;
            document.getElementById('preview-dna-tone').textContent = `النبرة: ${tone.split('،')[0]}`;
            document.getElementById('preview-dna-geo').textContent = `النطاق: ${geo.split('(')[0].trim()}`;
            updateBrandPreviewColors();

            showToast('تم حفظ وتحديث ملف Brand DNA ومزامنته مع كافة وحدات مسبار');
        }

        function resetFloriaBrandDNA() {
            document.getElementById('dna-name-field').value = "فلوريا | Floria — لمسات تُزهر بالجمال";
            document.getElementById('dna-sector-field').value = "الهدايا اليدوية والتصاميم المخصصة";
            document.getElementById('dna-geo-field').value = "صنعاء (مع إمكانية التوسع)";
            document.getElementById('dna-products-field').value = "إطارات تذكارية يدوية مخصصة بالأسماء والعبارات والتواريخ، باقات زهور مصغرة مدمجة مع الإطارات، بطاقات إهداء وتغليف أنيق للمناسبات (أعراس، تخرج، أعياد).";
            document.getElementById('dna-uvp-field').value = "في فلوريا، لا نهدي قطعة فحسب، بل نصنع تفاصيل تحمل أسماءكم، مشاعركم، وذكرياتكم، لتبقى أجمل اللحظات حاضرة حتى بعد مرور الزمن.";
            document.getElementById('dna-color-primary').value = "#BE185D";
            document.getElementById('dna-color-secondary').value = "#D97706";
            document.getElementById('dna-color-accent').value = "#FDF2F8";
            document.getElementById('dna-tone-field').value = "عاطفية، دافئة، راقية، وتلامس المشاعر";
            saveBrandDNA();
        }

        // ==========================================
        // 5. رادار السوق ومختبر المنافسين (المصفوفة)
        // ==========================================
        function scanMarketOpportunities() {
            showToast('تم تحديث رادار السوق ورصد أحدث الفرص الموسمية في صنعاء!');
        }

        function openAddCompetitorForm() {
            document.getElementById('add-competitor-box').classList.remove('hidden');
        }

        function addCompetitorRow() {
            const name = document.getElementById('comp-name').value.trim();
            const strength = document.getElementById('comp-strength').value.trim();
            const weakness = document.getElementById('comp-weakness').value.trim();
            const score = parseInt(document.getElementById('comp-score').value) || 65;

            if (!name || !strength || !weakness) {
                showToast('يرجى تعبئة اسم المنافس ونقاط القوة والضعف');
                return;
            }

            let badgeClass = "bg-amber-100 text-amber-800";
            if (score >= 80) badgeClass = "bg-emerald-100 text-emerald-800";
            else if (score < 60) badgeClass = "bg-rose-100 text-rose-800";

            const tbody = document.getElementById('competitor-matrix-body');
            const row = document.createElement('tr');
            row.className = "hover:bg-slate-50";
            row.innerHTML = `
                <td class="py-3.5 px-4 font-extrabold text-misbar-navy">${escapeHTML(name)}</td>
                <td class="py-3.5 px-4 text-slate-700">${escapeHTML(strength)}</td>
                <td class="py-3.5 px-4 text-slate-600">${escapeHTML(weakness)}</td>
                <td class="py-3.5 px-4 text-center">
                    <span class="inline-block px-2.5 py-1 rounded-lg ${badgeClass} font-extrabold">${escapeHTML(score)}/100</span>
                </td>
                <td class="py-3.5 px-4 text-sky-700 font-semibold">استغلال فجوة (${escapeHTML(weakness)}) عبر إبراز جودة وتخصيص فلوريا</td>
            `;
            tbody.appendChild(row);

            document.getElementById('comp-name').value = "";
            document.getElementById('comp-strength').value = "";
            document.getElementById('comp-weakness').value = "";
            document.getElementById('add-competitor-box').classList.add('hidden');
            showToast('تمت إضافة المنافس وتوليد التوصية المضادة بنجاح');
        }

        // ==========================================
        // 6. الإعلان الأول والاستوديو
        // ==========================================
        function copyFirstAd() {
            const text = document.getElementById('floria-first-ad-text').innerText;
            const temp = document.createElement('textarea');
            temp.value = text;
            document.body.appendChild(temp);
            temp.select();
            document.execCommand('copy');
            document.body.removeChild(temp);
            showToast('تم نسخ نص الإعلان الأول لفلوريا بنجاح!');
        }

        function sendAdToStudio() {
            sessionStorage.setItem('misbarContentDraft', document.getElementById('floria-first-ad-text').innerText);
            sessionStorage.setItem('misbarNotice', 'نُقل نص الإعلان إلى استوديو المحتوى في نسخة المعاينة.');
            switchUnit('studio');
        }

        function generateFloriaStudio() {
            const type = document.getElementById('floria-content-type').value;
            const editor = document.getElementById('floria-editor');
            const scripts = {
                ad: `بعض اللحظات تستحق أن تبقى.. لا أن تمرّ عابرة ✨🌸
في فلوريا | Floria، نصنع لكِ هدية يدوية تحمل اسمكِ، عبارتكِ الخاصة، وتاريخ أجمل مناسباتكِ.
اطلبي الآن باقة (إطار مخصص + باقة زهور مصغرة) بتغليف فلوريا الأنيق وتوصيل سريع في صنعاء! 🎁📲`,
                reels: `[0-3 ثوانٍ - لقطة قريبة لكتابة الاسم على الإطار]
النص على الشاشة: "كيف تتحول فكرة بسيطة إلى ذكرى لا تُنسى؟ 🌸"
[4-10 ثوانٍ - تنسيق الزهور والشرائط اللؤلؤية]
التعليق: "في فلوريا نهتم بأدق التفاصيل، من تناسق الألوان حتى بصمة التغليف الخاصة."
[11-15 ثانية - شكل الهدية النهائي]
"احجزي هديتكِ المخصصة الآن عبر الرابط في البايو!"`,
                whatsapp: `أهلاً بكِ في فلوريا | Floria 🌸✨
يسعدنا مشاركتكِ أجمل لحظاتكِ!
لتحضير هديتكِ المخصصة بكل حب، اختاري:
1️⃣ نوع المنتج (إطار مخصص / إطار + باقة زهور)
2️⃣ الاسم والعبارة والتاريخ المطلوب
3️⃣ اللون المفضل للتنسيق
تصفحي الكتالوج والأسعار من هنا 👇`,
                collab: `مرحباً أستاذة [الاسم] 🌸
نحن في مشروع (فلوريا | Floria) للهدايا والتصاميم اليدوية المخصصة في صنعاء، نعجب كثيراً بأسلوبكِ الراقي في تصوير العرائس.
يسعدنا إهداءكِ قطعة مخصصة باسمكِ من تصاميمنا الجديدة وبحث فرصة تعاون مشترك تمنح عرائسكِ تذكاراً فريداً ليوم زفافهن ✨`
            };
            editor.value = scripts[type];
            scoreFloriaContent();
            showToast('تم توليد المحتوى بنبرة فلوريا العاطفية');
        }

        function repurposeFloria(target) {
            document.getElementById('floria-content-type').value = target;
            generateFloriaStudio();
        }

        function scoreFloriaContent() {
            const txt = document.getElementById('floria-editor').value.trim();
            let score = 75;
            if (txt.includes('فلوريا')) score += 6;
            if (txt.includes('اسم') || txt.includes('تاريخ') || txt.includes('تغليف')) score += 7;
            if (txt.includes('اطلب') || txt.includes('واتساب') || txt.includes('البايو')) score += 6;
            if (txt.length < 30) score = 50;
            if (score > 96) score = 96;
            document.getElementById('floria-score-val').textContent = score;
        }

        // ==========================================
        // 7. مخطط المحتوى والتقويم
        // ==========================================
        const floriaPosts = [
            { day: "السبت", platform: "إنستغرام ريلز", title: "كواليس صناعة إطار تخرج مخصص بالاسم والتاريخ", status: "معتمد" },
            { day: "الإثنين", platform: "ستوري إنستغرام", title: "استطلاع رأي للجمهور: أي تنسيق ألوان تفضلين لهدايا العرائس؟", status: "قيد المراجعة" },
            { day: "الأربعاء", platform: "بوست + واتساب", title: "إطلاق باقة (إطار + زهور مصغرة) بعرض خاص لأهل صنعاء", status: "معتمد" }
        ];

        function renderFloriaCalendar() {
            const grid = document.getElementById('floria-calendar-grid');
            grid.innerHTML = floriaPosts.map(p => `
                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="font-extrabold text-indigo-700">${p.day} • ${p.platform}</span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold ${p.status === 'معتمد' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700'}">${p.status}</span>
                        </div>
                        <p class="font-bold text-misbar-navy leading-snug">${p.title}</p>
                    </div>
                    <span class="text-[11px] text-slate-400 mt-3 block">مربوط بحملة: تفاصيل تحمل أسماءكم</span>
                </div>
            `).join('');
        }

        function suggestFloriaTodayPost() {
            document.getElementById('floria-today-suggestion').classList.remove('hidden');
        }

        function addFloriaPostToCalendar() {
            floriaPosts.unshift({
                day: "اليوم (مقترح ذكي)",
                platform: "ريلز إنستغرام",
                title: "لحظة كتابة الاسم والتاريخ على الإطار مع بصمة التغليف",
                status: "معتمد"
            });
            renderFloriaCalendar();
            document.getElementById('floria-today-suggestion').classList.add('hidden');
            showToast('تمت إضافة المنشور المقترح إلى تقويم فلوريا');
        }

        // ==========================================
        // 8. محاكي الحملة وغرفة الإنقاذ
        // ==========================================
        function simulateFloriaAd() {
            const budget = parseInt(document.getElementById('floria-budget-slider').value);
            document.getElementById('floria-budget-display').textContent = `$${budget}`;
            document.getElementById('floria-sim-reach').textContent = (budget * 250).toLocaleString();
            document.getElementById('floria-sim-inquiries').textContent = Math.round(budget * 2.2).toLocaleString();
            document.getElementById('floria-sim-orders').textContent = Math.round(budget * 0.6).toLocaleString();
        }

        function selectFloriaRescue(type) {
            const box = document.getElementById('floria-rescue-box');
            const plans = {
                season: `
                    <strong class="text-rose-700 text-sm block">خطة معالجة موسمية الطلب (خارج مواسم التخرج والأعراس):</strong>
                    <p>1. <strong>التركيز على المناسبات الدائمة:</strong> توجيه المحتوى نحو أعياد الميلاد، التهاني العائلية، وهدايا الصديقات التي لا ترتبط بموسم محدد.</p>
                    <p>2. <strong>تفعيل قاعدة بيانات العملاء السابقين:</strong> إرسال رسالة تذكير لطيفة عبر واتساب للعميلات السابقات قبل مناسباتهن القادمة بعرض خاص للعملاء المتكررين.</p>
                `,
                copycat: `
                    <strong class="text-rose-700 text-sm block">خطة الحماية من تقليد التصاميم في السوق:</strong>
                    <p>1. <strong>ابتكار بصمة تغليف خاصة:</strong> تصميم بطاقة شكر وشريطة تغليف بختم فلوريا تجعل العميل يميز المنتج الأصلي فوراً.</p>
                    <p>2. <strong>توثيق كواليس الصنع اليدوي:</strong> نشر مقاطع ريلز مستمرة تظهر دقة اليد العاملة في فلوريا مما يبني ثقة يصعب على المقلدين نسخها.</p>
                `,
                delivery: `
                    <strong class="text-rose-700 text-sm block">خطة تأمين التوصيل ومنع تلف المنتجات في صنعاء:</strong>
                    <p>1. <strong>تغليف الحماية المزدوج:</strong> استخدام طبقات حماية داخلية للإطارات الزجاجية وتوضيح ذلك للعميل كجزء من جودة الخدمة.</p>
                    <p>2. <strong>تحديد مواعيد تسليم واضحة:</strong> حصر خيارات التخصيص في قوالب محددة لضمان جاهزية الطلب قبل موعد المناسبة بوقت كافٍ.</p>
                `
            };
            box.innerHTML = plans[type];
        }

        // ==========================================
        // 9. إدارة الباقات والمستخدمين (SaaS & RBAC)
        // ==========================================
        function changeWorkspacePlan(planName) {
            selectedPlan = planName;
            document.getElementById('nav-plan-badge').textContent = `باقة ${planName}`;
            document.getElementById('login-plan-badge').textContent = `باقة ${planName}`;
            showToast(`تم تحديث باقة مساحة العمل إلى: ${planName}`);
        }

        function addWorkspaceMember() {
            const name = document.getElementById('new-member-name').value.trim();
            const role = document.getElementById('new-member-role').value;
            if (!name) {
                showToast('يرجى إدخال اسم العضو الجديد');
                return;
            }
            const tbody = document.getElementById('workspace-members-body');
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td class="py-3 px-4 font-bold text-misbar-navy">${escapeHTML(name)}</td>
                <td class="py-3 px-4 text-slate-500" dir="ltr">team-${Math.floor(Math.random()*90+10)}@floria-sanaa.com</td>
                <td class="py-3 px-4"><span class="px-2.5 py-0.5 rounded-full bg-indigo-100 text-indigo-800 font-bold">${escapeHTML(role)}</span></td>
                <td class="py-3 px-4 text-emerald-600 font-bold">نشط</td>
            `;
            tbody.appendChild(tr);
            document.getElementById('new-member-name').value = "";
            showToast(`تمت إضافة (${name}) بصلاحية ${role}`);
        }

        window.onload = function () {
            const savedPlan = sessionStorage.getItem('misbarSelectedPlan');
            if (savedPlan) selectedPlan = savedPlan;
            const emailField = document.getElementById('login-email');
            if (emailField && sessionStorage.getItem('misbarSignupEmail')) {
                emailField.value = sessionStorage.getItem('misbarSignupEmail');
            }
            const planBadges = document.querySelectorAll('#login-plan-badge, #nav-plan-badge');
            planBadges.forEach(badge => badge.textContent = `باقة ${selectedPlan}`);

            if (document.getElementById('floria-calendar-grid')) renderFloriaCalendar();
            if (document.getElementById('floria-rescue-box')) selectFloriaRescue('season');

            const draft = sessionStorage.getItem('misbarContentDraft');
            const editor = document.getElementById('floria-editor');
            if (draft && editor) {
                editor.value = draft;
                sessionStorage.removeItem('misbarContentDraft');
                scoreFloriaContent();
            }

            const notice = sessionStorage.getItem('misbarNotice');
            if (notice) {
                showToast(notice);
                sessionStorage.removeItem('misbarNotice');
            }
        };
