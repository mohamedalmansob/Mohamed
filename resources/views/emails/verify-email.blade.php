
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفعيل حسابك في مسبار</title>
</head>
<body style="margin:0;padding:30px 15px;background-color:#f4f6f9;font-family:Tahoma,Arial,sans-serif;direction:rtl;text-align:right;">

    <div style="max-width:600px;margin:auto;background:#ffffff;border-radius:12px;padding:30px;">

        <div style="text-align:center;margin-bottom:30px;">
            <h1 style="color:#b7791f;margin:0;font-size:28px;font-weight:bold;">
                مسبار
            </h1>
            <p style="color:#888;font-size:13px;margin-top:8px;">
                منصة الذكاء التسويقي
            </p>
        </div>

        <h2 style="color:#343a40;margin-top:0;">
            مرحباً {{ $userName }}
        </h2>

        <p style="color:#555;line-height:2;">
            شكراً لتسجيلك في منصة مسبار.
            لإكمال تفعيل حسابك، يرجى تأكيد عنوان بريدك الإلكتروني بالضغط على الزر التالي.
        </p>

        <div style="text-align:center;margin:30px 0;">
            <a href="{{ $verificationUrl }}"
               style="display:inline-block;padding:14px 32px;background-color:#b7791f;color:#ffffff;text-decoration:none;border-radius:7px;font-weight:bold;">
                تأكيد البريد الإلكتروني
            </a>
        </div>

        <p style="color:#555;line-height:2;">
            بعد تأكيد بريدك الإلكتروني، يمكنك الانتقال إلى صفحة تسجيل الدخول والدخول إلى حسابك.
        </p>

        <p style="color:#777;line-height:2;font-size:13px;">
            هذا الرابط صالح لمدة 60 دقيقة فقط.
            إذا لم تقم بإنشاء حساب في منصة مسبار، يمكنك تجاهل هذه الرسالة.
        </p>

        <hr style="border:0;border-top:1px solid #eee;margin:25px 0;">

        <p style="color:#999;font-size:12px;text-align:center;line-height:2;">
            هذه رسالة آلية من منصة مسبار، يرجى عدم الرد عليها.
        </p>

    </div>

</body>
</html>
