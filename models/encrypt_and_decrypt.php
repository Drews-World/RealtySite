<?php

$encryption_key = 'Beyonce concert tickets are not as expensive as I thought'; //normally and ENV variable but this is fine for this app

function encrypt_password($password, $key) {
    // Choose an encryption cipher and mode (e.g., AES-256-CBC)
    $cipher = 'aes-256-cbc';

    // Generate an initialization vector (IV)
    $iv_length = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($iv_length);

    // Encrypt the password
    $encrypted_password = openssl_encrypt($password, $cipher, $key, OPENSSL_RAW_DATA, $iv);

    // Return the encrypted password and IV (concatenated)
    return base64_encode($iv . $encrypted_password);
}

function decrypt_password($encrypted_password, $key) {
    // Choose an encryption cipher and mode (e.g., AES-256-CBC)
    $cipher = 'aes-256-cbc';

    // Extract IV and encrypted password from the concatenated string
    $data = base64_decode($encrypted_password);
    $iv_length = openssl_cipher_iv_length($cipher);
    $iv = substr($data, 0, $iv_length);
    $encrypted_password = substr($data, $iv_length);

    // Decrypt the password
    return openssl_decrypt($encrypted_password, $cipher, $key, OPENSSL_RAW_DATA, $iv);
}


?>
