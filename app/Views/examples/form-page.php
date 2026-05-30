<?php
/**
 * Example: Form page (Bootstrap 5) — reference for PHP views
 * Not routed by default; copy patterns into your controllers.
 */
ob_start();
?>
<section class="dashboard-page">
    <header class="page-header reveal" data-reveal>
        <span class="page-badge"><i class="bi bi-pencil-square"></i> نموذج</span>
        <h1 class="page-title">تسجيل طالب جديد</h1>
        <p class="page-description">حقول عائمة، تحقق فوري، وتغذية راجعة واضحة.</p>
    </header>
    <div class="dashboard-card p-4 reveal" data-reveal>
        <form class="row g-4 needs-validation" data-validate novalidate>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="firstName" placeholder="الاسم" required />
                    <label for="firstName">الاسم الأول</label>
                    <div class="invalid-feedback">مطلوب</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="lastName" placeholder="العائلة" required />
                    <label for="lastName">اسم العائلة</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <input type="email" class="form-control" id="studentEmail" placeholder="البريد" required />
                    <label for="studentEmail">البريد الإلكتروني</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" id="notes" placeholder="ملاحظات" style="min-height: 8rem;"></textarea>
                    <label for="notes">ملاحظات إضافية</label>
                </div>
            </div>
            <div class="col-12 d-flex flex-column flex-sm-row gap-2">
                <button type="submit" class="btn btn-primary">حفظ البيانات</button>
                <button type="button" class="btn btn-secondary">إلغاء</button>
            </div>
        </form>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = 'مثال — نموذج';
require_once __DIR__ . '/../layouts/dashboard.php';
