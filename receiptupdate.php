<?php

include 'dbconn.php';

$sql="select * from receipt;";

$result=mysqli_query($conn,$sql);

if($_SERVER["REQUEST_METHOD"]  == "POST"){
    $first_name=mysqli_real_escape_string($conn,$_POST['first_name']);
    $other_names=mysqli_real_escape_string($conn,$_POST['other_names']);
    $course=mysqli_real_escape_string($conn,$_POST['course']);
    $tuition_fees=mysqli_real_escape_string($conn,$_POST['tuition_fees']);
    $registration_fees=mysqli_real_escape_string($conn,$_POST['registration_fees']);
    $hostel_fees=mysqli_real_escape_string($conn,$_POST['hostel_fees']);
    $library_fees=mysqli_real_escape_string($conn,$_POST['library_fees']);
    $total_amount=mysqli_real_escape_string($conn,$_POST['total_amount']);
    $receipt_date=mysqli_real_escape_string($conn,$_POST['receipt_date']);
    $amount_paid=mysqli_real_escape_string($conn,$_POST['amount_paid']);


    $id=mysqli_real_escape_string($conn,$_POST['receipt_number']);;


    $sql='';

    if($first_name!=''){
        $sql.="update receipt set first_name = '$first_name' where receipt_number = $id; ";
    }
    if($other_names!=''){
        $sql.="update receipt set other_name = '$other_names' where receipt_number = $id; ";
    }
    if($course!=''){
        $sql.="update receipt set course = '$course' where receipt_number = $id;";
    }
    if($tuition_fees!=''){
        $sql.="update receipt set tuition_fees = '$tuition_fees' where receipt_number = $id;";
    }
    if($registration_fees!=''){
        $sql.="update receipt set registration_fees = '$registration_fees' where receipt_number = $id;";
    }
    if($hostel_fees!=''){
        $sql.="update receipt set hostel_fees = '$hostel_fees' where receipt_number = $id;";
    }
    if($library_fees!=''){
        $sql.="update receipt set library_fees = '$library_fees' where receipt_number = $id;";
    }
    if($total_amount!=''){
        $sql.="update receipt set total_amount = '$total_amount' where receipt_number = $id;";
    }
    if($receipt_date!=''){
        $sql.="update receipt set receipt_date = '$receipt_date' where receipt_number = $id;";
    }
    if($amount_paid!=''){
        $sql.="update receipt set amount_paid = '$amount_paid' where receipt_number = $id;";
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
    <title>Document</title>
    <link rel="stylesheet" href="2css/receiptupdate.css">
</head>
<body>
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <select name="receipt_number" id="">
        <?php 
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                ?>
        <option value="<?php echo $row['receipt_number']; ?>"><?php echo $row['receipt_number']; ?></option>
<?php 
            }
        }
?>
    </select>
    <br>
    <label for=""><b>First Name</b></label>
    <input type="text" name="first_name" id="" placeholder =" firstname"><br><br>
    <label for=""><b>Other Names</b></label>
    <input type="text" name="other_names" id="" placeholder =" othernames"><br><br>
    <label for=""><b>Course</b></label>
    <input type="text" name="course" id="" placeholder =" course"><br><br>
    <label for=""><b>Tuition Fees</b></label>
    <input type="text" name="tuition_fees" id="" placeholder =" position"><br><br>
    <label for=""><b>Registration Fees</b></label>
    <input type="text" name="registration_fees" id="" placeholder ="registrationfees"><br><br>
    <label for=""><b>Hostel Fees</b></label>
    <input type="text" name="hostel_fees" id="" placeholder ="hostelfees"><br><br>
    <label for=""><b>Library Fees</b></label>
    <input type="text" name="library_fees" id="" placeholder ="libraryfees"><br><br>
    <label for=""><b>Receipt Date</b></label>
    <input type="text" name="receipt_date" id="" placeholder =" receiptdate"><br><br>
    <label for=""><b>Total Amount</b></label>
    <input type="text" name="total_amount" id="" placeholder =" totalamount"><br><br>
    <label for=""><b>Amount Paid</b></label>
    <input type="text" name="amount_paid" id="" placeholder =" amountpaid"><br><br>
    <div class="input-field">
    <input type="submit" value="Submit" class="btn">
</div>

</form>
</body>
</html>