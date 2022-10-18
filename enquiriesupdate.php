<?php

include 'dbconn.php';

$sql="select * from enquiries;";

$result=mysqli_query($conn,$sql);

if($_SERVER['REQUEST_METHOD']=='POST'){  
//$enquiry_id=mysqli_real_escape_string($conn,$_POST['enquiry_id']);
//$enquiry_date=mysqli_real_escape_string($conn,$_POST['enquiry_date']);
$first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
$other_names=mysqli_real_escape_string($conn,$_POST['other_names']);
$telephone_number=mysqli_real_escape_string($conn,$_POST['telephone_number']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$course=mysqli_real_escape_string($conn,$_POST['course']);
$know_us=mysqli_real_escape_string($conn,$_POST['know_us']);

$id=mysqli_real_escape_string($conn,$_POST['enquiry_id']);;

$sql='';

    if($first_name!=''){
        $sql.="update enquiries set first_name = '$first_name' where enquiry_id = $id; ";
    }
    if($other_names!=''){
        $sql.="update enquiries set other_names = '$other_names' where enquiry_id = $id; ";
    }
    if($telephone_number!=''){
        $sql.="update enquiries set telephone_number = '$telephone_number' where enquiry_id = $id;";
    }
    if($email!=''){
        $sql.="update enquiries set email = '$email' where enquiry_id = $id;";
    }
    if($course!=''){
        $sql.="update enquiries set course = '$course' where enquiry_id = $id;";
    }
    if($know_us!=''){
        $sql.="update enquiries set know_us = '$know_us' where enquiry_id = $id;";
    }

    if($sql != ""){
        if(mysqli_multi_query($conn,$sql)){
            echo "change successful";
        }else{
            echo mysqli_error($conn);
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
    <title>Enquiries</title>
    <link rel="stylesheet" href="2css/enquiriesupdate.css">
</head>
<body>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <select name="enquiry_id" id="">
        <?php 
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                ?>
        <option value="<?php echo $row['enquiry_id']; ?>"><?php echo $row['enquiry_id']; ?></option>
<?php 
            }
        }
?>
    </select>
 <div class="wrapper">
 <div class="title">Enquiries</div>
 </div>
 <div class="form">
<div class="input-field">
    <label>Enquiry ID</label>
    <!-- <input type="number" class="input" name="enquiry_id"> -->
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
        <option value="newspaper">Newspaper</option>
        <option value="television">Television</option>
        <option value="student">Student</option>
        <option value="friend">Friend</option>
        <option value="alumni">Alumni</option>
        <option value="staff member">Staff Member</option>
        <option value="social media">Social Media Comments</option>
    </select>
</div>
<div class="input-field">
    <input type="submit" value="Submit" class="btn">
</div>
 </div>
</form>
</body>
</html>



