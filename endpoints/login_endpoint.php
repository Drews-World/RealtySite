<?php 

session_start();

include("../models/models.php"); // aka create_table.php
include("../models/encrypt_and_decrypt.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // fields, using unique username for login
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT id, username, password, firstname, lastname, type FROM users WHERE username=\"$username\"";
    $result = $conn->query($query);


    if($result->num_rows == 1){ 

        
        $user = $result->fetch_assoc(); //gets that table row (user)
        $decrypted_password = decrypt_password($user['password'], $encryption_key);
        
        
        if ( $password == $decrypted_password){
            $account_type = $user['type'];


            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['firstname'];
            $_SESSION['account_type'] = $account_type;


            if ($account_type == 'buyer'){
                header('Location: ../views/buyers_dashboard.php');
            }
            elseif ($account_type == 'seller'){
                header('Location: ../views/sellers_dashboard.php');
            }
            elseif ($account_type == 'admin'){
                header('Location: ../views/admin_dashboard.php');
            }
            else{
                echo 'no valid account type';
            }
        }
        }
        else{
            
            echo 'Error: password or username is incorrect';
        }      

}



?>