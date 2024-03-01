<?php

$conn = mysqli_connect("localhost","root","tanvir","mansi") or die("connection is not done!"); 
//if(isset($_POST['submit'])){
    $userName = $_POST["username"];
    $password = $_POST["password"];

    $sql = "select * from mansief_admin where username='$userName' and password ='$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if($count == 1){
        header("Location:showpage.php");

    }
    else {
        echo '<script>
            window.location.href= "adminLogin.php";
            alert("Login failed: Username or password invalid");
            </script>';
    }


    $conn->close();

?>