<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Database connection
$conn = new mysqli('localhost', 'root', '', 'orphancare');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$response = "";

function sendMail($email, $newPassword) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'akijikarandolphyufenyuy@gmail.com';
        $mail->Password = 'fqfa asee ltyp pqsw';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('no-reply@orphancare.com', 'OrphanCare Network');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = "Password Reset - OrphanCare Network";
        $mail->Body = "
            <html>
            <head>
                <title>Password Reset</title>
            </head>
            <body>
                <h2>Password Reset Successful</h2>
                <p>Your password has been reset. Use the new password below to log in:</p>
                <p><strong>$newPassword</strong></p>
                <p>Please change your password immediately after logging in for better security.</p>
            </body>
            </html>
        ";

        $mail->send();
        return "success";
    } catch (Exception $e) {
        return "Failed to send email. Error: {$mail->ErrorInfo}";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    
    // Check if email exists in the database
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Generate a new password
        $newPassword = substr(md5(time()), 0, 8);

        // Send the email
        $response = sendMail($email, $newPassword);

        if ($response == "success") {
            // Update the database with the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $updateQuery = "UPDATE users SET password = '$hashedPassword' WHERE email = '$email'";
            $conn->query($updateQuery);

            $response = "Email sent successfully. Please check your inbox.";
        }
    } else {
        $response = "User not found. Please check the email address.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/recover.css">
    <title>Password Recovery - OrphanCare Network</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">OrphanCare Network</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../about/about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="../orphanages/ophange.php">Orphanages</a></li>
                    <li class="nav-item"><a class="nav-link" href="../contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="../demand/demand.php">Patnership</a></li>
                    <li class="nav-item"><a class="nav-link" href="../authentication/login.php">Sign In</a></li>
                </ul>
            </div>
        </div>
    </nav><br><br>
    <div class="title">
        <h3 class="login-title">Recovery Form</h3>
        <p><em>Kindly Fill In Your Email Adress To Recover Your Password!</em></p>
    </div>

    <!-- Password Recovery Form -->
    <div class="form-container">
        <form class="form" action="" method="post" id="recovery-form">
            <!-- Email Input -->
            <div>
            <label>Email Address</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control"  id="email" name="email" placeholder="Enter a valid emial address" autocomplete="off" required>
            </div>
                <!-- Success Message -->
                <div class="success-message" id="success-message">
                    <i class="bi bi-check-circle"></i> A reset link will be sent to this email📧
                </div>
            </div><br>
            <!-- Submit Button -->
            <button type="submit" id="submit-btn">Send Reset Link</button>
            <br><br>
            <div class="text-center">
                <?php if (!empty($response)): ?>
                    <p class="<?= strpos($response, 'successfully') !== false ? 'text-success' : 'text-danger'; ?>">
                        <?= htmlspecialchars($response); ?>
                    </p>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <section class="footer">
        <footer>
            <p>&copy; 2024 OrphanCare Nwtwork. All Rights Reserved.</p>
        </footer>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        // Success message display logic
        const emailInput = document.getElementById('email');
        const successMessage = document.getElementById('success-message');
        const form = document.getElementById('recovery-form');

        emailInput.addEventListener('input', function () {
            const emailValue = emailInput.value;
            // Basic email validation regex
            const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

            if (emailRegex.test(emailValue)) {
                successMessage.style.display = 'block';
            } else {
                successMessage.style.display = 'none';
            }
        });
    </script>

</body>

</html>
