<?php
include 'db.php';

$user_id = intval($_GET['user_id']);
$sql = "SELECT * FROM users WHERE user_id = $user_id";
$result = $conn->query($sql);

$user = null;
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
}

echo json_encode($user);

$conn->close();
?>
