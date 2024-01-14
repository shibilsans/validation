<?php
session_start();
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $password=md5($_POST['password']);

        $sql="SELECT * FROM `data`WHERE email='$email' and password ='$password'";
        $result =mysqli_query($conn,$sql);
        if ($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                $login=1;
                $_SESSION['name']=$email;
                header('location:welcome.php');
            }else{
                $invalid=1;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>login</title>
</head>
<body>
    <?php
    if ($login){
        echo "<div class='alert alert-success' role='alert'>
        Login successful
      </div>";
    }else{
        if($invalid){
            echo "<div class='alert alert-danger' role='alert'>
            Invalid data
            </div>";
        }
    }
    ?>
    
</body>
</html>