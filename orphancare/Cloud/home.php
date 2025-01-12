<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            overflow: hidden;
            background: #2a6786; 
        .welcome-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background:  #2a6786;
            border-radius: 15px; 
            box-shadow: 0 4px 8px #2a6786; 
            padding: 20px;
        }
        .welcome-text {
            color: white;
            font-size: 24px;
            text-align: center;
            max-width: 80%;
            margin-bottom: 20px;
        }
        .fade-in {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        .fade-in.show {
            opacity: 1;
        }
        .spinner {
            border: 8px solid rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            border-top: 8px solid rgb(12, 203, 203); /* Teal spinner */
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .spinner-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div class="welcome-text">
            <div class="fade-in">Welcome To Orphancare Network</div>
            <div class="fade-in">Where The Wellbeign Of Your Children Is Our Priority.</div>
            <div class="fade-in">Stay Tuned For An Amazing Experience.</div>
        </div>
        <div class="spinner-container">
            <div class="spinner"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const texts = document.querySelectorAll('.fade-in');
            let delay = 0;

            texts.forEach((text, index) => {
                setTimeout(() => {
                    text.classList.add('show');
                }, delay);
                delay += 1900; 
            });

            setTimeout(() => {
                localStorage.setItem('visitedWelcomePage', 'true');
                window.location.href = 'index.php';
            }, delay + 6600); 
        });
    </script>
</body>
</html>


