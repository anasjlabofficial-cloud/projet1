<!DOCTYPE html>
<html lang="ar" dir="rtl" data-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="كتاب الإمام نافع: منصة إدارة حفظ وتجويد القرآن بأناقة واحترافية" />
    <meta name="theme-color" content="#14532d" />
    <title><?= htmlspecialchars($title ?? 'كتاب الإمام نافع') ?></title>
    <link rel="manifest" href="<?= BASE_URL ?>manifest.json" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/styles.css" />
</head>
<body>
    <header class="site-header py-3">
        <nav class="navbar navbar-expand-lg container align-items-center px-0">
            <a class="navbar-brand d-flex align-items-center gap-2" href="<?= BASE_URL ?>">
                <span class="brand-mark">﴾</span>
                <div>
                    <div class="brand-name">كتاب الإمام نافع</div>
                    <div class="brand-slogan">منصة تعليمية فاخرة لإدارة القرآن الكريم</div>
                </div>
            </a>
            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-label="فتح القائمة">
                <i class="bi bi-list fs-3"></i>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-center site-nav">
                    <li class="nav-item"><a class="nav-link" href="#home">الرئيسية</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">حول المنصة</a></li>
                    <li class="nav-item"><a class="nav-link" href="#programs">البرامج</a></li>
                    <li class="nav-item"><a class="nav-link" href="#teachers">المدرِّسون</a></li>
                    <li class="nav-item"><a class="nav-link" href="#achievements">الإنجازات</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">تواصل</a></li>
                    <li class="nav-item d-flex align-items-center">
                        <button class="btn btn-soft rounded-circle me-2" data-theme-toggle aria-label="تبديل الوضع">
                            <i class="bi bi-moon-stars"></i>
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-lg" href="<?= BASE_URL ?>login">تسجيل الدخول</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="container-lg px-0">
        <?= $content ?? '' ?>
    </main>
    <footer class="footer-panel py-5 mt-5">
        <div class="container text-center">
            <p class="mb-1">© 2026 كتاب الإمام نافع. جميع الحقوق محفوظة.</p>
            <p class="mb-0 text-muted">منصة قرآنية حديثة تجمع بين الفخامة، الأداء العالي، وتجربة المستخدم المميزة.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/app.js"></script>
</body>
</html>
