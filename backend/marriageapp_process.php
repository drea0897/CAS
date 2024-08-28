<?php
// Include database configuration
include '../backend/db.php'; // Adjust the path as necessary

// Function to save uploaded files
function saveFile($file, $targetDir) {
    $targetFile = $targetDir . basename($file["name"]);
    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        return $targetFile;
    } else {
        return false;
    }
}

// Function to create a directory if it doesn't exist
function createDirectory($dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate inputs
    $female_last_name = $_POST['female_last_name'] ?? '';
    $female_first_name = $_POST['female_first_name'] ?? '';
    $female_middle_name = $_POST['female_middle_name'] ?? '';
    $female_suffix_name = $_POST['female_suffix_name'] ?? '';
    $female_address = $_POST['female_address'] ?? '';
    $female_birthday = $_POST['female_birthday'] ?? '';
    $male_last_name = $_POST['male_last_name'] ?? '';
    $male_first_name = $_POST['male_first_name'] ?? '';
    $male_middle_name = $_POST['male_middle_name'] ?? '';
    $male_suffix_name = $_POST['male_suffix_name'] ?? '';
    $male_address = $_POST['male_address'] ?? '';
    $male_birthday = $_POST['male_birthday'] ?? '';
    $agree = isset($_POST['agree']) ? 1 : 0;

    // Create a directory for the client
    $clientDir = '../upload/' . $female_last_name . '_' . $female_first_name . 'marriage appointment'. '/';
    createDirectory($clientDir);

    // Validate and save files
    $female_marriage_license = saveFile($_FILES['female_marriage_license'], $clientDir);
    $female_birth_certificate = saveFile($_FILES['female_birth_certificate'], $clientDir);
    $male_marriage_license = saveFile($_FILES['male_marriage_license'], $clientDir);
    $male_birth_certificate = saveFile($_FILES['male_birth_certificate'], $clientDir);
    $baptism_certificate = saveFile($_FILES['baptism_certificate'], $clientDir);
    $payment = saveFile($_FILES['payment'], $clientDir);

    if ($female_marriage_license && $female_birth_certificate && $male_marriage_license && $male_birth_certificate && $baptism_certificate && $payment) {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO marriage_appointmnent (female_last_name, female_first_name, female_middle_name, female_suffix_name, female_address, female_birthday, female_marriage_license, female_birth_certificate, male_last_name, male_first_name, male_middle_name, male_suffix_name, male_address, male_birthday, male_marriage_license, male_birth_certificate, baptism_certificate, payment, agree) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssssssssssss", $female_last_name, $female_first_name, $female_middle_name, $female_suffix_name, $female_address, $female_birthday, $female_marriage_license, $female_birth_certificate, $male_last_name, $male_first_name, $male_middle_name, $male_suffix_name, $male_address, $male_birthday, $male_marriage_license, $male_birth_certificate, $baptism_certificate, $payment, $agree);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Record saved successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "File upload failed.";
    }

    // Close the database connection
    $conn->close();
}
?>
