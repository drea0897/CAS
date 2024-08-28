<?php
// Include database connection
include 'db.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Function to generate a random password
function generatePassword($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomPassword = '';
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomPassword;
}

// Function to send email
function sendEmail($to, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'andreacaparas703@gmail.com';       // SMTP username
        $mail->Password = 'akkq beir pocw wdfa';              // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('andreacaparas703@gmail.com', 'Mailer');
        $mail->addAddress($to);                               // Add a recipient

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if (isset($_POST['user_id']) && isset($_POST['action'])) {
    $user_id = $_POST['user_id'];
    $action = $_POST['action'];

    if ($action == "approve") {
        // Generate a random password
        $newPassword = generatePassword();
        // Hash the password for storage
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update user status and password
        $sql = "UPDATE users SET status='approved', password='$hashedPassword' WHERE user_id=$user_id";
        if ($conn->query($sql) === TRUE) {
            // Fetch user email
            $emailResult = $conn->query("SELECT email FROM users WHERE user_id=$user_id");
            if ($emailResult->num_rows > 0) {
                $emailRow = $emailResult->fetch_assoc();
                $userEmail = $emailRow['email'];

                // Send email with new password
                $subject = "Account Approved and Password Generated";
                $message = "
                    <html>
                    <head>
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
                                padding: 10px 0;
                                text-align: center;
                                border-radius: 8px 8px 0 0;
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
                            }
                        </style>
                    </head>
                    <body>
                        <div class='container'>
                            <div class='header'>
                                <h2>Congratulations!</h2>
                            </div>
                            <div class='content'>
                                <p>Your account has been approved.</p>
                                <p>Your new password is: <span class='password'>$newPassword</span></p>
                                <p>We recommend that you change this password after logging in for the first time.</p>
                                <p>Thank you!</p>
                            </div>
                            <div class='footer'>
                                <p>Best regards,<br> The Team</p>
                            </div>
                        </div>
                    </body>
                    </html>
                ";
                if (sendEmail($userEmail, $subject, $message)) {
                    echo "User status updated and email sent successfully";
                } else {
                    echo "User status updated but email failed to send";
                }
            } else {
                echo "User status updated but email not found";
            }
        } else {
            echo "Error updating user status: " . $conn->error;
        }
    } elseif ($action == "decline") {
        $sql = "UPDATE users SET status='declined' WHERE user_id=$user_id";
        if ($conn->query($sql) === TRUE) {
            echo "User status updated successfully";
        } else {
            echo "Error updating user status: " . $conn->error;
        }
    }
}

$conn->close();
?>
