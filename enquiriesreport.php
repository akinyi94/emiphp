<?php
//start session for login evaluation
session_start();

//import/include dbconn
include 'dbconn.php';

//view all records at start
$sql= "select * from enquiries;";

if($_SERVER['REQUEST_METHOD']=='POST'){
    //when form is submitted get values and store in variables
    $ordercolumn=mysqli_real_escape_string($conn,$_POST['ordercolumn']);
    $sort=mysqli_real_escape_string($conn,$_POST['sort']);
    // $salary=mysqli_real_escape_string($conn,$_POST['salary']);

    //evaluate for non-empty salary form input(only runs when a value was submitted)
    // if ($salary!=''){
        //use form value to fetch data for enquiries with salary greater than value submitted
        // $sql= "select * from enquiries where salary>'$salary' ORDER BY $ordercolumn $sort;";
    // }else{
        //if no value was submitted ignore salary filter
        $sql= "select * from enquiries ORDER BY $ordercolumn $sort;";
    // }

}

//store result of query in $result variable
$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>records</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style>
        table,th,td {
            border:1px solid black;
            border-collapse:collapse;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- form submits data to same php file for evaluation -->
    <form class='d-flex p-2 w-100' action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
    <!-- fields/ columns to order the report -->
    <select class='form-select me-1' name="ordercolumn" id="">
        <option value="enquiry_id">enquiries id</option>
        <option value="enquiry_date">enquiry date</option>
        <option value="first_name">first name</option>
        <option value="other_names">other names</option>
        <option value="telephone_number">telephone</option>
        <option value="email">email</option>
        <option value="course">course</option>
        <option value="know_us">how</option>
    </select>
    <!-- choose ascending or descending order -->
    <select class='form-select me-1' name="sort" id="">
        <option value="ASC">ascending</option>
        <option value="DESC">descending</option>
    </select>
    <!-- optional salary filter -->
      <!-- <input class='form-control' type="number" name="salary" id="" placeholder='salary'> -->
    <input class='btn btn-success mx-2' type="submit" value="Sort">
</form>

        <!-- table to display report -->
    <table class='table'>
        <tr class='table-dark'>
            <th>Enquiry id</th>
            <th>Enquiry date</th>
            <th>First Name</th>
            <th>Other Names</th>
            <th>Telephone</th>
            <th>Email</th>
            <th>Course</th>
            <th>How</th>
        </tr>

        <!-- using php to populate/add the table data -->
        <?php
        if(mysqli_num_rows($result) > 0){
            while ($row =mysqli_fetch_assoc($result)){
                // start of while loop
                ?>
        <tr>
            <td><?php echo $row['enquiry_id'];?></td>
            <td><?php echo $row['enquiry_date'];?></td>
            <td><?php echo $row['first_name'];?></td>
            <td><?php echo $row['other_names'];?></td>
            <td><?php echo $row['telephone_number'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['course'];?></td>
            <td><?php echo $row['know_us'];?></td>
        </tr>

        <?php
        // end of while loop
    }
    ?>
    </table>

    </div>
</body>
</html>
<?php 
}
//closing mysql connection
mysqli_close($conn);
?>