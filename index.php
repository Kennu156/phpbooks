<?php

require_once('./connection.php');

$search = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $search = $_POST['search'];
    $stmt = $pdo->prepare('SELECT * FROM books WHERE is_deleted = 0 AND title LIKE :search');
    $stmt->execute(['search' => '%' . $search . '%']);
} else {
    $stmt = $pdo->query('SELECT * FROM books WHERE is_deleted = 0');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
</head>
<body>

<form method="post" action="">
    <input type="text" name="search" placeholder="Search for a book" value="<?= htmlspecialchars($search); ?>">
    <input type="submit" value="Search">
</form>

<ul>
    <?php while ($book = $stmt->fetch()) { ?>
        <li>
            <a href="./book.php?id=<?= $book['id']; ?>">
                <?= htmlspecialchars($book['title']); ?>
            </a>
        </li>
    <?php } ?>
</ul>

</body>
</html>
