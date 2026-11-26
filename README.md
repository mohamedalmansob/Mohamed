# منصة مسبار MISBAR — تنظيم واجهات Laravel

المشروع الحالي مبني على Laravel 13.44.1. واجهاته بالعربية وRTL، وتستخدم CSS وJavaScript من `public/css/misbar.css` و`public/js/misbar.js` كما في النسخة السابقة.

## التشغيل محلياً

```bash
composer install
cp .env.example .env
php artisan key:generate
mkdir -p database
touch database/database.sqlite
php artisan migrate
php artisan serve
```

افتح `http://127.0.0.1:8000`. يتطلب المشروع PHP 8.3 أو أحدث. تعمل خطوط Google Fonts وTailwind وFont Awesome وChart.js من CDN وتتطلب اتصالاً بالإنترنت.

## تنظيم الواجهات

- `resources/views/layouts/app.blade.php` — اتجاه الصفحة وملفات الأصول والتنبيهات المشتركة.
- `resources/views/layouts/workspace.blade.php` — إطار مساحة العمل.
- `resources/views/auth/register.blade.php` و`resources/views/auth/login.blade.php` — واجهتا التسجيل والدخول.
- `resources/views/misbar/workspace/brain.blade.php` — لوحة العقل التسويقي.
- `resources/views/misbar/workspace/brand-dna.blade.php` — إعداد الهوية التجارية.
- `resources/views/misbar/workspace/radar-audience.blade.php` و`competitors.blade.php` — رادار السوق ومختبر المنافسين.
- `resources/views/misbar/workspace/strategy.blade.php` — الاستراتيجية والإعلان.
- `resources/views/misbar/workspace/content-studio.blade.php` و`content-calendar.blade.php` — الاستوديو والتقويم.
- `resources/views/misbar/workspace/analytics.blade.php` و`voice-rescue.blade.php` — التحليلات وصوت العميل/الإنقاذ.
- `resources/views/misbar/workspace/plan-management.blade.php` — الباقات والمستخدمون.
- `resources/views/misbar/partials/` — رأس مساحة العمل والقائمة الجانبية.

لا توجد شاشة إنشاء مشروع مستقلة في التصميم الأصلي؛ حقول اسم المشروع موجودة ضمن واجهة التسجيل، لذلك لم تتم إضافة شاشة غير موجودة.

## المسارات المسماة

| الشاشة | المسار | اسم المسار |
|---|---|---|
| التسجيل | `/register` | `register` |
| الدخول | `/login` | `login` |
| لوحة العقل التسويقي | `/workspace` أو `/workspace/brain` | `workspace` أو `workspace.brain` |
| Brand DNA | `/workspace/brand-dna` | `brand-dna.edit` |
| رادار السوق | `/workspace/market-radar` | `market-radar.index` |
| المنافسون | `/workspace/competitors` | `workspace.competitors` |
| الاستراتيجية | `/workspace/strategy` | `workspace.strategy` |
| إنشاء المحتوى | `/workspace/content/create` | `content.create` |
| تقويم المحتوى | `/workspace/content/calendar` | `content.calendar` |
| التحليلات | `/workspace/analytics` | `analytics.dashboard` |
| صوت العميل والإنقاذ | `/workspace/voice-rescue` | `voice-rescue.index` |
| الباقات والإدارة | `/workspace/admin` | `workspace.admin` |

الجذر `/` يعرض التسجيل، و`/signup` القديم يعيد التوجيه إلى `/register`. روابط القائمة ورابط Brand DNA إلى استوديو المحتوى تستخدم أسماء المسارات. زر الرجوع يتبع عنواناً سابقاً من النطاق نفسه، أو يعود إلى مساحة العمل عند عدم توفره.

## النسخة التجريبية

إنشاء الحساب وتسجيل الدخول وحفظ Brand DNA والباقات ودعوات الفريق والمساعد والتحليلات ومحاكاة الحملات لا تتصل بقاعدة بيانات أو مصادقة أو خدمات خارجية. تظهر رسائل توضح ذلك. ينتقل البريد والخطة من التسجيل إلى الدخول داخل `sessionStorage` مؤقتاً، كما ينتقل نص الإعلان إلى الاستوديو ضمن جلسة المتصفح فقط.

احتُفظ بنسخ الملفات السابقة قبل إعادة التنظيم داخل `backup/pre-reorganization/`.
