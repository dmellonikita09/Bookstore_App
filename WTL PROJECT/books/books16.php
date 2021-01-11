<?php
session_start();
?>
<html>
 <head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
    color: orange;
}
</style>

<title>BOOK STORE</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
.read-more-state {
  display: none;
}

.read-more-target {
  opacity: 0;
  max-height: 0;
  font-size: 0;
  transition: .25s ease;
}

.read-more-state:checked ~ .read-more-wrap .read-more-target {
  opacity: 1;
  font-size: inherit;
  text-align:left;
  max-height: 999em;
}

.read-more-state ~ .read-more-trigger:before {
  content: 'Show more';
}

.read-more-state:checked ~ .read-more-trigger:before {
  content: 'Show less';
}

.read-more-trigger {
  cursor: pointer;
  display: inline-block;
  padding: 0 .5em;
  color: #666;
  font-size: .9em;
  line-height: 2;
  border: 1px solid #ddd;
  border-radius: .25em;
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
}
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
echo '<li class="dropdown"><a href="cart.php" id="name"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;</a>';
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
<center>
 <div class="nav navbar-nav">
	  <form action="addcart.php" method="GET">
<br>
<img src="books16.jpg" height="450" style="position:absolute;left:50px;top:170px;border-radius:8px;shadow:20px 20px white;"></img>
<p id="here"></p>
<br>  
<div style="position:absolute;left:640px;top:170px;">
<p><h1><b>Revolution 2020: Love,<br> Corruption, Ambition</b></h1><H4>by Chetan Bhagat<br><br>Price: &#x20b9;160<br><br>Star Rating:<br>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star-half-full" style="font-size:20px;color:orange"></span><br>
<b>Description:</b><br>
</div><br><br>
<div width="100" style="text-align:justify;position:relative;left:650px;top:160;font-size:15;">
  <input type="checkbox" class="read-more-state" id="post-1" />
  <p class="read-more-wrap">
Book Summary of Revolution 2020 Once upon a time, in small-town<br> 
India, there lived two intelligent boys. One wanted to use <br>
his intelligence to make money. One wanted to use his <br>
intelligence to create a revolution. The problem was, they both<br>
loved the same girl. Welcome to Revolution 2020.<br>
<span class="read-more-target">
 A story about childhood friends Gopal, Raghav and Aarti who<br> 
struggle to find success and love in Varanasi. However, it <br>
isn't easy to achieve this in an unfair society that rewards<br>
the corrupt. As Gopal gives in to the system, and Raghav <br>
fights it, who will win? 
 </span></p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;<label for="post-1" class="read-more-trigger"></label>
</div>

<div style="position:relative;float:left; left:735px;top:170;">
  <input type="hidden" name="on0" value="Color">
  <label for="os0">Select number of books</label>
    <select name="os0" id="os0">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
  </select>
  <br>
  <br>
  <br>
  <input type="image" name="submit"
    src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_addtocart_120x26.png"
    alt="Add to Cart" value="revolution 2020">
	<br>
<br>
	 </div>
</form>
</div>
</center>
<br>
<br>
</body>
</html>