<?php
include 'dbconn.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $fname=mysqli_real_escape_string($conn,input_cleaner($_POST['fname']));
    $mname=mysqli_real_escape_string($conn,input_cleaner($_POST['mname']));
    $lname=mysqli_real_escape_string($conn,input_cleaner($_POST['lname']));
    $dept=mysqli_real_escape_string($conn,input_cleaner($_POST['department']));
    $username=mysqli_real_escape_string($conn,input_cleaner($_POST['username']));
    $password=mysqli_real_escape_string($conn,input_cleaner($_POST['password']));
    $usergroup=mysqli_real_escape_string($conn,input_cleaner($_POST['usergroup']));

    $sql="insert into user(firstname,middlename,lastname,department,username,password,usergroup)
    values('$fname','$mname','$lname','$dept','$username','$password','$usergroup');";

    if(mysqli_query($conn,$sql)){
        echo "submitted successfully";
    }else {
        echo mysqli_conn($error);
    }
}

function input_cleaner($input){
    $input=trim($input);
    $input=stripslashes($input);
    $input=htmlspecialchars($input);
    return $input;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <input type="text" name="fname" id="" placeholder ='first name'>
    <input type="text" name="mname" id="" placeholder ='middle name'>
    <input type="text" name="lname" id="" placeholder ='last name'>
    <input type="text" name="department" id="" placeholder ='department'>
    <input type="text" name="username" id="" placeholder ='username'>
    <input type="password" name="password" id="" placeholder ='password'>
    <select name="usergroup" id="">
        <option value="Systems admin">system admin</option>
        <option value="Administrator">administrator</option>
        <option value="front office">front office</option>
        <option value="Accounts">accounts</option>
        <option value="management">management</option>
    </select>
    <input type="submit" value="submit">
</form>
    
</body>
</html>