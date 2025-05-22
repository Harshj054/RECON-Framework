<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Report</title>
    <style>
        :root {
            --green: #10B981;
            --white: #A1A1AA;
            --black: #09090B;
            --gray1: #27272A;
            --gray2: #18181B;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--gray2);
            color: var(--white);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .container {
            background-color: var(--gray1);
            border-radius: 8px;
            padding: 2rem;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }
        
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        h1 {
            color: var(--white);
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }
        
        .description {
            color: var(--white);
            font-size: 1rem;
            margin-bottom: 2rem;
        }
        
        .file-info {
            background-color: var(--gray2);
            border-radius: 6px;
            padding: 1.25rem;
            margin-bottom: 2rem;
        }
        
        .file-name {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            word-break: break-all;
        }
        
        .file-meta {
            display: flex;
            justify-content: space-between;
            font-size: 0.9rem;
            color: var(--white);
            opacity: 0.8;
        }
        
        .download-btn {
            background-color: var(--green);
            color: var(--black);
            border: none;
            border-radius: 6px;
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.2s, transform 0.1s;
        }
        
        .download-btn:hover {
            background-color: #0EA271;
            transform: translateY(-2px);
        }
        
        .download-btn:active {
            transform: translateY(0);
        }
        
        .status {
            margin-top: 1rem;
            text-align: center;
            font-size: 0.9rem;
        }
        
        .error {
            color: #EF4444;
            margin-top: 1rem;
            text-align: center;
            display: none;
        }
        
        .spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: var(--white);
            animation: spin 1s ease-in-out infinite;
            margin: 0 auto;
            margin-top: 1rem;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .footer {
            margin-top: 2rem;
            text-align: center;
            font-size: 0.8rem;
            color: var(--white);
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Download Report</h1>
            <p class="description">Your requested file is ready for download</p>
        </div>
        
        <div class="file-info">
            <div class="file-name" id="file-name">Loading file information...</div>
            <div class="file-meta">
                <span id="file-type">Document</span>
                <span id="file-size">-</span>
            </div>
        </div>
        
        <button class="download-btn" id="download-btn">
            Download File
        </button>
        
        <div class="spinner" id="spinner"></div>
        <div class="status" id="status"></div>
        <div class="error" id="error">An error occurred while preparing your download.</div>
        
        <div class="footer">
            &copy; 2025 Company Name. All rights reserved.
        </div>
    </div>
</body>
</html>