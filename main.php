
<?php 
$mainFolder = 'ops/target'; 
$items = array_diff(scandir($mainFolder), array('.', '..')); 
$hasFile = isset($_GET['file']); 
$dirName = $hasFile ? basename($_GET['file']) : ''; 
$dirPath = 'ops/target/' . $dirName; 
$zipFile = $dirName . '.zip'; 
$fileSizeDisplay = '-';  

if ($hasFile && is_dir($dirPath)) {     
    // Calculate total size for display     
    $totalSize = 0;     
    $files = new RecursiveIteratorIterator(         
        new RecursiveDirectoryIterator($dirPath),         
        RecursiveIteratorIterator::LEAVES_ONLY     
    );     
    foreach ($files as $file) {         
        if (!$file->isDir()) {             
            $totalSize += $file->getSize();         
        }     
    }     
    $fileSizeDisplay = round($totalSize / 1024, 2) . ' KB'; 
} 
?>

<?php
ob_start();  // Start output buffering
$hasFile = isset($_GET['file']);
$dirName = $hasFile ? basename($_GET['file']) : '';
$dirPath = 'ops/target/' . $dirName;
$zipFile = $dirName . '.zip';
$fileSizeDisplay = '-';
// Your other code here...
if ($hasFile && is_dir($dirPath) && isset($_POST['download'])) {
    $zip = new ZipArchive();
    if ($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dirPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );
        foreach ($files as $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($dirPath) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        if (file_exists($zipFile)) {
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . basename($zipFile) . '"');
            header('Content-Length: ' . filesize($zipFile));
            flush();
            readfile($zipFile);
            unlink($zipFile);
            exit;
        } else {
            echo "<script>document.getElementById('error_down').innerText = 'Failed to create zip file.'; document.getElementById('error_down').style.display = 'block';</script>";
        }
    } else {
        echo "<script>document.getElementById('error_down').innerText = 'Could not open zip archive.'; document.getElementById('error_down').style.display = 'block';</script>";
    }
}
ob_end_flush();  // Send buffered output
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recon Framework</title>
  <link rel="stylesheet" href="css/main_style.css">
  <link rel="stylesheet" href="css/tools_style.css">
  <link rel="stylesheet" href="css/overview_style.css">
  <link rel="stylesheet" href="css/downloads_style.css">
  <link rel="stylesheet" href="css/screenshorts_style.css">
  <style>
    .stats-grid-ov {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 20px;
      margin-bottom: 24px;
    }

    .stat-card-ov {
      background-color: #18181B;
      border-radius: 8px;
      padding: 20px;
    }

    .stat-title-ov {
      color: var(--text-muted);
      font-size: 14px;
      margin-bottom: 4px;
    }

    .stat-subtitle-ov {
      font-size: 12px;
      color: var(--text-muted);
      margin-bottom: 16px;
    }

    .stat-value-ov {
      font-size: 32px;
      font-weight: 600;
      color: var(--primary-color);
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="sidebar-header">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#10b981"
          stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path
            d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.5 3.8 17 5 19 5a1 1 0 0 1 1 1z">
          </path>
        </svg>
        <h1>ReconFramework</h1>
      </div>
      <nav class="nav">
        <a href="newscan.php" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="2" y1="12" x2="22" y2="12"></line>
            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
          </svg>
          <span>New Scan</span>
        </a>
        <a href="main.php" class="nav-link active">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
          </svg>
          <span>Dashboard</span>
        </a>
        <!-- <a href="#" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 2v6"></path>
            <path d="M15 2v6"></path>
            <path d="M12 14v3"></path>
            <path d="M9 18h6"></path>
            <path d="M4 10h16"></path>
            <path d="M18 21H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2Z"></path>
          </svg>
          <span>Network Scan</span>
        </a>
        
        <a href="#" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
          </svg>
          <span>OSINT</span>
        </a>
        <a href="#" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="12"></line>
            <line x1="12" y1="16" x2="12.01" y2="16"></line>
          </svg>
          <span>Vulnerabilities</span>
        </a> -->
        <a href="Information.php" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
            <line x1="3" y1="9" x2="21" y2="9"></line>
            <line x1="9" y1="21" x2="9" y2="9"></line>
          </svg>
          <span>INFORMATION</span>
        </a>
        <a href="Information.php" class="nav-link">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path
              d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z">
            </path>
            <circle cx="12" cy="12" r="3"></circle>
          </svg>
          <span>Settings</span>
        </a>
      </nav>
    </div>

    <!-- Main content -->
    <div class="main">
      <header class="header">
        <h2>Dashboard</h2>
        <div class="header-actions">
          <button class="btn btn-outline">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="4 17 10 11 4 5"></polyline>
              <line x1="12" y1="19" x2="20" y2="19"></line>
            </svg>
            Console
          </button>
          <button class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            New Scan
          </button>
        </div>
      </header>

      <div class="tabs">
        <div class="tabs-list">
          <button class="tab-trigger active" data-tab="overview">Overview</button>
          <button class="tab-trigger" data-tab="tools">Tools</button>
          <button class="tab-trigger" data-tab="results">Screenshorts</button>
          <button class="tab-trigger" data-tab="Download">Download</button>
        </div>

        <!-- Overview Tab -->
        <div class="tab-content active" id="overview">
          <div class="dashboard-content">
            <!-- Historical Scans (Moved to top) -->
            <div class="historical-scans">
              <h2 class="section-title">Historical Scans</h2>
              <p class="section-subtitle">Past reconnaissance operations</p>

              <div class="scans-list">
                <!-- Individual Scan Item -->
                <?php foreach ($items as $item): ?>
                <?php if (is_dir($mainFolder . '/' . $item)): ?>
                <div class="scan-item">
                  <div class="scan-left">
                    <div class="scan-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path
                          d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                        </path>
                      </svg>
                    </div>
                    <div>
                      <div class="scan-type">
                        <a class="file-link" style="text-decoration: none; color: white;"
                          href="?file=<?php echo urlencode($item); ?>">
                          <?php echo htmlspecialchars($item); ?>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="scan-right">
                    <!-- <div class="status-badge status-completed">Completed</div> -->
                    <!-- <div class="scan-time">10 min ago</div> -->
                  </div>
                </div>

                <?php endif; ?>
                <?php endforeach; ?>
                <!-- <div class="scan-item">
                  <div class="scan-left">
                    <div class="scan-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path
                          d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                        </path>
                      </svg>
                    </div>
                    <div>
                      <div class="scan-type">Domain Enumeration</div>
                      <div class="scan-target">example.com</div>
                    </div>
                  </div>
                  <div class="scan-right">
                    <div class="status-badge status-completed">Completed</div>
                    <div class="scan-time">10 min ago</div>
                  </div>
                </div> -->

                <!-- <div class="scan-item">
                  <div class="scan-left">
                    <div class="scan-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path
                          d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                        </path>
                      </svg>
                    </div>
                    <div>
                      <div class="scan-type">Subdomain Discovery</div>
                      <div class="scan-target">company.com</div>
                    </div>
                  </div>
                  <div class="scan-right">
                    <div class="status-badge status-completed">Completed</div>
                    <div class="scan-time">3 days ago</div>
                  </div>
                </div> -->
              </div>
            </div>

            <div class="stats-grid-ov">
              <div class="stat-card-ov">
                <h4 class="stat-title-ov">Active Scans</h4>
                <p class="stat-subtitle-ov">Currently running reconnaissance</p>
                <div class="stat-value-ov">2</div>
              </div>
              <div class="stat-card-ov">
                <h4 class="stat-title-ov">Discovered Assets</h4>
                <p class="stat-subtitle-ov">Total assets found</p>
                <div class="stat-value-ov">147</div>
              </div>
              <div class="stat-card-ov">
                <h4 class="stat-title-ov">Vulnerabilities</h4>
                <p class="stat-subtitle-ov">Potential security issues</p>
                <div class="stat-value-ov">12</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Tools Tab -->
        <div class="tab-content" id="tools">

          <!-- Tools Content -->
          <div class="tools-content">
            <div class="tools-grid">
              <!-- Nmap Scanner Tool -->
              <?php
        if (isset($_GET['file'])) {
            $selectedFolder = basename($_GET['file']); // prevent directory tricks
            $fullPath = $mainFolder . '/' . $selectedFolder;

            if (is_dir($fullPath)) {
                $subFiles = array_diff(scandir($fullPath), array('.', '..'));

                foreach ($subFiles as $subFile) {
                    $subFilePath = $fullPath . '/' . $subFile;

                    if (is_file($subFilePath) && pathinfo($subFilePath, PATHINFO_EXTENSION) === 'txt') {
                        $content = file_get_contents($subFilePath);
        ?>
              <div class="tool-card">
                <div class="tool-header">
                  <div class="tool-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                      stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                      <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                      <line x1="6" y1="6" x2="6.01" y2="6"></line>
                      <line x1="6" y1="18" x2="6.01" y2="18"></line>
                    </svg>
                  </div>
                  <div>
                    <h3 class="tool-title">
                      <?php echo htmlspecialchars($subFile); ?>
                    </h3>
                    <!-- <p class="tool-description">Network discovery and security auditing</p> -->
                  </div>
                </div>


                <div class="tool-output">
                  <div class="output-header">
                    <h4 class="output-title">Scan Results</h4>
                  </div>
                  <div class="output-content">
                    <div class="nmap-output">
                      <pre><?php echo htmlspecialchars($content); ?></pre>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                    }
                }
            } else {
                echo "<p style='color:red;'>Selected item is not a folder.</p>";
            }
          }
        ?>
            </div>
          </div>

        </div>

        <!-- Targets Tab -->
        <div class="tab-content" id="Download">
    <div class="down-cnt">
        <div class="header_down">
            <h1>Download Report</h1>
            <p class="description">
                <?php if ($hasFile && is_dir($dirPath)) {
                    echo 'Your requested file is ready for download';
                } else {
                    echo 'No valid file selected.';
                } ?>
            </p>
        </div>
        <?php if ($hasFile && is_dir($dirPath)) { ?>
        <div class="file-info_down">
            <div class="file-name_down" id="file-name_down">
                <?php echo htmlspecialchars($dirName); ?>.zip
            </div>
            <div class="file-meta_down">
                <span id="file-type">ZIP Archive</span>
                <span id="file-size">
                    <?php echo $fileSizeDisplay; ?>
                </span>
            </div>
        </div>
        <form method="post">
            <button class="download-btn" type="submit" name="download">Download File</button>
        </form>
        <div class="spinner_down" id="spinner_down"></div>
        <div class="status_down" id="status_down"></div>
        <div class="error_down" id="error_down"></div>
        <?php } ?>
        <div class="footer_down">
            &copy; 2025 Company Name. All rights reserved.
        </div>
    </div>
</div>



        <!-- Results Tab -->
        <div class="tab-content" id="results">

          <div class="card">
            <div class="card-header">
              <h2 class="card-title">Captured Screenshots</h2>
              <p class="card-subtitle">Visual reconnaissance results</p>
            </div>

            <div class="screenshots-container">


              <?php
    function showScreenshots($selectedFolder) {
        $screenshotsFolder = 'ops/target/' . $selectedFolder . '/screenshots';

        if (!is_dir($screenshotsFolder)) {
            echo "<p style='color:red;'>Screenshots folder does not exist for $selectedFolder.</p>";
            return;
        }

        $images = array_diff(scandir($screenshotsFolder), array('.', '..'));
        $imageTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (empty($images)) {
            echo "<p>No images found in screenshots folder.</p>";
            return;
        }

        
        // echo "<div class='image-container'>";

        foreach ($images as $img) {
            $imgPath = $screenshotsFolder . '/' . $img;
            $ext = strtolower(pathinfo($imgPath, PATHINFO_EXTENSION));

            if (is_file($imgPath) && in_array($ext, $imageTypes)) {
                $imgUrl = $imgPath; // Ensure this path is web-accessible 
                ?>
              <div class="screenshot-card">
                <div class="screenshot-img-container">
                  <!-- <img src="/api/placeholder/400/320" alt="placeholder" class="screenshot-img"> -->
                  <?php echo "<img src='$imgUrl' class='screenshot-img' alt='$img'>";?>
                </div>
                <div class="screenshot-info">
                  <div class="screenshot-name">admin-login-page.png</div>
                  <div class="screenshot-meta">
                    <div class="screenshot-target">example.com/admin</div>
                    <div class="screenshot-date">25 Apr 2025</div>
                  </div>
                </div>
                <div class="screenshot-actions">
                  <div class="badge badge-green">Login Page</div>
                  <button class="btn btn-sm">View Full</button>
                </div>
              </div>
              <?php
            }
        }

        // echo "</div>";
    }

    // Handle folder selection
    if (isset($_GET['file'])) {
        $selectedFolder = basename($_GET['file']); // sanitize
        $fullFolderPath = $mainFolder . '/' . $selectedFolder;

        if (is_dir($fullFolderPath)) {
            showScreenshots($selectedFolder);
        } else {
            echo "<p style='color:red;'>Selected item is not a folder or doesn't exist.</p>";
        }
    }
    ?>
            </div>

            <div class="pagination">
              <div class="page-btn">«</div>
              <div class="page-btn active">1</div>
              <div class="page-btn">2</div>
              <div class="page-btn">3</div>
              <div class="page-btn">»</div>
            </div>
          </div>
        </div>

        <script>
          // Simple tab functionality
          document.addEventListener('DOMContentLoaded', function () {
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

