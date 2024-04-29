<?php
session_start();

include("../models/models.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $user_id = $_SESSION['user_id'];
    $price = $_POST['price'];
    $num_bedrooms = $_POST['num-bedrooms'];
    $num_bathrooms = $_POST['num-bathrooms'];
    $sqft = $_POST['sqft'];
    $address = $_POST['address'];


    //let's get image based on property count
    //GSU vps was preventing upload and/or url linking that is not housted at codd.cs.gsu.edu...
    //...so im just incrementing the image assigned to a property based on many properties a user has. (up to 7)
    $sql = "SELECT * FROM properties WHERE user_id = $user_id";
    $current_properties = $conn->query($sql);
    $num_properties = $current_properties->num_rows;
    $image_path = '../assets/house'.$num_properties.'.jpeg';

    
    $sql = "INSERT INTO properties (user_id, price, num_bedrooms, num_bathrooms, sqft, address, image_path) 
            VALUES ('$user_id', '$price', '$num_bedrooms', '$num_bathrooms', '$sqft', '$address', '$image_path')";

    if ($conn->query($sql) === TRUE) {
        //reload their page?
        header('Location: ../views/sellers_dashboard.php');
    } else {
        echo "Error adding property.";
    }
}


?>
