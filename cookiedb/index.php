


<?php
require "database.php";


if (isset($_COOKIE["user"])) {
	$value=json_decode($_COOKIE["user"]);
	 $sql = "SELECT *FROM userl where username"."=". "'".$value[0]."'"."AND pass=". "'".$value[1]. "'";
 	$result = $db -> query($sql) -> fetch_all();
 	require "profile.php";
	# code...
}else{

}

if (isset($_POST["username"])&&isset($_POST["pass"])) {
	$value=array($_POST["username"],$_POST["pass"]);
	setcookie("user",json_encode($value), time() + (86400 * 30), "/");
	# code...
}

if(isset($_POST["submit"])){
	
	 $sql = "SELECT *FROM userl where username"."=". "'".$_POST["username"]."'"."AND pass=". "'".$_POST["pass"]. "'";
 	$result = $db -> query($sql) -> fetch_all();
	
	if ($result!=null) {
		require "profile.php";
	}else{
		echo "thatbai";
	}}


     ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		.back{
			margin-top: 50px;
			margin-left: 270px;
			background-color: black;
			width: 400px;
			padding: 10px;
			color: white;
		}
		.button{
			width: 400px;
			height: 30px;
			border-radius: 2px;
			border: 2px solid green;
			margin-top: 30px;
			background-color: green;
		}
		button:hover {
			background-color: red;
		}
		input {
			color: white;
			height: 30px;
			width: 400px;
			border: none;
			background: black;
			border-bottom: 1px solid white;
		}
		h1{
			text-align: center;
		}
		a{
			color: white;
		}
	
		p{
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="body">
		<div class="back">
			<h1>Login</h1>
			<form action="" method="post">
				<h3>User name </h3>
				<input type="text" name="username" placeholder="Enter your name" >
				<h3>Password</h3>
				<input type="text" name="pass"placeholder="Enter your password" ><br>
				<button class="button" type="submit" name="submit">Login</button>
				<p>
					<a href="#">Forgot your password</a><br>
					<a href="#">Don't have account?Sign up </a>
				</p>
			</form>
		</div>
	</div>
</body>
</html>

