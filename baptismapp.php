<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baptism Appointment</title>
    <link rel="stylesheet" href="css/form.css">
    <style>
        .godparent {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }
        #add_godparent {
            margin-top: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        #add_godparent:hover {
            background-color: #218838;
        }
        .remove_godparent {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        .remove_godparent:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="title">
            Baptism Appointment Form
        </div>
        <div class="instructions">
            <p>Please fill out the form below to schedule your baptism appointment. Ensure that you provide all necessary documents as indicated. All information you provide must be accurate and truthful. We will email you if there are problems.</p>
        </div>
        <form class="form" action="backend/process_baptismapp.php" method="post" enctype="multipart/form-data">
    <!-- Personal Information Fields -->
    <div class="input_field">
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" class="input" name="last_name" required>
    </div>
    <div class="input_field">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" class="input" name="first_name" required>
    </div>
    <div class="input_field">
        <label for="middle_name">Middle Name</label>
        <input type="text" id="middle_name" class="input" name="middle_name" required>
    </div>
    <div class="input_field">
        <label for="father_last_name">Father Last Name</label>
        <input type="text" id="father_last_name" class="input" name="father_last_name" required>
    </div>
    <div class="input_field">
        <label for="father_first_name">Father First Name</label>
        <input type="text" id="father_first_name" class="input" name="father_first_name" required>
    </div>
    <div class="input_field">
        <label for="father_middle_name">Father Middle Name</label>
        <input type="text" id="father_middle_name" class="input" name="father_middle_name">
    </div>
    <div class="input_field">
        <label for="mother_last_name">Mother Last Name</label>
        <input type="text" id="mother_last_name" class="input" name="mother_last_name" required>
    </div>
    <div class="input_field">
        <label for="mother_first_name">Mother First Name</label>
        <input type="text" id="mother_first_name" class="input" name="mother_first_name" required>
    </div>
    <div class="input_field">
        <label for="mother_middle_name">Mother Middle Name</label>
        <input type="text" id="mother_middle_name" class="input" name="mother_middle_name">
    </div>
    <div class="input_field">
        <label for="birth_certificate">Birth Certificate</label>
        <input type="file" id="birth_certificate" class="input" name="birth_certificate" required>
    </div>
    <div class="instructions">
        <p>Upload your birth certificate</p>
    </div>
    <div class="input_field">
        <label for="parent_marriage_certificate">Parent Marriage Certificate</label>
        <input type="file" id="parent_marriage_certificate" class="input" name="parent_marriage_certificate" required>
    </div>
    <div class="instructions">
        <p>Upload one parent's marriage certificate</p>
    </div>
    <div class="input_field">
        <label for="parent_baptism_certificate">Parent Baptism Certificate</label>
        <input type="file" id="parent_baptism_certificate" class="input" name="parent_baptism_certificate" required>
    </div>

    <!-- Godparents Section -->
    <div id="godparents-section">
        <h4>Godparents</h4>
        <div id="godparents-list">
            <div class="godparent">
                <div class="input_field">
                    <label for="godparent_last_name_0">Last Name</label>
                    <input type="text" id="godparent_last_name_0" class="input" name="godparent_last_name[]">
                </div>
                <div class="input_field">
                    <label for="godparent_first_name_0">First Name</label>
                    <input type="text" id="godparent_first_name_0" class="input" name="godparent_first_name[]">
                </div>
                <div class="input_field">
                    <label for="godparent_middle_name_0">Middle Name</label>
                    <input type="text" id="godparent_middle_name_0" class="input" name="godparent_middle_name[]">
                </div>
                <div class="input_field">
                    <label for="godparent_gender_0">Gender</label>
                    <input type="text" id="godparent_gender_0" class="input" name="godparent_gender[]">
                </div>
            </div>
        </div>
        <div class="input_field">
            <button type="button" id="add_godparent" class="btn">Add Another Godparent</button>
        </div>
    </div>

    <div class="instructions">
        <p><b>Upload a screenshot of your reservation payment</b></p>
    </div>

    <div class="input_field">
        <label for="payment">Payment</label>
        <input type="file" id="payment" class="input" name="payment" required>
    </div>

    <div class="input_field">
        <label class="check">
            <input type="checkbox" id="agree" name="agree" required>
            <span class="checkmark"></span>
        </label>
        <p>Agree to share information</p>
    </div>

    <div class="input_field button">
        <input type="submit" value="Submit" class="btn">
    </div>
</form>

    </div>
    <script src="js/form.js"></script>

</body>
</html>
