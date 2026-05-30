<?php ob_start(); ?>
<section class="auth-page">
    <div class="auth-split">
        <aside class="auth-side auth-side--brand reveal" data-reveal>
            <div class="brand-panel">
                <div class="brand-mark d-inline-grid mb-4" aria-hidden="true">﴾</div>
                <span class="label-pill badge-gold mb-3">منصة فاخرة</span>
                <h2>مرحباً بكم في أكاديمية الإمام نافع</h2>
                <p>منصة إدارة قرآنية حديثة — حفظ، حضور، وتجويد — بتجربة مستخدم على مستوى SaaS عالمي.</p>
            </div>
            <div class="auth-illustration">
                <div class="illustration-card">
                    <div class="ornament ornament--circle" aria-hidden="true"></div>
                    <p class="mb-0">لوحة تحكم موحّدة للمعلمين، الطلاب، وأولياء الأمور.</p>
                </div>
            </div>
        </aside>
        <div class="auth-panel reveal" data-reveal>
            <div class="auth-card">
                <div class="auth-heading mb-4">
                    <span class="label-pill">تسجيل الدخول</span>
                    <h3>أدخل بياناتك للمتابعة</h3>
                    <p class="text-muted small mt-2 mb-0">وصول آمن إلى لوحة الإدارة</p>
                </div>
                <?php if (!empty($message)): ?>
                    <div class="alert alert-success" role="alert">
                        <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                        <span><?= htmlspecialchars($message) ?></span>
                    </div>
                <?php endif; ?>
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="bi bi-exclamation-triangle-fill" aria-hidden="true"></i>
                        <ul class="mb-0 ps-3">
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= BASE_URL ?>?url=login/authenticate" class="needs-validation" data-validate data-loading novalidate>
                    <?= \App\Core\CSRF::inputField() ?>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="loginEmail" placeholder="البريد" required autocomplete="email" />
                        <label for="loginEmail">البريد الإلكتروني</label>
                        <div class="invalid-feedback">يرجى إدخال بريد إلكتروني صالح.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="loginPassword" placeholder="كلمة المرور" required autocomplete="current-password" />
                        <label for="loginPassword">كلمة المرور</label>
                        <div class="invalid-feedback">كلمة المرور مطلوبة.</div>
                    </div>
                    <div class="form-floating mb-4">
                        <select name="role" class="form-select" id="loginRole" required>
                            <option value="student">طالب</option>
                            <option value="parent">ولي أمر</option>
                            <option value="teacher">معلم</option>
                            <option value="admin">مدير</option>
                        </select>
                        <label for="loginRole">الدور</label>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">دخول إلى المنصة</button>
                    </div>
                </form>
                <div class="auth-footer text-center mt-4">
                    <span class="text-muted">ليس لديك حساب؟ </span>
                    <a href="<?= BASE_URL ?>register" class="link-primary">إنشاء حساب جديد</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require_once __DIR__ . '/../layouts/main.php'; ?>
