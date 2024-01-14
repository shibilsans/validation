<?php
include ('connect.php');
session_start();
if(isset($_SERVER['name'])){
    header('loaction:index.html');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>welocome</title>
</head>
<body>
    <div class="conatiner">
    <div class="jumbotron">
  <h1 class="display-4 text-center text-success">welcome <?php echo  $_SESSION['name']; ?> </h1>
  <p class="text-center">thank you for viste our website</p>
  <p class="lead">
    <a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a>
  </p>
</div>
    </div>

</body>
</html>