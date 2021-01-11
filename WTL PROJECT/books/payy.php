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
$result = mysqli_query($conn,"SELECT * FROM member WHERE name = '". $_COOKIE["user"]."'");
while ($row = mysqli_fetch_assoc($result)) 
	{
     $wallet =$row['wallet'];
	}
	$total=$_COOKIE["total"];
?>
<html>
<head>
<title>Payment</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	</script>
  
  <style>
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
<br>
<br>
<br>
<center>
<?php if($wallet>=$total)
{echo '<h2>Your Wallet Balance is&nbsp;<b>₹'.$wallet.'</b></h2><br><br>';
	echo '<a href="donepay1.php"><button type="button"style="text-align:center;background-color:orange;color:white;border-radius:8px;shadow:10px 10px white;"><h3>Pay by Wallet</h3></button></a>';
	}
else{
	$req=$total-$wallet;
	setcookie("req",$req,time()+100,"/");
	echo '
<h2>Your Wallet Balance is&nbsp;<b>₹'.$wallet.'</b></h2><br><br>
<h2>Add Money To Wallet</h2>
<h2>Required amount is ₹'.$req.'</h2>
<form action ="donepay.php" method="POST" onsubmit="return check();">
<label for="username" class="cno" data-icon="u" >Amount:</label>
					<input id="amt" name="amt" required="required" size="25" type="text"/>
					<br>
					<br>
<label for="username" class="cno" data-icon="u" id="check" name="check">Card Number: </label>
					<input id="username" name="username" required="required"size="25" type="text"/>
					<br>
					<br>
									<label for="username" class="uname" data-icon="u" >Expiry date: </label>
								<select>
							<option value="">Month</option>
							<option value="01">Jan (01)</option>
							<option value="02">Feb (02)</option>
							<option value="03">Mar (03)</option>
							<option value="04">Apr (04)</option>
                            <option value="05">May (05)</option>
                            <option value="06">June (06)</option>
                            <option value="07">July (07)</option>
                            <option value="08">Aug (08)</option>
                            <option value="09">Sep (09)</option>
                            <option value="10">Oct (10)</option>
                            <option value="11">Nov (11)</option>
                            <option value="12">Dec (12)</option>
						</select>
						<select>
					<option  value="">Year</option>';
					echo "
									<option value='2017'>2017</option>
									<option value='2018'>2018</option>
									<option value='2019'>2019</option>
									<option value='2020'>2020</option>
									<option value='2021'>2021</option>
									<option value='2022'>2022</option>
									<option value='2023'>2023</option>
									<option value='2024'>2024</option>
									<option value='2025'>2025</option>
									<option value='2026'>2026</option>
									<option value='2027'>2027</option>
									<option value='2028'>2028</option>
									<option value='2029'>2029</option>
									<option value='2030'>2030</option>
									<option value='2031'>2031</option>
									<option value='2032'>2032</option>
									<option value='2033'>2033</option>
									<option value='2034'>2034</option>
									<option value='2035'>2035</option>
									<option value='2036'>2036</option>
									<option value='2037'>2037</option>
									<option value='2038'>2038</option>
									<option value='2039'>2039</option>
									<option value='2040'>2040</option>
									<option value='2041'>2041</option>
									<option value='2042'>2042</option>
									<option value='2043'>2043</option>
									<option value='2044'>2044</option>
									<option value='2045'>2045</option>
									<option value='2046'>2046</option>
									<option value='2047'>2047</option>
									<option value='2048'>2048</option>
									<option value='2049'>2049</option>
									<option value='2050'>2050</option>
									<option value='2051'>2051</option>
									<option value='2052'>2052</option>
									<option value='2053'>2053</option>
									<option value='2054'>2054</option>
									<option value='2055'>2055</option>
									<option value='2056'>2056</option>
									<option value='2057'>2057</option>
									<option value='2058'>2058</option>
									<option value='2059'>2059</option>
									<option value='2060'>2060</option>
									<option value='2061'>2061</option>
									<option value='2062'>2062</option>
									<option value='2063'>2063</option>
									<option value='2064'>2064</option>
									<option value='2065'>2065</option>
									<option value='2066'>2066</option>
									</select>
									<br><br>";
									echo '
                        <label for="username" class="uname" data-icon="u" >CVV: </label>
					<input id="username" name="username" required="required" size="25" type="text" maxlength="3"/>
					<br>
					<br>
					 <font size="2">Visa/Mastercard/Diners</font><br>
					<font size="-2">(Verification number is the last 3 digits on signature panel on the back of your card.)</font>
									<br>
									<br>
			              <div class="a-form-actions">
               <button  type="submit" class="a-button-text submit-button-with-name"  style="text-align:center;background-color:orange;color:white;border-radius:8px;shadow:10px 10px white;"name="submit" value="submit">Make Payment</button>
                <a href="payment.php"> <button class="a-button-text submit-button-with-name"  style="text-align:center;background-color:orange;color:white;border-radius:8px;shadow:10px 10px white;" name="shipToThisAddress" value="Cancel" data-testid="">Cancel</button></a>
          </div>
</form>';}?>
	</center>
</body>
</html>