<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
        .heading {
            font-size: 1.5em;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            border: none;
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            text-decoration: none;
        }
        /* Modal styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            max-width: 400px;
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .button {
            background-color: #4caf50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading">Appointment Form</div>
        <form id="personal-info-form">
            <div class="form-group">
                <label for="date">Appointment Date:</label>
                <input type="text" id="date" name="date" readonly>
            </div>
            <div class="form-group">
                <label for="time">Time:</label>
                <input type="text" id="time" name="time" readonly>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="middlename">Middle Name:</label>
                <input type="text" id="middlename" name="middlename">
            </div>
            <div class="form-group">
                <label for="service">Appointment Type:</label>
                <select id="service" name="service" required>
                    <option value="" disabled selected>Select Appointment Type</option>
                    <option value="Baptism">Baptism Appointment</option>
                    <option value="Wedding">Wedding Appointment</option>
                    <option value="Membership">Membership Appointment</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <button type="submit" class="button">Confirm</button>
        </form>
        <a href="index.html" class="button">Go Back</a>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmationModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Confirmation</h2>
            <p>You are about to be redirected to the payment page.</p>
            <p>Amount to be paid: <span id="payment-amount">100.00</span> PHP</p>
            <button id="continueButton" class="button">Continue to Payment</button>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateElement = document.getElementById('date');
            const timeElement = document.getElementById('time');
            const form = document.getElementById('personal-info-form');
            const modal = document.getElementById('confirmationModal');
            const closeModal = document.getElementsByClassName('close')[0];
            const continueButton = document.getElementById('continueButton');

            // Retrieve the selected date and time from session storage
            const selectedDate = sessionStorage.getItem('selectedDate');
            const selectedTime = sessionStorage.getItem('selectedTime');

            if (selectedDate) {
                // Display the selected date in YYYY-MM-DD format
                dateElement.value = selectedDate;
            } else {
                dateElement.value = 'No date selected';
            }

            if (selectedTime) {
                // Display the selected time
                timeElement.value = selectedTime;
            } else {
                timeElement.value = 'No time selected';
            }

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                // Store form data in session storage
                sessionStorage.setItem('lastname', document.getElementById('lastname').value);
                sessionStorage.setItem('firstname', document.getElementById('firstname').value);
                sessionStorage.setItem('middlename', document.getElementById('middlename').value);
                sessionStorage.setItem('service', document.getElementById('service').value);
                sessionStorage.setItem('address', document.getElementById('address').value);
                sessionStorage.setItem('phone', document.getElementById('phone').value);

                // Show the confirmation modal
                modal.style.display = 'block';
            });

            // When the user clicks on <span> (x), close the modal
            closeModal.onclick = function() {
                modal.style.display = 'none';
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }

            // When the user clicks the continue button, redirect to the payment link
            continueButton.onclick = function() {
                const paymentLink = 'https://pm.link/org-WLxxi9W9vXcnUePHAGvNriW3/test/GXKDFEe';
                window.location.href = paymentLink;
            }
        });

        // Example of storing selected date from a calendar
        // This function should be called when a date is selected from the calendar
        function selectDate(date) {
            sessionStorage.setItem('selectedDate', date); // Store the selected date in session storage
            // You may also want to store the selected time similarly
        }
    </script>
</body>
</html>
