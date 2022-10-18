<?php
include 'dbconn.php';


if($_SERVER['REQUEST_METHOD']=='POST'){
    $id=mysqli_real_escape_string($conn,$_POST['invoice_number']);
    
    if($id!=''){
        $sql="delete from billing where invoice_number = $id;";

        if(mysqli_query($conn,$sql)){
            echo "success";
            header('location: invoice_add.php');
        }else{
            echo mysqli_error($conn);
        }
    }
}

//get existing users by id
$sql= 'select invoice_number from billing;';

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
    <select name="invoice_number" id="">
        <?php
        if(mysqli_num_rows($result) > 0){
            while ($row =mysqli_fetch_assoc($result)){
        ?>
        <option value="<?php echo $row['invoice_number'];?>"><?php echo $row['invoice_number'];?></option>
    
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