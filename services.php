<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/navbar.css">
    <style>
        .service-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        h1{
            text-align: center;
            padding-bottom: 20px;
        }

        .service-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            width: 100%;
            height: 200px; /* Adjust height as needed */
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
            background-color: #fff;
        }
        .card-text {
            font-size: 1rem;
            margin-bottom: 20px;
            color: #666;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
    <?php 
    session_start();
    include 'navbar.php'; 
    ?>

    <div class="main-content">
        <div class="container">
            <h1>Our Services</h1>
            <div class="row">
                <!-- Marriage Appointment Card -->
                <div class="col-md-6 mb-4">
                    <div class="card service-card">
                        <img src="assets/img/marriage.png" class="card-img-top" alt="Marriage Appointment">
                        <div class="card-body text-center">
                            <p class="card-text">Schedule an appointment for marriage services.</p>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>

                <!-- Baptism Appointment Card -->
                <div class="col-md-6 mb-4">
                    <div class="card service-card">
                        <img src="assets/img/baptism .png" class="card-img-top" alt="Baptism Appointment">
                        <div class="card-body text-center">
                            <p class="card-text">Schedule an appointment for baptism services.</p>
                            <a href="#" class="btn btn-primary">Schedule Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Certificate Request Card -->
                <div class="col-md-6 mb-4">
                    <div class="card service-card">
                        <img src="assets/img/certificate.png" class="card-img-top" alt="Certificate Request">
                        <div class="card-body text-center">
                            <p class="card-text">Request a certificate for various sacraments.</p>
                            <a href="certificate_request.php" class="btn btn-primary">Request Now</a>
                        </div>
                    </div>
                </div>

                <!-- Membership Appointment Card -->
                <div class="col-md-6 mb-4">
                    <div class="card service-card">
                        <img src="assets/img/membership.png" class="card-img-top" alt="Membership Appointment">
                        <div class="card-body text-center">
                            <p class="card-text">Schedule an appointment for membership inquiries.</p>
                            <a href="#" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/navbar.js"></script>
</body>
</html>
