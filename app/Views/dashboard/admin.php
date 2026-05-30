<?php ob_start(); ?>
<section class="dashboard-page">
    <header class="page-header reveal" data-reveal>
        <span class="page-badge"><i class="bi bi-award-fill" aria-hidden="true"></i> المدير</span>
        <h1 class="page-title">لوحة تحكم المدير</h1>
        <p class="page-description">نظرة عامة فورية على أداء الأكاديمية — طلاب، معلمين، وطلبات التسجيل.</p>
    </header>

    <div class="row g-4 reveal" data-reveal>
        <div class="col-sm-6 col-xl-3">
            <article class="stat-card hover-lift">
                <div class="stat-card__header">
                    <div>
                        <p class="stat-card__label">إجمالي الطلاب</p>
                        <p class="stat-card__value"><?= htmlspecialchars($counts['students'] ?? 0) ?></p>
                        <p class="stat-card__trend stat-card__trend--up"><i class="bi bi-arrow-up-short"></i> نشط هذا الفصل</p>
                    </div>
                    <div class="stat-card__icon"><i class="bi bi-people-fill" aria-hidden="true"></i></div>
                </div>
            </article>
        </div>
        <div class="col-sm-6 col-xl-3">
            <article class="stat-card hover-lift">
                <div class="stat-card__header">
                    <div>
                        <p class="stat-card__label">المعلمون</p>
                        <p class="stat-card__value"><?= htmlspecialchars($counts['teachers'] ?? 0) ?></p>
                        <p class="stat-card__trend"><span class="text-muted">فريق تعليمي</span></p>
                    </div>
                    <div class="stat-card__icon"><i class="bi bi-person-workspace" aria-hidden="true"></i></div>
                </div>
            </article>
        </div>
        <div class="col-sm-6 col-xl-3">
            <article class="stat-card hover-lift">
                <div class="stat-card__header">
                    <div>
                        <p class="stat-card__label">أولياء الأمور</p>
                        <p class="stat-card__value"><?= htmlspecialchars($counts['parents'] ?? 0) ?></p>
                        <p class="stat-card__trend"><span class="text-muted">متابعة مستمرة</span></p>
                    </div>
                    <div class="stat-card__icon"><i class="bi bi-house-heart-fill" aria-hidden="true"></i></div>
                </div>
            </article>
        </div>
        <div class="col-sm-6 col-xl-3">
            <article class="stat-card hover-lift">
                <div class="stat-card__header">
                    <div>
                        <p class="stat-card__label">طلبات معلّقة</p>
                        <p class="stat-card__value"><?= htmlspecialchars($counts['pending'] ?? 0) ?></p>
                        <?php if (($counts['pending'] ?? 0) > 0): ?>
                            <p class="stat-card__trend stat-card__trend--down"><i class="bi bi-exclamation-circle"></i> تحتاج مراجعة</p>
                        <?php else: ?>
                            <p class="stat-card__trend stat-card__trend--up">لا طلبات جديدة</p>
                        <?php endif; ?>
                    </div>
                    <div class="stat-card__icon"><i class="bi bi-hourglass-split" aria-hidden="true"></i></div>
                </div>
            </article>
        </div>
    </div>

    <div class="row g-4 mt-2">
        <div class="col-xl-8 reveal" data-reveal>
            <div class="chart-panel">
                <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
                    <div>
                        <p class="text-muted small mb-1">تحليلات</p>
                        <h2 class="h5 mb-0">أداء الحفظ والحضور</h2>
                    </div>
                    <span class="badge badge-status active">متقدم</span>
                </div>
                <div class="chart-placeholder" role="img" aria-label="مكان الرسم البياني">
                    <span><i class="bi bi-bar-chart-line me-2"></i>Chart.js / ApexCharts placeholder</span>
                </div>
            </div>
        </div>
        <div class="col-xl-4 reveal" data-reveal>
            <div class="dashboard-card p-4 mb-4">
                <p class="text-muted small mb-1">نشاط حديث</p>
                <h3 class="h5 mb-3">آخر التحديثات</h3>
                <ul class="activity-feed">
                    <li>
                        <span class="activity-feed__dot" aria-hidden="true"></span>
                        <div>
                            <strong class="d-block">طلبات تسجيل</strong>
                            <span class="text-muted small"><?= (int)($counts['pending'] ?? 0) ?> بانتظار الموافقة</span>
                        </div>
                    </li>
                    <li>
                        <span class="activity-feed__dot" aria-hidden="true"></span>
                        <div>
                            <strong class="d-block">شبكة الطلاب</strong>
                            <span class="text-muted small"><?= (int)($counts['students'] ?? 0) ?> طالب مسجّل</span>
                        </div>
                    </li>
                    <li>
                        <span class="activity-feed__dot" aria-hidden="true"></span>
                        <div>
                            <strong class="d-block">فريق التدريس</strong>
                            <span class="text-muted small"><?= (int)($counts['teachers'] ?? 0) ?> معلم نشط</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="dashboard-card p-4">
                <p class="text-muted small mb-1">إجراءات سريعة</p>
                <h3 class="h6 mb-3">اختصارات الإدارة</h3>
                <div class="d-grid gap-2">
                    <a href="<?= BASE_URL ?>admin/pending" class="quick-action-btn">
                        <i class="bi bi-person-check text-primary" aria-hidden="true"></i>
                        مراجعة الطلبات المعلقة
                    </a>
                    <a href="<?= BASE_URL ?>admin/messages" class="quick-action-btn">
                        <i class="bi bi-chat-dots text-primary" aria-hidden="true"></i>
                        رسائل النظام
                    </a>
                    <a href="<?= BASE_URL ?>attendance" class="quick-action-btn">
                        <i class="bi bi-calendar-check text-primary" aria-hidden="true"></i>
                        سجل الحضور
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-card p-4 mt-4 reveal" data-reveal>
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start gap-3">
            <div>
                <h2 class="h5">إدارة الحسابات</h2>
                <p class="page-description mb-0">راجع طلبات التسجيل الجديدة، وافق على الحسابات، وراقب رسائل الإدارة.</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a href="<?= BASE_URL ?>admin/pending" class="btn btn-outline-primary">الطلبات المعلقة</a>
                <a href="<?= BASE_URL ?>admin/messages" class="btn btn-secondary">رسائل النظام</a>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require_once __DIR__ . '/../layouts/dashboard.php'; ?>
