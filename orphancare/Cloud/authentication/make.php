<?php
include("authentic.php");
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Connect to database
$conn = new mysqli('localhost', 'root', '', 'orphancare');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_SESSION['username'];

$profilePicError = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize user input
    $userName = $conn->real_escape_string($_POST['username']);
    $contact = $conn->real_escape_string($_POST['contact']);
    $password = !empty($_POST['password']) ? password_hash($conn->real_escape_string($_POST['password']), PASSWORD_BCRYPT) : null;

    // Handle file upload for profile picture
    $profilePic = null;
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $fileType = mime_content_type($_FILES['profile_pic']['tmp_name']);
        $fileSize = $_FILES['profile_pic']['size'];

        if (in_array($fileType, ['image/jpeg', 'image/png']) && $fileSize <= 5 * 1024 * 1024) { // Max 2MB
            $profilePic = addslashes(file_get_contents($_FILES['profile_pic']['tmp_name']));
        } else {
            $profilePicError = "Invalid file type or size. Only JPEG/PNG up to 2MB is allowed.";
        }
    }

    // Build the update query
    $query = "UPDATE users SET username='$userName', contact='$contact'";
    if ($password) {
        $query .= ", password='$password'";
    }
    if ($profilePic) {
        $query .= ", profile='$profilePic'";
    }
    $query .= " WHERE username='$username'";

    // Execute the query
    if ($conn->query($query) === TRUE) {
        // echo "<div class='alert alert-success'>Profile updated successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error updating profile: " . $conn->error . "</div>";
    }
}

// Retrieve user data again to display updated information
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

// Set default profile picture URL
$defaultProfilePic = 'https://www.w3schools.com/w3images/avatar2.png';
$profilePic = isset($user['profile']) && $user['profile'] 
    ? 'data:image/jpeg;base64,' . base64_encode($user['profile']) 
    : $defaultProfilePic;

// Fetch notifications from the users table
$notificationsQuery = "SELECT notifications, date FROM users WHERE notifications IS NOT NULL ORDER BY date DESC";
$notificationsResult = $conn->query($notificationsQuery);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - OrphanCare Network</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="user_dash.css">
    <style>
    .profile-img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #ddd;
        padding: 2px;
    }

    @media (max-width: 768px) {
        .profile-img {
            width: 60px;
            height: 60px;
        }
    }

    .foot {
        width: 100%;
        bottom: 0;
        left: 0;
        text-align: center;
        background-color:black;;
        padding: 10px 0;
        margin: 0;
        box-sizing: border-box;
    }
</style>


</head>
<body>
    <!-- (Same navigation and other sections) -->
      <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">User Dashboard</a>
            <li class="nav-item me-3">
                <img src="<?php echo htmlspecialchars($profilePic); ?>" alt="Profile" class="profile-img rounded">
            </li>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="../index.php"><i class="fas fa-home"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="subscribe.php"><i class="fas fa-heart"></i> Donate</a></li>
                    <li class="nav-item"><a class="nav-link" href="orphanages.html"><i class="fas fa-building"></i> Orphanages</a></li>
                    <li class="nav-item"><a class="nav-link" id="notificationButton"><i class="fas fa-bell"></i> Notification</a></li>
                    <li class="nav-item"><a class="nav-link" id="moreButton"><i class="fas fa-bars"></i> More</a></li>
                    <li class="nav-item"><button class="nav-link logout-btn" id="logoutButton"><a href="logout.php">Logout</a></button></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="toggle-btn" id="toggleClose"><i class="fas fa-times"></i></div>
        <h4 class="text-center mt-3">More Options</h4>
        <hr>
        <div class="links px-3">
            <a href="#" data-target="profileForm"><i class="fas fa-user-edit"></i> Edit Profile</a>
            <a href="#" data-target="orphangeForm"><i class="fas fa-sliders-h"></i> Settings</a>
            <a href="#" data-target="helpForm"><i class="fas fa-question-circle"></i> Help</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mt-4 main-page">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h3>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h3>
            <p id="currentDate"></p>
        </div>

        <!-- Features Section -->
        <section class="features-section">
            <div class="features-grid">
                <div class="feature-item">
                    <div class="icon"><i class="bi bi-heart"></i><h3>Donate</h3></div>
                    <p>Your donations make a big difference! Support orphanages with money, food, clothes, and more.</p>
                </div>
                <div class="feature-item">
                    <div class="icon"><i class="bi bi-building"></i><h3>Orphanages</h3></div>
                    <p>Browse through orphanages to support. Donate money, food, clothes, and more to make a positive impact.</p>
                </div>
                <div class="feature-item">
                    <div class="icon"><i class="bi bi-sliders"></i><h3>Features</h3></div>
                    <p>Update your profile and settings through the "More" button for a personalized experience.</p>
                </div>
                <div class="feature-item">
                    <div class="icon"><i class="bi bi-star"></i><h3>Rate Us</h3></div>
                    <p>We value your feedback! Your ratings help us improve and provide valuable services.</p>
                </div>
            </div>


        <!-- Profile Form -->
        <div class="content-section" id="profileForm" style="display: none;">
            <h3>Edit Profile</h3>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="profilePic" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" id="profilePic" name="profile_pic">
                    <!-- Display profile picture error message -->
                    <?php if ($profilePicError): ?>
                        <div class="alert alert-danger mt-2"><?php echo htmlspecialchars($profilePicError); ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="userName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="userName" name="username" placeholder="Edit Name" value="<?php echo htmlspecialchars($user['username']); ?>">
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Edit Contact" value="<?php echo htmlspecialchars($user['contact']); ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Edit Password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Save</button>
            </form>
        </div>

    <!-- Notifications Table -->
    <div class="content-section" id="notificationTable" style="display:none;">
    <h3>Notifications</h3>
    <table class="table table-striped">
        <thead>
            <tr><th>#</th><th>Message</th><th>Date</th></tr>
        </thead>
        <tbody>
            <?php if ($notificationsResult->num_rows > 0): ?>
                <?php $counter = 1; ?>
                <?php while ($row = $notificationsResult->fetch_assoc()): ?>
                    <?php if (!empty($row['notifications'])): ?>
                        <tr>
                            <td><?php echo $counter++; ?></td>
                            <td><?php echo htmlspecialchars($row['notifications']); ?></td>
                            <td><?php echo htmlspecialchars($row['date']); ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">No notifications available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</section>
<br><br>
<footer class="foot">
        <p>&copy; 2024 Orphanage Management System</p>
</footer>
     <!-- Scripts -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Notification Table
        document.getElementById("notificationButton").addEventListener("click", function () {
            const notificationTable = document.getElementById("notificationTable");
            notificationTable.style.display = notificationTable.style.display === "none" ? "block" : "none";
        });

        // Handle Logout
        document.getElementById("logoutButton").addEventListener("click", function () {
            window.location.href = "logout.php";
        });

        // Show the current date
        document.getElementById("currentDate").textContent = `Today's Date: ${new Date().toLocaleDateString()}`;

        // Sidebar Toggle
        document.getElementById("toggleClose").addEventListener("click", function () {
            document.getElementById("sidebar").classList.remove("active");
        });

        document.getElementById("moreButton").addEventListener("click", function () {
            document.getElementById("sidebar").classList.add("active");
        });

        // Content Switching
        document.querySelectorAll(".links a").forEach(link => {
            link.addEventListener("click", function () {
                const target = this.getAttribute("data-target");
                document.querySelectorAll(".content-section").forEach(section => {
                    section.style.display = "none";
                });
                if (target) {
                    document.getElementById(target).style.display = "block";
                }
                document.getElementById("sidebar").classList.remove("active");
            });
        });
    </script>
</body>
</html>
