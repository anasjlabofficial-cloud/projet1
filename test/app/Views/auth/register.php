<?php ob_start(); ?>
<section class="auth-page">
    <div class="auth-split">
        <aside class="auth-side auth-side--brand">
            <div class="brand-panel">
                <div class="brand-icon">﴾</div>
                <h2>انضم إلى مجتمعنا القرآني</h2>
                <p>أنشئ حسابك الآن وتمتع بتجربة إدارة متقدمة للحفظ والتجويد.</p>
            </div>
            <div class="auth-illustration">
                <div class="illustration-card">
                    <div class="ornament ornament--circle"></div>
                    <div class="ornament ornament--bar"></div>
                    <p>لوحة تسجيل قوية وسهلة الوصول لجميع الأدوار.</p>
                </div>
            </div>
        </aside>
        <div class="auth-panel">
            <div class="auth-card p-5">
                <div class="auth-heading mb-4">
                    <span class="label-pill">إنشاء حساب جديد</span>
                    <h3>ابدأ الآن في بناء رحلة تعليمية متميزة</h3>
                </div>
                <?php if (!empty($message)): ?>
                    <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
                <?php endif; ?>
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= BASE_URL ?>register/submit" enctype="multipart/form-data" class="row g-3">
                    <?= \App\Core\CSRF::inputField() ?>
                    <div class="col-md-6">
                        <label class="form-label">الاسم الأول</label>
                        <input type="text" name="first_name" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">اسم العائلة</label>
                        <input type="text" name="last_name" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">البريد الإلكتروني</label>
                        <input type="email" name="email" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">رقم الهاتف</label>
                        <input type="text" name="phone" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">تاريخ الميلاد</label>
                        <input type="date" name="dob" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">العنوان</label>
                        <input type="text" name="address" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">كلمة المرور</label>
                        <input type="password" name="password" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">الدور</label>
                        <select name="role" class="form-select" required>
                            <option value="student">طالب</option>
                            <option value="parent">ولي أمر</option>
                            <option value="teacher">معلم</option>
                        </select>
                    </div>
                    <div class="col-12 d-grid mt-3">
                        <button type="submit" class="btn btn-primary btn-lg">إرسال الطلب</button>
                    </div>
                </form>
                <div class="auth-footer text-center mt-4">
                    <span class="text-muted">هل لديك حساب بالفعل؟</span>
                    <a href="<?= BASE_URL ?>login" class="link-primary">تسجيل الدخول</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require_once __DIR__ . '/../layouts/main.php'; ?>
