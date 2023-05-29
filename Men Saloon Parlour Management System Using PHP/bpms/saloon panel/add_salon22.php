<?php
include('include/dbconnection.php');


if (isset($_POST['add'])) {
    // echo "ok";
    $salon_name = $_POST['salon_name'];
    $imageCount = count($_FILES['image']['name']);
    for ($i = 0; $i < $imageCount; $i++) {
        $imageName = $_FILES['image']['name'][$i];
        $imageTempName = $_FILES['image']['tmp_name'][$i];
        $targetpath = "./images/" . $imageName;
        if (move_uploaded_file($imageTempName, $targetpath)) {
            $sql = "INSERT INTO images(image_file,saloon_name)VALUES (' $imageName','$salon_name')";
            $result = mysqli_query($con, $sql);
        }
    }

    if ($result) {
        echo '<script type="text/javascript">';
        echo ' alert("Data and Image Added Succesfully")';  //not showing an alert box.
        echo '</script>';
    }






    // $sql = "INSERT INTO multiple_saloons (id,name) VALUES ($salon_id,'$salon_name')";
    // if (mysqli_query($con, $sql) == TRUE) {
    //     echo "Data Inserted successfully";
    // } else {
    //     echo "Data Not Inserted";
    // }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Saloon Form</title>
    <link rel="stylesheet" type="text/css" href="styler.css">
</head>

<body>
    <div class="container">
        <h1>New Saloon </h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- <label for="email">Saloon Number</label>
            <input type="text" id="email" name="salon_link" placeholder="Enter the saloon number" required> -->


            <label for="name">Saloon Name</label>
            <input type="text" id="name" name="salon_name" placeholder="Enter the saloon name" required>


            <label>Saloon Service Images</label>
            Select Image Files to Upload:<br>
            <input type="file" name="image[]" multiple>

            <!-- <label for="email">Saloon Link</label>
            <input type="text" id="email" name="salon_link" placeholder="Enter the saloon link" required> -->

            <input type="submit" name="add" value="Add">
        </form>
    </div>

    <div class="container">
        <h1>Back to Home Page</h1>
        <p><a href="blank.php">Go back to Home page</a></p>
    </div>
</body>

</html>