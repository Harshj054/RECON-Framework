<?php
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Report</title>
    <style>
        :root { --green: #10B981; --white: #A1A1AA; --black: #09090B; --gray1: #27272A; --gray2: #18181B; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: var(--gray2); color: var(--white); margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .container { background-color: var(--gray1); border-radius: 8px; padding: 2rem; width: 100%; max-width: 500px; box-shadow: 0 4px 6px rgba(0,0,0,0.3); }
        .header { text-align: center; margin-bottom: 2rem; }
        h1 { color: var(--white); font-size: 1.8rem; margin-bottom: 0.5rem; }
        .description { color: var(--white); font-size: 1rem; margin-bottom: 2rem; }
        .file-info { background-color: var(--gray2); border-radius: 6px; padding: 1.25rem; margin-bottom: 2rem; }
        .file-name { font-weight: 600; font-size: 1.1rem; margin-bottom: 0.5rem; word-break: break-all; }
        .file-meta { display: flex; justify-content: space-between; font-size: 0.9rem; color: var(--white); opacity: 0.8; }
        .download-btn { background-color: var(--green); color: var(--black); border: none; border-radius: 6px; padding: 0.8rem 1.5rem; font-size: 1rem; font-weight: 600; cursor: pointer; width: 100%; transition: background-color 0.2s, transform 0.1s; }
        .download-btn:hover { background-color: #0EA271; transform: translateY(-2px); }
        .download-btn:active { transform: translateY(0); }
        .status { margin-top: 1rem; text-align: center; font-size: 0.9rem; }
        .error { color: #EF4444; margin-top: 1rem; text-align: center; display: none; }
        .spinner { display: none; width: 20px; height: 20px; border: 3px solid rgba(255,255,255,0.3); border-radius: 50%; border-top-color: var(--white); animation: spin 1s ease-in-out infinite; margin: 0 auto; margin-top: 1rem; }
        @keyframes spin { to { transform: rotate(360deg); } }
        .footer { margin-top: 2rem; text-align: center; font-size: 0.8rem; color: var(--white); opacity: 0.7; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
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
        <div class="file-info">
            <div class="file-name" id="file-name"><?php echo htmlspecialchars($dirName); ?>.zip</div>
            <div class="file-meta">
                <span id="file-type">ZIP Archive</span>
                <span id="file-size"><?php echo $fileSizeDisplay; ?></span>
            </div>
        </div>

        <form method="post">
            <button class="download-btn" type="submit" name="download">Download File</button>
        </form>
        <div class="spinner" id="spinner"></div>
        <div class="status" id="status"></div>
        <div class="error" id="error"></div>
        <?php } ?>

        <div class="footer">
            &copy; 2025 Company Name. All rights reserved.
        </div>
    </div>
</body>
</html>

<?php
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
            echo "<script>document.getElementById('error').innerText = 'Failed to create zip file.'; document.getElementById('error').style.display = 'block';</script>";
        }
    } else {
        echo "<script>document.getElementById('error').innerText = 'Could not open zip archive.'; document.getElementById('error').style.display = 'block';</script>";
    }
}
?>
