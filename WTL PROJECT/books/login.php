<html>
<head>
<title>Login</title>
</head>
<body>
<html>
<head>
<title>BOOK STORE</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  html {
    overflow: scroll;
    overflow-x: hidden;
}
::-webkit-scrollbar {
    width: 0px;  /* remove scrollbar space */
    background: transparent;  /* optional: just make scrollbar invisible */
}
/* optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #FF0000;
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
<a href="main.html" target="_top"><img src="BOOKS.JPG" height="50px" width="100px" style="position:absolute; left:350px; top:20px;">
</a>
<font size="35">&nbsp;ANC BOOKSTORE</font>
</header>

<center>
<div id="container_demo" >
	<a class="hiddenanchor" id="toregister"></a>
	<a class="hiddenanchor" id="tologin"></a>
	<div id="wrapper">
		<div id="login" class="animate form">
			<form  method="POST" action="loginveri.php" autocomplete="on"> 
				<h1>Log in</h1> 
				<p> 
					<label for="username" class="uname" data-icon="u" >Email ID: </label>&nbsp;&nbsp;&nbsp;
					<input id="email" name="email" required="required" type="text" value="<?php if(isset($_COOKIE["email"])){echo $_COOKIE["email"];}?>" placeholder="mymail@mail.com"/>
				</p>
				<p> 
					<label for="password" class="youpasswd" data-icon="p">Password: </label>&nbsp;
					<input id="pass" name="pass" required="required" type="password" value="<?php if(isset($_COOKIE["pass"])){echo $_COOKIE["pass"];}?>" placeholder="X8df!90EO"/> 
				</p>
				<p class="keeplogin"> 
					<input type="checkbox" name="check" id="check"/> 
					<label for="check">Keep me logged in</label>
				</p>
				<p>
				<form>
				<button type="submit" name="Submit" style="text-align:center;background-color:orange;color:white;border-radius:8px;shadow:10px 10px white;">Login</button>
				</form>				
				</p>
				<p class="change_link">
					Not a member yet ?
					<a href="register.html" class="to_register">Join us</a>
				</p>
			</form>
		</div>
	</div>
</div>  
</center>
</body>
</html>