<?php
include 'includes/conn.php';

$voters_id = 'VOT'.rand(1000,9999); // Generate random voter ID
$password = 'voter123'; // Change this
$firstname = 'Jane'; // Change this
$lastname = 'Smith'; // Change this
$photo = 'default.jpg';

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO voters (voters_id, password, firstname, lastname, photo) 
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $voters_id, $hashed_password, $firstname, $lastname, $photo);

if($stmt->execute()){
    echo "Voter created successfully";
    echo "Voter ID: " . $voters_id; // Save this ID for login
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();