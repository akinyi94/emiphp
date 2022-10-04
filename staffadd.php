<?php
include 'dbconn.php';
if($_SERVER['REQUEST_METHOD'] == "POST"){

  $fname=inputCleaner($_POST['fname']);
  $mname=inputCleaner($_POST['mname']);
  $lname =inputCleaner($_POST['lname']);
  $gender =inputCleaner($_POST['gender']);
  $position =inputCleaner($_POST['position']);
  $department =inputCleaner($_POST['department']);

  // if($name!=''and$email!=''and$password!=''){
    $sql="INSERT INTO staff(firstname,middlename,lastname,gender,position,department)values(
      '$fname','$mname','$lname','$gender','$position','$department'
    )";

    if(mysqli_query($conn,$sql)){
      echo "data insered successfully";
    }else{
      echo mysqli_error($conn);
    }

  // }
}

function inputCleaner($input){
  $input=trim($input);
  $input=stripslashes($input);
  $input=htmlspecialchars($input);
  return $input;
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

<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method='POST'>
<input type="text" name="fname" id="" placeholder='first name'>
<input type="text" name="mname" id="" placeholder='middle name'>
<input type="text" name="lname" id="" placeholder='last name'>
<select name="gender" id="">
<option value="male" checked>male</option>
<option value="female">female</option>
<option value="other">other</option>
</select>
<input type="text" name="position" id="" placeholder='position'>
<input type="text" name="department" id="" placeholder='department'>
<!-- <input type="email" name="email" id=""> -->
<!-- <input type="password" name="password" id=""> -->
<input type="submit" value="submit">
</form>
  
</body>
</html>