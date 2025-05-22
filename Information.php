<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recon Framework</title>
  <link rel="stylesheet" href="css/main_style.css">
  <link rel="stylesheet" href="css/information_style.css">
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
        <a href="newscan.php" class="nav-link ">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="2" y1="12" x2="22" y2="12"></line>
            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
          </svg>
          <span>New Scan</span>
        </a>
        <a href="main.php" class="nav-link ">
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
        <a href="Information.php" class="nav-link active">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
            <line x1="3" y1="9" x2="21" y2="9"></line>
            <line x1="9" y1="21" x2="9" y2="9"></line>
          </svg>
          <span>INFORMATION</span>
        </a>
        <a href="#" class="nav-link">
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
    <div class="main">
      <header class="header">
        <h2>INFORMATION OF TOOLS</h2>
        <div class="header-actions">
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

      <!-- Main content -->
      <div class="main">
       
            

          <!-- Tool Grid -->
          <div class="card">
              <div class="card-header">
                  <h2 class="card-title">Active Tools</h2>
                  <p class="card-subtitle">Currently available reconnaissance tools</p>
              </div>

              <div class="tool-grid">
                  <!-- Tool 1: Subdomain Enumeration -->
                  <div class="tool-card">
                      <div class="tool-header">
                          <div class="tool-icon">🔍</div>
                          <div class="tool-name">Subdomain Enumerator</div>
                      </div>
                      <div class="tool-info">
                          <div class="tool-description">
                              Discovers subdomains for a target domain using multiple techniques including DNS brute force, certificate transparency logs, and API lookups.
                          </div>
                          <div class="tool-functions">
                              <div class="function-title">Key Functions</div>
                              <ul class="function-list">
                                  <li class="function-item">DNS brute force enumeration</li>
                                  <li class="function-item">Certificate transparency logs</li>
                                  <li class="function-item">OSINT source integration</li>
                                  <li class="function-item">Passive reconnaissance</li>
                              </ul>
                          </div>
                          <div class="tool-config">
                              <div class="config-title">Sample Usage</div>
                              <pre class="config-code">subdomainer --target example.com --output results.json --wordlist default</pre>
                          </div>
                      </div>
                      <div class="tool-meta">
                          <div class="tool-version">v2.1.3</div>
                          <div class="tool-status">Active</div>
                      </div>
                  
                  </div>

                  <!-- Tool 2: Port Scanner -->
                  <div class="tool-card">
                      <div class="tool-header">
                          <div class="tool-icon">🔌</div>
                          <div class="tool-name">Port Scanner</div>
                      </div>
                      <div class="tool-info">
                          <div class="tool-description">
                              Fast and efficient TCP/UDP port scanner with service detection capabilities. Identifies open ports and running services on target hosts.
                          </div>
                          <div class="tool-functions">
                              <div class="function-title">Key Functions</div>
                              <ul class="function-list">
                                  <li class="function-item">TCP SYN/Connect scanning</li>
                                  <li class="function-item">UDP port scanning</li>
                                  <li class="function-item">Service version detection</li>
                                  <li class="function-item">Custom port ranges</li>
                              </ul>
                          </div>
                          <div class="tool-config">
                              <div class="config-title">Sample Usage</div>
                              <pre class="config-code">portscanner --target 192.168.1.0/24 --ports 1-1000 --type tcp</pre>
                          </div>
                      </div>
                      <div class="tool-meta">
                          <div class="tool-version">v3.0.2</div>
                          <div class="tool-status">Active</div>
                      </div>
                  
                  </div>

                  <!-- Tool 3: Web Crawler -->
                  <div class="tool-card">
                      <div class="tool-header">
                          <div class="tool-icon">🕸️</div>
                          <div class="tool-name">Web Crawler</div>
                      </div>
                      <div class="tool-info">
                          <div class="tool-description">
                              Crawls websites to discover endpoints, forms, and resources. Identifies potential attack surfaces and helps map application structure.
                          </div>
                          <div class="tool-functions">
                              <div class="function-title">Key Functions</div>
                              <ul class="function-list">
                                  <li class="function-item">Recursive crawling</li>
                                  <li class="function-item">Form detection</li>
                                  <li class="function-item">JavaScript analysis</li>
                                  <li class="function-item">API endpoint discovery</li>
                              </ul>
                          </div>
                          <div class="tool-config">
                              <div class="config-title">Sample Usage</div>
                              <pre class="config-code">webcrawler --url https://example.com --depth 3 --include-forms</pre>
                          </div>
                      </div>
                      <div class="tool-meta">
                          <div class="tool-version">v1.8.5</div>
                          <div class="tool-status">Active</div>
                      </div>
                  
                  </div>

                  <!-- Tool 4: DNS Analyzer -->
                  <div class="tool-card">
                      <div class="tool-header">
                          <div class="tool-icon">🔗</div>
                          <div class="tool-name">DNS Analyzer</div>
                      </div>
                      <div class="tool-info">
                          <div class="tool-description">
                              Performs comprehensive DNS analysis including zone transfers, record enumeration, and misconfiguration detection.
                          </div>
                          <div class="tool-functions">
                              <div class="function-title">Key Functions</div>
                              <ul class="function-list">
                                  <li class="function-item">DNS record enumeration</li>
                                  <li class="function-item">Zone transfer attempts</li>
                                  <li class="function-item">MX record analysis</li>
                                  <li class="function-item">Misconfiguration detection</li>
                              </ul>
                          </div>
                          <div class="tool-config">
                              <div class="config-title">Sample Usage</div>
                              <pre class="config-code">dnsanalyzer --domain example.com --check-zone-transfer</pre>
                          </div>
                      </div>
                      <div class="tool-meta">
                          <div class="tool-version">v2.2.0</div>
                          <div class="tool-status">Active</div>
                      </div>
                  
                  </div>

                  <!-- Tool 5: Screenshot Capture -->
                  <div class="tool-card">
                      <div class="tool-header">
                          <div class="tool-icon">📷</div>
                          <div class="tool-name">Screenshot Capture</div>
                      </div>
                      <div class="tool-info">
                          <div class="tool-description">
                              Automated tool for capturing screenshots of web interfaces. Helps identify and catalog discovered services and applications.
                          </div>
                          <div class="tool-functions">
                              <div class="function-title">Key Functions</div>
                              <ul class="function-list">
                                  <li class="function-item">Headless browser engine</li>
                                  <li class="function-item">Batch screenshot capture</li>
                                  <li class="function-item">Custom resolution support</li>
                                  <li class="function-item">Authentication handling</li>
                              </ul>
                          </div>
                          <div class="tool-config">
                              <div class="config-title">Sample Usage</div>
                              <pre class="config-code">screenshotter --urls urls.txt --output-dir ./screenshots</pre>
                          </div>
                      </div>
                      <div class="tool-meta">
                          <div class="tool-version">v1.3.1</div>
                          <div class="tool-status">Active</div>
                      </div>
                  
                  </div>

                  <!-- Tool 6: OSINT Collector -->
                  <div class="tool-card">
                      <div class="tool-header">
                          <div class="tool-icon">🌍</div>
                          <div class="tool-name">OSINT Collector</div>
                      </div>
                      <div class="tool-info">
                          <div class="tool-description">
                              Collects open-source intelligence from multiple sources including social media, data breaches, and public records.
                          </div>
                          <div class="tool-functions">
                              <div class="function-title">Key Functions</div>
                              <ul class="function-list">
                                  <li class="function-item">Email discovery</li>
                                  <li class="function-item">Employee information</li>
                                  <li class="function-item">Technology stack detection</li>
                                  <li class="function-item">Data breach analysis</li>
                              </ul>
                          </div>
                          <div class="tool-config">
                              <div class="config-title">Sample Usage</div>
                              <pre class="config-code">osintcollector --company "Example Corp" --output report.md</pre>
                          </div>
                      </div>
                      <div class="tool-meta">
                          <div class="tool-version">v2.5.7</div>
                          <div class="tool-status inactive">Updating</div>
                      </div>
                  
                  </div>
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