<?php

    $insert = false;

    if(ISSET($_POST['name'])){
        // Set connection variables
        $server = "localhost";
        $username = "root";
        $password = "Oikawa.sql@1";
        

        // Create database connection
        $con = mysqli_connect($server, $username, $password);


        // Check for connection success
        if(!$con){
            die("Connection to the database failed due to" . mysqli_connect_error());
        }


        // Collect post variables
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];
        
        $sql = "INSERT INTO `php_trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', CURRENT_TIMESTAMP());";
        // FORMAT ===>  "INSERT INTO `database name` . `table name` (`records`) VALUES ('$variables');"


        // Execute the query / Insert in database
        if($con->query($sql) == true){
            $insert = true; // used for flash message
        }
        else{
            echo "ERROR: $sql <br> $con->error"; 
        }

        // Close for database connection
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
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dancing+Script&family=Montserrat:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dancing+Script&family=Montserrat:wght@700;900&family=Roboto:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Dancing+Script&family=Montserrat:wght@700;900&family=Roboto:ital,wght@0,400;1,500&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to XYZ Trip Form</h1>
        <p>Enter your Details and Submit this Form to Confirm your Participation in the Trip</p>

        <?php
            if($insert == true){
                echo "<p class='submit_message'>Thankyou for submitting your form. We are happy to see you joining us for the trip</p>";
            }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter Any Other Information Here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>