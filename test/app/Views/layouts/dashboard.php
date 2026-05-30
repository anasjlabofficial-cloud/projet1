<!DOCTYPE html>
<html lang="ar" dir="rtl" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="لوحة تحكم منصة إدارة مدرسة القرآن — كتاب الإمام نافع" />
    <meta name="theme-color" content="#0f766e" />
    <title><?= htmlspecialchars($title ?? 'لوحة التحكم') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/styles.css" />
</head>
<body class="dashboard-shell">
<div class="d-flex flex-column flex-lg-row min-vh-100">
    <aside class="dashboard-sidebar" id="dashboardSidebar">
        <div class="sidebar-brand">
            <div class="brand-mark" aria-hidden="true">﴾</div>
            <div class="sidebar-brand-text">
                <h1 class="h6 mb-0">كتاب الإمام نافع</h1>
                <p class="mb-0 small">منصة إدارة القرآن</p>
            </div>
        </div>
        <div class="sidebar-profile">
            <div class="d-flex align-items-center gap-3">
                <div class="profile-avatar" aria-hidden="true"><?= strtoupper(substr(htmlspecialchars($user['first_name'] ?? 'م'), 0, 1)) ?></div>
                <div class="sidebar-profile-text">
                    <h3 class="h6 mb-1"><?= htmlspecialchars($user['first_name'] ?? 'ضيف') ?></h3>
                    <p class="mb-0 small"><?= htmlspecialchars($user['role_name'] ?? 'مستخدم') ?></p>
                </div>
            </div>
        </div>
        <nav class="nav flex-column dashboard-nav" aria-label="القائمة الرئيسية">
            <a class="nav-link<?= (stripos($_SERVER['REQUEST_URI'] ?? '', '/dashboard') !== false && stripos($_SERVER['REQUEST_URI'] ?? '', '/admin') === false ? ' active' : '') ?>" href="<?= BASE_URL ?>dashboard">
                <i class="bi bi-speedometer2" aria-hidden="true"></i>
                <span class="sidebar-label">الصفحة الرئيسية</span>
            </a>
            <?php if (!empty($user['role_name']) && strtolower($user['role_name']) === 'admin'): ?>
                <a class="nav-link<?= (stripos($_SERVER['REQUEST_URI'] ?? '', '/admin/pending') !== false ? ' active' : '') ?>" href="<?= BASE_URL ?>admin/pending">
                    <i class="bi bi-person-check" aria-hidden="true"></i>
                    <span class="sidebar-label">طلبات التسجيل</span>
                </a>
                <a class="nav-link<?= (stripos($_SERVER['REQUEST_URI'] ?? '', '/admin/messages') !== false ? ' active' : '') ?>" href="<?= BASE_URL ?>admin/messages">
                    <i class="bi bi-chat-left-text" aria-hidden="true"></i>
                    <span class="sidebar-label">رسائل الإدارة</span>
                </a>
            <?php endif; ?>
            <a class="nav-link<?= (stripos($_SERVER['REQUEST_URI'] ?? '', '/attendance') !== false ? ' active' : '') ?>" href="<?= BASE_URL ?>attendance">
                <i class="bi bi-calendar-check" aria-hidden="true"></i>
                <span class="sidebar-label">الحضور</span>
            </a>
            <a class="nav-link<?= (stripos($_SERVER['REQUEST_URI'] ?? '', '/memorization') !== false ? ' active' : '') ?>" href="<?= BASE_URL ?>memorization">
                <i class="bi bi-book-half" aria-hidden="true"></i>
                <span class="sidebar-label">الحفظ</span>
            </a>
            <a class="nav-link<?= (stripos($_SERVER['REQUEST_URI'] ?? '', '/schedule') !== false ? ' active' : '') ?>" href="<?= BASE_URL ?>schedule">
                <i class="bi bi-calendar3" aria-hidden="true"></i>
                <span class="sidebar-label">الجدول</span>
            </a>
            <a class="nav-link<?= (stripos($_SERVER['REQUEST_URI'] ?? '', '/messages') !== false && stripos($_SERVER['REQUEST_URI'] ?? '', '/admin') === false ? ' active' : '') ?>" href="<?= BASE_URL ?>messages">
                <i class="bi bi-envelope" aria-hidden="true"></i>
                <span class="sidebar-label">الرسائل</span>
            </a>
            <a class="nav-link" href="<?= BASE_URL ?>logout">
                <i class="bi bi-box-arrow-right" aria-hidden="true"></i>
                <span class="sidebar-label">تسجيل خروج</span>
            </a>
        </nav>
    </aside>
    <div class="dashboard-panel">
        <header class="dashboard-topbar">
            <div class="d-flex align-items-center gap-3">
                <button type="button" class="btn btn-soft btn-icon d-lg-none" data-sidebar-toggle aria-label="فتح القائمة">
                    <i class="bi bi-list fs-5" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-soft btn-icon d-none d-lg-inline-flex" data-sidebar-collapse aria-label="طي القائمة">
                    <i class="bi bi-layout-sidebar-inset-reverse" aria-hidden="true"></i>
                </button>
                <div>
                    <h2 class="h5 mb-1">لوحة تحكم الأكاديمية</h2>
                    <p class="text-muted mb-0 small">إدارة الحفظ، الحضور، والتواصل في مساحة واحدة</p>
                </div>
            </div>
            <div class="topbar-actions">
                <button type="button" class="btn btn-soft btn-icon" data-theme-toggle aria-label="تبديل الوضع الليلي">
                    <i class="bi bi-moon-stars" aria-hidden="true"></i>
                </button>
                <button type="button" class="btn btn-soft btn-icon" aria-label="الإشعارات">
                    <i class="bi bi-bell" aria-hidden="true"></i>
                </button>
                <a href="<?= BASE_URL ?>logout" class="btn btn-primary d-flex align-items-center gap-2">
                    <i class="bi bi-door-open-fill" aria-hidden="true"></i>
                    <span>خروج</span>
                </a>
            </div>
        </header>
        <main class="dashboard-content">
            <?= $content ?? '' ?>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>assets/js/app.js"></script>
</body>
</html>
