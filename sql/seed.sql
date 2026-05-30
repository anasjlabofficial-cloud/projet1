USE quran_school;

INSERT INTO users (role_id, first_name, last_name, email, password, phone, dob, address, profile_image, status, created_at)
VALUES
(1, 'أحمد', 'النافع', 'admin@quranschool.local', '$2b$12$0NBoLphRxFq7EiJ2o.WGmOPSK0ccDRD72IMz6kscQNGMANIe51mZO', '0551234567', '1980-01-15', 'الرباط', NULL, 'active', NOW()),
(2, 'سعيد', 'المعلم', 'teacher@quranschool.local', '$2b$12$0NBoLphRxFq7EiJ2o.WGmOPSK0ccDRD72IMz6kscQNGMANIe51mZO', '0552345678', '1990-06-21', 'فاس', NULL, 'active', NOW()),
(3, 'فاطمة', 'الولي', 'parent@quranschool.local', '$2b$12$0NBoLphRxFq7EiJ2o.WGmOPSK0ccDRD72IMz6kscQNGMANIe51mZO', '0553456789', '1985-08-30', 'مكناس', NULL, 'active', NOW()),
(4, 'سعيد', 'الطالب', 'student@quranschool.local', '$2b$12$0NBoLphRxFq7EiJ2o.WGmOPSK0ccDRD72IMz6kscQNGMANIe51mZO', '0559876543', '2010-02-10', 'الرباط', NULL, 'active', NOW());

INSERT INTO students (user_id, parent_id, teacher_id, memorization_level, group_name, status, created_at)
VALUES
(4, 3, 2, 'الجزء الأول', 'مجموعة الإمام نافع', 'active', NOW());

INSERT INTO schedules (day_name, session_date, session_time, description, status, created_at)
VALUES
('الثلاثاء', '2026-05-28', '08:00 صباحا', 'جلسة حفظ وتفسير', 'active', NOW()),
('الخميس', '2026-05-29', 'بعد العصر', 'جلسة مراجعة تجويد', 'active', NOW()),
('الجمعة', '2026-05-30', 'بعد المغرب', 'جلسة تقييم الأداء', 'active', NOW());

INSERT INTO messages (sender_id, receiver_id, subject, body, status, created_at)
VALUES
(2, 3, 'تقرير أداء الطالب', 'الطالب سعيد قدم تقدماً جيداً هذا الأسبوع.', 'unread', NOW()),
(2, 4, 'مهمة مراجعة', 'يرجى مراجعة الجزء الأخير قبل الجلسة القادمة.', 'unread', NOW());
