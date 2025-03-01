<?php
require_once __DIR__ . './../models/connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];

    try {
        $sql = "INSERT INTO users (u_name, email, phone_no, password) VALUES (:firstname, :email, :phonenumber, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'firstname' => $firstname,
            'email' => $email,
            'phonenumber' => $phonenumber,
            'password' => $password
        ]);
        header('Location: /soleXchange/');
        exit();
        
    } catch (PDOException $e) {
        echo "Query failed: " . $e->getMessage();
    }
}

require_once __DIR__ . './../views/register.view.php';
?>