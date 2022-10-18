<?php
session_start();

include 'dbconn.php';
include 'navigation.php';

if ($_SESSION['auth'] > 0 ){

if($_SERVER['REQUEST_METHOD']=='POST'){
$invoice_number=mysqli_real_escape_string($conn,$_POST['invoice_number']);
$invoice_date=mysqli_real_escape_string($conn,$_POST['invoice_date']);
$first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
$other_names=mysqli_real_escape_string($conn,$_POST['other_names']);
$course=mysqli_real_escape_string($conn,$_POST['course']);
$tuition_fees=mysqli_real_escape_string($conn,$_POST['tuition_fees']);
$registration_fees=mysqli_real_escape_string($conn,$_POST['registration_fees']);
$hostel_fees=mysqli_real_escape_string($conn,$_POST['hostel_fees']);
$library_fees=mysqli_real_escape_string($conn,$_POST['library_fees']);
$total_amount=mysqli_real_escape_string($conn,$_POST['total_amount']);

$sql="INSERT INTO billing(first_name,other_names,course,tuition_fees,registration_fees,hostel_fees,library_fees,total_amount) values
('$first_name','$other_names','$course','$tuition_fees','$registration_fees','$hostel_fees','$library_fees','$total_amount')";
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
    <title>Billing</title>
    <link rel="stylesheet" href="css/billing.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php echo GenerateMenu($menu);?>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method ="post">
 <div class="wrapper">
 <div class="title">Billing/Invoice</div>
 </div>
 <div class="form">
<div class="input-field">
    <label>Invoice Number</label>
    <input type="number" class="input" name="invoice_number" required>
</div>
<div class="input-field">
    <label>Invoice Date</label>
    <input type="date" class="input" name="invoice_date" required>
</div>
<div class="input-field">
    <label>First Name</label>
    <input type="text" class="input" name="first_name" required>
</div>
<div class="input-field">
    <label>Other Names</label>
    <input type="text" class="input" name="other_names" required>
</div>
<div class="input-field">
    <label>Course</label>
    <input type="text" class="input" name="course" required>
</div>
<div class="input-field">
    <label>Tuition Fees</label>
    <input type="number" class="input" name="tuition_fees" required>
</div>
<div class="input-field">
    <label>Registration Fees</label>
    <input type="number" class="input" name="registration_fees" required>
</div>
<div class="input-field">
    <label>Hostel/Accomodation Fees</label>
    <input type="number" class="input" name="hostel_fees" required>
</div>
<div class="input-field">
    <label>Library Fees</label>
    <input type="number" class="input" name="library_fees" required>
</div>
<div class="input-field">
    <label>Total Amount</label>
    <input type="number" class="input" name="total_amount" required>
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