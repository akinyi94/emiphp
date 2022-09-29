<?php
include 'dbconn.php';

if($_SERVER["REQUEST_METHOD"]  == "POST"){
    $fname=mysqli_real_escape_string($conn,input_cleaner($_POST['fname']));
    $mname=mysqli_real_escape_string($conn,input_cleaner($_POST['mname']));
    $lname=mysqli_real_escape_string($conn,input_cleaner($_POST['lname']));
    $gender=mysqli_real_escape_string($conn,input_cleaner($_POST['gender']));
    $position=mysqli_real_escape_string($conn,input_cleaner($_POST['position']));
    $department=mysqli_real_escape_string($conn,input_cleaner($_POST['department']));

    $id='1';


    $sql='';

    if($fname!=''){
        $sql.="update staff set firstname = '$fname' where staffid = $id; ";
    }
    if($mname!=''){
        $sql.="update staff set middlename = '$mname' where staffid = $id; ";
    }
    if($lname!=''){
        $sql.="update staff set lastname = '$lname' where staffid = $id;";
    }
    if($gender!=''){
        $sql.="update staff set gender = '$gender' where staffid = $id;";
    }
    if($position!=''){
        $sql.="update staff set position = '$position' where staffid = $id;";
    }
    if($department!=''){
        $sql.="update staff set department = '$department' where staffid = $id;";
    }

    if($sql != ""){
        if(mysqli_multi_query($conn,$sql)){
            echo "change successful";
        }else{
            echo mysqli_error($conn);
        }
    }


}

function input_cleaner($input){
    $input=trim($input);
    $input=stripslashes($input);
    $input=htmlspecialchars($input);
    return$input;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type="text" name="fname" id="" placeholder =" firstname"><br>
    <input type="text" name="mname" id="" placeholder =" middlename"><br>
    <input type="text" name="lname" id="" placeholder =" lastname"><br>
    <select name="gender" id="">
        <option value="male">male</option>
        <option value="female">female</option>
        <option value="other">other</option>
    </select><br>
    <input type="text" name="position" id="" placeholder =" position"><br>
    <input type="text" name="department" id="" placeholder ="department"><br>
    <input type="submit" value="submit">
</form>
</body>
</html>