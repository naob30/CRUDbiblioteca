<?php
    include("conn.php");

    $id = $_GET['id'];
    $stmt = $pdo->prepare('DELETE FROM tbAutor WHERE codAutor = ?');
    $stmt->execute([$id]);

    header('Location: index.php');
?>