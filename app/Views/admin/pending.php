<?php ob_start(); ?>
<section class="dashboard-page">
    <header class="page-header reveal" data-reveal>
        <span class="page-badge"><i class="bi bi-person-check-fill" aria-hidden="true"></i> طلبات التسجيل</span>
        <h1 class="page-title">طلبات قيد الموافقة</h1>
        <p class="page-description">مراجعة الحسابات الجديدة واعتمادها بسرعة ضمن واجهة إدارية موحّدة.</p>
    </header>

    <?php if (empty($pendingUsers)): ?>
        <div class="alert alert-info reveal" data-reveal role="status">
            <i class="bi bi-info-circle" aria-hidden="true"></i>
            <span>لا توجد طلبات جديدة حالياً.</span>
        </div>
    <?php else: ?>
        <div class="dashboard-card p-0 overflow-hidden reveal" data-reveal>
            <div class="p-4 border-bottom d-flex flex-wrap justify-content-between align-items-center gap-3" style="border-color: var(--color-border) !important;">
                <div>
                    <h2 class="h6 mb-1"><?= count($pendingUsers) ?> طلب بانتظار المراجعة</h2>
                    <p class="text-muted small mb-0">اضغط قبول أو رفض لكل حساب</p>
                </div>
                <span class="badge badge-status pending">معلّق</span>
            </div>
            <div class="table-responsive d-none d-md-block">
                <table class="table table-premium table-striped table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col">الاسم</th>
                            <th scope="col">الدور</th>
                            <th scope="col">البريد</th>
                            <th scope="col">التاريخ</th>
                            <th scope="col">الحالة</th>
                            <th scope="col">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pendingUsers as $pending): ?>
                            <tr>
                                <td class="fw-semibold text-dark"><?= htmlspecialchars($pending['first_name'] . ' ' . $pending['last_name']) ?></td>
                                <td><?= htmlspecialchars($pending['role_name']) ?></td>
                                <td><?= htmlspecialchars($pending['email']) ?></td>
                                <td class="text-muted small"><?= htmlspecialchars($pending['created_at']) ?></td>
                                <td><span class="badge badge-status pending">قيد المراجعة</span></td>
                                <td>
                                    <div class="d-flex gap-2 flex-wrap">
                                        <a href="<?= BASE_URL ?>admin/approve/<?= htmlspecialchars($pending['id']) ?>" class="btn btn-success btn-sm">قبول</a>
                                        <a href="<?= BASE_URL ?>admin/reject/<?= htmlspecialchars($pending['id']) ?>" class="btn btn-danger btn-sm">رفض</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="d-md-none p-3">
                <table class="table table-mobile mb-0">
                    <tbody>
                        <?php foreach ($pendingUsers as $pending): ?>
                            <tr>
                                <td data-label="الاسم"><?= htmlspecialchars($pending['first_name'] . ' ' . $pending['last_name']) ?></td>
                                <td data-label="الدور"><?= htmlspecialchars($pending['role_name']) ?></td>
                                <td data-label="البريد"><?= htmlspecialchars($pending['email']) ?></td>
                                <td data-label="التاريخ"><?= htmlspecialchars($pending['created_at']) ?></td>
                                <td data-label="الإجراءات">
                                    <div class="d-flex gap-2 mt-2">
                                        <a href="<?= BASE_URL ?>admin/approve/<?= htmlspecialchars($pending['id']) ?>" class="btn btn-success btn-sm flex-fill">قبول</a>
                                        <a href="<?= BASE_URL ?>admin/reject/<?= htmlspecialchars($pending['id']) ?>" class="btn btn-danger btn-sm flex-fill">رفض</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</section>
<?php $content = ob_get_clean(); ?>
<?php require_once __DIR__ . '/../layouts/dashboard.php'; ?>
