<?php
    session_start();
    if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
?>
    <p class="text-primary text-center font-weight-bold display-5">Hello <?php echo $_SESSION['user_name']; ?></p>
    <a href="logout.php" style="font-size: 23px;" class="text-danger">Logout</a>
<?php 
    }
    else{
        header("location: index_form.php");
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="bootstrap-4.0.0-dist\css\bootstrap.min.css">
</head>
<body>
    
</body>
</html>