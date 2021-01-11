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
$link = mysql_connect($servername, $username, $password);
if (!$link) {
    die('Not connected : ' . mysql_error());
}
$db_selected = mysql_select_db('obs', $link);
if (!$db_selected) {
    die ('Can\'t use obs : ' . mysql_error());
}

$result = mysqli_query($conn,"SELECT * FROM member WHERE email_id='" . $_REQUEST["email"] . "' and password = '". $_REQUEST["pass"]."'");
	$count  = mysqli_num_rows($result);
	
	if($count==0) 
	{
	echo "<script>
          window.location.href='login.php';
          alert('Invalid Username or Password');
          </script>";
	}
	else {
	$result1 = mysqli_query($conn,"SELECT name FROM member WHERE email_id='" . $_REQUEST["email"] . "' and password = '". $_REQUEST["pass"]."'");
	while ($row = mysqli_fetch_assoc($result)) {
     print_r ($row['name']);
	 $cookie_name = "user";
     $cookie_value = $row['name'];
	 if ($_REQUEST["check"]=='1' || $_REQUEST["check"]=='on')
	 {
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
setcookie("email", $_REQUEST["email"], time() + (86400 * 30), "/");
setcookie("pass", $_REQUEST["pass"], time() + (86400 * 30), "/");
	 }
	 else
	 {
		 setcookie($cookie_name, $cookie_value,0, "/");
		 setcookie("email", "", time() + (86400 * 30), "/");
         setcookie("pass", "", time() + (86400 * 30), "/");
	 }
}
    
	header("Location: main.php");
    exit();
} 
    
	

$conn->close();
?>
