<?php ob_start(); ?>
<section id="home" class="hero-section">
    <div class="hero-decor">
        <div class="hero-shape hero-shape--1"></div>
        <div class="hero-shape hero-shape--2"></div>
        <div class="hero-shape hero-shape--3"></div>
        <div class="hero-pattern hero-pattern--1"></div>
        <div class="hero-pattern hero-pattern--2"></div>
    </div>
    <div class="container-lg hero-content">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <span class="hero-label">منصة إسلامية فاخرة</span>
                <h1 class="hero-title">تجربة تعليم القرآن الكريم برقي عصري ومضمون.</h1>
                <p class="hero-text">نقدم إدارة ذكية للحفظ، تجويد احترافي، وتواصل فوري بين الطلاب والمعلمين وأولياء الأمور داخل واجهة متجاوبة وفاخرة.</p>
                <div class="hero-actions d-flex flex-wrap gap-3 mt-4">
                    <a href="<?= BASE_URL ?>login" class="btn btn-primary btn-xl">ابدأ الآن</a>
                    <a href="#programs" class="btn btn-outline-primary btn-xl">استكشف البرامج</a>
                </div>
                <div class="hero-metrics row gx-3 gy-3 mt-5">
                    <div class="col-sm-6">
                        <div class="metric-chip">
                            <span>١٢٠+</span>
                            <small>طالب متميز</small>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="metric-chip">
                            <span>٩٥%</span>
                            <small>نسبة رضا أولياء الأمور</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-glass-card p-4">
                    <div class="hero-card-top d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <span class="label-pill">برنامج الحفظ الذكي</span>
                            <h3 class="mb-1">لوحة تقدم متطورة</h3>
                        </div>
                        <i class="bi bi-star-fill text-gold fs-3"></i>
                    </div>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="mini-card">
                                <strong>٢٤/٧</strong>
                                <small>دعم حي</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mini-card">
                                <strong>٣٢٠+</strong>
                                <small>درس مسجل</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mini-card">
                                <strong>٨٠%</strong>
                                <small>تحسن أسبوعي</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mini-card">
                                <strong>٦٨</strong>
                                <small>جلسة تقييم</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="about" class="section-panel py-5">
    <div class="container-lg">
        <div class="row align-items-center gy-5">
            <div class="col-lg-6">
                <div class="glass-card p-5" data-reveal>
                    <h2 class="section-title">حول المنصة</h2>
                    <p class="section-subtitle">منصة مديرية قرآنية مصممة للمدارس والمراكز التعليمية التي تطمح لتجربة تعليمية فاخرة وذات تأثير.</p>
                    <ul class="feature-list mt-4">
                        <li>إدارة حضور وانصراف دقيقة مع إشعارات آنية.</li>
                        <li>متابعة حفظ متقدمة وتقارير أداء يومية.</li>
                        <li>اتصال فوري بين المعلم، الطالب، وولي الأمر.</li>
                        <li>تصميم غير تقليدي يجمع بين الفخامة والوضوح.</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-grid row g-4">
                    <div class="col-sm-6">
                        <div class="feature-card p-4" data-reveal>
                            <h5>رؤية تعليمية</h5>
                            <p>نؤمن أن التعليم القرآني يزدهر عندما يرتبط بالإدارة الذكية والتفاعل الإنساني.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="feature-card p-4" data-reveal>
                            <h5>هوية مرئية</h5>
                            <p>تصميم عربي معاصر يستخدم اللمسات الذهبية والزخارف الخفيفة.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="feature-card p-4" data-reveal>
                            <h5>دعم قوي</h5>
                            <p>فوائد تقنية ومحتوى تعليمي موجه لمختلف الأدوار داخل المدرسة.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="feature-card p-4" data-reveal>
                            <h5>أداء فائق</h5>
                            <p>واجهة سلسة وسريعة وملائمة لجميع الأجهزة.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="programs" class="section-panel py-5">
    <div class="container-lg">
        <div class="section-heading text-center mb-5" data-reveal>
            <h2 class="section-title">برامجنا المتميزة</h2>
            <p class="section-subtitle">برامج متكاملة لتجويد القرآن، حفظه، وتطوير المهارات القرآنية.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4" data-reveal>
                <div class="program-card p-5">
                    <div class="card-icon"><i class="bi bi-book-half"></i></div>
                    <h4>برنامج الحفظ</h4>
                    <p>مسارات حفظ مخصصة مع جداول مراجعة متجددة وتقارير تقدم مفصلة لكل طالب.</p>
                    <span class="badge badge-success">أكثر البرامج شيوعاً</span>
                </div>
            </div>
            <div class="col-lg-4" data-reveal>
                <div class="program-card p-5">
                    <div class="card-icon"><i class="bi bi-mic-fill"></i></div>
                    <h4>برنامج التجويد</h4>
                    <p>دروس صوتية وأساليب تعليمية لرفع مستوى التلاوة بدقة وقواعد سليمة.</p>
                    <span class="badge badge-gold">مضمون الجودة</span>
                </div>
            </div>
            <div class="col-lg-4" data-reveal>
                <div class="program-card p-5">
                    <div class="card-icon"><i class="bi bi-people-fill"></i></div>
                    <h4>برنامج المعلمين</h4>
                    <p>لوحة إدارة بأدوات تخطيط الدروس والتواصل الفوري مع الطلاب.</p>
                    <span class="badge badge-primary">للمدرسين المتميزين</span>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="teachers" class="section-panel py-5">
    <div class="container-lg">
        <div class="section-heading text-center mb-5" data-reveal>
            <h2 class="section-title">فريق المعلمين</h2>
            <p class="section-subtitle">معلمون مؤهلون بخبرة قرآنية عميقة ونهج تربوي راقٍ.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-reveal>
                <div class="teacher-card p-4">
                    <div class="teacher-avatar">أ</div>
                    <h5>الأستاذ أحمد</h5>
                    <p>خبير في التجويد والقراءات برؤية منهجية حديثة.</p>
                </div>
            </div>
            <div class="col-md-4" data-reveal>
                <div class="teacher-card p-4">
                    <div class="teacher-avatar">م</div>
                    <h5>الأستاذة مريم</h5>
                    <p>تخصص حفظ القرآن مع متابعة شخصية لكل طالب.</p>
                </div>
            </div>
            <div class="col-md-4" data-reveal>
                <div class="teacher-card p-4">
                    <div class="teacher-avatar">ح</div>
                    <h5>الأستاذ حسين</h5>
                    <p>مدرب برامج الحفظ والمراجعة الذكية.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="achievements" class="section-panel py-5">
    <div class="container-lg">
        <div class="section-heading text-center mb-5" data-reveal>
            <h2 class="section-title">إنجازات الطلاب</h2>
            <p class="section-subtitle">نتائج حقيقية تُظهر التطور القرآني لكل طالب.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4" data-reveal>
                <div class="achievement-card p-5">
                    <h3>٩٠٪</h3>
                    <p>مستوى تثبيت الحفظ بعد شهرين من البرنامج.</p>
                </div>
            </div>
            <div class="col-lg-4" data-reveal>
                <div class="achievement-card p-5">
                    <h3>٧٥+</h3>
                    <p>طالب حقق أداءً متقدمًا في التجويد.</p>
                </div>
            </div>
            <div class="col-lg-4" data-reveal>
                <div class="achievement-card p-5">
                    <h3>١٠٠+</h3>
                    <p>تقييمات رضا أولياء الأمور خلال هذا الفصل.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="testimonials" class="section-panel py-5">
    <div class="container-lg">
        <div class="section-heading text-center mb-5" data-reveal>
            <h2 class="section-title">آراء أولياء الأمور</h2>
            <p class="section-subtitle">تجربة تعليمية موثوقة تحظى بتقدير الأسرة والمجتمع.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6" data-reveal>
                <div class="testimonial-card p-5">
                    <p>"المنصة وفرت لنا رؤية واضحة لمسار الحفظ، وسمحت لي بمتابعة تقدم ابني بسهولة."</p>
                    <div class="testimonial-author mt-4">
                        <strong>أم محمد</strong>
                        <small>ولي أمر</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-reveal>
                <div class="testimonial-card p-5">
                    <p>"واجهات أنيقة وسهلة الاستخدام جعلت عملية إدارة الحلقات التعليمية أكثر احترافية."</p>
                    <div class="testimonial-author mt-4">
                        <strong>الأستاذة هدى</strong>
                        <small>معلمة قرآن</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="stats" class="section-panel py-5">
    <div class="container-lg">
        <div class="row g-4 text-center" data-reveal>
            <div class="col-md-3">
                <div class="stat-panel p-4">
                    <h3>٤٢٠+</h3>
                    <p>طالب مسجل</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-panel p-4">
                    <h3>٣٣</h3>
                    <p>معلم متخصص</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-panel p-4">
                    <h3>١٨٠</h3>
                    <p>جلسة تدريبية شهرياً</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-panel p-4">
                    <h3>٩٨٪</h3>
                    <p>نسبة نجاح الطلاب</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="contact" class="section-panel py-5">
    <div class="container-lg">
        <div class="glass-card contact-panel p-5" data-reveal>
            <div class="row align-items-center gy-4">
                <div class="col-lg-7">
                    <h2 class="section-title">لنبدأ مرحلة جديدة من النجاح القرآني</h2>
                    <p class="section-subtitle">تواصل معنا اليوم لتفعيل برنامج المدرسة القرآنية ورفع جودة التعليم لديك.</p>
                </div>
                <div class="col-lg-5 text-lg-end">
                    <a href="mailto:info@quranschool.local" class="btn btn-primary btn-xl">info@quranschool.local</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>
<?php require_once __DIR__ . '/../layouts/main.php'; ?>
