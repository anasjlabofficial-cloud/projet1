<?php ob_start(); ?>
<section class="dashboard-page">
    <div class="page-header">
        <div>
            <span class="page-badge"><i class="bi bi-calendar-check-fill"></i> الحضور</span>
            <h1 class="page-title">إدارة الحضور</h1>
            <p class="page-description">سجل الحضور بسهولة واطلع على أحدث البيانات المجمعة لجميع الجلسات.</p>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-lg-5">
            <div class="dashboard-card p-4">
                <h5 class="mb-3">تسجيل حضور جديد</h5>
                <form method="post" action="<?= BASE_URL ?>attendance/submit">
                    <?= \App\Core\CSRF::inputField() ?>
                    <div class="mb-3">
                        <label class="form-label">اختر الطالب</label>
                        <select name="student_id" class="form-select" required>
                            <?php foreach ($students as $student): ?>
                                <option value="<?= htmlspecialchars($student['id']) ?>"><?= htmlspecialchars($student['first_name'] . ' ' . $student['last_name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">تاريخ الجلسة</label>
                        <input type="date" name="session_date" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الحالة</label>
                        <select name="status" class="form-select" required>
                            <option value="present">حاضر</option>
                            <option value="absent">غائب</option>
                            <option value="excused">معتذر</option>
                            <option value="canceled">ملغي</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ملاحظة</label>
                        <textarea name="note" class="form-control" rows="3"></textarea>
                    </div>
                    <button class="btn btn-success w-100">حفظ الحضور</button>
                </form>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="dashboard-card p-4">
                <h5 class="mb-3">آخر سجلات الحضور</h5>
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>الطالب</th>
                                <th>التاريخ</th>
                                <th>الحالة</th>
                                <th>ملاحظة</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($records as $record): ?>
                                <tr>
                                    <td><?= htmlspecialchars($record['first_name'] . ' ' . $record['last_name']) ?></td>
                                    <td><?= htmlspecialchars($record['session_date']) ?></td>
                                    <td><?= htmlspecialchars($record['status']) ?></td>
                                    <td><?= htmlspecialchars($record['note']) ?></td>
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
