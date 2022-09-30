<?php


@include 'main.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER</title>
    <link rel="stylesheet" href="user.css?=<?php echo time();?>">
</head>
<body>

<div class="main">

    <div class="container">
        <h3>hi, <span class="intro"><?php echo $_SESSION['user_name'] ?></span></h3>
 
        <h1>welcome </h1>
    

    <div class="but">
        <button>dashboard</button>
        <button>workspace</button>
        <a href="login.php" class="btn">logout</a>

    </div>
    </div>
    </div>


    
</body>
</html>