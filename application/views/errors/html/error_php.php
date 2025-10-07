<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Terjadi Kesalahan PHP</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1 { color: #c00; }
        .error { background: #f9d6d5; padding: 15px; border-radius: 8px; }
        .file-info { font-size: 14px; color: #555; margin-top: 10px; }
    </style>
</head>
<body>
    <h1>Terjadi Kesalahan PHP</h1>
    <div class="error">
        <strong><?php echo $severity; ?>:</strong> <?php echo $message; ?><br>
        <div class="file-info">File: <?php echo $filepath; ?> di baris <?php echo $line; ?></div>
    </div>
</body>
</html>
