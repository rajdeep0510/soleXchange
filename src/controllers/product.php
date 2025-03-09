<?php

require_once __DIR__ . '/../models/connection.php';
$product_name = isset($_GET['product']) ? $_GET['product'] : '';

try {
    // Fetch the product details
    $query = "SELECT * FROM products WHERE product_name = :product_name";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['product_name' => $product_name]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        throw new Exception("Product not found");
    }

    // Load the product view
    require __DIR__ . '/../views/product.view.php';
} catch (PDOException $e) {
    error_log("Database Error: " . $e->getMessage());
    echo "Error loading product details. Please try again later.";
} catch (Exception $e) {
    echo $e->getMessage();
}
?>  