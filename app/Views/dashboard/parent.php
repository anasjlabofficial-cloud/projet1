<?php ob_start(); ?>
<section class="dashboard-page">
    <div class="page-header">
        <div>
            <span class="page-badge"><i class="bi bi-people-fill"></i> ولي الأمر</span>
            <h1 class="page-title">لوحة تحكم ولي الأمر</h1>
            <p class="page-description">اطلع على تقدم طفلك وقم بإدارة التواصل مع المعلم والإدارة بسهولة.</p>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="dashboard-card p-4">
                <h5>حالة الطفل</h5>
                <p class="page-description">عرض مدى التقدم والحضور والملاحظات بأناقة ووضوح.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="dashboard-card p-4">
                <h5>إشعارات جديدة</h5>
                <p class="page-description">اكتشف التنبيهات الأخيرة من المعلمين والإدارة.</p>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require_once __DIR__ . '/../layouts/dashboard.php'; ?>
