<?php
include 'db.php';

// --- Pagination setup ---
$limit = 5; // posts per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// --- Search setup ---
$search = "";
$where = "";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $where = "WHERE title LIKE '%$search%' OR content LIKE '%$search%'";
}

// --- Count total records ---
$countResult = $conn->query("SELECT COUNT(*) AS total FROM posts $where");
$total = $countResult->fetch_assoc()['total'];
$pages = ceil($total / $limit);

// --- Fetch posts with search + pagination ---
$sql = "SELECT * FROM posts $where ORDER BY created_at DESC LIMIT $start, $limit";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Blog Posts</h2>

    <!-- Search Form -->
    <form method="GET" action="index.php" class="d-flex mb-4">
        <input type="text" name="search" class="form-control me-2" 
               placeholder="Search posts..." value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    <!-- Posts Table -->
    <div class="card shadow">
        <div class="card-body">
            <?php if ($result->num_rows > 0): ?>
                <ul class="list-group">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <li class="list-group-item">
                            <h5><?php echo htmlspecialchars($row['title']); ?></h5>
                            <p><?php echo nl2br(htmlspecialchars(substr($row['content'], 0, 100))); ?>...</p>
                            <small class="text-muted">Posted on: <?php echo $row['created_at']; ?></small>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else: ?>
                <p class="text-center">No posts found.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Pagination Links -->
    <nav class="mt-4">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $pages; $i++): ?>
                <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                    <a class="page-link" href="index.php?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

</body>
</html>
