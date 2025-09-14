<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$user = $_SESSION['user'] ?? null;
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>ApexPlanet - Simple Blog</title>
    <link rel="stylesheet" href="/final_project_apexplanet/assets/css/style.css">
</head>
<body>
<header class="site-header">
    <div class="container">
        <h1><a href="/final_project_apexplanet/posts/index.php">ApexPlanet Blog</a></h1>
        <nav>
            <?php if($user): ?>
                <span>Hi, <?=htmlspecialchars($user['email'])?> (<?=htmlspecialchars($user['role'])?>)</span>
                <a href="/final_project_apexplanet/posts/create.php">Create Post</a>
                <a href="/final_project_apexplanet/logout.php">Logout</a>
            <?php else: ?>
                <a href="/final_project_apexplanet/login.php">Login</a>
                <a href="/final_project_apexplanet/register.php">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
<main class="container">
