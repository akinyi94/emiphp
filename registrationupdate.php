<?php

include 'dbconn.php';

$sql="select * from registration;";

$result=mysqli_query($conn,$sql);

if($_SERVER['REQUEST_METHOD']=='POST'){  
//$student_admission_number=mysqli_real_escape_string($conn,$_POST['sstudent_admission_number']);
//$registration_date=mysqli_real_escape_string($conn,$_POST['registration_date']);
$first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
$other_names=mysqli_real_escape_string($conn,$_POST['other_names']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
$date_of_birth=mysqli_real_escape_string($conn,$_POST['date_of_birth']);
$postal_address=mysqli_real_escape_string($conn,$_POST['postal_address']);
$telephone_number=mysqli_real_escape_string($conn,$_POST['telephone_number']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$next_of_kin_name=mysqli_real_escape_string($conn,$_POST['next_of_kin_name']);
$next_of_kin_telephone_number=mysqli_real_escape_string($conn,$_POST['next_of_kin_telephone_number']);
$course_enrolled_for=mysqli_real_escape_string($conn,$_POST['course_enrolled_for']);
$kcse_mean_grade=mysqli_real_escape_string($conn,$_POST['kcse_mean_grade']);
$education_level=mysqli_real_escape_string($conn,$_POST['education_level']);
$high_school_attended=mysqli_real_escape_string($conn,$_POST['high_school_attended']);
$year_from=mysqli_real_escape_string($conn,$_POST['year_from']);
$year_to=mysqli_real_escape_string($conn,$_POST['year_to']);
$college_attended=mysqli_real_escape_string($conn,$_POST['college_attended']);

$id=mysqli_real_escape_string($conn,$_POST['registration']);;

$sql='';

if($first_name!=''){
    $sql.="update registration set first_name = '$first_name' where student_admission_number = $id; ";
}


if($other_names!=''){
    $sql.="update registration set other_names = '$other_names' where student_admission_number = $id; ";
}


if($gender!=''){
    $sql.="update registration set gender = '$gender' where student_admission_number = $id; ";
}


if($date_of_birth!=''){
    $sql.="update registration set date_of_birth = '$date_of_birth' where student_admission_number = $id; ";
}


if($telephone_number!=''){
    $sql.="update registration set telephone_number = '$telephone_number' where student_admission_number = $id; ";
}


if($email!=''){
    $sql.="update registration set email = '$email' where student_admission_number = $id; ";
}


if($next_of_kin_name!=''){
    $sql.="update registration set next_of_kin_name = '$next_of_kin_name' where student_admission_number = $id; ";
}

if($next_of_kin_telephone_number!=''){
    $sql.="update registration set next_of_kin_telephone_number = '$next_of_kin_telephone_number' where student_admission_number = $id; ";
}
if($course_enrolled_for!=''){
    $sql.="update registration set course_enrolled_for = '$course_enrolled_for' where student_admission_number = $id; ";
}
if($kcse_mean_grade!=''){
    $sql.="update registration set kcse_mean_grade = '$kcse_mean_grade' where student_admission_number = $id; ";
}
if($education_level!=''){
    $sql.="update registration set education_level = '$education_level' where student_admission_number = $id; ";
}
if($high_school_attended!=''){
    $sql.="update registration set high_school_attended = '$high_school_attended' where student_admission_number = $id; ";
}
if($year_from!=''){
    $sql.="update registration set year_from = '$year_from' where student_admission_number = $id; ";
}
if($year_to!=''){
    $sql.="update registration set year_to = '$year_to' where student_admission_number = $id; ";
}
if($college_attended!=''){
    $sql.="update registration set college_attended = '$college_attended' where student_admission_number = $id; ";
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
    <title>Registration</title>
    <link rel="stylesheet" href="css/registration.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="wrapper">
 <div class="title">Registration</div>
 </div>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<div class="form">
<div class="input-field">
    <label>Student Admission Number</label>
 
    <select name="registration" id="">
        <?php 
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                ?>
        <option value="<?php echo $row['student_admission_number']; ?>"><?php echo $row['student_admission_number']; ?></option>
<?php 
            }
        }
?>
</select>
   
</div>
<div class="input-field">
    <label>Registration Date</label>
    <input type="date" class="input" name="registration_date">
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
    <label>Date of Birth</label>
    <input type="date" class="input" name="date_of_birth">
</div>
<div class="input-field">
    <label>Postal Address</label>
    <input type="text" class="input" name="postal_address">
</div>
<div class="input-field">
    <label>Telephone Number</label>
    <input type="text" class="input" name="telephone_number">
</div>
<div class="input-field">
    <label>Gender</label>
    <div class="custom-select">
    <select name="gender" id="">
        <option value="female">Female</option>
        <option value="male">Male</option>
        <option value="other">Other</option>
    </select>
</div>
</div>
<div class="input-field">
    <label>Email</label>
    <input type="text" class="input" name="email">
</div>
<div class="input-field">
    <label>Next of Kin Name</label>
    <input type="text" class="input" name="next_of_kin_name">
</div>
<div class="input-field">
    <label>Next of Kin Telephone Number</label>
    <input type="text" class="input" name="next_of_kin_telephone_number">
</div>
<div class="input-field">
    <label>Course Enrolled For</label>
    <input type="text" class="input" name="course_enrolled_for">
</div>
<div class="input-field">
    <label>KCSE Mean Grade</label>
    <input type="text" class="input" name="kcse_mean_grade">
</div>
<div class="input-field">
    <label>Education Level</label>
    <div class="custom-select">
    <select name="education_level" id="">
        <option value="female">High School</option>
        <option value="male">College/University</option>
    </select>
</div>
</div>
<div class="input-field">
    <label>High School Attended</label>
    <input type="text" class="input" name="high_school_attended">
</div>
<div class="input-field">
    <label>Year From </label>
    <input type="text" class="input" name="year_from">
</div>
<div class="input-field">
    <label>Year To</label>
    <input type="text" class="input" name="year_to">
</div>
<div class="input-field">
    <label>College/University Attended </label>
    <input type="text" class="input" name="college_attended">
</div>


<div class="input-field">
    <input type="submit" value="Submit" class="btn">
</div>
 </div>
</form>
</body>
</html>