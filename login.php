<?php
require_once __DIR__ . '/includes/db.php';
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'] ?? '';

    if ($email && $password) {
        $stmt = $pdo->prepare('SELECT id,email,password,role FROM users WHERE email = :email LIMIT 1');
        $stmt->execute(['email'=>$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            // login
            $_SESSION['user'] = ['id'=>$user['id'],'email'=>$user['email'],'role'=>$user['role']];
            header('Location: posts/index.php');
            exit;
        } else {
            $error = 'Invalid credentials.';
        }
    } else {
        $error = 'Provide valid email and password.';
    }
}
include 'header.php';
?>
<div class="card">
    <h2>Login</h2>
    <?php if($error): ?><div class="error"><?=htmlspecialchars($error)?></div><?php endif; ?>
    <form method="post" novalidate>
        <label>Email</label>
        <input name="email" type="email" required>
        <label>Password</label>
        <input name="password" type="password" required>
        <div class="actions"><button class="btn" type="submit">Login</button></div>
    </form>
    <p class="small">No account? <a href="register.php">Register</a></p>
</div>
<?php include 'footer.php'; ?>
