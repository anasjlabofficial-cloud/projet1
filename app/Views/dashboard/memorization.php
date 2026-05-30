<?php ob_start(); ?>
<section class="dashboard-page">
    <div class="page-header">
        <div>
            <span class="page-badge"><i class="bi bi-journal-bookmark-fill"></i> الحفظ</span>
            <h1 class="page-title">سجل الحفظ والمراجعة</h1>
            <p class="page-description">سجّل تقدم الحفظ واطلع على حالة الطلبات والمراجعة بطريقة أكثر وضوحاً.</p>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-lg-5">
            <div class="dashboard-card p-4">
                <h5 class="mb-3">إرسال مهمة حفظ جديدة</h5>
                <form method="post" action="<?= BASE_URL ?>memorization/submit">
                    <?= \App\Core\CSRF::inputField() ?>
                    <div class="mb-3">
                        <label class="form-label">اسم السورة</label>
                        <input type="text" name="surah" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">عدد الصفحات المحفوظة</label>
                        <input type="number" name="pages_memorized" class="form-control" min="1" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">درجة المراجعة</label>
                        <input type="number" name="revision_score" class="form-control" min="0" max="100" required />
                    </div>
                    <button class="btn btn-success w-100">إرسال للمراجعة</button>
                </form>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="dashboard-card p-4">
                <h5 class="mb-3">آخر طلبات الحفظ</h5>
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>الطالب</th>
                                <th>السورة</th>
                                <th>الصفحات</th>
                                <th>الحالة</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($records as $record): ?>
                                <tr>
                                    <td><?= htmlspecialchars($record['first_name'] . ' ' . $record['last_name']) ?></td>
                                    <td><?= htmlspecialchars($record['surah']) ?></td>
                                    <td><?= htmlspecialchars($record['pages_memorized']) ?></td>
                                    <td><?= htmlspecialchars($record['status']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require_once __DIR__ . '/../layouts/dashboard.php'; ?>
