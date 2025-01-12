<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - OrphanCare Network</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/cont.css">
</head>
<body>

<!-- Navigation Bar -->
<nav class="    navbar navbar-expand-lg navbar-light bg-white">
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
                <li class="nav-item"><a class="active nav-link" href="contact.php">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="../demand/demand.php">Patnership</a></li>
                <li class="nav-item"><a class="nav-link" href="../authentication/register.php">Sign Up</a></li>
            </ul>
        </div>
    </div>
</nav>  <br><br>

<!-- Main Section -->
<section id="main">
    <div class="main-content">
        <h3 class="text-center">Contact OrphanCare</h3>
        <p><em>Welcome To OrphanCare Network</em></p> <br>
        
        <div class="form">
            <div class="form-row">
                <div class="form-col">
                    <div>
                        <i class="fa fa-hospital-o" aria-hidden="true"></i>
                        <span>
                            <h4>OrphanCare Network</h4>
                            <p>Buea, South-West, CMR</p>
                        </span>
                    </div>
                    <div>
                        <i class="fa fa-phone-square" aria-hidden="true"></i>
                        <span>
                            <h4>+ (237) 012-345-678</h4>
                            <p>Open Always, For Support Services</p>
                        </span>
                    </div>
                    <div>
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>
                            <h4>orphancare@gmail.com</h4>
                            <p>Email Us Directly</p>
                        </span>
                    </div>
                </div>
                <div class="form-col">
                    <form action="https://api.web3forms.com/submit" method="post">
                        <input type="hidden" name="access_key" value="b7141668-e278-4d75-bc8f-e1fd6b89ee5d">
                        <input type="text" name="name" placeholder="username" required autocomplete="off" >
                        <input type="email" name="email" placeholder="useremail" required autocomplete="off">
                        <input type="text" name="location" placeholder="current location" autocomplete="off" required>
                        <textarea name="message" placeholder="Hello URI!" cols="20" rows="4" autocomplete="off" required></textarea>
                        <button type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Google Map Section -->
<section class="google-map">
    <h1 class="text-center">Find OrphanCare Network</h1>
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2359.6478382991825!2d10.159114!3d5.963025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10c1c67e3a2bfe3b%3A0xd90bc99ae758b3c2!2sBuea%2C%20South%20West%20Region%20Cameroon!5e0!3m2!1sen!2sng!4v1697248873510!5m2!1sen!2sng"
            frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0">
        </iframe>
    </div>
</section>
<br><br><br>
<!-- Footer -->
<footer class="footer">
    <?php include("../inclusion/footer.html"); ?>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
