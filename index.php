<?php
$insert=false;
if(isset($_POST['name'])){
    $server="localhost";
    $username="root";
    $password="";

    $con=mysqli_connect($server,$username,$password);

    if(!$con){
        die("connection to this database failed due to".mysqli_connect_error());
    }
    // echo "Success Connecting to database";

    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];

    $sql="INSERT INTO `survey`.`ai` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `dt`) VALUES ('$name','$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert=true;
    }else{
        echo "ERROR: $sql  <br> $conn->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="header">
        <h3>Survey Data Collection for ML</h3>
        <br>

        <p>Lets change the world by unleashing the power of AI/ML</p>
        <?php
        if($insert==true){
            echo '<p class="submitMsg">Thanks for submitting the form!</p>';
        }
            
        ?>
        <br/><br/>
    </div>
        <div class="form-container">
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your name:">
            <input type="text" name="age" id="age" placeholder="Enter your Age:">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender:">
            <input type="email" name="email" id="email" placeholder="Enter your Email:">
            <input type="phone" name="phone" id="phone" placeholder="Enter your Phone No:">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter you description here"></textarea> 
            <br>
            <button class="btn">Submit</button>
            
        </form>
    </div>
    </div>
    
</body>
</html>