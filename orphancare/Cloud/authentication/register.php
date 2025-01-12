<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - OrphanCare Network</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/sign.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <style>
        #success-message, #error-message {
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            display: none;
            width: 50%;
            text-align: center;
        }
    </style>
    <script>
        function leng() {
            var len = document.getElementById('cpas').value;
            if (len.length >= 8 && len.length < 15) {
                return true;
            } else {
                document.getElementById('vert').innerHTML = "Password Length Must Be Greater Than 8";
                return false;
            }
        }

        function validate() {
            var password = document.getElementById('pas').value;
            var confirm_password = document.getElementById('cpas').value;

            if (password != confirm_password) {
                document.getElementById('vert').innerHTML = "Passwords not matched, please verify.";
                return false;
            }
            var termsAccepted = document.getElementById('terms').checked;
            if (!termsAccepted) {
                document.getElementById('vert').innerHTML = "You must agree to the terms and conditions.";
                return false;
            }

            return true;
        }
        function showSuccessMessage() {
            $('#success-message').slideDown('show'); 
            setTimeout(function() {
                window.location.href = "login.php"; 
            }, 3000); 
        }

        $(document).ready(function () {
            $('.navbar-toggler').on('click', function () {
                $('.navbar-collapse').collapse('toggle');
            });
        });
        function showSuccessMessage() {
    $('#success-message').slideDown('slow'); 
    setTimeout(function() {
        window.location.href = "login.php"; 
    }, 3000);
}
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">OrphanCare Network</a>
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
                    <li class="nav-item"><a class="active nav-link" href="register.php">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "orphancare";
     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }
     
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $location=$_POST['location'];

    $sql = "INSERT INTO users (username, password, email,location) VALUES ('$user', '$pass', '$email','$location')";
    if ($conn->query($sql) === TRUE) {
        echo '<div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">';
        echo 'Registration successful! Redirecting to login...';
        echo '</div>';
        echo "<script>showSuccessMessage();</script>";

    } else {
        echo '<div id="error-message" class="alert alert-danger alert-dismissible fade show" role="alert">';
                echo "Error: " . $sql . "<br>" . $conn->error;
                echo '</div>';
    }
}
?>    
    <div class="title">
        <h3 class="login-title">Registration Form</h3>
        <p><em>Create An Account With Us Today!</em></p>
    </div>
    <div class="form-container">
        <form class="form" action="" method="post" onsubmit="return validate()">
            <label>Username</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" name="username" placeholder="Enter a user name" autocomplete="off" required>
            </div>
            
            <label>Email</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Enter a valid email" autocomplete="off" required>
            </div>

            <label>Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="pas" name="password" placeholder="Min Password length < 8" autocomplete="new-password" required>
            </div>

            <label>Confirm Password</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="cpas" name="confirm_password" placeholder="Confirm Password" autocomplete="new-password" required>
            </div>

            <label>Location</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                <input type="text" class="form-control" name="location" placeholder="Enter your location" autocomplete="off" required>
            </div>
           <p id="vert" style="font-family:sans-serif;text-align:center;color:red"></p> 
            <div class="checkbox-container">
                <input type="checkbox" id="terms" name="terms">
                <p for="terms">I've read and agree to the <a href="../terms.php">terms and conditions</a>.</p>
            </div>
            <input type="submit" id="submit" name="submit" value="Register" onclick="return leng()" class="login-button">
            <p class="link">Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div><br><br>
    <footer class="footer">
        <?php include("../inclusion/footer.html"); ?>
    </footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



