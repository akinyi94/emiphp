<?php
session_start();
include 'dbconn.php';
include 'navigation.php';
if ($_SESSION['auth'] > -1 ){

if($_SERVER['REQUEST_METHOD']=='POST'){  
   // $user_id=mysqli_real_escape_string($conn,$_POST['user_id']);
$first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
$middle_name=mysqli_real_escape_string($conn,$_POST['middle_name']);
$last_name=mysqli_real_escape_string($conn,$_POST['last_name']);
$department=mysqli_real_escape_string($conn,$_POST['department']);
$username=mysqli_real_escape_string($conn,$_POST['username']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$user_group=mysqli_real_escape_string($conn,$_POST['user_group']);

$sql="INSERT INTO users (first_name,middle_name,last_name,department,username,password,user_group) values
('$first_name','$middle_name','$last_name','$department','$username','$password','$user_group')";
if(mysqli_query($conn,$sql)){
    // echo "created successfully";
}else{
    echo mysqli_error($conn);
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="css/users.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php echo GenerateMenu($menu);?>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method ="post">
 <div class="wrapper">
 <div class="title">Users</div>
 </div>
 <div class="form">
<div class="input-field">
    <label>First Name</label>
    <input type="text" class="input" name="first_name">
</div>
<div class="input-field">
    <label>Middle Name</label>
    <input type="text" class="input" name="middle_name">
</div>
<div class="input-field">
    <label>Last Name</label>
    <input type="text" class="input" name="last_name">
</div>
<div class="input-field">
    <label>Department</label>
    <input type="text" class="input" name="department">
</div>
<div class="input-field">
    <label>Username</label>
    <input type="text" class="input" name="username">
</div>
<div class="input-field">
    <label>Password</label>
    <input type="password" class="input" name="password">
</div>
<div class="input-field">
    <label>User Group</label>
    <select name="user_group" id="">
        <option value="system_administrator">Systems Administrator</option>
        <option value="administrator">Administrator</option>
        <option value="front_office">Front Office</option>
        <option value="accounts">Accounts</option>
        <option value="management">Management</option>
    </select>
</div>
<div class="input-field">
    <input type="submit" value="Submit" class="btn">
</div>
 </div>
</form>  

</body>
</html>

<?php
}else{
    header('location:index.php');
}
?>