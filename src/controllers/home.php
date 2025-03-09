<?php
require_once __DIR__ . '/../models/connection.php';

    // Try to query your brands table
    try {
        $sql = "SELECT * FROM products";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
    }
   








require_once __DIR__ . './../views/home.view.php';
?>