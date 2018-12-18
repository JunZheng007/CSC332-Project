<?php
/**
 * Created by PhpStorm.
 * User: JUN
 * Date: 2018/12/17
 * Time: 16:40
 */

// Create connection
$conn = new mysqli("localhost", "root", "", "comment");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>