<?php
include 'includes/conn.php';

$username = 'newadmin'; 
$password = 'admin123'; 
$firstname = 'John'; 
$lastname = 'Doe'; 
$photo = 'default.jpg';
$created_on = date('Y-m-d');

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO admin (username, password, firstname, lastname, photo, created_on) 
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $username, $hashed_password, $firstname, $lastname, $photo, $created_on);

if($stmt->execute()){
    echo "Admin created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();