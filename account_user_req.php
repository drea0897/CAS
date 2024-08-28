
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="css/adnav.css">
    <link rel="stylesheet" href="css/admin_register.css">
</head>
<body>
    <?php include 'adminnav.php' ?>
<div class="main">
    
<div class="container">
        <h1>User List</h1>
        <table id="userTable">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Email</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- User data will be inserted here -->
            </tbody>
        </table>
    </div>

    <!-- Modal for displaying user details -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="userDetails"></div>
            <div class="modal-actions">
                <button id="approveButton">Approve</button>
                <button id="declineButton">Decline</button>
                <button id="backButton">Back</button>
            </div>
        </div>
    </div>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
   
    <script src="js/register.js"></script>
    <script src="js/adnav.js"></script>
</body>
</html>