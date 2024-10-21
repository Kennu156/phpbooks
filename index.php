<?php

$host = 'd124550.mysql.zonevs.eu';
$db   = 'd124550_books';
$user = 'd124550_book';
$pass = 'Books1133_';
$charset = 'utf8mb4';

$host = 'localhost';
$db   = 'books';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $options);

$stmt = $pdo->query('SELECT * FROM books');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    while ($row = $stmt->fetch())
    {
        echo $row['title'] . "<br>";
    }
    
    ?>

</body>
</html>