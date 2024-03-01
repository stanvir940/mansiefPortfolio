<?php


    // Include your database connection file
    $connection = mysqli_connect("localhost","root","tanvir","mansi") or die("connection is not done!"); 

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Validate input (perform additional validation as needed)

    // Insert data into the database
    $query = "INSERT INTO mes_table (name, email, message) VALUES ('$name', '$email', '$message')";

    if (mysqli_query($connection, $query)) {
        header("Location:index.php");

    } else {
        echo "Error: " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);



?>