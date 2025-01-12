
<?php
// Include 
include("authentic.php");

if (!isset($_SESSION['password'])) {

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet"> <!-- Bootstrap Icons -->
    <title>Admin Dashboard - OrphanCare Network</title>
    </head>
<body>
    <!-- Start of php code -->
    <?php
        $conn = new mysqli("localhost","root","", "orphancare");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Queries to count total users, total staff, and total hospitals
        $totalUsersQuery = "SELECT COUNT(*) AS total_users FROM users";
        $totalStaffQuery = "SELECT COUNT(*) AS total_staff FROM staff";
        $totalHospitalsQuery = "SELECT COUNT(*) AS total_hospitals FROM orphanages";

        // Execute queries and handle errors
        $totalUsersResult = $conn->query($totalUsersQuery);
        $totalStaffResult = $conn->query($totalStaffQuery);
        $totalHospitalsResult = $conn->query($totalHospitalsQuery);

        if (!$totalUsersResult || !$totalStaffResult || !$totalHospitalsResult) {
            echo "Error: " . $conn->error;
            $totalUsers = $totalStaff = $totalHospitals = 0; // Set default values in case of error
        } else {
            $totalUsers = $totalUsersResult->fetch_assoc()['total_users'];
            $totalStaff = $totalStaffResult->fetch_assoc()['total_staff'];
            $totalHospitals = $totalHospitalsResult->fetch_assoc()['total_hospitals'];
        }

        // Query to get users for the manage users section
        $usersQuery = "SELECT id, username, email FROM users";
        $usersResult = $conn->query($usersQuery);

        if ($usersResult === false) {
            echo "Error: " . $conn->error; // Display error if query fails
            $usersResult = null; // Ensure $usersResult is not used if query failed
        }

        // Handle form submission for adding orphanages
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_hospital'])) {
            $name = $_POST['hospital_name'];
            $location = $_POST['hospital_location'];
            $codeNumber = $_POST['hospital_rating'];
            $website = $_POST['hospital_link'];
            $image = $_FILES['hospital_image']['tmp_name'];

            // Handle file upload
            $imageContent = file_get_contents($image);
            $imageContent = $conn->real_escape_string($imageContent);

            $insertQuery = "INSERT INTO orphanages (image, name, numberoforphans, website) VALUES ('$imageContent', '$name', '$codeNumber', '$website')";

            if ($conn->query($insertQuery) === TRUE) {
                echo "<script>alert('New orphanage added successfully!');</script>";
            } else {
                echo "Error: " . $conn->error;
            }
        }

        // Handle form submission for deleting an orphanage
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_hospital'])) {
            $hospitalIdToDelete = $_POST['hospital_id'];

            $deleteQuery = "DELETE FROM orphanages WHERE id = $hospitalIdToDelete";
            if ($conn->query($deleteQuery) === TRUE) {
                echo "<script>alert('Orphanage deleted successfully!');</script>";
            } else {
                echo "Error deleting orphanage: " . $conn->error;
            }
        }

        // Query to get orphanages for the manage orphanages section
        $hospitalsQuery = "SELECT id, name, image, numberoforphans FROM orphanages";
        $hospitalsResult = $conn->query($hospitalsQuery);

        if ($hospitalsResult === false) {
            echo "Error: " . $conn->error; // Display error if query fails
            $hospitalsResult = null; // Ensure $hospitalsResult is not used if query failed
        }
        ?>

    <div class="grid-container">
        <!-- header -->
            <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
            <span class="fa fa-bars"></span> <!-- Changed -->
        </div>
        <div class="header-left">
            <span class="fa fa-search"></span> <!-- Changed -->
        </div>
        <div class="header-right">
            <span class="fa fa-bell"></span> <!-- Changed -->
            <span class="fa fa-envelope"></span> <!-- Changed -->
            <span class="fa fa-sign-out-alt" id="logout">
                <a href="index.php">Logout</a>
            </span> <!-- Changed -->
        </div>

        <div class="menu-icon" onclick="toggleSidebar()">
  <span class="fa fa-bars"></span>
</div>

    </header>
        <!-- end header -->

        <!-- sidebar -->
        <aside id="sidebar">
        <div class="sidebar-title">
            <div class="sidebar-brand">
                <span>Admin's Panel</span>
            </div>
            <span class="fa fa-times" onclick="closeSidebar()"></span>
        </div>
        <ul class="sidebar-list">
            <li class="sidebar-list-item">
                <span class="fa fa-tachometer-alt"></span> <!-- Changed -->
                <a href="#ddashbaord">Dashboard</a>
            </li>
            <li class="sidebar-list-item">
                <span class="fa fa-users"></span> <!-- Changed -->
                <a href="#staffs">Staffs</a>
            </li>
            <li class="sidebar-list-item">
                <span class="fa fa-user"></span> <!-- Changed -->
                <a href="#users">Users</a>
            </li>
            <li class="sidebar-list-item">
                <span class="fa fa-hospital"></span> <!-- Changed -->
                <a href="#hospitals">Orphanges</a>
            </li>
            <li class="sidebar-list-item">
                <span class="fa fa-chart-bar"></span> <!-- Changed -->
                <a href="#statistics">Statistics</a>
            </li>
            <li class="sidebar-list-item">
                <span class="fa fa-cogs"></span> <!-- Changed -->
                <a href="#">Settings</a>
            </li>
        </ul>
    </aside>
        <!-- end sidebar -->

        <!-- main -->
            <main class="main-container" id="dashbaord">
                <h2>System Overview</h2>
                <div class="main-card">
                    <div class="stats">
                        <div class="stat">
                            <h3>Total Users</h3>
                            <p id="total-users"><?php echo $totalUsers; ?></p>
                        </div>
                        <div class="stat">
                            <h3>Total Orphanges</h3>
                            <p id="active-sessions"><?php echo $totalStaff; ?></p>
                        </div>
                        <div class="stat">
                            <h3>Total Transactions</h3>
                            <p id="reviews-count"><?php echo $totalHospitals; ?></p>
                        </div>
                    </div>
                </div>

            <!-- section for displaying user, staffs, and hospital form db -->
                <section id="users" class="manage_users">
                    <h2>Manage Users</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="user-list">
                                <?php
                                    if ($usersResult && $usersResult->num_rows > 0) {
                                        while ($user = $usersResult->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($user['id']) . "</td>";
                                            echo "<td>" . htmlspecialchars($user['username']) . "</td>";
                                            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                                            echo "<td>Active</td>";
                                            echo "<td>
                                                <button  style='background: rgba(0, 128, 0, 0.743);' onclick=\"editUser(" . htmlspecialchars($user['id']) . ")\">Edit</button>
                                                <button  style='background: rgba(255, 0, 0, 0.802);' onclick=\"deleteUser(" . htmlspecialchars($user['id']) . ")\">Delete</button>
                                            </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5'>No users found</td></tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                </section>

            <!-- Section to manage Hospitals -->
                <section id="hospitals" class="manage_hospitals">
                <h2>Manage Orphanges</h2>
                <!-- Hospitals Table -->
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="hospital-list">
                        <?php
                            if ($hospitalsResult && $hospitalsResult->num_rows > 0) {
                                while ($hospital = $hospitalsResult->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($hospital['id']) . "</td>";
                                    echo "<td>" . htmlspecialchars($hospital['name']) . "</td>";
                                    echo "<td>" . htmlspecialchars($hospital['numberoforphans']) . "</td>";
                                    echo "<td>
                                        <form action=\"\" method=\"post\" style=\"display:inline;\">\n
                                            <input type=\"hidden\" name=\"hospital_id\" value=\"" . htmlspecialchars($hospital['id']) . "\">\n
                                            <button style='background: rgba(0, 128, 0, 0.743);' type=\"submit\" name=\"edit_hospital\">Edit</button>\n
                                            <button style='background: rgba(255, 0, 0, 0.802);' type=\"submit\" name=\"delete_hospital\">Delete</button>\n
                                        </form>
                                    </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>No orphanages found</td></tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </section>

            <!-- Section for adding hospitals -->
                <section class="admin_add">
                    <div class="form">
                        <div class="form-row">
                            <div class="form-col">
                            <h3>Add An Orphange</h3>
                                <div>
                                    <form action="" method="post" enctype="multipart/form-data" class="form1">
                                        <label for="hospital_name">Orphange Name:</label>
                                        <input type="text" id="hospital_name" name="hospital_name" required> <br>

                                        <label for="hospital_location">Orphange Location:</label>
                                        <input type="text" id="hospital_location" name="hospital_location" required> <br>
                                        
                                        <label for="hospital_rating">Orphange Code Number:</label>
                                        <input type="number" id="hospital_rating" name="hospital_rating" required> <br>
                                        
                                        <label for="hospital_link">Orphange Website:</label>
                                        <input type="url" id="hospital_link" name="hospital_link" required> <br>
                                        
                                        <label for="hospital_image">Orphange Image:</label>
                                        <input type="file" id="hospital_image" name="hospital_image" accept="image/*" required> <br>
                                        
                                        <button type="submit" name="add_hospital">Add Orphange</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <!-- section for graphs and statictics! -->
                <section id="statistics" class="statistics">
                <h2>System Statistics</h2>
                    <div class="charts">
                        <div class="charts-cart">
                            <h3 class="chart-title">Top Hospitals By User's Review Ratings</h3>
                                <div class="bar-chart"></div>
                        </div>

                        <div class="charts-cart">
                            <h3 class="chart-title" >User Statistics Chart</h3>
                                <div class="bar-chart"></div>
                        </div>
                        
                    </div>

                </section>

            <!-- footer -->
            <section class="footer"> 
                <footer>
                    <div class="container">
                        <p id="foot">&copy; 2024 OrphanCare Network. All rights reserved.</p>
                    </div>
                </footer>
            </section>  
        </main>
    </div>

    <script>
let sidebarOpen = false;
const sidebar = document.getElementById("sidebar");
        function toggleSidebar() {
    if (!sidebarOpen) {
        sidebar.classList.add("sidebar-responsive");
        sidebarOpen = true;
    } else {
        sidebar.classList.remove("sidebar-responsive");
        sidebarOpen = false;
    }
}
</script>

<!-- Apex Chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>

<script>
// Example chart initialization for the statistics section
document.addEventListener("DOMContentLoaded", function () {
    var options = {
        series: [{
            name: 'Number of Orphanages',
            data: [10, 20, 15, 30, 25]
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['January', 'February', 'March', 'April', 'May']
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " Orphanages";
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector(".bar-chart"), options);
    chart.render();
});
</script>
