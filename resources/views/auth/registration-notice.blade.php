
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-lg p-8 text-center">

        <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-amber-100">
            <svg class="h-8 w-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>

        <h1 class="text-2xl font-bold text-gray-800 mb-4">
            تحقق من بريدك الإلكتروني
        </h1>

        <p class="text-gray-600 leading-8">
            إذا كان البريد الإلكتروني الذي أدخلته صحيحًا، فسوف تصلك عبر بريدك رسالة تتضمن رابطًا يوجّهك إلى صفحة تسجيل الدخول.
        </p>

        <p class="mt-5 text-sm text-gray-500">
            يرجى مراجعة صندوق الوارد، وكذلك مجلد الرسائل غير المرغوب فيها.
        </p>

    </div>
</div>
@endsection
