<?php
// Fetch data from POST
$scan_name = $_POST['scan_name'];
$domains_input = $_POST['domains'];
// Prepare domain list and file content
$domains = preg_split('/[\r\n,]+/', $domains_input);
$clean_domains = [];

foreach ($domains as $domain) {
    $domain = trim($domain);
    if (!empty($domain)) {
        $clean_domains[] = $domain; // Collect for writing to file
    }
}

$filename = '../scans/' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $scan_name) . '.txt';
file_put_contents($filename, implode(PHP_EOL, $clean_domains));

// ✅ Read file line by line and run bash script in WSL Kali
if (file_exists($filename)) {
    $handle = fopen($filename, 'r');
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $domain = trim($line);
            if (!empty($domain)) {
                // Call WSL and pass the command
                $command = "wsl -d kali-linux ./screen_recon.sh $domain";
                // $command = "psexec -u harsh -p 4578 wsl -d kali-linux bash screen_recon.sh $domain";
                
                exec($command);
                echo '';
            }
        }
        fclose($handle);
    } else {
        echo "Failed to open the file.\n";
    }
}
?>