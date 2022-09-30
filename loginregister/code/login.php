<?php

@include 'main.php';
session_start();

if(isset($_POST['submit'])){
    // $name=mysqli_real_escape_string($conn, $_POST['username']);
    // $dob=mysqli_real_escape_string($conn, $_POST['userdob']);
    $email=mysqli_real_escape_string($conn, $_POST['uemail']);
    $pass = md5($_POST['upassword']);
    // $cpass = md5($_POST['ucpassword']);    
    // $phn=mysqli_real_escape_string($conn, $_POST['userphonenum']);
    // $user_type = $_POST['user_type'];




    $select = " SELECT * FROM register WHERE email = '$email' && password = '$pass' ";
 

    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);
        if($row['user_type'] == 'user'){

            $_SESSION['user_name'] = $row['name'];
            header('location:user.php');
   
         }
     }else{
        $error[] = 'incorrect email or password !';
     }

}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="loginstyle.css?=<?php echo time(); ?>">

</head>
<body>

<div class="main">
    <form action="" method="post">
<div class="error">
    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span color="red" class="error-msg">'.$error.'</span>';
         };
      };
      ?>

</div>
    <div class="container">

    <div class="logi">
        <h1 class="log"> LOGIN NOW </h1>
        
        <div class="empas">
           <input type="email" placeholder="ENTER YOUR EMAIL ID" name="uemail"><br><br>
           <input type="password" placeholder="ENTER YOUR PASSWORD" name="upassword"><br><br>
           <input type="submit" class="sumlog" name="submit" value="LOGIN">
        
        </div>

        <div class="dontlog">
            <p>Dont't have an account? <a href="register.php" class="regi"> Register Here!</a> </p>
        </div>
    
    </div>

    </div>

    </form>
</div>
    
</body>

</html>

<?php


?>