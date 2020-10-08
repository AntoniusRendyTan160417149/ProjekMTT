<?php
session_start();
$iditem = $_GET['iditem'];
$cancel = 'CANCEL';
$mysqli = new mysqli("localhost", "root", "", "mybidding");
$stmt = $mysqli->query("UPDATE items SET status = '".$cancel."' WHERE iditem = '".$iditem."'");

echo $iditem;

if($stmt == TRUE)
{
	header('location:home.php');
}
else
{
	echo "Gagal Update";
}

?>