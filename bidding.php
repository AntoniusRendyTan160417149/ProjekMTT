<?php 
session_start();
		//session_start();

if(!isset($_SESSION['nama']))
{
	header('location:login.php');
	//echo $_SESSION['nama'];
}
else
{
  $usn = $_SESSION['nama'];
}
$iditem = $_GET['iditem'];
$iduser = $_GET['iduser_owner'];



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post">
	<div style="margin-left: 200px">
		<input type="number" name="komentar" placeholder="Value"><br>
		<input type="submit" name="btnsubmit" value="balas">
	</div>
</form>
	
</body>
</html>

<?php

if(isset($_POST['btnsubmit'])){
	$idusers = $_SESSION['nama'];
	$default = 0;
	$price = $_POST['komentar'];
	//echo "aaa";
	$insert = $mysqli->prepare("INSERT INTO biddings(iduser, iditem, price_offer, is_winner) VALUES (?, ?, ?, ?)");
	$insert->bind_param('siii', $idusers, $iditem, $price, $default);
	$insert->execute();
	//echo  $idusers . $iditem . $price . $default;
}

?>