<!DOCTYPE html>
<html>
<head>
    <title>Add New Member</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Google Fonts for Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Apply Poppins font */
            background-color: #f4f4f9; /* Light background for better contrast */
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
            width: 60%;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .form-group label {
            font-weight: 600;
        }
        .btn-primary {
            background-color: #007BFF;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        h2 {
            text-align: center;
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #333333;
        }
    </style>
</head>
<body>

    <div class="container">
    <a href="member.php" class="btn btn-secondary back-button">Back</a>

        <h2>Add New Church Member</h2>
        <form>
            <div class="form-group">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" placeholder="Enter full name" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" required>
            </div>
            <div class="form-group">
                <label for="maritalStatus">Marital Status</label>
                <select class="form-control" id="maritalStatus">
                    <option>Single</option>
                    <option>Married</option>
                    <option>Divorced</option>
                    <option>Widowed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="spouse">Spouse (if applicable)</label>
                <input type="text" class="form-control" id="spouse" placeholder="Enter spouse name">
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Enter address" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" id="phone" placeholder="Enter phone number" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email address" required>
            </div>
            <div class="form-group">
                <label for="group">Group Affiliation</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="kabataan" value="Kabataan">
                    <label class="form-check-label" for="kabataan">Kabataan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="kababaihan" value="Kababaihan">
                    <label class="form-check-label" for="kababaihan">Kababaihan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="kalalakihan" value="Kalalakihan">
                    <label class="form-check-label" for="kalalakihan">Kalalakihan</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="bata" value="Bata">
                    <label class="form-check-label" for="bata">Bata</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
            <a href="index.html" class="btn btn-secondary btn-block">Back to Member List</a>
        </form>
    </div>

    <!-- Include Bootstrap and jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
