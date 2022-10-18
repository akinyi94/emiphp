<?php
session_start();

include 'dbconn.php';
include 'navigation.php';

if ($_SESSION['auth'] > 0 ){

if($_SERVER['REQUEST_METHOD']=='POST'){
//$receipt_number=mysqli_real_escape_string($conn,$_POST['receipt_number']);
//$receipt_date=mysqli_real_escape_string($conn,$_POST['receipt_date']);
$first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
$other_names=mysqli_real_escape_string($conn,$_POST['other_names']);
$course=mysqli_real_escape_string($conn,$_POST['course']);
$tuition_fees=mysqli_real_escape_string($conn,$_POST['tuition_fees']);
$registration_fees=mysqli_real_escape_string($conn,$_POST['registration_fees']);
$hostel_fees=mysqli_real_escape_string($conn,$_POST['hostel_fees']);
$library_fees=mysqli_real_escape_string($conn,$_POST['library_fees']);
$total_amount=mysqli_real_escape_string($conn,$_POST['total_amount']);
$amount_paid=mysqli_real_escape_string($conn,$_POST['amount_paid']);
$sql="INSERT INTO receipt(first_name,other_names,course,tuition_fees,registration_fees,hostel_fees,library_fees,total_amount,amount_paid) values
('$first_name','$other_names','$course','$tuition_fees','$registration_fees','$hostel_fees','$library_fees','$total_amount','$amount_paid')";
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
    <title>Receipt</title>
    <link rel="stylesheet" href="css/receipt.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php echo GenerateMenu($menu);?>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method ="post">
 <div class="wrapper">
 <div class="title">Receipt</div>
 </div>
 <div class="form">
<div class="input-field">
    <label>Receipt Number</label>
    <input type="number" class="input" name="receipt_number">
</div>
<div class="input-field">
    <label>Receipt Date</label>
    <input type="date" class="input" name="receipt_date">
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
    <label>Course</label>
    <input type="text" class="input" name="course">
</div>
<div class="input-field">
    <label>Tuition Fees</label>
    <input type="number" class="input" name="tuition_fees">
</div>
<div class="input-field">
    <label>Registration Fees</label>
    <input type="number" class="input" name="registration_fees">
</div>
<div class="input-field">
    <label>Hostel/Accomodation Fees</label>
    <input type="number" class="input" name="hostel_fees">
</div>
<div class="input-field">
    <label>Library Fees</label>
    <input type="number" class="input" name="library_fees">
</div>
<div class="input-field">
    <label>Total Amount</label>
    <input type="text" class="input" name="total_amount">
</div>
<div class="input-field">
    <label>Amount Paid</label>
    <input type="number" class="input" name="amount_paid">
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