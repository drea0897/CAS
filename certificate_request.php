<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marriage Appointment</title>
    <link rel="stylesheet" href="css/form.css">
    <style>
        body{
            background-color: rgba(21, 90, 119, 1);
        }
        /* Modal Background */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
            padding-top: 100px;
        }

        /* Modal Content */
        .modal-content {
            background-color: #fff;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px; /* Max width of modal */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow for better depth */
        }

        /* Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Modal Header */
        .modal-header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .modal-header h2 {
            margin: 0;
        }

        /* Modal Body */
        .modal-body {
            margin-bottom: 15px;
        }

        /* Modal Footer */
        .modal-footer {
            text-align: right;
        }

        .modal-footer button {
            background-color: #4CAF50; /* Green background */
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        .modal-footer button.cancel {
            background-color: #f44336; /* Red background */
        }
    </style>
    <script>
        // Function to show the confirmation modal
        function showConfirmationModal(event) {
            event.preventDefault(); // Prevent form submission
            document.getElementById('confirmationModal').style.display = 'block';
            return false;
        }

        // Function to show the success modal
        function showSuccessModal() {
            document.getElementById('successModal').style.display = 'block';
        }

        // Function to close the modal
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Function to handle form submission
        function handleFormSubmission(event) {
            showSuccessModal();
            setTimeout(function() {
                document.getElementById('successModal').style.display = 'none';
                document.getElementById('confirmationModal').style.display = 'none';
                document.querySelector('form').submit();
            }, 2000); // Adjust time as needed
        }
    </script>
</head>

<body>

    <div class="wrapper">
        <div class="title">
            Certificate Request Form
        </div>

        <div class="instructions">
            <p>Please fill out the form below to schedule your marriage appointment. Ensure that you provide all necessary documents as indicated. All information you provide must be accurate and truthful.</p>
        </div>

        <form action="backend/certificate_process.php" method="POST" onsubmit="return showConfirmationModal(event);">
            <div class="form">

                <div class="input_field">
                    <label>Certificate Request type</label>
                    <div class="custom_select">
                        <select name="request_type" id="">
                            <option value="">Select Request Type</option>
                            <option value="original">Marriage Certificate</option>
                            <option value="photocopy">Baptism Certificate</option>
                        </select>
                    </div>
                </div>

                <div class="input_field">
                    <label>Last Name </label>
                    <input type="text" name="last_name" class="input" required>
                </div>
                <div class="input_field">
                    <label>First Name </label>
                    <input type="text" name="first_name" class="input" required>
                </div>
                <div class="input_field">
                    <label>Middle Name </label>
                    <input type="text" name="middle_name" class="input" required>
                </div>
                <div class="input_field">
                    <label>Suffix Name </label>
                    <input type="text" name="suffix_name" class="input">
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

            </div>
        </form>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeModal('confirmationModal')">&times;</span>
                <h2>Confirm Submission</h2>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to submit the form?</p>
            </div>
            <div class="modal-footer">
                <button onclick="handleFormSubmission(event)">Yes</button>
                <button class="cancel" onclick="closeModal('confirmationModal')">No</button>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <span class="close" onclick="closeModal('successModal')">&times;</span>
                <h2>Success</h2>
            </div>
            <div class="modal-body">
                <p>Form submitted successfully!</p>
            </div>
            <div class="modal-footer">
                <button onclick="closeModal('successModal')">OK</button>
            </div>
        </div>
    </div>

</body>
</html>
