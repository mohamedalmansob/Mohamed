(() => {
    'use strict';

    document.addEventListener('DOMContentLoaded', () => {
        const page = document.getElementById('brand-profile-page');
        if (!page) return;

        const tabs = Array.from(page.querySelectorAll('[data-tab]'));
        const panels = Array.from(page.querySelectorAll('.brand-profile-panel'));

        const previousButton = page.querySelector('#brand-profile-previous');
        const nextButton = page.querySelector('#brand-profile-next');
        const currentSectionLabel = page.querySelector('#brand-profile-current-section');
        const progressText = page.querySelector('#brand-profile-progress-text');
        const progressBar = page.querySelector('#brand-profile-progress-bar');

        const aiAnalyzeButton = page.querySelector('[data-brand-ai-analyze]');
        const aiStatus = page.querySelector('[data-brand-ai-status]');

        let currentIndex = 0;
        const totalSections = tabs.length;

        const sectionNames = {
            basic_info: 'اسم العلامة ونشاطها',
            vision_mission_values: 'الرؤية والرسالة والقيم',
            visual_identity: 'الهوية البصرية',
            personality: 'شخصية العلامة',
            communication: 'نبرة التواصل',
            positioning: 'الميزة التنافسية',
            goals: 'الأهداف التسويقية والتجارية'
        };

        function setAiStatus(message, type = 'info') {
            if (!aiStatus) return;

            const styles = {
                info: 'bg-sky-50 border-sky-200 text-sky-700',
                success: 'bg-emerald-50 border-emerald-200 text-emerald-700',
                warning: 'bg-amber-50 border-amber-200 text-amber-700',
                error: 'bg-red-50 border-red-200 text-red-700'
            };

            aiStatus.className =
                `rounded-xl border p-3 text-xs leading-6 ${styles[type] || styles.info}`;

            aiStatus.textContent = message;
            aiStatus.classList.remove('hidden');
        }

        function showSection(index) {
            if (!tabs.length || !panels.length) return;

            currentIndex = Math.max(0, Math.min(index, totalSections - 1));

            tabs.forEach((tab, i) => {
                const active = i === currentIndex;
                tab.classList.toggle('active', active);
                tab.setAttribute('aria-selected', active ? 'true' : 'false');
            });

            panels.forEach((panel) => {
                const active = panel.id ===
                    tabs[currentIndex].getAttribute('aria-controls');

                panel.hidden = !active;
                panel.classList.toggle('hidden', !active);
            });

            if (currentSectionLabel) {
                currentSectionLabel.textContent =
                    sectionNames[tabs[currentIndex].dataset.tab] || '';
            }

            if (previousButton) {
                previousButton.disabled = currentIndex === 0;
            }

            if (nextButton) {
                nextButton.disabled = currentIndex === totalSections - 1;
            }

            updateProgress();
        }

        function sectionHasData(tab) {
            const sectionKey = tab.dataset.tab;
            const panel = page.querySelector(`#panel-${sectionKey}`);

            if (!panel) return false;

            const hasFields = Array.from(
                panel.querySelectorAll('[data-profile-field]')
            ).some((field) => field.value.trim() !== '');

            const hasFiles = Array.from(
                panel.querySelectorAll('[data-brand-asset-input]')
            ).some((input) => input.files && input.files.length > 0);

            return hasFields || hasFiles;
        }

        function updateProgress() {
            const completed = tabs.filter(sectionHasData).length;
            const percentage = totalSections ?
                Math.round((completed / totalSections) * 100) :
                0;

            if (progressText) {
                progressText.textContent =
                    `${completed} من ${totalSections} أقسام تحتوي على بيانات`;
            }

            if (progressBar) {
                progressBar.style.width = `${percentage}%`;
            }
        }

        function formatFileSize(bytes) {
            if (bytes < 1024) return `${bytes} بايت`;
            if (bytes < 1024 * 1024) {
                return `${(bytes / 1024).toFixed(1)} كيلوبايت`;
            }
            return `${(bytes / (1024 * 1024)).toFixed(2)} ميجابايت`;
        }

        function renderFiles(input) {
            const section = input.closest('[data-brand-assets-section]');
            const list = section ?.querySelector('[data-brand-assets-list]');
            if (!list) return;

            list.replaceChildren();

            Array.from(input.files || []).forEach((file) => {
                const item = document.createElement('div');
                item.className =
                    'flex items-center justify-between gap-3 p-3 rounded-lg bg-slate-50 border border-slate-200 text-xs';

                const name = document.createElement('span');
                name.className = 'font-semibold text-slate-700 truncate';
                name.textContent = file.name;

                const size = document.createElement('span');
                size.className = 'text-slate-400 shrink-0';
                size.textContent = formatFileSize(file.size);

                item.append(name, size);
                list.appendChild(item);
            });
        }

        function getSectionForField(field) {
            const panel = field.closest('.brand-profile-panel');
            return panel ? panel.id.replace('panel-', '') : null;
        }

        function removeSuggestion(field) {
            const existing = field.parentElement ?.querySelector(
                '[data-ai-suggestion]'
            );

            if (existing) existing.remove();
        }

        function renderSuggestion(field, suggestion) {
            removeSuggestion(field);

            const wrapper = document.createElement('div');
            const reason = document.createElement('p');
            reason.className = 'text-xs text-slate-500 leading-5';
            reason.textContent = suggestion.reason ?
                `سبب الاقتراح: ${suggestion.reason}` :
                '';
            wrapper.dataset.aiSuggestion = 'true';
            wrapper.className =
                'mt-2 rounded-xl border border-sky-200 bg-sky-50 p-3 space-y-3';

            const heading = document.createElement('div');
            heading.className = 'text-xs font-bold text-sky-800';
            heading.textContent = 'اقتراح الذكاء الاصطناعي';

            const content = document.createElement('p');
            content.className =
                'text-xs leading-6 text-slate-700 whitespace-pre-wrap';
            content.textContent = String(suggestion.value ?? '');

            const actions = document.createElement('div');
            actions.className = 'flex flex-wrap gap-2';

            const acceptButton = document.createElement('button');
            acceptButton.type = 'button';
            acceptButton.className =
                'px-3 py-2 rounded-lg bg-sky-600 text-white text-xs font-bold';
            acceptButton.textContent = 'قبول الاقتراح';

            acceptButton.addEventListener('click', () => {
                field.value = String(suggestion.value ?? '');
                field.dispatchEvent(new Event('input', { bubbles: true }));
                field.dispatchEvent(new Event('change', { bubbles: true }));
                wrapper.remove();
                setAiStatus('تم وضع الاقتراح في الحقل. لم يتم حفظه في قاعدة البيانات.', 'success');
            });

            const ignoreButton = document.createElement('button');
            ignoreButton.type = 'button';
            ignoreButton.className =
                'px-3 py-2 rounded-lg border border-slate-300 bg-white text-slate-600 text-xs font-bold';
            ignoreButton.textContent = 'تجاهل';

            ignoreButton.addEventListener('click', () => {
                wrapper.remove();
            });

            actions.append(acceptButton, ignoreButton);
            wrapper.append(heading, content);

            if (reason.textContent) {
                wrapper.append(reason);
            }

            wrapper.append(actions);
            field.insertAdjacentElement('afterend', wrapper);
        }

        function collectFields(formData) {
            const fields = {};

            tabs.forEach((tab) => {
                const sectionKey = tab.dataset.tab;
                const panel = page.querySelector(`#panel-${sectionKey}`);

                if (!panel) return;

                fields[sectionKey] = {};

                panel.querySelectorAll('[data-profile-field]').forEach((field) => {
                    const fieldKey = field.name;

                    if (!fieldKey) return;

                    fields[sectionKey][fieldKey] = field.value.trim();
                });
            });

            formData.append('fields', JSON.stringify(fields));
        }

        function collectFiles(formData) {
            let count = 0;

            page.querySelectorAll('[data-brand-asset-input]').forEach((input) => {
                const sectionKey = input.dataset.sectionKey ||
                    input.closest('[data-brand-assets-section]') ?.dataset.brandAssetsSection;

                Array.from(input.files || []).forEach((file) => {
                    formData.append('files[]', file, file.name);
                    formData.append('file_sections[]', sectionKey || '');
                    count++;
                });
            });

            return count;
        }


        function displaySuggestions(suggestions) {
            let displayed = 0;

            if (!Array.isArray(suggestions)) {
                return displayed;
            }

            suggestions.forEach((suggestion) => {
                const sectionKey = suggestion.section_key;
                const fieldKey = suggestion.field_key;
                const value = suggestion.suggested_value;

                if (!sectionKey ||
                    !fieldKey ||
                    typeof value !== 'string' ||
                    value.trim() === ''
                ) {
                    return;
                }

                const panel = page.querySelector(`#panel-${sectionKey}`);
                if (!panel) return;

                const field = Array.from(
                    panel.querySelectorAll('[data-profile-field]')
                ).find((item) => item.name === fieldKey);

                if (!field || field.value.trim() !== '') return;

                renderSuggestion(field, {
                    value: value.trim(),
                    reason: suggestion.reason || ''
                });

                displayed++;
            });

            return displayed;
        }


        async function analyzeData() {
            if (!aiAnalyzeButton) return;

            const fields = Array.from(
                page.querySelectorAll('[data-profile-field]')
            );

            const filledFields = fields.filter(
                (field) => field.value.trim() !== ''
            );

            const formData = new FormData();

            collectFields(formData);
            const fileCount = collectFiles(formData);

            if (filledFields.length === 0 && fileCount === 0) {
                setAiStatus(
                    'أدخل بعض البيانات أو أرفق ملفات أولًا حتى نتمكن من تحليلها.',
                    'warning'
                );
                return;
            }

            const url = page.dataset.aiUrl;
            const csrfToken = page.dataset.csrfToken;

            if (!url || !csrfToken) {
                setAiStatus('تعذر تحديد إعدادات الاتصال بالخادم.', 'error');
                return;
            }

            aiAnalyzeButton.disabled = true;
            aiAnalyzeButton.classList.add('opacity-60', 'cursor-not-allowed');

            setAiStatus('جارٍ إرسال البيانات والمرفقات وتحليلها، يرجى الانتظار...', 'info');

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const result = await response.json().catch(() => ({}));

                if (!response.ok) {
                    const validationMessage = result.errors ?
                        Object.values(result.errors).flat().join(' ') :
                        result.message;

                    throw new Error(
                        validationMessage || `فشل الطلب. رمز الاستجابة: ${response.status}`
                    );
                }

                if (!result.success) {
                    throw new Error(result.message || 'تعذر إكمال التحليل.');
                }

                const count = displaySuggestions(result.suggestions || {});

                if (count > 0) {
                    setAiStatus(
                        `اكتمل التحليل. عُرض ${count} اقتراحًا للحقول المناسبة. يمكنك قبول كل اقتراح أو تجاهله.`,
                        'success'
                    );
                } else {
                    setAiStatus(
                        result.message || 'اكتمل التحليل، ولم ينتج اقتراحات جديدة للحقول الفارغة.',
                        'warning'
                    );
                }
            } catch (error) {
                console.error('Brand Profile AI error:', error);

                setAiStatus(
                    error.message || 'حدث خطأ أثناء الاتصال بخدمة التحليل.',
                    'error'
                );
            } finally {
                aiAnalyzeButton.disabled = false;
                aiAnalyzeButton.classList.remove('opacity-60', 'cursor-not-allowed');
            }
        }

        // اعتماد قسم واحد وحفظ بياناته
        async function approveSection(sectionKey, button, statusElement) {
            const isFinalSection = sectionKey === 'goals';
            const panel = page.querySelector(`#panel-${sectionKey}`);
            if (!panel) return;

            const fields = {};

            panel.querySelectorAll('[data-profile-field]').forEach((field) => {
                if (field.name) {
                    fields[field.name] = field.value.trim();
                }
            });

            const urls = JSON.parse(page.dataset.approvalUrls || '{}');
            const url = urls[sectionKey];
            const csrfToken = page.dataset.csrfToken;

            if (!url || !csrfToken) {
                statusElement.textContent = 'تعذر تحديد رابط الاعتماد.';
                statusElement.className = 'mt-3 text-sm text-red-600';
                return;
            }

            button.disabled = true;
            button.classList.add('opacity-60', 'cursor-not-allowed');
            statusElement.textContent = 'جارٍ التحقق من البيانات واعتماد القسم...';
            statusElement.className = 'mt-3 text-sm text-sky-700';

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ fields })
                });

                const result = await response.json().catch(() => ({}));

                if (!response.ok || !result.success) {
                    const message = result.errors ?
                        Object.values(result.errors).flat().join(' ') :
                        result.message;

                    throw new Error(message || 'تعذر اعتماد القسم.');
                }

                statusElement.textContent =
                    `تم اعتماد القسم بنجاح. رقم الإصدار: ${result.data.profile_version}`;

                statusElement.className = 'mt-3 text-sm text-green-700';

                button.textContent = isFinalSection ? 'تم الاعتماد بنجاح' : 'تم اعتماد القسم';

                if (isFinalSection) {
                    statusElement.textContent = 'تم اعتماد ملف فلوريا. جارٍ الانتقال إلى لوحة العرض...';
                    window.location.href = '/workspace/brand-dna';
                    return;
                }

            } catch (error) {
                statusElement.textContent =
                    error.message || 'حدث خطأ أثناء اعتماد القسم.';

                statusElement.className = 'mt-3 text-sm text-red-600';

            } finally {
                button.disabled = false;
                button.classList.remove('opacity-60', 'cursor-not-allowed');
            }
        }

        // إنشاء زر اعتماد في نهاية كل قسم
        panels.forEach((panel) => {
            const sectionKey = panel.id.replace('panel-', '');

            if (!sectionNames[sectionKey]) return;

            const container = document.createElement('div');
            container.className = 'mt-8 border-t border-slate-200 pt-5';

            const button = document.createElement('button');
            button.type = 'button';
            button.textContent = sectionKey === 'goals' ?
                'اعتماد وإنهاء' :
                'مراجعة واعتماد القسم';
            button.className =
                'px-6 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 transition';

            const status = document.createElement('p');
            status.className = 'mt-3 text-sm';
            status.setAttribute('aria-live', 'polite');

            button.addEventListener('click', () => {
                approveSection(sectionKey, button, status);
            });

            container.appendChild(button);
            container.appendChild(status);
            panel.appendChild(container);
        });

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => showSection(index));
        });

        if (previousButton) {
            previousButton.addEventListener('click', () => {
                showSection(currentIndex - 1);
            });
        }

        if (nextButton) {
            nextButton.addEventListener('click', () => {
                showSection(currentIndex + 1);
            });
        }

        page.addEventListener('input', (event) => {
            if (event.target.matches('[data-profile-field]')) {
                updateProgress();
            }
        });

        page.addEventListener('change', (event) => {
            if (event.target.matches('[data-brand-asset-input]')) {
                renderFiles(event.target);
                updateProgress();
            }
        });

        if (aiAnalyzeButton) {
            aiAnalyzeButton.addEventListener('click', analyzeData);
        }

        showSection(0);
        updateProgress();
    });
})();




