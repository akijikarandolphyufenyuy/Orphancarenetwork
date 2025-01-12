<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Orphancare Network</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/sign.css">
    <style type="text/css">
     
    </style>
</head>
<body>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "orphancare";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            $_SESSION['username'] = $user;
             // Handle "Keep me logged in"
            if (isset($_POST['keepLoggedIn'])) {
                setcookie("username", $user, time() + (86400 * 30), "/"); // 30 days
                setcookie("password", $row['password'], time() + (86400 * 30), "/");
            }
            header("Location:make.php");
            exit;
        } 
        else {
            $error_message = "Invalid credentials.";
        }
    } else {
         $error_message = "No user found.";
    }
}
?>
    <div class="error-message" id="error-message">
        <?php echo $error_message; ?>
    </div>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="#">Orphancare Network</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="../about/about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="../orphanages/ophange.php">Orphanages</a></li>
                <li class="nav-item"><a class="nav-link" href="../contact/contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="../demand/demand.php">Partnership</a></li>
                <li class="nav-item"><a class="active nav-link" href="login.php">Sign In</a></li>
            </ul>
        </div>
    </div>
</nav> <br><br>
        <div class="title">
            <h3 class="login-title">Login Form</h3>
            <p><em>We've Missed You!</em></p>
        </div>

    <!-- Login Form -->
    <div class="form-container">
        <form class="form" action="" method="post" name="login">
            <label for="username">Username</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" required>
            </div>

            <label for="password">Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="new-password" required>
            </div>

            <div class="form-check">
                <input type="checkbox" value="" id="keepLoggedIn" name="keepLoggedIn">
                <p for="keepLoggedIn"> Keep me logged in .</p>
            </div>

            <button type="submit" id="submit" class="btn btn-primary">Log In</button>
                <p class="link">Forget Password? <a href="forgot.php">Reset here</a></p>
        </form>
    </div> <br><br>
    <footer class="footer">
        <?php
        include("../inclusion/footer.html");
        ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    window.onload = function() {
        const errorMessage = document.getElementById("error-message");
        if (errorMessage.textContent.trim() !== "") {
            errorMessage.style.display = "block";
            setTimeout(() => {
                errorMessage.classList.add("fade-out");
            }, 3000);
        }
    }
</script>
</body>
</html>
