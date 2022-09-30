 
<?php

@include 'main.php';
session_start();

if(isset($_POST['submit'])){
    $name=mysqli_real_escape_string($conn, $_POST['username']);
    // $dob=mysqli_real_escape_string($conn, $_POST['userdob']);
    $email=mysqli_real_escape_string($conn, $_POST['uemail']);
    $pass = md5($_POST['upassword']);
    $cpass = md5($_POST['ucpassword']);    
    $phn=mysqli_real_escape_string($conn, $_POST['userphonenum']);
    $user_type = $_POST['user_type'];



    

    $select = " SELECT * FROM register WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);
 
    if(mysqli_num_rows($result) > 0){
 
       $error[] = 'user already exist!';
 
    }else{
 
       if($pass != $cpass){
          $error[] = 'password not matched!';
       }else{
          $insert = "INSERT INTO register(name, email, password,phone) VALUES('$name','$email','$pass','$phn')";
          mysqli_query($conn, $insert);
          header('location:login.php');
       }
    }
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>

    <link rel="stylesheet" href="register.css?=<?php echo time(); ?>">

   </head>
<body>

<div class="main">
    <form action="" method="post">

    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

    <div class="contaner">
        <div class="reg">
            <h1 class="regg">REGISTER NOW</h1>
        
        <div class="fill">
        
        <input type="text" placeholder="ENTER YOUR NAME" name="username"><br><br>

        <select class="us" name="user_type">
        <option value="">TYPE</option>
        <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
    
      
      <br><br>
        <input type="email"    placeholder="ENTER YOUR EMAIL ID" name="uemail"><br><br>
        <input type="password"  id="" placeholder="ENTER YOUR PASSWORD" name="upassword"><br><br>
        <input type="password"  id="" placeholder="CONFIRM YOUR PASSWORD" name="ucpassword"><br><br>
        <input type="number"  id="" placeholder="ENTER YOUR 10-DIGIT MOBILE NUMBER" name="userphonenum"><br><br>
        <input type="submit" class="sumreg" name="submit" value="REGISTER">
    </div>

    <div class="dontlog">
            <p>Dont't have an account? <a href="login.php" class="regi"> Login Here!</a> </p>
        </div>
    
        </div>
    </div>


    </form>
</div>
    
</body>

</html>

<?php


?>