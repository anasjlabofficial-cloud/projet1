<?php ob_start(); ?>
<section class="dashboard-page">
    <div class="page-header">
        <div>
            <span class="page-badge"><i class="bi bi-person-badge-fill"></i> معلم</span>
            <h1 class="page-title">لوحة تحكم المعلم</h1>
            <p class="page-description">تابع أداء الطلاب بمرونة وتواصل بسهولة مع أولياء الأمور والإدارة.</p>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="dashboard-card p-4">
                <h5>إدارة الطلاب</h5>
                <p class="page-description">اطلع على قائمة الطلاب وادخل سجلات الحفظ والمراجعة.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-card p-4">
                <h5>سجل الحضور</h5>
                <p class="page-description">سجل حضور الجلسات واعرض آخر البيانات.</p>
                <a href="<?= BASE_URL ?>attendance" class="btn btn-outline-success btn-sm mt-3">عرض الحضور</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-card p-4">
                <h5>خطة اليوم</h5>
                <p class="page-description">اطلع على جدول الجلسات اليومية وجدولة الطلاب.</p>
                <a href="<?= BASE_URL ?>schedule" class="btn btn-outline-success btn-sm mt-3">عرض الجدول</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-card p-4">
                <h5>حفظ ومراجعة</h5>
                <p class="page-description">تابع طلبات الحفظ وراجع التقدم اليومي.</p>
                <a href="<?= BASE_URL ?>memorization" class="btn btn-outline-success btn-sm mt-3">عرض الحفظ</a>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require_once __DIR__ . '/../layouts/dashboard.php'; ?>
