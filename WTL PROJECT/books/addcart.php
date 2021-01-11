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
if(isset($_COOKIE["user"]))
{ 
if(empty($_SESSION['cart']))
{
  $_SESSION['cart'] = array();
$_SESSION['total']= array();
}
 $product_id = $_GET['submit'];
 $raw_results = mysql_query("SELECT * FROM book_det WHERE (`name` LIKE '%".$product_id."%')");
			while($results = mysql_fetch_array($raw_results)){
			$price=$results['price'];
			$avail=$results['stock'];}
			$quant=$_GET['os0'];
            $total=$price*$quant;
			if($avail=="YES")
			{
  if(isset($_SESSION['cart']))
  { 
	  if(!in_array($product_id, $_SESSION['cart'])){
    array_push($_SESSION['total'],$total);
    array_push($_SESSION['cart'],$product_id);
	 }
	header("Location: cart.php");
}
}
else
{
echo "<script>
          window.location.href='main.php';
          alert('Book is out of stock');
          </script>";
}
}
else
{
	echo "<script>
          window.location.href='login.php';
          alert('Please Login');
          </script>";
}
	 $conn->close();
?>