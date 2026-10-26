<?php
require_once __DIR__ . '/includes/functions.php';
require_login();
require_once __DIR__ . '/config/db.php';
$pageTitle = 'Dashboard';
$stmt = $pdo->prepare('SELECT COUNT(*) FROM registrations WHERE student_id=?');
$stmt->execute([$_SESSION['user_id']]);
$registrationCount = (int)$stmt->fetchColumn();
require_once __DIR__ . '/includes/header.php';
?>
<main id="main-content" class="container">
<header class="page-heading"><p class="eyebrow">YOUR SPACE</p><h1>Welcome, <?= e($_SESSION['user_name'] ?? 'Student') ?>!</h1><p>Your StudentHub overview.</p></header>
<div class="stats-grid">
<article class="stat-card"><span>👤</span><h2>Student profile</h2><p><?= e($_SESSION['user_email'] ?? '') ?></p></article>
<article class="stat-card"><span>📅</span><h2>Explore events</h2><p>Find activities that interest you.</p><a class="text-link" href="events.html">View events →</a></article>
<article class="stat-card"><span>🎟️</span><h2><?= $registrationCount ?></h2><p>Event registrations in the database.</p></article>
</div></main>
<?php require_once __DIR__ . '/includes/footer.php'; ?>
