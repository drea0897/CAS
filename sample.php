<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 600px;
            border-radius: 8px;
        }
        .header {
            background-color: #0084A8;
            color: #ffffff;
            padding: 10px;
            text-align: center;
            border-radius: 8px 8px 0 0;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
        .header img {
            height: 50px;
            width: 50px;
            margin-right: 10px;
        }
        .header p {
            margin: 0;
            font-size: 14px;
        }
        .content {
            padding: 20px;
        }
        .content p {
            font-size: 16px;
            line-height: 1.5;
            color: #333333;
        }
        .password {
            font-size: 18px;
            font-weight: bold;
            color: #0084A8;
        }
        .footer {
            text-align: center;
            padding: 10px 0;
            background-color: #f4f4f4;
            border-radius: 0 0 8px 8px;
            background-color: #0084A8;
            ;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="assets/logo.png" alt="logo">
            <p>Iglesia Evangélica Metodista en las Islas Filipinas</p>
        </div>
        <div class="content">
            <h4>Account Registration Notification</h4>
            <p>Your account has been approved.</p>
            <p>Thank you for registering for a Church Account. Below is your email registration password</p>
            <p>Your new password is: <span class="password">$newPassword</span></p>
            <p>We recommend that you change this password after logging in for the first time.</p>
            <p>Thank you!</p>
        </div>
        <div class="footer">
            <p></p>
        </div>
    </div>
</body>
</html>
