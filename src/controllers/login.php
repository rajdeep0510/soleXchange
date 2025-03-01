<?php
session_start();
require_once __DIR__ . './../models/connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'email' => $email,
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if($user['password'] === $password){
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_id'] = $user['u_name'];
                
                // Debug output
                echo "Login successful. Redirecting...";
                var_dump($_SESSION);
                var_dump($user);
                
                ob_clean(); // Clear any output buffers
                header('Location: /soleXchange/');
                exit();
            } else {
                $error = "Invalid password!";
                echo "Password mismatch: " . $password . " vs " . $user['password'];
            }
        } else {
            $error = "User not found!";
            echo "No user found with email: " . $email;
        }
        
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
        echo "Database error details: " . $e->getMessage();
    }
}

// Move the view require to the end
require_once __DIR__ . './../views/login.view.php';
?>