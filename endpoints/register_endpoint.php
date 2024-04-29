<?php 
include("../models/models.php"); // aka create_table.php
include("../models/encrypt_and_decrypt.php");



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    //form fields
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = encrypt_password($_POST['password'], $encryption_key);
    $account_type = $_POST['account-type'];
    $query = "SELECT * FROM users WHERE username=\"$username\"";
    $sql = "INSERT INTO `users` (firstname, lastname, username, email, password, type) " . "VALUES (\"$first_name\", \"$last_name\", \"$username\", \"$email\", \"$password\", \"$account_type\")";
     
    //$result = mysql_num_rows(mysql_query($query));   also deprecated, wack
	$result = $conn->query($query);
    
    if($result->num_rows != 0){ //is username taken check
		// let's add some error here not sure how to...
        //...insert that back into the original template yet
        echo 'Error: username is already taken';
	}
	else {
		if ($conn->query($sql) === TRUE) {
            header('Location: ../views/login.php');
        }
		else{
            echo 'Error registering user';
        }
	}
    


    exit; //best practice from what I've seen oline but not needed? same with colsing the db connection...
}



?>
