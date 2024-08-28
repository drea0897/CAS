<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect personal information
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $father_last_name = $_POST['father_last_name'];
    $father_first_name = $_POST['father_first_name'];
    $father_middle_name = $_POST['father_middle_name'];
    $mother_last_name = $_POST['mother_last_name'];
    $mother_first_name = $_POST['mother_first_name'];
    $mother_middle_name = $_POST['mother_middle_name'];

    // Handle file uploads
    $birth_certificate = $_FILES['birth_certificate']['name'];
    $parent_marriage_certificate = $_FILES['parent_marriage_certificate']['name'];
    $parent_baptism_certificate = $_FILES['parent_baptism_certificate']['name'];
    $payment = $_FILES['payment']['name'];

    // Insert personal information into the main table
    $stmt = $pdo->prepare("INSERT INTO baptism_appointments (last_name, first_name, middle_name, father_last_name, father_first_name, father_middle_name, mother_last_name, mother_first_name, mother_middle_name, birth_certificate, parent_marriage_certificate, parent_baptism_certificate, payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$last_name, $first_name, $middle_name, $father_last_name, $father_first_name, $father_middle_name, $mother_last_name, $mother_first_name, $mother_middle_name, $birth_certificate, $parent_marriage_certificate, $parent_baptism_certificate, $payment]);

    // Get the last inserted ID for the baptism appointment
    $appointment_id = $pdo->lastInsertId();

    // Create a unique directory for this appointment
    $directory_name = "uploads/baptism_appointment_{$appointment_id}_{$last_name}_{$first_name}";
    if (!is_dir($directory_name)) {
        mkdir($directory_name, 0777, true);
    }

    // Move uploaded files to the designated directory
    move_uploaded_file($_FILES['birth_certificate']['tmp_name'], "$directory_name/$birth_certificate");
    move_uploaded_file($_FILES['parent_marriage_certificate']['tmp_name'], "$directory_name/$parent_marriage_certificate");
    move_uploaded_file($_FILES['parent_baptism_certificate']['tmp_name'], "$directory_name/$parent_baptism_certificate");
    move_uploaded_file($_FILES['payment']['tmp_name'], "$directory_name/$payment");

    // Update the file paths in the database
    $stmt = $pdo->prepare("UPDATE baptism_appointments SET birth_certificate = ?, parent_marriage_certificate = ?, parent_baptism_certificate = ?, payment = ? WHERE baptismapp_id = ?");
    $stmt->execute(["$directory_name/$birth_certificate", "$directory_name/$parent_marriage_certificate", "$directory_name/$parent_baptism_certificate", "$directory_name/$payment", $appointment_id]);

    // Collect godparent information and insert into the godparents table
    if (!empty($_POST['godparent_last_name'])) {
        foreach ($_POST['godparent_last_name'] as $index => $godparent_last_name) {
            $godparent_first_name = $_POST['godparent_first_name'][$index];
            $godparent_middle_name = $_POST['godparent_middle_name'][$index];
            $godparent_gender = $_POST['godparent_gender'][$index];

            $stmt = $pdo->prepare("INSERT INTO godparents (appointment_id, last_name, first_name, middle_name, gender) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$appointment_id, $godparent_last_name, $godparent_first_name, $godparent_middle_name, $godparent_gender]);
        }
    }

    // Redirect to a thank you page or display a success message
    echo "Your appointment has been successfully scheduled.";
} else {
    echo "Invalid request method.";
}
?>
