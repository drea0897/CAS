<!DOCTYPE html>
<html>
<head>
    <title>Church Member Information</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Google Fonts for Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Apply Poppins font */
            background-color: #f4f4f9; /* Light background for better contrast */
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            font-size: 32px; /* Larger font size for header */
            font-weight: 600; /* Medium weight for Poppins */
            margin-top: 30px; /* More space above header */
            color: #333333; /* Darker color for header */
        }
        .table-container {
            margin: 30px auto; /* Center the table on the page */
            width: 90%; /* Table width */
        }
        .header-actions {
            width: 90%;
            margin: 20px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .search-bar {
            width: 60%; /* Adjust width as needed */
        }
        .add-member-button {
            background-color: #28a745; /* Green color for add button */
            color: white;
        }
        .group-btns-top {
            width: 90%;
            margin: 0 auto 20px auto; /* Center and add space below */
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap; /* Allow buttons to wrap on smaller screens */
        }
        .group-btns-top .btn {
            margin-right: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php include "adminnav.php" ?>
    <div class="main-content">
        <h1>Church Member Information</h1>

        <!-- Header actions for search and add new member -->
        <div class="header-actions">
            <div class="search-bar">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search members..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> Search</button>
                </form>
            </div>
            <button class="btn add-member-button" onclick="window.location.href='newmember.php'"><i class="fas fa-plus"></i> Add New Member</button>
        </div>

        <!-- Group buttons at the top -->
        <div class="group-btns-top">
            <button class="btn btn-info">Kabataan</button>
            <button class="btn btn-warning">Kababaihan</button>
            <button class="btn btn-primary">Kalalakihan</button>
            <button class="btn btn-secondary">Bata</button>
        </div>

        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Full Name</th>
                        <th>Date of Birth</th>
                        <th>Marital Status</th>
                        <th>Spouse</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>      
                        <th>Groups</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example row of data -->
                    <tr>
                        <td>John Michael Smith</td>
                        <td>January 15, 1985</td>
                        <td>Married</td>
                        <td>Mary Elizabeth Smith</td>
                        <td>123 Elm Street, Springfield, IL 62704</td>
                        <td>(123) 456-7890</td>
                        <td>johnsmith@example.com</td>
                        <td>Kababaihan</td>
                        <td>
                            <!-- Edit button triggers modal -->
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i> Edit</button>
                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                        </td>
                    </tr>
                    <!-- More rows can be added here -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Edit Member Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Member Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Edit form goes here -->
                    <form>
                        <div class="form-group">
                            <label for="editFullName">Full Name</label>
                            <input type="text" class="form-control" id="editFullName" value="John Michael Smith">
                        </div>
                        <div class="form-group">
                            <label for="editDob">Date of Birth</label>
                            <input type="date" class="form-control" id="editDob" value="1985-01-15">
                        </div>
                        <div class="form-group">
                            <label for="editMaritalStatus">Marital Status</label>
                            <select class="form-control" id="editMaritalStatus">
                                <option selected>Married</option>
                                <option>Single</option>
                                <option>Divorced</option>
                                <option>Widowed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editSpouse">Spouse</label>
                            <input type="text" class="form-control" id="editSpouse" value="Mary Elizabeth Smith">
                        </div>
                        <!-- Add more fields as necessary -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap and jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
