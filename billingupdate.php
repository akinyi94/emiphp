<?php

include 'dbconn.php';

$sql="select * from billing;";

$result=mysqli_query($conn,$sql);

if($_SERVER['REQUEST_METHOD']=='POST'){
//$invoice_number=mysqli_real_escape_string($conn,$_POST['invoice_number']);
//$invoice_date=mysqli_real_escape_string($conn,$_POST['invoice_date']);
$first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
$other_names=mysqli_real_escape_string($conn,$_POST['other_names']);
$course=mysqli_real_escape_string($conn,$_POST['course']);
$tuition_fees=mysqli_real_escape_string($conn,$_POST['tuition_fees']);
$registration_fees=mysqli_real_escape_string($conn,$_POST['registration_fees']);
$hostel_fees=mysqli_real_escape_string($conn,$_POST['hostel_fees']);
$library_fees=mysqli_real_escape_string($conn,$_POST['library_fees']);
$total_amount=mysqli_real_escape_string($conn,$_POST['total_amount']);


$id=mysqli_real_escape_string($conn,$_POST['invoice_number']);;

$sql='';

if($first_name!=''){
    $sql.="update billing set first_name = '$first_name' where invoice_number = $id; ";
}


if($other_names!=''){
    $sql.="update billing set o_name = '$other_names' where invoice_number = $id; ";
}


if($course!=''){
    $sql.="update billing set course = '$course' where invoice_number = $id; ";
}


if($tuition_fees!=''){
    $sql.="update billing set tuition_fees = '$tuition_fes' where invoice_number = $id; ";
}


if($registration_fees!=''){
    $sql.="update billing set registration_fees = '$registration_fees' where invoice_number = $id; ";
}


if($hostel_fees!=''){
    $sql.="update billing set hostel_fees = '$hostel_fees' where invoice_number = $id; ";
}


if($library_fees!=''){
    $sql.="update billing set library_fees = '$library_fees' where invoice_number = $id; ";
}


if($total_amount!=''){
    $sql.="update billing set total_amount = '$total_amount' where invoice_number = $id; ";
}

}
if($sql != ""){
    if(mysqli_multi_query($conn,$sql)){
        echo "change successful";
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
    <link rel="stylesheet" href="2css/billingupdate.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="wrapper">
 <div class="title">Billing/Invoice update</div>
 </div>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
<div class="form">
<div class="input-field">
    <label>Invoice Number</label>
    <select name="invoice_number" id="">
        <?php 
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                ?>
        <option value="<?php echo $row['invoice_number']; ?>"><?php echo $row['invoice_number']; ?></option>
<?php 
            }
        }
?>
</select>


    <!-- <input type="number" class="input" name="invoice_number"> -->
</div>
<div class="input-field">
    <label>Invoice Date</label>
    <input type="date" class="input" name="invoice_date">
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
    <input type="number" class="input" name="total_amount">
</div>
<div class="input-field">
    <input type="submit" value="Submit" class="btn">
</div>
 </div>
</form>

</body>
</html>
<?php