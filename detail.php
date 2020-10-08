<?php 
session_start();

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
		$price = $row['price_initial'];
	}
}

$res2 = $mysqli->query("SELECT * FROM biddings");

echo "<br><img style=\"float: left; width:250px ; margin-right:20px; border: 2px solid black; height: 320px\" src=\"uploads/".$iditem.".".$ext."\">";
echo "<h1>".$nama."</h1><br>";
echo "Harga mulai Dari : " . $price . "<br>";

while($row2 = $res2->fetch_assoc())
{
	$harga = $row2['price_offer'];
	if($iditem == $row2['iditem'])
	{
		$update = $mysqli->query("UPDATE items SET status = SOLD WHERE iditem = '".$iditem."'");
		$winner = $mysqli->query("UPDATE biddings SET is_winner = 1 WHERE iduser = '".$row2['iduser']."'");
		echo $row2['iduser']."<br>". $harga ."<form method=\"post\"><input type=\"submit\" id=\"submit\" name=\"submit\" value=\"WINNER\"></input></form>";
		


		if(isset($_POST['submit']))
		{
			$carilagi = $mysqli->query("SELECT * FROM biddings WHERE price_offer = '".$harga."'");
			$row3 = $carilagi->fetch_assoc();
			if($harga == $row3['price_offer'])
			{
				echo 'is Winner <br>';	
			}
			
			
		}
	}
}



?>