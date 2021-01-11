<?php session_start();?>
<html>
<head>
<title>BOOK STORE</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script language="javascript" type="text/javascript" src="image.js"></script>
<style>
a:link, a:visited { 
    color: black;
    text-decoration: underline;
}
a:hover, a:visited, a:link, a:active
{
	color: black;
    text-decoration: none;
}
.zoomin td{
  height: 200px;
  width: 200px;
  float: left;
  -webkit-transition: all 2s ease;
     -moz-transition: all 2s ease;
      -ms-transition: all 2s ease;
          transition: all 2s ease;
		 
}
p{
visibility:hidden;
}

td{
padding:50;
text-align:center;
}

.zoomin img:hover +p{
  visibility:visible;
}
.zoomin img:hover{
  width: 300px;
  height: 300px;
}
div.container {
    width: 100%;
    border: 1px solid gray;
}

.carousel .item {
  height: 300px;
}

.item img {
    min-height: 300px;
}

header, footer {
    padding: 1em;
    color: white;
    background-color: orange;
    clear: left;
    text-align: center;
}

nav {
    background-color:orange;
}

nav ul {
    list-style-type: none;
    padding: 0;
}
   
nav ul a {
    text-decoration: none;
}
nav ul li:hover {
    background-color:#424242;
	color:white;
	opacity:04;
}

article {
    overflow: hidden;
}

ul#tab li{
display: inline-block;
align-items: right;
padding: 0% 15px;
}
ul#tab li a{
text-decoration: none;
color:white;
}
.dropdown-menu .sub-menu {
  left: 100%;
  position: absolute;
  top: 0;
  visibility: hidden;
  margin-top: -1px;
}

.dropdown-menu li:hover .sub-menu {
  visibility: visible;
}

.dropdown:hover .dropdown-menu {
  display: block;
}

ul#tab li:hover{
background-color: rgb(89,87,83);
cursor: pointer;
}
ul#tab li{
cursor: pointer;
}

{
  box-sizing: border-box;
}}
</style>
</head>
<body>
<header>
<a href="main.php" target="_top"><img src="BOOKS.JPG" height="50px" width="100px" style="position:absolute; left:350px; top:20px;">
</a>
<font size="35">&nbsp;ANC BOOKSTORE</font>
</header>
<nav class="navbar navbar-default" style="background-color:orange;">
  <div class="container-fluid" >
  <ul class="nav navbar-nav">
        <li><a href="main.php"><font color="white">Home</font></a></li>
	  <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><font color="white">About Us </font><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="intro.html">Introduction</a></li>
                            <li><a href="#">The Founder</a></li>
                            <li><a href="trustee.html">Board of Trustees</a></li>
							<li><a href="#">Management</a></li>
							<li><a href="#">Mission and Motto</a></li>
							<li><a href="#">Awards and Accreditations</a></li>
							<li><a href="#">Media</a></li>
                            </ul>
                    </li>
                	<li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><font color="white">Categories</font><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="select.php?item=Fiction">Fiction</a></li>
                            <li><a href="select.php?item=Romance">Romance</a></li>
                            <li><a href="select.php?item=Historical Fiction">Historical Fiction</a></li>
							<li><a href="select.php?item=Humour">Humour</a></li>
							<li><a href="select.php?item=Non Fiction">Non Fiction</a></li>
							<li><a href="select.php?item=Fantasy">Fantasy</a></li>
                        </ul>
                    </li>
					<li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><font color="white">Authors</font><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="select.php?item=Danzy Senna">Danzy Senna</a></li>
                            <li><a href="select.php?item=Tom Perotta">Tom Perotta</a></li>
                            <li><a href="select.php?item=Sarah Dunn">Sarah Dunn</a></li>
							<li><a href="select.php?item=Min Jin Lee">Min Jin Lee</a></li>
							<li><a href="select.php?item=Peter Heller">Peter Heller</a></li>
							<li><a href="select.php?item=Mohsin Hamid">Mohsin Hamid</a></li>
							<li><a href="select.php?item=George Saunders">George Saunders</a></li>
                            <li><a href="select.php?item=Chetan Bhagat">Chetan Bhagat</a></li>
							<li><a href="select.php?item=Amish Tripathi">Amish Tripathi</a></li>
                        </ul>
                    </li>
												   </ul>
					<form class="navbar-form navbar-right" action="search.php" role="search"  method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" value="" placeholder="Search..." name="query" id="query" style="height:28px;">
                    <div class="input-group-btn">
						<button type="submit" id="submit" value="Search" class="btn btn-default" style="height:28px;"><span class="glyphicon glyphicon-search"></span></button>
					</div>
					</div>
            </form>
   <ol class="nav navbar-nav navbar-right">
   <?php 
if(isset($_COOKIE["user"]))
{
echo '<li class="dropdown"><a id="name"><span class="glyphicon glyphicon-user"></span>&nbsp;';
echo $_COOKIE["user"];echo'</a>';
echo '<ul class="dropdown-menu">';

echo '<li><a href="log_out.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>';
echo '</ul></li>';
$total=0;
if(isset($_SESSION['cart']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "obs";
$conn = new mysqli($servername, $username, $password, $dbname);
$link = mysql_connect($servername, $username, $password);
$db_selected = mysql_select_db('obs', $link);    
echo '<li class="dropdown"><a href="cart.php" id="name"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;';
echo '<ul class="dropdown-menu">';	
$a=count($_SESSION['total']);
for($i=0;$i<$a;$i++)
{
$result= mysqli_query($conn,"SELECT * FROM book_det  WHERE (`name` LIKE '%".$_SESSION['cart'][$i]."%')");
	while ($row = mysqli_fetch_assoc($result)) 
	{
     $name =$row['name'];
	 $img=$row['image'];
	 $price=$row['price'];
	 $link=$img;
	$link=str_replace("jpg","php",$link);
echo '<li><a href="'.$link.'"><div>
  <tr><td><img height="60" width="50" src="'.$img.'" style="position:relative;left:40;">
  <span style="text-align:center;"><p style="visibility:visible;font-size:11;bottom:50;left:36;">'.$name.'<br>Price '.$price.'<br> Qty ';
echo  $_SESSION['total'][$i]/$price;
echo '</p></span></div></a></li></td></tr>';
$total=$total+$_SESSION['total'][$i];
}}
echo '<hr style=" background-color:orange; height: 2px;">';
echo'<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total ';echo $total;
echo '</b><hr style=" background-color:orange; height: 2px;">';
echo '</ul></li>'; 
$conn->close();
}
else
{
echo '<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;Cart</a></li>';	
}
}
else{
	echo '<li><a href="register.html"><span class="glyphicon glyphicon-user"></span>&nbsp;Sign Up</a></li>';
    echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>';
}
?>
</ol>
</div>
</nav>
 <div height="100" style="background-color:orange;color:white;text-align:center;">
<b><h1>YOUR CART</h1><b>
</div>
<?php
if(isset($_SESSION['cart']))
{
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "obs";
$conn = new mysqli($servername, $username, $password, $dbname);
$link = mysql_connect($servername, $username, $password);
$db_selected = mysql_select_db('obs', $link); 
$a=count($_SESSION['total']);
echo "<table>";
for($i=0;$i<$a;$i++)
{
$result= mysqli_query($conn,"SELECT * FROM book_det  WHERE (`name` LIKE '%".$_SESSION['cart'][$i]."%')");
	$row = mysqli_fetch_assoc($result);
            $img=$row['image'];
			 $auth=$row['author'];
			 $name=$row['name'];
			$price=$row['price'];
			$link=$row['image'];
			$link=str_replace("jpg","php",$link);
			if($name=="3 MISTAKES")
				$name="THE 3 MISTAKES OF MY LIFE";
			if($name=="ONE NIGHT AT CALL")
				$name="ONE NIGHT AT THE CALL CENTER";
			$c=$i%3;
			if($c<4)
			{
				if($c==0)
				{
					echo "<tr>";
				}
                echo '<td><a href="'.$link.'"><img src="'.$img.'" height="200px" width="200px" style="margin-left:10px;margin-top:2px;border-radius:8px;shadow:2px 2px white;"></img><b style=""><h4>'.$name.'<br>'.$auth.'<br>₹ '.$price.'<br>Qty ';echo $_SESSION['total'][$i]/$price;echo'</h4></a></td>';
			}
			else if($c==4)
			{
				echo '</tr><tr><td><a href="'.$link.'"><img src="'.$img.'" height="200px" width="200px" style="margin-left:10px;margin-top:2px;border-radius:8px;shadow:2px 2px white;"></img><b style=""><h4>'.$name.'<br>'.$auth.'<br>₹ '.$price.'</h4></a></td>';
			}
        }
		echo "</tr></table>";
	setcookie("total",$total,time()+ (86400 * 30), "/");
}
?>
<center>
<div style="background-color:grey;color:white;text-align:center;">
<?php echo "<h2>Total is ";echo $total; echo "</h2>"?>
</div>
<div class="sc-proceed-to-checkout" width="100%">
<a href="main.php"><span class="a-button-inner"><input name="proceedToCheckout" style="background-color:orange;color:white;border-radius:8px;shadow:10px 10px white;"  class="a-button-input" type="submit" value="Continue Shopping">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="payment.php"><span class="a-button-inner"><input name="proceedToCheckout" style="background-color:orange;color:white;border-radius:8px;shadow:10px 10px white;" class="a-button-input" type="submit" value="Proceed to checkout">
</div>
<br>
<br>
</center>
</body>
</html>