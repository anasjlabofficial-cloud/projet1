<?php ob_start(); ?>
<section class="dashboard-page">
    <div class="page-header">
        <div>
            <span class="page-badge"><i class="bi bi-envelope-fill"></i> الرسائل</span>
            <h1 class="page-title">الرسائل الداخلية</h1>
            <p class="page-description">أرسل واستقبل الرسائل بين المعلمين، الطلاب، وأولياء الأمور بسهولة.</p>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-lg-5">
            <div class="dashboard-card p-4">
                <h5 class="mb-3">إرسال رسالة جديدة</h5>
                <form method="post" action="<?= BASE_URL ?>messages/send">
                    <?= \App\Core\CSRF::inputField() ?>
                    <div class="mb-3">
                        <label class="form-label">إلى</label>
                        <select name="receiver_id" class="form-select" required>
                            <?php foreach ($recipients as $recipient): ?>
                                <?php if ($recipient['id'] !== $user['id']): ?>
                                    <option value="<?= htmlspecialchars($recipient['id']) ?>"><?= htmlspecialchars($recipient['first_name'] . ' ' . $recipient['last_name'] . ' (' . $recipient['role_name'] . ')') ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">الموضوع</label>
                        <input type="text" name="subject" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">نص الرسالة</label>
                        <textarea name="body" rows="5" class="form-control" required></textarea>
                    </div>
                    <button class="btn btn-success w-100">إرسال</button>
                </form>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="dashboard-card p-4">
                <h5 class="mb-3">الرسائل الواردة</h5>
                <div class="table-responsive">
                    <table class="table table-striped align-middle">
                        <thead>
                            <tr>
                                <th>المرسل</th>
                                <th>الموضوع</th>
                                <th>الرسالة</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($messages as $message): ?>
                                <tr>
                                    <td><?= htmlspecialchars($message['first_name'] . ' ' . $message['last_name']) ?></td>
                                    <td><?= htmlspecialchars($message['subject']) ?></td>
                                    <td><?= htmlspecialchars($message['body']) ?></td>
                                    <td><?= htmlspecialchars($message['created_at']) ?></td>
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
