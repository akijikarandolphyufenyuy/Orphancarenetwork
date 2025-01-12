<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate - OrphanCare Network</title>
    <link rel="stylesheet" href="../css/sub.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand" href="#">User Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="make.php"><i class="fas fa-home"></i>Dashboard</a></li>
                <li class="nav-item"><a class="active nav-link" href="subscribe.php"><i class="fas fa-heart"></i>Donate</a></li>
                <li class="nav-item"><a class="nav-link" href="orphanages.html"><i class="fas fa-building"></i>Orphanages</a></li>
                <li class="nav-item"><a class="nav-link" href="#notification"><i class="fas fa-bell"></i>Notifications</a></li>                   
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h3>Support A Child In Need of Help</h3>
        <p>Your support creates opportunities for a brighter future of a child. Together, we can bring hope to those who need it the most.</p>
    </div>
</section>

<!-- Support Section -->
<div class="container my-5">
    <h2 class="text-center text-bold">How You Can Help</h2>
    <p class="text-center">Your contribution—big or small—can change lives. Here's how you can make a difference:</p>
   <br>
    <div class="row text-center">
        <div class="col-md-6 mb-4">
            <button class="btn support-btn w-100 main" id="financeSupportBtn">Support With Finances</button>
        </div>
        <div class="col-md-6">
            <button class="btn support-btn w-100" id="otherSupportBtn">Support With Other Resources</button>
        </div>
    </div>
    <div id="financeForm" class="form-section d-none">
        <h3 class="text-center nand">Support With Finances</h3>
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your full name">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number">
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" class="form-control" id="amount" placeholder="Enter amount">
            </div>
            <div class="mb-3">
                <label for="paymentMethod" class="form-label">Payment Method</label>
                <div class="payment-icons">
                    <a href="target=blank"> <img src="../images/mom.jpeg" alt="MoMo"> </a>
                    <a href=""> <img src="../images/orange.jpeg" alt="Orange Money">  </a>
                   <a href=""> <img src="../images/paypal.jpeg" alt="PayPal"> </a> 
                </div>
            </div>
            <button type="submit" class=" submit w-100">Submit</button>
        </form>
    </div>

    <div id="otherSupportForm" class="form-section d-none">
        <h3 class="text-center nand">Support With Other Resources</h3>
        <form>
            <div class="mb-3">
                <label for="nameOther" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="nameOther" placeholder="Enter your full name">
            </div>
            <div class="mb-3">
                <label for="phoneOther" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phoneOther" placeholder="Enter your phone number">
            </div>
            <div class="mb-3">
                <label for="supportDetails" class="form-label">Details</label>
                <textarea class="form-control" id="supportDetails" rows="3" placeholder="Describe how you want to support"></textarea>
            </div>
            <button type="submit" class="submit w-100">Submit</button>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <?php include("../inclusion/footer.html"); ?>
</footer>

<script>
    document.getElementById('financeSupportBtn').addEventListener('click', function () {
        document.getElementById('financeForm').classList.remove('d-none');
        document.getElementById('otherSupportForm').classList.add('d-none');
    });

    document.getElementById('otherSupportBtn').addEventListener('click', function () {
        document.getElementById('otherSupportForm').classList.remove('d-none');
        document.getElementById('financeForm').classList.add('d-none');
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
