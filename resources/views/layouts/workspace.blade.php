@extends('layouts.app')

@section('content')
<div class="flex-1 flex flex-col">
    @include('misbar.partials.platform-header')
    <div class="flex-1 max-w-[1440px] w-full mx-auto px-4 lg:px-8 py-6 flex flex-col lg:flex-row gap-6">
        @include('misbar.partials.platform-sidebar')
        <main class="flex-1 min-w-0 space-y-6">
            @yield('workspace-content')
        </main>
    </div>
    <p class="text-[10px] text-slate-400 text-center pb-4">نسخة معاينة تفاعلية: التغييرات محلية في المتصفح ولا تُحفظ في قاعدة بيانات.</p>
</div>
@endsection
