<?php
include 'dbconn.php';


if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=mysqli_real_escape_string($conn,input_cleaner($_POST['userid']));
    
    if($id!=''){
        $sql="delete from user where userid = $id;";

        if(mysqli_query($conn,$sql)){
            echo "success";
            header('location: usersadd.php');
        }else{
            echo mysqli_error($conn);
        }
    }
}

function input_cleaner($input){
    $input=trim($input);
    $input=stripslashes($input);
    $input=htmlspecialchars($input);
    return $input;
}
//get existing users by id
$sql= 'select userid from user;';

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
        while ($row =mysqli_fetch_assoc($result)){

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
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <select name="userid" id="">
        <option value="<?php echo $row['userid'];?>"><?php echo $row['userid'];?></option>
    </select>
    <input type="submit" value="delete">
</form>
<?php 
}
    }

        mysqli_close($conn);
        ?>
</body>
</html>