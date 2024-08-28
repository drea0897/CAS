<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

body {
    font-family: 'Poppins', sans-serif;
    background: #ececec;
    background-color: rgba(21,90,119,255);

}

.container {
    margin-top: 10px; 
    margin-bottom: 10px; 
}
.box-area {
    max-width: 700px;
}

.right-box {
    padding: 10px 30px 5px 40px;
}

/* Placeholder */
::placeholder {
    font-size: 16px;
}

/* Resize input boxes */
input.form-control-lg {
    width: 100%;
}

@media only screen and (max-width: 768px) {
    .box-area {
        margin: 0 10px;
    }
    .right-box {
        padding: 20px;
    }
}

    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="right-box col-md-12">
                <div class="row align-items-center">
                    <div class="header-text mb-4 text-center">
                        <h2>Register</h2>
                        <p>Welcome register first to login</p>
                    </div>
                    <form action="backend/process_registration.php" method="POST">
                        <div class="form-group mb-3 row">
                            <label for="profile_picture" class="col-sm-2 col-form-label">Picture</label>
                            <div class="col-sm-10">
                                <input type="file" name="profile_picture" id="picture" class="form-control form-control-lg bg-light fs-6" required>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" id="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <input type="text" name="lastname" id="lastname" class="form-control form-control-lg bg-light fs-6" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <input type="text" name="firstname" id="firstname" class="form-control form-control-lg bg-light fs-6" placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <input type="text" name="middlename" id="middlename" class="form-control form-control-lg bg-light fs-6" placeholder="Middle Name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                                    <label class="form-check-label" for="female">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                                    <label class="form-check-label" for="male">Male</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-4">
                                <input type="text" name="phone" id="phone" class="form-control form-control-lg bg-light fs-6" placeholder="Phone Number" required>
                            </div>
                            <label for="civilstatus" class="col-sm-2 col-form-label">Civil Status</label>
                            <div class="col-sm-4">
                                <select name="civilstatus" id="civilstatus" class="form-control form-control-lg bg-light fs-6" required>
                                    <option value="" disabled selected>Select Civil Status</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4 mb-3">
                                        <input type="text" name="region" id="region" class="form-control form-control-lg bg-light fs-6" placeholder="Region" required>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <input type="text" name="province" id="province" class="form-control form-control-lg bg-light fs-6" placeholder="Province" required>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <input type="text" name="municipality" id="municipality" class="form-control form-control-lg bg-light fs-6" placeholder="Municipality" required>
                                    </div>
                                    <div class="col-sm-4 mb-3">
                                        <input type="text" name="barangay" id="barangay" class="form-control form-control-lg bg-light fs-6" placeholder="Barangay" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 row">
                            <label for="religion" class="col-sm-2 col-form-label">Religion</label>
                            <div class="col-sm-10">
                                <input type="text" name="religion" id="religion" class="form-control form-control-lg bg-light fs-6" placeholder="Religion">
                            </div>
                        </div>
                        <div class="input-group mb-3 d-flex justify-content-center">
                            <button type="submit" class="btn btn-lg btn-primary fs-6">Register</button>
                        </div>
                    </form>
                    <div class="row text-center">
                        <small>Have an account? <a href="login.php">Login</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
