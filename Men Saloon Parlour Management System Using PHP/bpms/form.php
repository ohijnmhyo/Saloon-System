<?php
$table_name = "";
if (isset($_GET['categoryid'])) {
    $table_name = $_GET['categoryid'];
} else {
    echo 'Table Not Found';
}





?>


<!DOCTYPE html>
<html>

<head>
    <title>Contact Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Service Form</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="name">Service Name</label>
            <input type="text" id="name" name="service_name" placeholder="Enter the service name" required>

            <label for="email">Service Description</label>
            <input type="text" id="email" name="service_description" placeholder="Enter the service description" required>

            <label for="subject">Service Cost</label>
            <input type="text" id="subject" name="service_cost" placeholder="Enter the service cost" required>

            <label for="image">Select image to upload:</label>
            <input type="file" name="image">


            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

    <div class="container">
        <h1>Back to Home Page</h1>
        <p><a href="index.php">Go back to Home page</a></p>
    </div>
</body>

</html>

<?php
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {
    // echo "ok";
    echo '<script type="text/javascript">';
    echo ' alert("Data Added Succesfully")';  //not showing an alert box.
    echo '</script>';
    $service_name = $_POST['service_name'];
    $service_description = $_POST['service_description'];
    $service_cost = $_POST['service_cost'];
    $image = $_FILES['image']['name'];
    $tmpname = $_FILES['image']['tmp_name'];
    $upload = 'admin/images/' . $image;



    $sql = "INSERT INTO tblservices (ServiceName, ServiceDescription, Cost, Image,category_id) VALUES ('$service_name', '$service_description', $service_cost, '$image', $table_name)";
    if (mysqli_query($con, $sql) == TRUE) {
        move_uploaded_file($tmpname, $upload);
        echo "Data Inserted successfully";
    } else {
        echo "Data Not Inserted";
    }










    // if ($_GET['id'] == 2) {
    //     $sql = "INSERT INTO salon2_service (ServiceName, ServiceDescription, Cost, Image) VALUES ('$service_name', '$service_description', $service_cost, '$image')";
    //     if (mysqli_query($con, $sql) == TRUE) {
    //         move_uploaded_file($tmpname, $upload);
    //         echo "Data Inserted successfully";
    //     } else {
    //         echo "Data Not Inserted";
    //     }
    // }



    // if ($_GET['id'] == 3) {
    //     $sql = "INSERT INTO salon3_service (ServiceName, ServiceDescription, Cost, Image) VALUES ('$service_name', '$service_description', $service_cost, '$image')";
    //     if (mysqli_query($con, $sql) == TRUE) {
    //         move_uploaded_file($tmpname, $upload);
    //         echo "Data Inserted successfully";
    //     } else {
    //         echo "Data Not Inserted";
    //     }
    // } else {
    //     echo "Error 404";
    // }
}
?>