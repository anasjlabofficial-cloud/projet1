<?php ob_start(); ?>
<section class="dashboard-page">
    <div class="page-header">
        <div>
            <span class="page-badge"><i class="bi bi-chat-square-text-fill"></i> رسائل الإدارة</span>
            <h1 class="page-title">رسائل النظام (إدارة)</h1>
            <p class="page-description">إدارة رسائل النظام ومتابعة التواصل بين المستخدمين عبر لوحة احترافية.</p>
        </div>
    </div>
    <div class="dashboard-card p-4 mb-4">
        <form method="get" action="<?= BASE_URL ?>admin/messages" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label">فلتر حسب المستخدم</label>
                <select name="user" class="form-select">
                    <option value="">-- الجميع --</option>
                    <?php foreach ($users as $u): ?>
                        <option value="<?= htmlspecialchars($u['id']) ?>"><?= htmlspecialchars($u['first_name'] . ' ' . $u['last_name'] . ' (' . $u['role_name'] . ')') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success w-100">تطبيق</button>
            </div>
        </form>
    </div>
    <div class="dashboard-card p-4">
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>المرسل</th>
                        <th>المستلم</th>
                        <th>الموضوع</th>
                        <th>نص الرسالة</th>
                        <th>التاريخ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $m): ?>
                        <tr>
                            <td><?= htmlspecialchars(($m['sender_first'] ?? $m['first_name'] ?? '') . ' ' . ($m['sender_last'] ?? '')) ?></td>
                            <td><?= htmlspecialchars(($m['receiver_first'] ?? '') . ' ' . ($m['receiver_last'] ?? '')) ?></td>
                            <td><?= htmlspecialchars($m['subject']) ?></td>
                            <td><?= htmlspecialchars($m['body']) ?></td>
                            <td><?= htmlspecialchars($m['created_at'] ?? '') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require_once __DIR__ . '/../layouts/dashboard.php'; ?>
