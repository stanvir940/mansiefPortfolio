
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>
<body>

    <h2>Update Data</h2>

    <form method="post" action="update_page.php">
        <label for="updated_message">Updated Message:</label>
        <input type="text" name="updated_message"  required>
        <button type="submit">Update</button>
    </form>

</body>
</html>


<?php
// Include your database connection file
    $connection = mysqli_connect("localhost","root","tanvir","mansi") or die("connection is not done!");

    if (!isset($_GET['id'])) {
        // Handle the case where 'id' is not present, redirect, show an error, or handle as needed
        echo "Error: ID not provided in the URL";
        exit;
    }
    // Retrieve the row ID from the URL
    $id = $_GET['id'];

    // Fetch the existing data from the database
    $query = "SELECT * FROM mes_table WHERE id = $id";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Error: " . mysqli_error($connection);
        // Handle error or redirect as needed
    }

    // Close the result set
    mysqli_free_result($result);

    // Check if the form is submitted for updating
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve updated data from the form
        $updatedMessage = $_POST['updated_message'];

        // Update the data in the database
        $updateQuery = "UPDATE mes_table SET message = '$updatedMessage' WHERE id = $id";

        if (mysqli_query($connection, $updateQuery)) {
            //echo "Update successful!";
            // Redirect to the display page or any other appropriate page
            header("Location: showdata.php");
            exit;
        } else {
            echo "Error updating record: " . mysqli_error($connection);
            // Handle error as needed
        }
    }

    // Close the database connection
    mysqli_close($connection);
?>
