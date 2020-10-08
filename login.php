<!DOCTYPE html>
<html>
<head>
	<title>Login Instantgram</title>
</head>
<body>
	<div class="wrapper">
	<div class="box-content">
		<div class="header"> 
			<h1 class="oaoe">Login Bidding</h1> 
		</div>
	<form method="post" action="inputLogin.php"> <!-- mengirim ke input login dengan cara post -->
		<div class="input-group">
			<input type="text" placeholder="ID User" name="iduser" class="inputnama">
		</div>
		<div class="input-group">
			<input type="Password" placeholder="Password" name="password" class="inputpw">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
	</div>
			<p class="douhave">
				Don't have an account ? <a href="register.php">Sign up</a> <!-- untuk mengarahkan pada form  signup --> 
			</p>
	</div>
</body>
</html>


<style type="text/css">
*{
	margin: 0px;
	padding: 0px;
}
body{
	background-color: #eee; 
	position: absolute;
}
.wrapper{
	width: 500px;
	height: 80%;
	overflow: hidden;
	border: 0px solid #000;
	margin: 100px 500px;
	padding: 20px;
}
.box-content{
	width: 250px;
	height: 45%;
	background-color: #fff;
	border: 2px solid #e6e6e6;
	margin: 2px auto;
	padding: 40px 50px;
}
.header{
	border: 0px solid #000;
	margin-bottom: 10px;
	 
}
h1.oaoe{
	font-style: normal;
	width: 175px;
	margin: auto;
	position: relative;
	left: -32.5px;	
}
.inputnama,.inputpw{
	width: 100%;
	margin-bottom: 5px;
	padding: 8px 12px;
	border: 1px solid #dbdbdb;
	box-sizing: border-box;
	border-radius: 3px;
}
.btn{
	width: 100%;
	background-color: #3897f0;
	border: 1px solid #3897f0;
	padding: 5px 12px;
	color: #fff;
	font-weight: bold;
	cursor: pointer;
	border-radius: 3px;
}
.douhave{
	width: 250px;
	height: 20px;
	background-color: #fff;
	border: 1px solid #e6e6e6;
	margin: 3px auto;
	padding: 15px 50px;	
}