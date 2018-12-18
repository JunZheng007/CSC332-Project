<?php
$id = $_POST['id'];
$username = $_POST['user'];
$comment = $_POST['comment'];

// Create connection
$conn = new mysqli("localhost", "root", "", "comment");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO comment (post_id, user, content)
VALUES ('$id', '$username', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();