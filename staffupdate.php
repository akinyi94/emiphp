<?php
include 'dbconn.php';

$sql="select * from staff_details;";

$result=mysqli_query($conn,$sql);

if($_SERVER["REQUEST_METHOD"]  == "POST"){
    $fname=mysqli_real_escape_string($conn,$_POST['fname']);
    $mname=mysqli_real_escape_string($conn,$_POST['mname']);
    $lname=mysqli_real_escape_string($conn,$_POST['lname']);
    $gender=mysqli_real_escape_string($conn,$_POST['gender']);
    $position=mysqli_real_escape_string($conn,$_POST['position']);
    $department=mysqli_real_escape_string($conn,$_POST['department']);


    $id=mysqli_real_escape_string($conn,$_POST['staff_id']);;


    $sql='';

    if($fname!=''){
        $sql.="update staff_details set first_name = '$fname' where staff_id = $id; ";
    }
    if($mname!=''){
        $sql.="update staff_details set middle_name = '$mname' where staff_id = $id; ";
    }
    if($lname!=''){
        $sql.="update staff_details set last_name = '$lname' where staff_id = $id;";
    }
    if($gender!=''){
        $sql.="update staff_details set gender = '$gender' where staff_id = $id;";
    }
    if($position!=''){
        $sql.="update staff_details set position = '$position' where staff_id = $id;";
    }
    if($department!=''){
        $sql.="update staff_details set department = '$department' where staff_id = $id;";
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
    <link rel="stylesheet" href="2css/userupdate.css">
</head>
<body>
   
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <select name="staff_id" id="">
        <?php 
        if($result->num_rows > 0){
            while($row=$result->fetch_assoc()){
                ?>
        <option value="<?php echo $row['staff_id']; ?>"><?php echo $row['staff_id']; ?></option>
<?php 
            }
        }
?>
    </select>
    <br>
    <label for=""><b>First Name</b></label>
    <input type="text" name="fname" id="" placeholder =" firstname"><br><br>
    <label for=""><b>Middle Name</b></label>
    <input type="text" name="mname" id="" placeholder =" middlename"><br><br>
    <label for=""><b>Last  Name</b></label>
    <input type="text" name="lname" id="" placeholder =" lastname"><br><br>
    <label for=""><b>Gender</b></label>
    <select name="gender" id="">
        <option value="male">male</option>
        <option value="female">female</option>
        <option value="other">other</option>
    </select><br><br>
    <label for=""><b>Position</b></label>
    <input type="text" name="position" id="" placeholder =" position"><br><br>
    <label for=""><b>Department</b></label>
    <input type="text" name="department" id="" placeholder ="department"><br><br>
    <div class="input-field">
    <input type="submit" value="Submit" class="btn">
</div>

</form>
</body>
</html>