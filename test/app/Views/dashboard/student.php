<?php ob_start(); ?>
<section class="dashboard-page">
    <div class="page-header">
        <div>
            <span class="page-badge"><i class="bi bi-mortarboard-fill"></i> طالب</span>
            <h1 class="page-title">لوحة تحكم الطالب</h1>
            <p class="page-description">تابع تقدمك الحفظي وابقَ على اتصال مع معلميك عبر لوحة متطورة.</p>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="dashboard-card p-4">
                <h5>طلب حفظ جديد</h5>
                <p class="page-description">أرسل صفحة حفظ أو مراجعة ليتم اعتمادها من قبل معلمك.</p>
                <a href="<?= BASE_URL ?>memorization" class="btn btn-outline-success btn-sm mt-3">إرسال حفظ</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="dashboard-card p-4">
                <h5>الحضور الخاص بك</h5>
                <p class="page-description">اطلع على سجلات الحضور والغياب الخاصة بك.</p>
                <a href="<?= BASE_URL ?>attendance" class="btn btn-outline-success btn-sm mt-3">عرض الحضور</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="dashboard-card p-4">
                <h5>الجدول الدراسي</h5>
                <p class="page-description">عرض مواعيد الجلسات المتاحة والأوقات القادمة.</p>
                <a href="<?= BASE_URL ?>schedule" class="btn btn-outline-success btn-sm mt-3">عرض الجدول</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="dashboard-card p-4">
                <h5>الرسائل الخاصة</h5>
                <p class="page-description">تواصل مع معلمك أو إدارة الكتاب بسهولة.</p>
                <a href="<?= BASE_URL ?>messages" class="btn btn-outline-success btn-sm mt-3">عرض الرسائل</a>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require_once __DIR__ . '/../layouts/dashboard.php'; ?>
