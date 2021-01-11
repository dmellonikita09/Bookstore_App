<?php 
session_start();  
         setcookie("user", "", time() + (86400 * 30), "/");
		 setcookie("email", "", time() + (86400 * 30), "/");
         setcookie("pass", "", time() + (86400 * 30), "/");
		 setcookie("total", "", time() + (86400 * 30), "/");
         setcookie("req", "", time() + (86400 * 30), "/");
		 session_destroy();
		 header("Location: main.php");
         exit();
?>