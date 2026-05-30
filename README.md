# كتاب الإمام نافع لحفظ وتجويد القرآن الكريم أولاد امحمد

مشروع نظام إدارة مدرسة قرآنية كامل يعتمد على بنية MVC مع PHP و MySQL و Docker.

## المكونات الرئيسية

- موقع عام responsive بالعربية
- نظام تسجيل دخول متعدد الأدوار: مدير، معلم، ولي أمر، طالب
- لوحة إدارة كاملة
- تتبع حفظ القرآن
- إدارة الحضور
- نظام تواصل داخلي
- تقارير ورسوميات
- واجهة برمجة تطبيقات REST API مع JWT
- دعم PWA و Docker

## هيكل المشروع

- `app/` - رمز التطبيق (Controllers, Models, Views, Core)
- `public/` - نقطة الدخول العام وملفات الأصول
- `config/` - إعدادات التطبيق وقاعدة البيانات
- `docker/` - إعداد Docker
- `sql/` - مخطط قاعدة البيانات وتعريفات البيانات الوهمية
- `storage/` - سجلات النظام وملفات مؤقتة

## تشغيل المشروع

1. تثبيت Docker و Docker Compose
2. من مجلد `docker/` شغّل:
   ```bash
   cd docker
   docker compose up --build -d
   ```
3. افتح المتصفح على `http://localhost:8080`

### قاعدة البيانات

**XAMPP (الافتراضي على Windows)** — MySQL المحلي على المنفذ 3306:

```bash
c:\xampp\mysql\bin\mysql.exe -u root -e "source c:/xampp/htdocs/test/sql/schema.sql"
c:\xampp\mysql\bin\mysql.exe -u root -e "source c:/xampp/htdocs/test/sql/seed.sql"
```

ملف `.env`: `DB_HOST=127.0.0.1`, `DB_PORT=3306`, `DB_USER=root`, `DB_PASS=` (فارغ)

| السيناريو | DB_HOST | DB_PORT |
|-----------|---------|---------|
| XAMPP + MySQL محلي | `127.0.0.1` | `3306` |
| XAMPP + MySQL في Docker | `127.0.0.1` | `3308` |
| التطبيق داخل Docker | `db` | `3306` |

Docker MySQL يستخدم المنفذ **3308** على الجهاز لتجنب تعارض مع XAMPP على 3306.

إذا كان الحاوية عالقة من محاولة سابقة:
```bash
docker compose down
docker volume rm docker_db_data
docker compose up --build -d
```

## بيانات تجريبية

- المدير: `admin@quranschool.local` / `Password123!`
- المعلم: `teacher@quranschool.local` / `Password123!`
- ولي الأمر: `parent@quranschool.local` / `Password123!`
- الطالب: `student@quranschool.local` / `Password123!`

## نقاط الوصول الأساسية

- الصفحة العامة: `/`
- تسجيل الدخول: `/login`
- إنشاء حساب: `/register`
- لوحة التحكم: `/dashboard`
- لوحة تحكم المدير: `/admin/pending`
- جدول الحصص: `/schedule`
- الرسائل الداخلية: `/messages`
- API رمز JWT: `/api/token`
- API الطلاب: `/api/students`

## الوظائف المضافة مستقبلاً

- تسجيل مستخدمين وانتظار موافقة المدير
- إدارة حضور الطلاب والأحداث
- لوحات تحكم متخصصة لكل دور
- نظام تنبيهات ورسائل داخلية
- دعم PWA وصلاحيات JWT

## ملاحظات

تم إعداد هيكل المشروع كبداية احترافية لتطوير نظام ERP تعليمي كامل. يمكن بناء الميزات المتقدمة على القاعدة الحالية بسهولة.
