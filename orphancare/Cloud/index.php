<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orphanage Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <style>
    
        .carousel-caption {
            bottom: 12em ;
            background: none !important;
            padding: 0 !important;
            margin: 0 !important;
            color: white;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); 
            
        }

    
        .carousel-caption p{
            position: relative;
            font-size: 2.5em;
            font-weight: 600;
            color: White;
        }

      
        .carousel-caption h1 {
        font-family: 'Arial', sans-serif; 
        font-size: 4rem; 
        color: white; 
        font-weight: bold; 
        text-transform: uppercase; 
        letter-spacing: 2px; 
        transform: skewX(-15deg);
        text-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5), 
                    -5px -5px 15px rgba(255, 255, 255, 0.4), 
                    0px 0px 30px rgba(255, 165, 0, 0.7);
        z-index: 1;
        }

        .carousel-inner {
            width: 100%;
            height: 90vh; 
        }

        .carousel-item {
            height: 100%;
        }

        .carousel-item img {
            opacity: 0.6;
            object-fit: cover;
            height: 100%;
            width: 100%;
            transition: transform 0.5s ease;
        }
    </style>

</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <?php include ("inclusion/navbar.html"); ?>
    </nav>

    <!-- Hero Section: Carousel -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="images/orph7.jpg" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption">
                    <h1>Empowering Orphans</h1>
                    <p>Transforming Lives</p>
                    <a href="#services" class="btn text-white btn-lg btn-animate"  style="background-color:#2a6786;">Learn More</a>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="images/orph6.jpg" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption">
                    <h1>Join Us</h1>
                    <p>Making a Difference Worldwide</p>
                    <a href="#services" class="btn text-white btn-lg btn-animate"  style="background-color:#2a6786;">Learn More</a>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="images/orph5.jpg" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption">
                    <h1>Support Orphans</h1>
                    <p>Be the Change</p>
                    <a href="#services" class="btn btn-lg btn-animate text-white" style="background-color:#2a6786;">Learn More</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Description Section -->
    <section class="description">
        <div class="text">
            <h5>About Our System</h5>
            <p>Our website is designed to connect compassionate individuals with orphanages across the globe, creating an easy and transparent platform for making donations. We believe that every child deserves a chance at a better future, and we are committed to making it simple for people to support orphanages that are working to improve the lives of children in need. Through our platform, we aim to bridge the gap between generous donors and orphanages that require support.

We host a wide variety of orphanages from different regions, ensuring that there is something for every donor's interest. Our platform provides detailed information on each orphanage, such as its mission, specific needs, and location. This transparency allows users to make informed decisions when choosing which orphanages they want to support. Whether someone is interested in helping orphanages focused on education, healthcare, or providing basic necessities, our website offers a range of options to match various causes.

Making a donation through our website is a secure and straightforward process. 
            </p>
        </div><br>
        <img src="images/logo.jpeg" alt="System Logo">
    </section>

    <!-- Services Section -->
    <section id="services" class="services py-4">
        <div class="container">
            <h2 class="text-center mb-4" style="color:#2a6786; font-size:40px; font-weight:600">Our Services</h2><br>
            <div class="row g-4">
                <!-- Service Card 1 -->
                <div class="col-md-4">
                    <div class="card service-card">
                        <img src="images/education.jpeg" class="card-img-top" alt="Education">
                        <div class="card-body">
                            <h5 class="card-title">Education</h5>
                            <p class="card-text text-black">Providing quality education to orphans for a better future.</p>
                        </div>
                    </div>
                </div>
                <!-- Service Card 2 -->
                <div class="col-md-4">
                    <div class="card service-card">
                        <img src="images/health.jpg" class="card-img-top" alt="Healthcare">
                        <div class="card-body">
                            <h5 class="card-title">Healthcare</h5>
                            <p class="card-text text-black">Ensuring access to medical care for orphans.</p>
                        </div>
                    </div>
                </div>
                <!-- Service Card 3 -->
                <div class="col-md-4">
                    <div class="card service-card">
                        <img src="images/spornsorship.jpg" class="card-img-top" alt="Sponsorship">
                        <div class="card-body">
                            <h5 class="card-title">Sponsorship</h5>
                            <p class="card-text text-black">Connecting orphans with donors for financial support.</p>
                        </div>
                    </div>
                </div>
                <!-- Service Card 4 -->
                <div class="col-md-4">
                    <div class="card service-card">
                        <img src="images/shelter.jpg" class="card-img-top" alt="Shelter">
                        <div class="card-body">
                            <h5 class="card-title">Shelter</h5>
                            <p class="card-text text-black">Providing safe and secure housing for orphans in need.</p>
                        </div>
                    </div>
                </div>
                <!-- Service Card 5 -->
                <div class="col-md-4">
                    <div class="card service-card">
                        <img src="images/skill.jpg" class="card-img-top" alt="Skill Development">
                        <div class="card-body">
                            <h5 class="card-title ">Skill Development</h5>
                            <p class="card-text text-black">Empowering orphans with essential life skills.</p>
                        </div>
                    </div>
                </div>
                <!-- Service Card 6 -->
                <div class="col-md-4">
                    <div class="card service-card">
                        <img src="images/councelling.jpeg" class="card-img-top" alt="Counseling">
                        <div class="card-body">
                            <h5 class="card-title">Counseling</h5>
                            <p class="card-text text-black">Providing emotional support and guidance to children.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
<!-- FAQ Section -->
<section id="faq" class="faq">
    <div class="container">
        <h2>Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1. What is the purpose of this platform?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="faqOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Our platform acts as a centralized hub for orphanages, allowing them to create profiles, share information, and increase their visibility to a global audience. By hosting multiple orphanages, we aim to connect them with potential donors, volunteers, and partners, thereby enhancing their ability to gain support and provide better services to the children in their care.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        2. How can orphanages benefit from using this platform?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="faqTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Orphanages can significantly benefit by gaining wider visibility on our platform. They can showcase their various profiles, needs, and success stories, reaching a larger audience of donors, volunteers, and other stakeholders. Additionally, they can track donations, manage their programs, and collaborate with other organizations to enhance their operational efficiency and effectiveness.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faqTri">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTri" aria-expanded="false" aria-controls="collapseTri">
                        3. How do I donate to an orphanage on this platform?
                    </button>
                </h2>
                <div id="collapseTri" class="accordion-collapse collapse" aria-labelledby="faqTri" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        To donate, simply sign up for an account, browse the list of orphanages, and choose the one you wish to support. You can then select your preferred donation method, whether it's through a one-time donation or a recurring contribution. The process is simple, secure, and ensures that your donation reaches the orphanage directly.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faqFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        4. Can I support multiple orphanages at once?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="faqFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, you can support as many orphanages as you'd like. Our platform allows donors to explore various orphanages and contribute to multiple causes. You can choose to donate to specific projects or provide general support across different orphanages, helping to make a broader impact on the lives of children in need.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faqFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        5. Is it safe to donate through your platform?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="faqFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, our platform employs state-of-the-art security measures to ensure that your donations are processed safely. We use secure payment gateways and protect all user data with encryption. Your privacy and security are our top priorities, so you can confidently support orphanages knowing that your donation is handled with care and integrity.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><br>

    <!-- Footer -->
    <footer class="footer">
        <?php include ("inclusion/footer.html"); ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>