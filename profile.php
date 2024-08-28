<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .header {
            background-color: #007bff;
            height: 50px;
            margin-left: 250px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            width: calc(100% - 250px);
            top: 0;
            z-index: 1000;
        }

        .main-content {
            margin-top: 10px; /* Space for the fixed header */
            margin-left: 250px; /* Space for the sidebar */
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <p class="text-white mb-0">Iglesia Evangélica Metodista en las Islas Filipinas</p>
    </div>

    <?php 
    session_start();
    include 'navbar.php'; // Ensure this is positioned correctly relative to the header
    require 'backend/db.php';

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php'); // Redirect to login page if not logged in
        exit();
    }

    $user_id = $_SESSION['user_id'];

    // Fetch user profile information
    $stmt = $conn->prepare("SELECT first_name, middle_name, last_name, contact_number, civil_status FROM users WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($first_name, $middle_name, $last_name, $contact_number, $civil_status);
    $stmt->fetch();
    $stmt->close();
    ?>

    <div class="main-content">
        <div class="container mt-5">
            <div class="card" style="box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 10px;">
                <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #e0e0e0;">
                    <h3 style="margin: 0;">Edit Profile</h3>
                </div>
                <div class="card-body" style="padding: 20px;">
                    <form id="editProfileForm" action="backend/save_profile.php" method="post">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="middleName">Middle Name</label>
                            <input type="text" class="form-control" id="middleName" name="middle_name" value="<?php echo htmlspecialchars($middle_name); ?>" placeholder="Middle Name">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>" placeholder="Last Name" required>
                        </div>
                        <div class="form-group">
                            <label for="contactNumber">Contact Number</label>
                            <input type="text" class="form-control" id="contactNumber" name="contact_number" value="<?php echo htmlspecialchars($contact_number); ?>" placeholder="Contact Number" required>
                        </div>
                        <div class="form-group">
                            <label for="civilStatus">Civil Status</label>
                            <select class="form-control" id="civilStatus" name="civil_status" required>
                                <option value="" disabled>Select Civil Status</option>
                                <option value="Single" <?php echo $civil_status == 'Single' ? 'selected' : ''; ?>>Single</option>
                                <option value="Married" <?php echo $civil_status == 'Married' ? 'selected' : ''; ?>>Married</option>
                                <option value="Divorced" <?php echo $civil_status == 'Divorced' ? 'selected' : ''; ?>>Divorced</option>
                                <option value="Widowed" <?php echo $civil_status == 'Widowed' ? 'selected' : ''; ?>>Widowed</option>
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="button" class="btn btn-primary" onclick="showConfirmationModal()">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="width: 90%; max-width: 500px;">
                <div class="modal-header" style="background-color: #007bff; color: white;">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Update</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to update your profile?
                </div>
                <div class="modal-footer" style="border-top: 1px solid #e0e0e0;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Yes, Update</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/navbar.js">
    </script>
</body>
</html>
