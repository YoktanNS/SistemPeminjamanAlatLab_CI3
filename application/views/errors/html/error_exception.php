<!DOCTYPE html>
<html>
<head>
    <title>Exception</title>
</head>
<body>
    <h1>Terjadi Exception</h1>
    <p><?php echo $message; ?></p>
    <p>File: <?php echo $exception->getFile(); ?> (baris <?php echo $exception->getLine(); ?>)</p>
</body>
</html>
