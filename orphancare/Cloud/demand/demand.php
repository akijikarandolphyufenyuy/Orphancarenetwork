<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/partner.css">
    <title>Patnership Form - Orphancare</title>
    <style>
        .success-message {
            position: fixed;
            top: -100px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
            background-color:rgb(202, 252, 202);
            color: black;
            padding: 15px 30px;
            border-radius: 5px;
            display: none;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: top 0.5s ease-in-out; 
            width:50%;
        }
        .slide-down {
            top: 20%; 
        }
    </style>
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
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../about/about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../orphanages/ophange.php">Orphanages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../contact/contact.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="active nav-link" href="demand.php">Patnership</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../authentication/register.php">Sign Up</a>
            </li>
        </ul>
    </div>
</div>
    </nav>

    <div class="Title"><br><br>
        <h3>Orphanage Patnership Form</h3>
        <p><em>Please Fill Out The Form Below For Patnership</em></p>
    </div>
    <div class="container my-5">
        <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="orphanageName" class="form-label">Orphanage Name</label>
                    <input type="text" class="form-control" id="orphanageName" name="orphanageName" required>
                </div>
                <div class="mb-3">
                    <label for="managerName" class="form-label">Manager's Name</label>
                    <input type="text" class="form-control" id="managerName" name="managerName" required>
                </div>
                <div class="mb-3">
                    <label for="managerEmail" class="form-label">Manager's Email</label>
                    <input type="email" class="form-control" id="managerEmail" name="managerEmail" required>
                </div>
                <div class="mb-3">
                    <label for="managerContact" class="form-label">Manager's Contact</label>
                    <input type="tel" class="form-control" id="managerContact" name="managerContact" required>
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <div class="input-group">
                        <select class="form-select" id="countrySelect" name="country" required>
                        <option value="">Select Country</option>
                            <?php
                            $locations=array("Cameroon","Nigeria","Congo","United State","Ghana","Chad","Others");
                            foreach($locations as $location){
                                echo "<option value='$location'>$location</option>";
                            }
                            ?>
                            <option value="">Select Country</option>
                        </select>
                        <select class="form-select" id="regionSelect" name="region" required>
                            <option value="">Select Region</option>
                            <?php
                            $regions=array("Far North","North","Adamawa","Center","Litoral","South West","South","East","North West","Ibadan");
                            foreach($regions as $region)
                            {
                                echo "<option value='$region'>$region</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="vision" class="form-label">Vision</label>
                    <textarea class="form-control" id="vision" name="vision" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="numOrphans" class="form-label">Number of Orphans</label>
                    <input type="number" class="form-control" id="numOrphans" name="numOrphans" required>
                </div>
                <div class="mb-3">
                    <label for="certification" class="form-label">Certification (PDF Document)</label>
                    <input type="file" class="form-control" id="certification" name="certification" accept=".pdf" required>
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Orphanage Website (Optional)</label>
                    <input type="url" class="form-control" id="website" placeholder="http://www.ornaagewesite.com" name="website">
                </div> <br>
                <button type="submit" name="submit" class="w-100">Submit</button>
            </form>
        </div>
    </div><br><br>
       <div class="success-message" id="successMessage">
        Request successfully submitted!
    </div>
    <div class="success-message" id="followUpMessage">
        We will get back to you as soon as possible.
    </div>
    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $orphanageName = $_POST['orphanageName'];
        $managerName = $_POST['managerName'];
        $managerEmail = $_POST['managerEmail'];
        $managerContact = $_POST['managerContact'];
        $country = $_POST['country'];
        $region = $_POST['region'];
        $vision = $_POST['vision'];
        $numOrphans = $_POST['numOrphans'];
        $website = $_POST['website'];
        $certification = $_FILES['certification'];
        $allowedMimeTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        
        if (in_array($certification['type'], $allowedMimeTypes)) {
            $filePath = 'uploads/' . basename($certification['name']);
            if (move_uploaded_file($certification['tmp_name'], $filePath)) {
                $conn = new mysqli('localhost', 'root', '', 'orphancare');
                if ($conn->connect_error) {
                    die('Connection failed: ' . $conn->connect_error);
                }
                $stmt = $conn->prepare("INSERT INTO partnership (orphanageName, managersName,email,contact,location,vision, numberOrphans, website, certification,region) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param('ssssssssss', $orphanageName, $managerName, $managerEmail, $managerContact, $country, $vision, $numOrphans, $website, $filePath, $region);

                if ($stmt->execute()) {
                    echo "<script>
                        const successMessage = document.getElementById('successMessage');
                        successMessage.style.display = 'block';
                        successMessage.classList.add('slide-down');
                        setTimeout(() => {
                            successMessage.style.display = 'none';
                            const followUpMessage = document.getElementById('followUpMessage');
                            followUpMessage.style.display = 'block';
                        }, 3000);
                    </script>";
                }
                $stmt->close();
                $conn->close();
            } else {
                echo "<script>alert('File upload failed.');</script>";
            }
        } else {
            echo "<script>alert('Only PDF, Word files are allowed.');</script>";
        }
    }
    ?>
    <footer class="footer">
        <?php
        include("../inclusion/footer.html");
        ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
