<?php
require_once __DIR__ . '/includes/db.php';
session_start();
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';
    $role = 'user';

    if (!$email) $errors[] = 'Valid email is required.';
    if (strlen($password) < 6) $errors[] = 'Password must be at least 6 characters.';

    if (empty($errors)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare('INSERT INTO users (email,password,role) VALUES (:email,:password,:role)');
        try {
            $stmt->execute(['email'=>$email,'password'=>$hash,'role'=>$role]);
            // auto-login
            $id = $pdo->lastInsertId();
            $_SESSION['user'] = ['id'=>$id,'email'=>$email,'role'=>$role];
            header('Location: posts/index.php');
            exit;
        } catch (Exception $e) {
            $errors[] = 'Email already exists or DB error.';
        }
    }
}
include 'header.php';
?>
<div class="card">
    <h2>Register</h2>
    <?php if($errors): foreach($errors as $err): ?><div class="error"><?=htmlspecialchars($err)?></div><?php endforeach; endif; ?>
    <form method="post" novalidate>
        <label>Email</label>
        <input name="email" type="email" required>
        <label>Password</label>
        <input name="password" type="password" required minlength="6">
        <div class="actions"><button class="btn" type="submit">Register</button></div>
    </form>
    <p class="small">Already have an account? <a href="login.php">Login</a></p>
</div>
<?php include 'footer.php'; ?>
