<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Screen</title>
    <style>
        :root {
            --green: #10B981;
            --white: #A1A1AA;
            --black: #09090B;
            --gray1: #27272A;
            --gray2: #18181B;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #09090B;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: var(--white);
            overflow: hidden;
        }

        .loading-container {
            text-align: center;
            position: relative;
        }

        .loading-text {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            font-weight: 700;
        }

        .loading-spinner {
            width: 100px;
            height: 100px;
            border: 5px solid var(--gray1);
            border-radius: 50%;
            border-top: 5px solid var(--green);
            animation: spin 1.5s linear infinite;
            margin: 0 auto 2rem;
        }

        .loading-progress {
            width: 300px;
            height: 6px;
            background-color: var(--gray1);
            border-radius: 10px;
            overflow: hidden;
            margin: 0 auto;
        }

        .progress-bar {
            height: 100%;
            width: 0%;
            background-color: var(--green);
            border-radius: 10px;
            animation: progress 3s ease-in-out infinite;
        }

        .loading-status {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: var(--white);
            opacity: 0.8;
        }

        .floating-dots {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            overflow: hidden;
            z-index: -1;
        }

        .dot {
            position: absolute;
            background-color: var(--green);
            border-radius: 50%;
            opacity: 0.2;
            animation: float 10s infinite linear;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes progress {
            0% { width: 0%; }
            50% { width: 75%; }
            80% { width: 90%; }
            100% { width: 98%; }
        }

        @keyframes float {
            0% { transform: translateY(0) translateX(0); }
            25% { transform: translateY(-20px) translateX(10px); }
            50% { transform: translateY(-10px) translateX(20px); }
            75% { transform: translateY(10px) translateX(5px); }
            100% { transform: translateY(0) translateX(0); }
        }

        /* Create some dynamic dots in the background */
        .dot:nth-child(1) {
            width: 20px;
            height: 20px;
            top: 10%;
            left: 20%;
            animation-delay: 0s;
            animation-duration: 15s;
        }
        
        .dot:nth-child(2) {
            width: 30px;
            height: 30px;
            top: 20%;
            left: 80%;
            animation-delay: 2s;
            animation-duration: 18s;
        }
        
        .dot:nth-child(3) {
            width: 15px;
            height: 15px;
            top: 60%;
            left: 10%;
            animation-delay: 1s;
            animation-duration: 12s;
        }
        
        .dot:nth-child(4) {
            width: 25px;
            height: 25px;
            top: 70%;
            left: 70%;
            animation-delay: 3s;
            animation-duration: 20s;
        }
        
        .dot:nth-child(5) {
            width: 10px;
            height: 10px;
            top: 40%;
            left: 50%;
            animation-delay: 0.5s;
            animation-duration: 10s;
        }
    </style>
</head>
<body>
    <div class="loading-container">
        <div class="floating-dots">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
        <h1 class="loading-text">Scanning</h1>
        <div class="loading-spinner"></div>
        <div class="loading-progress">
            <div class="progress-bar"></div>
        </div>
        <div class="loading-status">Please wait while we running the scan...</div>
    </div>

    <script>
const loadingTexts = [
    "Loading resources...",
    "Preparing your experience...",
    "Almost there...",
    "Just a moment...",
    "Setting things up..."
];

const statusElement = document.querySelector('.loading-status');
let currentIndex = 0;

setInterval(() => {
    currentIndex = (currentIndex + 1) % loadingTexts.length;
    statusElement.textContent = loadingTexts[currentIndex];
}, 3000);

// Check if file exists every 3 seconds
const checkInterval = setInterval(() => {
    fetch('check_file.php')
    .then(response => response.text())
    .then(data => {
        if (data.trim() === 'yes') {
            // Hide loader
            document.querySelector('.loading-container').style.display = 'none';
            
            // Optional: show success message
            const successMessage = document.createElement('div');
            successMessage.textContent = '✅ Scan completed!';
            successMessage.style.fontSize = '1.5rem';
            successMessage.style.color = '#10B981';
            successMessage.style.textAlign = 'center';
            document.body.appendChild(successMessage);
            
            clearInterval(checkInterval); // Stop checking

            // Redirect after short delay (e.g., 2 seconds)
            setTimeout(() => {
                window.location.href = 'main.php';
            }, 2000);
        }
    });
}, 3000);

</script>

</body>
</html>