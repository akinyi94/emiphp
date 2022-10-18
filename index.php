<?php
session_start();

include 'dbconn.php';

if ($_SESSION['auth'] > 0 ){
    header("location:users_add.php");
}

$_SESSION['auth']=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);

    $sql="SELECT * FROM users WHERE username='$username' AND password='$password';";

    $result=mysqli_query($conn,$sql);

    // 'system_administrator','administrator','front_office','accounts','management'

if(mysqli_num_rows($result) > 0){
    // header('location:receipt.php');
    // echo('login successful');
        while ($row =mysqli_fetch_assoc($result)){
            if ($row['user_group']=="system_administrator"){
                $_SESSION['auth']=5;
            }else if($row['user_group']=="administrator") {
                $_SESSION['auth']=4;
            }else if($row['user_group']=="front_office") {
                $_SESSION['auth']=3;
            }else if($row['user_group']=="accounts") {
                $_SESSION['auth']=2;
            }else if($row['user_group']=="management") {
                $_SESSION['auth']=1;
            }

        }

        echo($_SESSION['auth']);
        header('location:receipt_add.php');
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
    <link rel="stylesheet" href="css/users.css">
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method ="post">
<div class="input-field">
    <label>Username</label>
    <input type="text" class="input" name="username" required>
</div>
<div class="input-field">
    <label>Password</label>
    <input type="password" class="input" name="password" required>
</div>

<div class="input-field">
    <input type="submit" value="login" class="btn">
    <a href="users_add.php">register</a>
</div>
 </div>
</form> 
    
</body>
</html>