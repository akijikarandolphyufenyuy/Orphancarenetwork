<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/orphan.css">
    <style>
      .container-images {
    width: 90%;
    max-width: 1200px;
    margin: auto;
}

.hospital {
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.185);
    border-radius: 10px;
    margin: 15px;
    color: white;
    background: #2a6786;
    flex-basis: 30%;
    max-width: 320px; 
   
}
.hospital:hover{
    transform: scale(1.05);
  transition: 1s;
}
.hospital img {
    width: 100%;
    height: 320px;
    object-fit: cover;
    border-radius: 10px;
    padding: 15px 0;
}
.hospital-info {
    text-align: center;
    padding: 15px;
}

.row {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

@media (max-width: 768px) {
    .hospital {
        flex-basis: 45%; 
    }
}

@media (max-width: 576px) {
    .hospital {
        flex-basis: 100%; 
    }
}

 .row {
            display: flex;
            justify-content: center;
     flex-wrap: wrap;
 }
     #noResult {
            text-align: center;
            margin: 20px 0;
            display: none;
            color: red;
        }
    </style>
    <title>Orphanages - OrphanCare Network</title>
</head>
<body>
        <!-- Navigation Bar -->
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
                    <li class="nav-item"><a class="active nav-link" href="ophange.php">Orphanages</a></li>
                    <li class="nav-item"><a class="nav-link" href="../contact/contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="../demand/demand.php">Partnership</a></li>
                    <li class="nav-item"><a class="nav-link" href="../authentication/register.php">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container my-5">
        <h2 id="orphange-text" class="text-center">Popular Orphanages</h2>
        <p class="text-center"><em>Below Are The List Of Top Orphanages In Partner With Our Platform</em></p>

        <!-- Search Bar -->
        <div class="container my-4">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <input type="text" class="form-control" id="searchInput" placeholder="Search for an orphanage..." oninput="searchInput()">
                </div>
            </div>
        </div>

        <!-- Section for displaying orphanages -->
        <div id="noResult">No orphanages found.</div>
        <div class="container-images">
            <div class="row">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "orphancare";

                $conn = new mysqli($servername, $username, $password, $database);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM hospital";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="hospital col-md-4 mb-4">';
                        echo '<div class="hospital-image">';
                        echo '<img src="../images/orphane images/' . $row['image'] . '" alt="' . htmlspecialchars($row['name']) . '" class="img-fluid">';
                        echo '</div>';
                        echo '<div class="hospital-info">';
                        echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                        echo '<p>' . htmlspecialchars($row['address']) . '</p>';
                        echo '<p>Website: <a style="color:black !important" href="' . htmlspecialchars($row['website']) . '" target="_blank">' . htmlspecialchars($row['website']) . '</a></p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No hospitals found.</p>';
                }
                $conn->close();
                ?>
            </div>
        </div>
    </main>
     <!-- Footer -->
     <footer class="footer">
        <?php include("../inclusion/footer.html"); ?>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="search.js"></script>
    
</body>
</html>
