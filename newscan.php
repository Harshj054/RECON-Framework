<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recon Framework</title>
  <link rel="stylesheet" href="css/main_style.css">
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
        #myDiv {
  display: none; /* hidden at the start */
  /* background-color: lightblue; */
  padding: 10px;
}
    </style>
</head>
<body>
<div id="myDiv">
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
</div>
  <div class="container" id="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="sidebar-header">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.5 3.8 17 5 19 5a1 1 0 0 1 1 1z"></path>
        </svg>
        <h1>ReconFramework</h1>
      </div>
      <nav class="nav">
      <a href="newscan.php" class="nav-link active">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="2" y1="12" x2="22" y2="12"></line>
            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
          </svg>
          <span>New Scan</span>
      </a>
        <a href="main.php" class="nav-link ">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
          </svg>
          <span>Dashboard</span>
        </a>
        <a href="Information.php" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
            <line x1="3" y1="9" x2="21" y2="9"></line>
            <line x1="9" y1="21" x2="9" y2="9"></line>
          </svg>
          <span>INFORMATION</span>
        </a>
        <a href="#" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
            <circle cx="12" cy="12" r="3"></circle>
          </svg>
          <span>Settings</span>
        </a>
      </nav>
    </div>
    <div class="main">
      <header class="header">
        <h2>New Scan</h2>
        <div class="header-actions">
          <button class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            New Scan
          </button>
        </div>
      </header>

   
    <!-- Main content -->
    <div class="main">
    <div class="scan-container">
            <!-- <form id="scanForm"> -->
            <form id="scanForm" method="POST" onsubmit="toggleDiv()" action="ops/insert_scan.php">

            <div class="form-group">
                    <label for="scan-name">Scan Name</label>
                    <input type="text" id="scan-name" name="scan_name" placeholder="Enter a name for this scan" required="">
                </div>

                <div id="manual-input-section">
                    <div class="form-group">
                        <label for="domains">Target Domains</label>
                        <textarea id="domains" name="domains" placeholder="Enter domains (one per line or comma-separated)
    Example: example.com, subdomain.example.org"></textarea>
                        <div class="help-text">Enter one or multiple target domains. Separate multiple domains with new
                            lines.</div>
                    </div>


                </div>

                <div class="form-group">
                    <label>Scan Depth</label>
                    <div class="scan-options">
                        <div class="option-card">
                            <div class="option-card-header">
                                <div class="option-card-title">Light scan</div>
                                <input type="radio" name="scan-option" class="option-card-checkbox" checked="">
                            </div>
                            <div class="option-card-desc">Quick scan, low footprint</div>
                        </div>

                        <div class="option-card">
                            <div class="option-card-header">
                                <div class="option-card-title">Medium scan</div>
                                <input type="radio" name="scan-option" class="option-card-checkbox">
                            </div>
                            <div class="option-card-desc">Balanced approach</div>
                        </div>

                        <div class="option-card">
                            <div class="option-card-header">
                                <div class="option-card-title">Deep scan</div>
                                <input type="radio" name="scan-option" class="option-card-checkbox">
                            </div>
                            <div class="option-card-desc">Thorough scan, higher footprint</div>
                        </div>
                    </div>
                </div>

                <div class="action-buttons">
                    <button type="button" class="btn btn-secondary" onclick="location.href='index.php'">Cancel</button>
                    <button type="submit" id="submitButton"  class="btn btn-primary">Start Scan</button>
                    
                    
                </div>
            </form>
        </div>
    </div>

    
<script>
function toggleDiv() {
    document.getElementById('submitButton').style.display = 'none';
  const div = document.getElementById('myDiv');
    div.style.display = 'block'; // show

    const container = document.getElementById('container');
container.style.display = 'none';
 
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

}

</script>
  <script>
    // Simple tab functionality
    document.addEventListener('DOMContentLoaded', function() {
      const tabTriggers = document.querySelectorAll('.tab-trigger');
      const tabContents = document.querySelectorAll('.tab-content');
      
      tabTriggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
          // Remove active class from all triggers and contents
          tabTriggers.forEach(t => t.classList.remove('active'));
          tabContents.forEach(c => c.classList.remove('active'));
          
          // Add active class to clicked trigger and corresponding content
          trigger.classList.add('active');
          const tabId = trigger.getAttribute('data-tab');
          document.getElementById(tabId).classList.add('active');
        });
      });
    });
  </script>
</body>
</html>