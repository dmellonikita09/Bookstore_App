<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "obs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$name = $_REQUEST["name"];
$pass = $_REQUEST["pass"];
$email = $_REQUEST["email"];
$phone = $_REQUEST["numb"];
$sql ="INSERT INTO member(id,name,password,phone_no,email_id,wallet)
VALUES('','$name','$pass','$phone','$email',0)";
if ($conn->query($sql) === TRUE) {
	setcookie("user", $name, time() + (86400 * 30), "/");
    header("Location: main.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
