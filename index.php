<?php
$insert = false;
if(isset($_POST['name'])){
    
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to this database failed due to" .
        mysqli_connect_error());
    }
    // echo "Success Connecting to the db";

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `dt`) VALUES (' $name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    if($con->query($sql) == true){
        // echo "Successfully inserted";
        $insert = true;
    }
    else{
        echo "Error: $sql <br> $con->error";
        // $not_insert = true;
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <img class="bg" src="bg.jpg" alt="Tour">
    <div class="container">
        <h1>Welcome to US trip Form</h1>
        <p>Enter your details to confirm your Participation</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for Submitting the form, we are happy to see you joining us for the trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information there">

            </textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
    
</body>

</html>
