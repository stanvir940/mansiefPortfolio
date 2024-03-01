<!-- display_data.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Document</title>
</head>
<body>
        
    <?php
    // Include your database connection file
        $connection = mysqli_connect("localhost","root","tanvir","mansi") or die("connection is not done!");

        // Retrieve data from the database
        $query = "SELECT * FROM mes_table";
        $result = mysqli_query($connection, $query);

        // Check if the query was successful
        if ($result) {
            // Display the data in an HTML table
            echo "<html><head><title>Display Data</title></head><body>";
            echo "<h1>Data from Database</h1>";
            echo "<table border='1'><tr><th>Name</th><th>Email</th><th>Message</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['message']}</td>";
                echo "<td><a href='update_page.php?id={$row['id']}'>Update</a></td>";
                echo "<td><a href='delete_page.php?id={$row['id']}'>Delete</a></td>";
                echo "</tr>";
            }

            echo "</table></body></html>";

            // Free the result set
            mysqli_free_result($result);
        } else {
            // Query execution failed
            echo "Error: " . mysqli_error($connection);
        }

        // Close the database connection
        mysqli_close($connection);
    ?>

</body>
</html>