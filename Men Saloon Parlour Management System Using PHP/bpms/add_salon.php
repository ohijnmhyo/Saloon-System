<?php
include('includes/dbconnection.php');


if (isset($_POST['add'])) {
    // echo "ok";
    echo '<script type="text/javascript">';
    echo ' alert("Data Added Succesfully")';  //not showing an alert box.
    echo '</script>';
    $salon_name = $_POST['salon_name'];
    $salon_id = $_POST['salon_link'];




    $sql = "INSERT INTO multiple_saloons (id,name) VALUES ($salon_id,'$salon_name')";
    if (mysqli_query($con, $sql) == TRUE) {
        echo "Data Inserted successfully";
    } else {
        echo "Data Not Inserted";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Saloon Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>New Saloon </h1>
        <form action="" method="POST">
            <label for="email">Saloon Number</label>
            <input type="text" id="email" name="salon_link" placeholder="Enter the saloon number" required>


            <label for="name">Saloon Name</label>
            <input type="text" id="name" name="salon_name" placeholder="Enter the saloon name" required>



            <!-- <label for="email">Saloon Link</label>
            <input type="text" id="email" name="salon_link" placeholder="Enter the saloon link" required> -->

            <input type="submit" name="add" value="Add">
        </form>
    </div>

    <div class="container">
        <h1>Back to Home Page</h1>
        <p><a href="index.php">Go back to Home page</a></p>
    </div>
</body>

</html>