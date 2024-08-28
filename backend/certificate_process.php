<?php
// Database connection
include 'db.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request_type = $_POST['request_type'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $suffix_name = $_POST['suffix_name'];
    $agree = isset($_POST['agree']) ? 1 : 0;

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO certificate_request (request_type, last_name, first_name, middle_name, suffix_name, agree) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $request_type, $last_name, $first_name, $middle_name, $suffix_name, $agree);

    if ($stmt->execute()) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
