<?php
// backend/save_profile.php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../login.php'); // Redirect to login page if not logged in
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $contact_number = $_POST['contact_number'];
    $civil_status = $_POST['civil_status'];

    $stmt = $conn->prepare("UPDATE users SET first_name = ?, middle_name = ?, last_name = ?, contact_number = ?, civil_status = ? WHERE user_id = ?");
    $stmt->bind_param("sssssi", $first_name, $middle_name, $last_name, $contact_number, $civil_status, $user_id);

    if ($stmt->execute()) {
        $_SESSION['user_name'] = trim($first_name . ' ' . $middle_name . ' ' . $last_name);
        header('Location: ../profile.php'); // Adjust path if necessary
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
    $stmt->close();
    $conn->close();
} else {
    header('Location: ../profile.php'); // Adjust path if necessary
    exit();
}
?>
