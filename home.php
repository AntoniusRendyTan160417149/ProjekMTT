<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php 

session_start();
//jika session nama belum ada maka tidak bisa masuk ke home.php dan akan diarahkan langsung ke login.php
if(!isset($_SESSION['nama']))
{
	header('location:login.php');
}

$iduser = "";
$usn = $_SESSION['nama'];
$mysqli = new mysqli("localhost","root","","mybidding"); //buat nyambungin ke database 


if($mysqli->connect_errno)
{
    echo "Failed to connect to MySQL : ".$mysqli->connect_error;
}

//mengambil data menjadikan satu baris
if (isset($_GET['iduser'])) 
{
  	# code...
  	$iduser = $_GET['iduser'];
}
else
{
  	$iduser = $usn;
}

if ($iduser != $_SESSION['nama']) 
{
  	$usn = $iduser;
  	$stmt = $mysqli->query("SELECT * FROM users WHERE iduser ='".$usn."'"); //memasukkan data ke database dan kalo pake query gapake execute
     //$stmt->execute(); //buat menjalankan querynya
    $row3 = $stmt->fetch_assoc(); //mengambil data menjadikan satu baris
  	echo "<form>
  	<a href=\"home.php\">back</a>
    <a href=\"logout.php\">logout</a>
  	<h2>Nama : ".$row3['name']."</h2></form>"; 
}
else
{
	$stmt = $mysqli->query("SELECT * FROM users WHERE iduser ='".$usn."'"); //memasukkan data ke database dan kalo pake query gapake execute
    //$stmt->execute(); //buat menjalankan querynya
  	   $row2 = $stmt->fetch_assoc(); //mengambil data menjadikan satu baris
  	echo "<form>
  	<a href=\"add.php\">ADD IMAGE</a>
    <a href=\"logout.php\">LOGOUT</a> 
    <h2> Nama : ".$row2['name']."</h2></form>";
  	echo "<h3> Daftar Bidding </h3>";

 }
?>

</body>
<div>

<?php 

  
// $res = $mysqli->query("SELECT * FROM gambar g INNER JOIN posting p ON G.idposting = P.idposting WHERE P.username = '".$usn."' GROUP BY g.idposting ORDER by p.tanggal DESC");

$res = $mysqli->query("SELECT * FROM items ORDER BY iditem DESC");

echo "<table style=\"width:100%\"><tr><th>Nama</th> <th>Waktu</th> <th>Barang</th> <th>Status</th> <th>Cancel</th> </tr>";
while($row = $res->fetch_assoc()) 
{
  	$iditem = $row['iditem'];
  	$ext = $row['image_extention'];
	  $status = $row['status'];
  	$iduser = $row['iduser_owner'];
    $time = $row['date_posting'];


  	if($status == 'OPEN')
  	{
  		if($iduser == $_SESSION['nama'])
  		{

  		  echo "<tr><td>".$iduser. "</td><td>". $time ."</td> <td><a href=\"detail.php?iduser_owner=".$iduser."&iditem=".$iditem."\"><img style=\"float: bottom; width:150px ; margin-right:20px; border: 2px solid black; height: 160px\" src=\"uploads/".$iditem.".".$ext."\"></a> </td> <td>".$status."</td><td><a href=\"cancel.php?iduser_owner=".$iduser."&iditem=".$iditem."\">CANCEL</a></td> </tr>";
  		}	
  		else
  		{
  			echo "<tr><td>".$iduser. "</td><td>". $time ."</td> <td><a href=\"bidding.php?iduser_owner=".$iduser."&iditem=".$iditem."\"><img style=\"float: bottom; width:150px ; margin-right:20px; border: 2px solid black; height: 160px\" src=\"uploads/".$iditem.".".$ext."\"></a> </td> <td>".$status."</td> </tr>";
  		}
  	}
  	else if($status == 'SOLD')
  	{
  		if($iduser == $_SESSION['nama'])
  		{

  		  echo "<tr><td>".$iduser. "</td><td>". $time ."</td> <td><a href=\"detail.php?iduser_owner=".$iduser."&iditem=".$iditem."\"><img style=\"float: bottom; width:150px ; margin-right:20px; border: 2px solid black; height: 160px\" src=\"uploads/".$iditem.".".$ext."\"></a> </td> <td>".$status."</td> </tr>";
  		}
      else
      {
        echo "<tr><td>".$iduser. "</td><td>". $time ."</td> <td><a href=\"bidding.php?iduser_owner=".$iduser."&iditem=".$iditem."\"><img style=\"float: bottom; width:150px ; margin-right:20px; border: 2px solid black; height: 160px\" src=\"uploads/".$iditem.".".$ext."\"></a> </td> <td>".$status."</td> </tr>";
      }	
  		
  	}
  	else if($status == 'CANCEL')
  	{
  		
  		if($iduser == $_SESSION['nama'])
  		{

  			echo "<tr><td>".$iduser. "</td><td>". $time ."</td> <td><a href=\"detail.php?iduser_owner=".$iduser."&iditem=".$iditem."\"><img style=\"float: bottom; width:150px ; margin-right:20px; border: 2px solid black; height: 160px\" src=\"uploads/".$iditem.".".$ext."\"></a> </td> <td>".$status."</td> </tr>";
  		}
      else
      {
        echo "<tr><td>".$iduser. "</td><td>". $time ."</td> <td><a href=\"bidding.php?iduser_owner=".$iduser."&iditem=".$iditem."\"><img style=\"float: bottom; width:150px ; margin-right:20px; border: 2px solid black; height: 160px\" src=\"uploads/".$iditem.".".$ext."\"></a> </td> <td>".$status."</td> </tr>";
      }
  		
  	}
  	
  	
} 
echo "</table>";
?>

</div> 
</html>


<style>
  table, th, td { border: 1px solid black; }
</style>