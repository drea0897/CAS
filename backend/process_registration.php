<?php
include '../backend/db.php'; // Adjust the path as necessary

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve fo rm data
    $email = $_POST['email'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $civilstatus = $_POST['civilstatus'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $municipality = $_POST['municipality'];
    $barangay = $_POST['barangay'];
    $religion = $_POST['religion'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (email, last_name, first_name, middle_name, gender, contact_number, civil_status, region, province, municipality, barangay, religion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $email, $lastname, $firstname, $middlename, $gender, $phone, $civilstatus, $region, $province, $municipality, $barangay, $religion);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
