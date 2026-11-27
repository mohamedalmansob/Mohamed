
@php
    $assetInputId = 'brand-assets-' . $sectionKey;
@endphp

<div class="border-t border-slate-200 pt-6 mt-6 space-y-4"
     data-brand-assets-section="{{ $sectionKey }}">

    <div class="flex flex-wrap items-center justify-between gap-3">
        <div>
            <h3 class="text-sm font-extrabold text-misbar-navy flex items-center gap-2">
                <i class="fa-solid fa-paperclip text-sky-600"></i>
                الملفات والمرفقات
            </h3>
            <p class="text-[11px] text-slate-500 mt-1">
                أرفق الملفات والصور المرتبطة بهذا القسم.
            </p>
        </div>

        <span class="text-[10px] font-bold text-slate-500 bg-slate-100 px-3 py-1.5 rounded-full">
            عدة مرفقات مسموحة
        </span>
    </div>

    <label for="{{ $assetInputId }}"
           class="flex flex-col items-center justify-center gap-3 p-6 border-2 border-dashed border-slate-300 rounded-2xl bg-slate-50 hover:bg-sky-50 hover:border-sky-300 transition cursor-pointer">

        <span class="w-12 h-12 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-sky-600 text-xl">
            <i class="fa-solid fa-cloud-arrow-up"></i>
        </span>

        <span class="text-xs font-extrabold text-slate-700">
            اختر الملفات لإرفاقها
        </span>

        <span class="text-[10px] text-slate-400 text-center">
            الصور والمستندات والملفات المرتبطة بالعلامة التجارية
        </span>

        <input
            type="file"
            id="{{ $assetInputId }}"
            class="hidden"
            multiple
            accept="image/*,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.csv"
            data-brand-asset-input
            data-section-key="{{ $sectionKey }}"
        >
    </label>

    {{-- عرض الملفات المختارة --}}
    <div data-brand-assets-list class="space-y-2">
        <p class="text-[11px] text-slate-400 text-center py-2">
            لم يتم اختيار ملفات بعد.
        </p>
    </div>

    {{-- توضيح حالات الاعتماد --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">

        <div class="rounded-xl bg-slate-50 border border-slate-200 p-3">
            <span class="block text-[10px] font-extrabold text-slate-700">
                <i class="fa-solid fa-file-circle-check text-slate-500 ml-1"></i>
                اعتماد المرفق
            </span>
            <p class="text-[10px] text-slate-500 mt-1 leading-5">
                مراجعة الملف والموافقة عليه كمرفق للقسم.
            </p>
        </div>

        <div class="rounded-xl bg-slate-50 border border-slate-200 p-3">
            <span class="block text-[10px] font-extrabold text-slate-700">
                <i class="fa-solid fa-magnifying-glass text-slate-500 ml-1"></i>
                مراجعة المعلومات المستخرجة
            </span>
            <p class="text-[10px] text-slate-500 mt-1 leading-5">
                مراجعة كل معلومة يقترحها الذكاء الاصطناعي بصورة مستقلة.
            </p>
        </div>

        <div class="rounded-xl bg-slate-50 border border-slate-200 p-3">
            <span class="block text-[10px] font-extrabold text-slate-700">
                <i class="fa-solid fa-shield-halved text-slate-500 ml-1"></i>
                اعتماد القسم
            </span>
            <p class="text-[10px] text-slate-500 mt-1 leading-5">
                اعتماد القيم النهائية للقسم بعد مراجعتها.
            </p>
        </div>

    </div>

    <p class="text-[10px] text-amber-700 bg-amber-50 border border-amber-200 rounded-xl p-3 leading-5">
        <i class="fa-solid fa-circle-info ml-1"></i>
        اختيار الملف هنا لا يعني رفعه أو اعتماده. سيتم تنفيذ الرفع والمراجعة والاعتماد في مراحل الربط اللاحقة.
    </p>

</div>
