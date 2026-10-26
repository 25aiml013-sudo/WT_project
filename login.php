<?php
require_once __DIR__.'/includes/functions.php'; require_once __DIR__.'/config/db.php';
$pageTitle='Login'; $error='';
if ($_SERVER['REQUEST_METHOD']==='POST') {
 $email=trim($_POST['email']??''); $password=$_POST['password']??'';
 $stmt=$pdo->prepare('SELECT id,name,email,password_hash,role FROM users WHERE email=?'); $stmt->execute([$email]); $user=$stmt->fetch();
 if($user && password_verify($password,$user['password_hash'])) { session_regenerate_id(true); $_SESSION['user_id']=$user['id']; $_SESSION['user_name']=$user['name']; $_SESSION['user_email']=$user['email']; $_SESSION['role']=$user['role']; header('Location: dashboard.php'); exit; }
 $error='Email or password is incorrect.';
}
require_once __DIR__.'/includes/header.php';
?>
<main id="main-content" class="container narrow"><section class="form-card"><p class="eyebrow">WELCOME BACK</p><h1>Sign in</h1><?php if(isset($_GET['registered'])): ?><p class="success">Account created. You can now sign in.</p><?php endif; ?><?php if($error): ?><p class="alert"><?= e($error) ?></p><?php endif; ?>
<form method="post"><div class="field"><label for="email">Email address</label><input id="email" name="email" type="email" required></div><div class="field"><label for="password">Password</label><input id="password" name="password" type="password" required></div><button class="button full-width">Sign in</button></form><p class="form-foot">New to StudentHub? <a href="register.php">Create an account</a></p></section></main>
<?php require_once __DIR__.'/includes/footer.php'; ?>
