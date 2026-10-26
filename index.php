<?php
$pageTitle='Home';
require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/config/db.php';
$eventCount=0; $studentCount=0;
try { $eventCount=(int)$pdo->query("SELECT COUNT(*) FROM events")->fetchColumn(); $studentCount=(int)$pdo->query("SELECT COUNT(*) FROM users")->fetchColumn(); } catch (Throwable $e) {}
?>
<main id="main-content" class="container">
<section class="hero"><div class="hero-copy"><p class="eyebrow">YOUR CAMPUS, CONNECTED</p><h1>Make campus life <span class="gradient-text">more exciting.</span></h1>
<p class="hero-text">Discover college events, connect with students, and keep all your campus updates in one place.</p>
<div class="hero-actions"><a class="button" href="events.html">Explore events <span>→</span></a><a class="button button-secondary" href="register.php">Join StudentHub</a></div>
<div class="hero-note">A student project built for a better campus experience.</div></div>
<div class="hero-card"><div class="orbit orbit-one"></div><div class="orbit orbit-two"></div><div class="hero-icon">✦</div><div class="floating-card card-top">📅 <span><b>Campus events</b><small>Find your next experience</small></span></div><div class="floating-card card-bottom">🎓 <span><b>Student community</b><small>Learn · Connect · Participate</small></span></div></div></section>
<section class="stats-grid"><article class="stat-card"><span>🎯</span><h2>Discover</h2><p>Find workshops, competitions and cultural events.</p></article><article class="stat-card"><span>🤝</span><h2>Participate</h2><p>Stay informed and get involved on campus.</p></article><article class="stat-card"><span>💡</span><h2>Stay connected</h2><p>One simple portal for useful student information.</p></article></section>
<section class="section-heading"><div><p class="eyebrow">WHAT'S HAPPENING</p><h2>Explore campus events</h2></div><a class="text-link" href="events.html">View all events →</a></section><div id="home-events" class="event-grid"><p class="muted">Open the Events page to browse events.</p></div>
<section class="cta-panel"><div><p class="eyebrow">READY TO GET STARTED?</p><h2>Your campus journey starts here.</h2><p>Create an account and stay in the loop.</p></div><a class="button" href="register.php">Create account →</a></section>
</main>
<?php require_once __DIR__.'/includes/footer.php'; ?>
