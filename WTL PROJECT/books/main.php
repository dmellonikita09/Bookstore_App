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
<article>
<br>
<div class="container">
<div id="myCarousel" class="carousel slide container" data-ride="carousel">
  <!-- Indicators -->
<ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
	<li data-target="#myCarousel" data-slide-to="3"></li>
	<li data-target="#myCarousel" data-slide-to="4"></li>
</ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active" style="background-color:white;">
	<center>
     <a href="books2.php"><img src="books2.jpg"alt="Mrs. Fletcher"></a>
    </center>
	</div>

    <div class="item" style="background-color:white;">
	<center>
     <a href="books19.php"><img src="books19.jpg" alt="Sita">
    </center>
	</div>

    <div class="item" style="background-color:white;">
	<center>
     <a href="books4.php"><img src="books4.jpg" alt="Sour heart">
    </center>
	</div>
	
	<div class="item" style="background-color:white;">
	<center>
     <a href="books12.php"><img src="books12.jpg" alt="One Indian Girl">
    </center>
	</div>
  
    <div class="item" style="background-color:white;">
	<center>
     <a href="books6.php"><img src="books6.jpg" alt="Pachinko">
    </center>
	</div>

  <div class="item" style="background-color:white;">
  <center>
     <a href="books7.php"><img src="books7.jpg" alt="Lincoln in the Bardo">
    </center>
	</div>
  </div>
  		
  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<br>
<div height="100" style="background-color:orange;color:white;text-align:center;">
<b><h1>BEST SELLERS</h1><b>
</div>
<div class="one" height="200px" width="100px" align="center">
<br>
<table>
<tr>
<td class="zoomin" style:"background-color:white;"><a href="books2.php" target="_self" link><img id="book2" class="aaa" src="books2.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text2" class="zoomin">Author: Tom Perrotta<br>Price: 1375</p></a></td>
<td class="zoomin" style:"background-color:white;"><a href="books3.php" target="_self"><img id="book3" class="aaa" src="books3.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text3"class="aaa">Author: Danzy Senna<br>Price: 1148</p></a></td>
<td class="zoomin" style:"background-color:white;"><a href="books4.php" target="_self"><img id="book4" class="aaa" src="books4.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text4"class="aaa">Author:  Jenny Zhang<br>Price: 479</p></a></td>
</tr>
<tr>
<td class="zoomin" style:"background-color:white;"><a href="books5.php" target="_self"><img id="book5" class="aaa" src="books5.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text5" class="aaa">Author:  Zinzi Clemmons<br>Price: 478</p></a></td>
<td class="zoomin" style:"background-color:white;"><a href="books6.php" target="_self"><img id="book6" class="aaa" src="books6.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text6" class="aaa">Author: Min Jin Lee<br>Price: 918</p></a></td>
<td class="zoomin" style:"background-color:white;"><a href="books7.php" target="_self"><img id="book7" class="aaa" src="books7.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text7" class="aaa">Author:  George Saunders<br>Price: 510</p></a></td>
</tr>
<tr>
<td class="zoomin" style:"background-color:white;"><a href="books8.php" target="_self"><img id="book8" class="aaa" src="books8.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text8" class="aaa">Author:  Sarah Dunn<br>Price:844</p></a></td>
<td class="zoomin" style:"background-color:white;"><a href="books9.php" target="_self"><img id="book9" class="aaa" src="books9.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text9" class="aaa">Author:  Peter Heller<br>Price: 658</p></a></td>
<td class="zoomin" style:"background-color:white;"><a href="books10.php" target="_self"><img id="book10" class="aaa" src="books10.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text10" class="aaa">Author:  Mohsin Hamid<br>Price: 450</p></a></td>
</tr>
<tr>
<td class="zoomin" style:"background-color:white;"><a href="books11.php" target="_self"><img id="book11" class="aaa" src="books11.jpg"onclick="image(this)"  height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text11" class="aaa">Author: Chetan Bhagat <br>Price: 129</p></a></td>
<td class="zoomin" style:"background-color:white;"><a href="books12.php" target="_self"><img id="book12" class="aaa" src="books12.jpg"onclick="image(this)"  height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text12" class="aaa">Author: Chetan Bhagat<br>Price: 96</p></a></td>
<td class="zoomin" style:"background-color:white;"><a href="books13.php" target="_self"><img id="book13" class="aaa" src="books13.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text13" class="aaa">Author: Chetan Bhagat<br>Price: 110</p></a></td>
</tr>
<tr>
<td class="zoomin" style:"background-color:white;"><a href="books14.php" target="_self"><img id="book14" class="aaa" src="books14.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text14" class="aaa">Author: Chetan Bhagat<br>Price: 127</p></a></td>
<td class="zoomin" style:"background-color:white;"><a href="books15.php" target="_self"><img id="book15" class="aaa" src="books15.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text15" class="aaa">Author: Chetan Bhagat<br>Price: 160</p></a></td>
<td class="zoomin" style:"background-color:white;"><a href="books16.php" target="_self"><img id="book16" class="aaa" src="books16.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text16" class="aaa">Author: Chetan Bhagat<br>Price: 153</p></a></td>
</tr>
<tr>
<td class="zoomin" style:"background-color:white;"><a href="books17.php" target="_self"><img id="book17" class="aaa" src="books17.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text17" class="aaa">Author: Chetan Bhagat<br>Price: 146</p></a></td>
<td class="zoomin" style:"background-color:white;"><a href="books18.php" target="_self"><img id="book18" class="aaa" src="books18.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text18" class="aaa">Author: Chetan Bhagat<br>Price: 169</p></a></td>
<td class="zoomin" style:"background-color:white;"><a href="books19.php" target="_self"><img id="book19" class="aaa" src="books19.jpg" height="250px" width="250px" style="margin-left:10px;margin-top:10px;border-radius:8px;shadow:10px 10px white;"><p id="text19" class="aaa">Author:  Amish Tripathi<br>Price: 150</p></a></td>
</tr>
</table>
</article>
</body>
</body>
</html>