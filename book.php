<?php

require_once('./connection.php');

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM books WHERE id = :id');
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();


var_dump($book);
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
    
</body>
</html>