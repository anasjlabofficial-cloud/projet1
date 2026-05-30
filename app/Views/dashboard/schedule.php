<?php ob_start(); ?>
<section class="dashboard-page">
    <div class="page-header">
        <div>
            <span class="page-badge"><i class="bi bi-calendar3-event-fill"></i> الجدول</span>
            <h1 class="page-title">جدول الجلسات</h1>
            <p class="page-description">تعامل مع الجلسات اليومية وجدولة الطلاب ضمن واجهة منظمة ومريحة.</p>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-lg-7">
            <div class="dashboard-card p-4">
                <p class="page-description mb-4">أوقات الجلسات اليومية والثلاثية مع حالة الجلسة.</p>
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>اليوم</th>
                                <th>التاريخ</th>
                                <th>الوقت</th>
                                <th>الوصف</th>
                                <th>الحالة</th>
                                <?php if (in_array(strtolower($user['role_name']), ['admin', 'teacher'])): ?>
                                    <th>الإجراءات</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sessions as $session): ?>
                                <tr>
                                    <td><?= htmlspecialchars($session['day_name']) ?></td>
                                    <td><?= htmlspecialchars($session['session_date']) ?></td>
                                    <td><?= htmlspecialchars($session['session_time']) ?></td>
                                    <td><?= htmlspecialchars($session['description']) ?></td>
                                    <td><?= htmlspecialchars($session['status']) ?></td>
                                    <?php if (in_array(strtolower($user['role_name']), ['admin', 'teacher'])): ?>
                                        <td class="d-flex gap-2 flex-wrap">
                                            <a href="<?= BASE_URL ?>schedule/edit/<?= htmlspecialchars($session['id']) ?>" class="btn btn-sm btn-outline-success">تعديل</a>
                                            <form method="post" action="<?= BASE_URL ?>schedule/delete/<?= htmlspecialchars($session['id']) ?>" class="d-inline">
                                                <?= \App\Core\CSRF::inputField() ?>
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('هل أنت متأكد من حذف هذه الجلسة؟');">حذف</button>
                                            </form>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php if (in_array(strtolower($user['role_name']), ['admin', 'teacher'])): ?>
            <div class="col-lg-5">
                <div class="dashboard-card p-4">
                    <h5 class="mb-3">إضافة جلسة جديدة</h5>
                    <form method="post" action="<?= BASE_URL ?>schedule/create">
                        <?= \App\Core\CSRF::inputField() ?>
                        <div class="mb-3">
                            <label class="form-label">اليوم</label>
                            <input type="text" name="day_name" class="form-control" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">تاريخ الجلسة</label>
                            <input type="date" name="session_date" class="form-control" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الوقت</label>
                            <input type="text" name="session_time" class="form-control" placeholder="08:00 صباحاً" required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الوصف</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">الحالة</label>
                            <select name="status" class="form-select" required>
                                <option value="active">نشط</option>
                                <option value="canceled">ملغي</option>
                            </select>
                        </div>
                        <button class="btn btn-success w-100">حفظ الجلسة</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require_once __DIR__ . '/../layouts/dashboard.php'; ?>
