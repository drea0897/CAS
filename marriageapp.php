<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marriage Appointment</title>
    <link rel="stylesheet" href="css/form.css">
</head>

<body>

    <div class="wrapper">
        <div class="title">
            Marriage Appointment Form
        </div>

        <div class="instructions">
            <p>Please fill out the form below to schedule your marriage appointment. Ensure that you provide all necessary documents as indicated. All information you provide must be accurate and truthful. We will email you if there are problems.</p>
        </div>

        <form class="form" method="POST" action="backend/marriageapp_process.php" enctype="multipart/form-data">
            <!-- Female Fields -->
            <div class="input_field">
                <label for="female_last_name">Female Last Name</label>
                <input type="text" id="female_last_name" class="input" name="female_last_name" required>
            </div>
            <div class="input_field">
                <label for="female_first_name">Female First Name</label>
                <input type="text" id="female_first_name" class="input" name="female_first_name" required>
            </div>
            <div class="input_field">
                <label for="female_middle_name">Female Middle Name</label>
                <input type="text" id="female_middle_name" class="input" name="female_middle_name">
            </div>
            <div class="input_field">
                <label for="female_suffix_name">Female Suffix Name</label>
                <input type="text" id="female_suffix_name" class="input" name="female_suffix_name">
            </div>
            <div class="input_field">
                <label for="female_address">Female Address</label>
                <input type="text" id="female_address" class="input" name="female_address">
            </div>
            <div class="input_field">
                <label for="female_birthday">Female Birthday</label>
                <input type="date" id="female_birthday" class="input" name="female_birthday">
            </div>
            <div class="input_field">
                <label for="female_marriage_license">Female Marriage License</label>
                <input type="file" id="female_marriage_license" class="input" name="female_marriage_license" required>
            </div>
            <div class="input_field">
                <label for="female_birth_certificate">Female Birth Certificate</label>
                <input type="file" id="female_birth_certificate" class="input" name="female_birth_certificate" required>
            </div>

            <!-- Male Fields -->
            <div class="input_field">
                <label for="male_last_name">Male Last Name</label>
                <input type="text" id="male_last_name" class="input" name="male_last_name" required>
            </div>
            <div class="input_field">
                <label for="male_first_name">Male First Name</label>
                <input type="text" id="male_first_name" class="input" name="male_first_name" required>
            </div>
            <div class="input_field">
                <label for="male_middle_name">Male Middle Name</label>
                <input type="text" id="male_middle_name" class="input" name="male_middle_name">
            </div>
            <div class="input_field">
                <label for="male_suffix_name">Male Suffix Name</label>
                <input type="text" id="male_suffix_name" class="input" name="male_suffix_name">
            </div>
            <div class="input_field">
                <label for="male_address">Male Address</label>
                <input type="text" id="male_address" class="input" name="male_address">
            </div>
            <div class="input_field">
                <label for="male_birthday">Male Birthday</label>
                <input type="date" id="male_birthday" class="input" name="male_birthday">
            </div>
            <div class="input_field">
                <label for="male_marriage_license">Male Marriage License</label>
                <input type="file" id="male_marriage_license" class="input" name="male_marriage_license" required>
            </div>
            <div class="input_field">
                <label for="male_birth_certificate">Male Birth Certificate</label>
                <input type="file" id="male_birth_certificate" class="input" name="male_birth_certificate" required>
            </div>

            <!-- Additional Fields -->
            <div class="instructions">
                <p>Upload a Baptism Certificate to ensure one of you is IEMELIF.</p>
            </div>
            <div class="input_field">
                <label for="baptism_certificate">Baptism Certificate</label>
                <input type="file" id="baptism_certificate" class="input" name="baptism_certificate" required>
            </div>

            <div class="instructions">
                <p><b>Upload the screenshot of your reserve payment</b></p>
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

    <script src="js/marriageapp.js"></script>


</body>
</html>
