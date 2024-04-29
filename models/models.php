<?php
$host = "localhost";
$user = "lmunizgutierrez1";
$pass = "lmunizgutierrez1";
$dbname = "lmunizgutierrez1";




    // ---DB connection 
    $conn = new mysqli($host, $user, $pass, $dbname);


    if($conn->connect_error) {
        echo "Could not connect to server\n";
        die("Connection failed: " . $conn->connect_error);
    } 

	$sql = 'CREATE TABLE IF NOT EXISTS `users` '
            .'(id int(20) AUTO_INCREMENT,'
            .'firstname varchar(60),'
            .'lastname varchar(60),'
			.'username varchar(60),'
            .'email varchar(60),'
			.'password varchar(60),'
			.'type varchar(10),'
			.'primary key (id))';
    

	// mysql_query($sql); 

    //the above function seems to be deprecated, 
    //...online results say no longer useful after php 5, wack

    if ($conn->query($sql) === TRUE) {
       // echo "Table users created successfully";
    } else {
        echo "Error creating users table: " . $conn->error;
    }

    $sql_properties = 'CREATE TABLE IF NOT EXISTS `properties` '
                .'(id int(20) AUTO_INCREMENT,'
                .'user_id int(20),'
                .'price DECIMAL(10, 2),'
                .'num_bedrooms int(10),'
                .'num_bathrooms int(10),'
                .'sqft int(10),'
                .'address varchar(255),'
                .'image_path varchar(255),'
                .'foreign key (user_id) references users(id),'
                .'primary key (id))';

    if ($conn->query($sql_properties) === TRUE) {
        
    } else {
        echo "Error creating properties table: " . $conn->error;
    }
    

?>