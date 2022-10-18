<?php
session_start();

include 'dbconn.php';
include 'navigation.php';

if ($_SESSION['auth'] > 0 ){

if($_SERVER['REQUEST_METHOD']=='POST'){  
//$student_admission_number=mysqli_real_escape_string($conn,$_POST['sstudent_admission_number']);
//$registration_date=mysqli_real_escape_string($conn,$_POST['registration_date']);
$first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
$other_names=mysqli_real_escape_string($conn,$_POST['other_names']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
//$date_of_birth=mysqli_real_escape_string($conn,$_POST['date_of_birth']);
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

$sql="INSERT INTO registration (first_name,other_names,gender,postal_address,telephone_number,email,next_of_kin_name,next_of_kin_telephone_number,
course_enrolled_for,kcse_mean_grade,education_level,high_school_attended,year_from,year_to,college_attended) values
('$first_name','$other_names','$gender','$postal_address','$telephone_number','$email','$next_of_kin_name','$next_of_kin_telephone_number',
'$course_enrolled_for','$kcse_mean_grade','$education_level','$high_school_attended','$year_from','$year_to','$college_attended')";
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
    <title>Registration</title>
    <link rel="stylesheet" href="css/registration.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php echo GenerateMenu($menu);?>
    <form  action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method ="post">
<div class="wrapper">
 <div class="title">Registration</div>
 </div>
 <div class="form">
<div class="input-field">
    <label>Student Admission Number</label>
    <input type="text" class="input">
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

<?php
}else{
    header('location:index.php');
}
?>