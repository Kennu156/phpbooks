<?php
    require_once('./connection.php');
    
    if (isset($_POST['book_id'], $_POST['action']) && $_POST['action'] === 'add_author') {
        $book_id = $_POST['book_id'];
    
        if (!empty($_POST['author_id'])) {
            $author_id = $_POST['author_id'];
        }
        elseif (!empty($_POST['new_author_first_name']) && !empty($_POST['new_author_last_name'])) {
            $first_name = $_POST['new_author_first_name'];
            $last_name = $_POST['new_author_last_name'];
        
            $stmt = $pdo->prepare('SELECT id FROM authors WHERE first_name = :first_name AND last_name = :last_name');
            $stmt->execute(['first_name' => $first_name, 'last_name' => $last_name]);
            $author = $stmt->fetch();
            
        
            if ($author) {
                $author_id = $author['id'];
            } else {
                $stmt = $pdo->prepare('INSERT INTO authors (first_name, last_name) VALUES (:first_name, :last_name)');
                $stmt->execute(['first_name' => $first_name, 'last_name' => $last_name]);
                $author_id = $pdo->lastInsertId();
            }
        }
    
        if (isset($author_id)) {
            $stmt = $pdo->prepare('INSERT INTO book_authors (book_id, author_id) VALUES (:book_id, :author_id)');
            $stmt->execute(['book_id' => $book_id, 'author_id' => $author_id]);
        }
    
        header("Location: ./edit.php?id={$book_id}");
        exit();
    }
    
        header("Location: ./index.php");
        exit();