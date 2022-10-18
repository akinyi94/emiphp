<?php
include 'dbconn.php';


if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=mysqli_real_escape_string($conn,$_POST['user_id']);
    
    if($id!=''){
        $sql="delete from users where user_id = $id;";

        if(mysqli_query($conn,$sql)){
            echo "success";
            header('location: users_add.php');
        }else{
            echo mysqli_error($conn);
        }
    }
}

//get existing users by id
$sql= 'select user_id from users;';

$result=mysqli_query($conn,$sql);

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
    <select name="user_id" id="">
        <?php
        if(mysqli_num_rows($result) > 0){
            while ($row =mysqli_fetch_assoc($result)){
        ?>
        <option value="<?php echo $row['user_id'];?>"><?php echo $row['user_id'];?></option>
    
        <?php
}
?>
    </select>

    <input type="submit" value="delete">
</form>
<?php 

        }
        mysqli_close($conn);
        ?>
</body>   
</body>
</html>