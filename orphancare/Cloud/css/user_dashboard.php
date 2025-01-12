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
</head>
<body>
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="#">User Dashboard</a>
                <li class="nav-item me-3">
                    <img src="https://via.placeholder.com/40" alt="Profile" class="profile-img rounded">
                </li>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item"><a class="nav-link" href="../index.php"><i class="fas fa-home"></i>Home</a></li>
                        <li class="nav-item"> <a class="nav-link" href="subscribe.php"><i class="fas fa-heart"></i>Donate</a></li>
                        <li class="nav-item"><a class="nav-link"><i class="fas fa-building"></i>Orphanages</a></li>
                        <li class="nav-item"><a class="nav-link" id="notificationButton"><i class="fas fa-bell"></i>Notification</a></li>
                        <li class="nav-item"> <a class="nav-link" id="moreButton"></i>More</a></li>
                        <li class="nav-item"> <button class=" nav-link logout-btn" id="logoutButton"> Logout</button></li>
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
            <a href="#" data-target="profileForm"><i class="fas fa-user-edit"></i>Edit Profile</a>
            <a href="#" data-target="orphangeForm"><i class="fas fa-sliders-h"></i>Settings</a>
            <a href="#" data-target="helpForm"><i class="fas fa-question-circle"></i>Help</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mt-4 main-page">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h3>Welcome, User!</h3>
            <p id="currentDate"></p>
        </div>

        
    <!-- Features -->
    <section class="features-section">
    <div class="features-grid">
        <div class="feature-item">
            <div class="icon">
                <i class="bi bi-heart"></i>
                <h3>Donate</h3>
            </div>
            <p  class="text-wrap text-justify">
            Your donations make a big difference! Support orphanages with money, food, clothes, and other items. 
            If unsure, contact us for guidance on where to help most.
            </p>
        </div>
        <div class="feature-item">
            <div class="icon">
                <i class="bi bi-building"></i>
                <h3>Orphanges</h3>
            </div>
            <p  class="text-wrap text-justify">
            Browse through different orphanages, choose one to support, or ask for help. You can donate money, food,
             clothes, and more to make a positive impact on children's lives.
            </p>
        </div>
        <div class="feature-item">
            <div class="icon">
                <i class="bi bi-sliders"></i>
                <h3>Features</h3>
            </div>
            <p  class="text-wrap text-justify">
            To update your profile and settings, click the "More" button at the top of navigation bar. 
            Here, you can adjust personal details and preferences for a better experience.
            </p>
        </div>
        <div class="feature-item">
            <div class="icon">
                <i class="bi bi-star"></i>
                <h3>RateUs</h3>
            </div>
            <p  class="text-wrap text-justify">
            We appreciate your feedback! Your ratings help us improve and add valuable content, ensuring we meet your needs.
             Thanks for contributing to our growth!
            </p>
        </div>
    </div>
</section>


        <!-- Profile Form -->
        <div class="content-section" id="profileForm">
            <h3>Edit Profile</h3>
            <form>
                <div class="mb-3">
                    <label for="profilePic" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" id="profilePic">
                </div>
                <div class="mb-3">
                    <label for="userName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="userName" placeholder="Edit Name">
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" class="form-control" id="contact" placeholder="Edit Contact">
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" placeholder="Edit Password">
                </div>
                <button type="submit" class="btn btn-primary w-100">Save</button>
            </form>
        </div>

        <!-- Donate Form -->
        <div class="content-section" id="donateForm">
            <h3>Donate</h3>
            <form>
                <div class="mb-3">
                    <label for="donorName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="donorName" placeholder="Your Name">
                </div>
                <div class="mb-3">
                    <label for="accountNumber" class="form-label">Account Number</label>
                    <input type="text" class="form-control" id="accountNumber" placeholder="Your Account Number">
                </div>
                <div class="mb-3">
                    <label for="donationAmount" class="form-label">Amount</label>
                    <input type="number" class="form-control" id="donationAmount" placeholder="Amount to Donate">
                </div>
                <div class="mb-3">
                    <label for="donationEmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="donationEmail" placeholder="Your Email">
                </div>
                <button type="submit" class="btn btn-primary w-100">Donate</button>
            </form>
        </div>

        <!-- Notifications Table -->
        <div class="content-section" id="notificationTable" style="display:none;">
            <h3>Notifications</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Message</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>New update available!</td>
                        <td>2024-12-28</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Your profile has been updated.</td>
                        <td>2024-12-28</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><br><br>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Orphanage Management System</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Notification Table
        document.getElementById("notificationButton").addEventListener("click", function () {
            var notificationTable = document.getElementById("notificationTable");
            notificationTable.style.display = notificationTable.style.display === "none" ? "block" : "none";
        });

        // Handle Logout
        document.getElementById("logoutButton").addEventListener("click", function () {
            window.location.href = "logout.php"; // Redirect to logout page
        });

        // Show the current date
        const dateElement = document.getElementById("currentDate");
        const currentDate = new Date().toLocaleDateString();
        dateElement.textContent = `Today's Date: ${currentDate}`;

        // Sidebar Toggle
        document.getElementById("toggleClose").addEventListener("click", function () {
            document.getElementById("sidebar").classList.remove("active");
        });

        document.getElementById("moreButton").addEventListener("click", function () {
            document.getElementById("sidebar").classList.add("active");
        });

        // Handle Content Form Switching
        const links = document.querySelectorAll('.sidebar .links a');
        links.forEach(link => {
            link.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const allForms = document.querySelectorAll('.content-section');
                allForms.forEach(form => form.style.display = 'none');
                document.getElementById(targetId).style.display = 'block';
                document.getElementById("sidebar").classList.remove("active");
            });
        });
    </script>
</body>
</html>
