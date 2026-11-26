<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مسبار MISBAR | من عمق البيانات إلى قمة القرار — مساحة عمل فلوريا</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Tajawal', 'Cairo', 'sans-serif'],
                        heading: ['Cairo', 'sans-serif'],
                    },
                    colors: {
                        misbar: {
                            navy: '#0A1E46',
                            deep: '#07132B',
                            blue: '#0088FF',
                            cyan: '#0EA5E9',
                            purple: '#6E2CF2',
                            orange: '#FF7A00',
                            surface: '#F8FAFC'
                        },
                        floria: {
                            rose: '#BE185D',
                            blush: '#FDF2F8',
                            gold: '#D97706'
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="{{ asset('css/misbar.css') }}">
</head>
<body class="min-h-screen flex flex-col">
    @yield('content')
    <div id="app-toast" class="fixed bottom-5 left-5 z-50 hidden">
        <div class="bg-misbar-navy text-white px-4 py-3 rounded-2xl shadow-xl border border-sky-400/30 flex items-center gap-2.5 text-xs font-bold">
            <i class="fa-solid fa-circle-check text-emerald-400 text-base"></i>
            <span id="app-toast-msg">تم التنفيذ بنجاح</span>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.MISBAR_ROUTES = @json($routes ?? []);
        window.MISBAR_ROUTES.brandSave = @json(route('brand-dna.update'));
        window.MISBAR_ACTIVE_UNIT = @json($activeUnit ?? null);
    </script>
        <script src="{{ asset('js/misbar.js') }}" defer></script>
</body>
</html>
