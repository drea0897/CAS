<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Form</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Import Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
/* Body Styling */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Full viewport height */
}

.main-content {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 60px; /* Adjust based on the height of the navbar */
}

.form-container {
    background-color: #ffffff;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    box-sizing: border-box; /* Include padding and border in the element's total width and height */
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    font-weight: 600;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
}

input, select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

input:focus, select:focus {
    border-color: #4A90E2;
    outline: none;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #4A90E2;
    color: #ffffff;
    border: none;
    border-radius: 4px;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #357ABD;
}


    </style>
</head>
<?php include "adminnav.php" ?>
<body>
  
<div class="main-content">
    <div class="form-container">
        <form>
            <h2>Registration Form</h2>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name</label>
                <input type="text" id="middle_name" name="middle_name">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <select id="position" name="position" required>
                    <option value="pastor">Pastor</option>
                    <option value="deacon">Secretary</option>
                    <!-- Add more positions as needed -->
                </select>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
