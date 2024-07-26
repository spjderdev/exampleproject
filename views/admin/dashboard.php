<?php 
session_start();

if($_SESSION['role'] !== 'admin') {
    header('Location: index.php?controller=pages&action=error');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
  
    <?php include './components/sidebar.php'; ?>
</body>
</html>