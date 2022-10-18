<?php
session_start();

include 'dbconn.php';
include 'navigation.php';

if ($_SESSION['auth'] > 0 ){

if($_SERVER['REQUEST_METHOD']=='POST'){  
//$enquiry_id=mysqli_real_escape_string($conn,$_POST['enquiry_id']);
//$enquiry_date=mysqli_real_escape_string($conn,$_POST['enquiry_date']);
$first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
$other_names=mysqli_real_escape_string($conn,$_POST['other_names']);
$telephone_number=mysqli_real_escape_string($conn,$_POST['telephone_number']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$course=mysqli_real_escape_string($conn,$_POST['course']);
$know_us=mysqli_real_escape_string($conn,$_POST['know_us']);

$sql="INSERT INTO enquiries (first_name,other_names,telephone_number,email,course,know_us) values
('$first_name','$other_names','$telephone_number','$email','$course','$know_us')";
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
    <title>Enquiries</title>
    <link rel="stylesheet" href="css/enquiries.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php echo GenerateMenu($menu);?>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method ="post">
 <div class="wrapper">
 <div class="title">Enquiries</div>
 </div>
 <div class="form">
<div class="input-field">
    <label>Enquiry ID</label>
    <input type="number" class="input" name="enquiry_id">
</div>
<div class="input-field">
    <label>Enquiry Date</label>
    <input type="date" class="input" name="enquiry_date">
</div>
<div class="input-field">
    <label>First Name</label>
    <input type="text" class="input" name="first_name">
</div>
<div class="input-field">
    <label>Other Names</label>
    <input type="text" class="input" name="other_names">
</div>
<div class="input-field">
    <label>Telephone Number</label>
    <input type="number" class="input" name="telephone_number">
</div>
<div class="input-field">
    <label>Email</label>
    <input type="text" class="input" name="email">
</div>
<div class="input-field">
    <label>Course</label>
    <input type="text" class="input" name="course">
</div>
<div class="input-field">
    <label>How did you know about us</label>
    <select name="know_us" id="">
        <option value="newspaper">Nespaper</option>
        <option value="television">Television</option>
        <option value="student">Student</option>
        <option value="friend">Friend</option>
        <option value="alumni">Alumni</option>
        <option value="staff member">Staff Member</option>
        <option value="social media">Social Media</option>
        <option value="comments">Comments</option>
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