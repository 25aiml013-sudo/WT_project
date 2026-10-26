<?php
require_once __DIR__.'/includes/functions.php'; require_once __DIR__.'/config/db.php';
$pageTitle='Register'; $error=''; $name=''; $email='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $name=trim($_POST['name']??''); $email=trim($_POST['email']??''); $password=$_POST['password']??'';
    if ($name==='' || !filter_var($email,FILTER_VALIDATE_EMAIL) || strlen($password)<8) $error='Enter your name, a valid email and a password with at least 8 characters.';
    else {
        try { $stmt=$pdo->prepare("INSERT INTO users(name,email,password_hash,role,created_at) VALUES(?,?,?,'student',NOW())"); $stmt->execute([$name,$email,password_hash($password,PASSWORD_DEFAULT)]); header('Location: login.php?registered=1'); exit; }
        catch(PDOException $e) { $error=$e->getCode()==='23000'?'That email is already registered.':'Could not create account. Check the database setup.'; }
    }
}
require_once __DIR__.'/includes/header.php';
?>
<main id="main-content" class="container narrow"><section class="form-card"><p class="eyebrow">JOIN THE COMMUNITY</p><h1>Create your account</h1><p class="muted">Register to access your student dashboard.</p>
<?php if($error): ?><p class="alert"><?= e($error) ?></p><?php endif; ?>
<form method="post"><div class="field"><label for="name">Full name</label><input id="name" name="name" required value="<?= e($name) ?>"></div><div class="field"><label for="email">Email address</label><input id="email" name="email" type="email" required value="<?= e($email) ?>"></div><div class="field"><label for="password">Password</label><input id="password" name="password" type="password" minlength="8" required><small>At least 8 characters.</small></div><button class="button full-width">Create account</button></form><p class="form-foot">Already registered? <a href="login.php">Sign in</a></p></section></main>
<?php require_once __DIR__.'/includes/footer.php'; ?>
