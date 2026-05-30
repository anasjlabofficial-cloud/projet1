<?php ob_start(); ?>
<section class="dashboard-page">
    <div class="page-header">
        <div>
            <span class="page-badge"><i class="bi bi-pencil-square"></i> تعديل الجلسة</span>
            <h1 class="page-title">تعديل جلسة</h1>
            <p class="page-description">قم بتحديث معلومات الجلسة بسهولة وبواجهة مرتبة.</p>
        </div>
    </div>
    <div class="dashboard-card p-4">
        <form method="post" action="<?= BASE_URL ?>schedule/update/<?= htmlspecialchars($session['id']) ?>">
            <?= \App\Core\CSRF::inputField() ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">اليوم</label>
                    <input type="text" name="day_name" class="form-control" value="<?= htmlspecialchars($session['day_name']) ?>" required />
                </div>
                <div class="col-md-6">
                    <label class="form-label">تاريخ الجلسة</label>
                    <input type="date" name="session_date" class="form-control" value="<?= htmlspecialchars($session['session_date']) ?>" required />
                </div>
                <div class="col-md-6">
                    <label class="form-label">الوقت</label>
                    <input type="text" name="session_time" class="form-control" value="<?= htmlspecialchars($session['session_time']) ?>" required />
                </div>
                <div class="col-md-6">
                    <label class="form-label">الحالة</label>
                    <select name="status" class="form-select" required>
                        <option value="active" <?= $session['status'] === 'active' ? 'selected' : '' ?>>نشط</option>
                        <option value="canceled" <?= $session['status'] === 'canceled' ? 'selected' : '' ?>>ملغي</option>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">الوصف</label>
                    <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($session['description']) ?></textarea>
                </div>
            </div>
            <div class="mt-4 d-flex flex-wrap gap-2">
                <button class="btn btn-success">تحديث الجلسة</button>
                <a href="<?= BASE_URL ?>schedule" class="btn btn-outline-secondary">عودة</a>
            </div>
        </form>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require_once __DIR__ . '/../layouts/dashboard.php'; ?>
