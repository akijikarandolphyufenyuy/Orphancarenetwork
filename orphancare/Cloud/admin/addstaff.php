<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registrationsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['user_name'];
    $pass = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
    $email = $_POST['user_email'];
    $sql = "INSERT INTO staffs (username, password,email) VALUES ('$user', '$pass','email')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
           alert ("Staff added");
        </script>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
