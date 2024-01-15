<?php
$user=0;
$succsess=0;
$match=0;

if($_SERVER["REQUEST_METHOD"]=='POST'){
    include 'connect.php';

    if(isset($_POST["submit"])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=md5($_POST['password']);
        $cpassword=md5($_POST['cpassword']);
        $address=$_POST['address'];
        $phone=$_POST['phone'];

        $sql = "SELECT * FROM `data` WHERE email='$email'";
        $result =mysqli_query($conn,$sql);
        if ($result){
            $num=mysqli_num_rows($result);
            if ($num>0){

                $user=1;
            }
            else{
                if($password==$cpassword){
                    $sql="INSERT INTO `data`(name,password,email,address,phone)VALUES('$name','$password','$email','$address','$phone')";
                $result=mysqli_query($conn,$sql);
                if($result){
                 
                    $succsess=1;
                }
            }else{  
                    $match=1;
               }      
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
    <title>signup</title>
</head>
<body>
    <?php
    if ($user) {
        echo "<script>
                alert('User already exists. Please choose a different name or create a new account');
                window.location.href = 'index.html';
              </script>";
        exit(); 
    }else{
        if($succsess){
            echo "<script>
            alert('Sign-up successful. Please login.');
            window.location.href = 'login.html';
          </script>";
    exit();
        }else{
            if($match){
                echo "<script>
            alert('Password does not match. Please try again');
            window.location.href = 'index.html';
          </script>";
    exit();
            }
        }
    }
    ?>
    
</body>
</html>
