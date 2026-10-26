<?php
$pageTitle='Feedback'; require_once __DIR__.'/includes/header.php'; $sent=false;
if($_SERVER['REQUEST_METHOD']==='POST'){ $sent=true; }
?>
<main id="main-content" class="container narrow"><section class="form-card"><p class="eyebrow">HELP US IMPROVE</p><h1>Share feedback</h1><?php if($sent): ?><p class="success">Thanks for your feedback! This demo does not store feedback yet.</p><?php endif; ?><form method="post"><div class="field"><label for="name">Name</label><input id="name" name="name" required></div><div class="field"><label for="message">Your feedback</label><textarea id="message" name="message" minlength="5" required></textarea></div><button class="button">Send feedback</button></form></section></main>
<?php require_once __DIR__.'/includes/footer.php'; ?>
