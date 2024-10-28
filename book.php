<?php

require_once('./connection.php');

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

$stmt = $pdo->prepare('SELECT * FROM book_authors ba LEFT JOIN authors a ON ba.authors_id=a.id WHERE ba.book.id = :id');
$stmt->execute(['id' => $id]);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1><?= $book['title']; ?></h1>
        <h2><?= $book['first_name']; ?></h2>
        <h2><?= $book['release_date']; ?></h2>
        <h3><?= $book['summary']; ?></h3>
        <img src="<?= $book['cover_path'] ?>" alt="">



    <ul>
        <?php while ( $author = $stmt->fetch() ) { ?>

            <li>
                <?= $author['first_name']; ?>
            </li>
        
        <?php } ?>
    </ul>

    <a href="./edit.php">Muuda</a>
    
</body>
</html>