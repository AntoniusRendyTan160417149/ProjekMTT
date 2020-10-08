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

echo "<a href=\"home.php\">Home <br></a>";

$mysqli = new mysqli("localhost", "root", "", "mybidding");

if($mysqli->connect_errno) {
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

$res = $mysqli->query("SELECT * FROM items WHERE iditem = '".$iditem."' AND iduser_owner = '" .$iduser. "'");

while($row = $res->fetch_assoc())
{
	if($iduser == $row['iduser_owner'])
	{
		$iduser2 = $iduser;
		$ext = $row['image_extention'];
		$nama = $row['name'];
		$harga = $row['price_initial']; 
	}
}

$res2 = $mysqli->query("SELECT * FROM biddings");


echo "<br><img style=\"float: left; width:250px ; margin-right:20px; border: 2px solid black; height: 320px\" src=\"uploads/".$iditem.".".$ext."\">";
echo "<h1>".$nama."</h1> Harga Mulai Dari : ".$harga ."<br>";
echo "<br>";

while($row2 = $res2->fetch_assoc())
{
	if($iditem == $row2['iditem'])
	{
		echo $row2['iduser']."<br>".$row2['price_offer']."<br>";	
	}
	
}

?>

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