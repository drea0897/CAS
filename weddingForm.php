<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedding Reservation System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="css/wedding.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Step 1: Select Wedding Date</h3>
                <div id="calendar"></div>
                <div class="text-center mt-3">
            <button class="btn btn-primary" id="next-to-time-slot" style="display: none;">Next</button>
        </div>
            </div>
        </div>
        <div class="row mt-5" id="time-slot-section" style="display: none;">
            <div class="col-md-12">
                <h3 class="text-center">Step 2: Select Wedding Schedule</h3>
                <p class="text-center"><strong>Wedding Date</strong></p>
                <p id="selected-date" class="text-center">Select a date</p>
                <p class="text-center">Please select one of the available time slots</p>
                <div id="time-slots" class="list-group text-center">
                    <!-- Time slots will be populated here -->
                </div>
                <div class="text-center mt-3">
                    <button class="btn btn-secondary" id="back-to-calendar"><i class="fas fa-times"></i> Back</button>
                    <button class="btn btn-primary" id="next-to-bride-groom" style="display: none;">Next</button>
                </div>
            </div>
        </div>
        <div class="row mt-5" id="bride-groom-section" style="display: none;">
            <div class="col-md-12">
                <h3 class="text-center">Step 3: Marriage Appointment Form</h3>
                <p class="text-center">Please fill out the form below to schedule your marriage appointment. Ensure that you provide all necessary documents as indicated. All information you provide must be accurate and truthful. We will email you if there are problems.</p>
                <form id="appointment-form">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Female Information</h4>
                            <div class="form-group">
                                <label for="female-last-name">Last Name</label>
                                <input type="text" id="female-last-name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="female-first-name">First Name</label>
                                <input type="text" id="female-first-name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="female-middle-name">Middle Name</label>
                                <input type="text" id="female-middle-name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="female-marriage-license">Marriage License</label>
                                <input type="file" id="female-marriage-license" class="form-control-file" required>
                            </div>
                            <div class="form-group">
                                <label for="female-birth-certificate">Birth Certificate</label>
                                <input type="file" id="female-birth-certificate" class="form-control-file" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4>Male Information</h4>
                            <div class="form-group">
                                <label for="male-last-name">Last Name</label>
                                <input type="text" id="male-last-name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="male-first-name">First Name</label>
                                <input type="text" id="male-first-name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="male-middle-name">Middle Name</label>
                                <input type="text" id="male-middle-name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="male-marriage-license">Marriage License</label>
                                <input type="file" id="male-marriage-license" class="form-control-file" required>
                            </div>
                            <div class="form-group">
                                <label for="male-birth-certificate">Birth Certificate</label>
                                <input type="file" id="male-birth-certificate" class="form-control-file" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="payment">Upload the screenshot of your Reserve payment</label>
                        <input type="file" id="payment" class="form-control-file" required>
                    </div>
                    <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" id="agree" required>
                        <label class="form-check-label" for="agree">Agree to share information and other necessary details</label>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-secondary" id="back-to-time-slot"><i class="fas fa-times"></i> Back</button>
                        <button class="btn btn-primary" id="submit-appointment" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/wedding.js"></script>
</body>
</html>
