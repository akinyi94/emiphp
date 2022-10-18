<?php
session_start();

include 'dbconn.php';
include 'navigation.php';

if ($_SESSION['auth'] > 0 ){

if($_SERVER['REQUEST_METHOD']=='POST'){
// $staff_id=mysqli_real_escape_string($conn,$_POST['staff_id']);
$first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
$middle_name=mysqli_real_escape_string($conn,$_POST['middle_name']);
$last_name=mysqli_real_escape_string($conn,$_POST['last_name']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
$position=mysqli_real_escape_string($conn,$_POST['position']);
$department=mysqli_real_escape_string($conn,$_POST['department']);
// $join_date=mysqli_real_escape_string($conn,$_POST['join_date']);

$sql="INSERT INTO staff_details (first_name,middle_name,last_name,gender,position,department) values
('$first_name','$middle_name','$last_name','$gender','$position','$department')";
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
    <title>Staff Details</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php echo GenerateMenu($menu);?>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method ="post">
 <div class="wrapper">
 <div class="title">Staff Details</div>
 </div>
 <div class="form">
<div class="input-field">
    <label>Staff ID</label>
    <!-- <input type="text" class="input" name="staff_id" required> -->
</div>
<br>
<div class="input-field">
    <label>First Name</label>
    <input type="text" class="input" name="first_name" required>
</div>
<br>
<div class="input-field">
    <label>Middle Name</label>
    <input type="text" class="input" name="middle_name">
</div>
<br>
<div class="input-field">
    <label>Last Name</label>
    <input type="text" class="input" name="last_name">
</div>
<br>
<div class="input-field">
    <label>Position</label>
    <input type="text" class="input" name="position">
</div>
<br>
<div class="input-field">
    <label>Department</label>
    <input type="text" class="input" name="department">
</div>
<br>
<div class="input-field" name="gender">
    <label>Gender</label>
    <div class="custom-select">
    <select name="gender" id="">
        <option value="female">Female</option>
        <option value="male">Male</option>
        <option value="other">Other</option>
    </select>
</div>
</div>
<br>
<!-- <div class="input-field">
    <label>Join Date</label>
    <input type="date" class="input" name="join_date">
</div> -->
<br>
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