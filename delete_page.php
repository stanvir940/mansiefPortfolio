<?php
// Include your database connection file
    $connection = mysqli_connect("localhost","root","tanvir","mansi") or die("connection is not done!");

    // Retrieve the row ID from the URL
    $id = $_GET['id'];

    // Delete the data from the database
    $deleteQuery = "DELETE FROM mes_table WHERE id = $id";

    if (mysqli_query($connection, $deleteQuery)) {
        // echo "Record deleted successfully!";
        // Redirect to the display page or any other appropriate page
        header("Location: showpage.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
        // Handle error as needed
    }

    // Close the database connection
    mysqli_close($connection);
?>
