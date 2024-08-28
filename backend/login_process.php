<?php
// backend/authenticate.php
require 'db.php'; // Include the database connection

function authenticateUser($email, $password) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT user_id, password, first_name, middle_name, last_name FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $full_name = trim($user['first_name'] . ' ' . $user['middle_name'] . ' ' . $user['last_name']);
            return ['user_id' => $user['user_id'], 'full_name' => $full_name];
        } else {
            return false;
        }
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $user = authenticateUser($email, $password);
    
    if ($user) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['full_name'];
        header('Location: ../index.php'); // Adjust path if necessary
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>
