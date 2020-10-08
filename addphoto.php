<?php
session_start();


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  
  $iduser = $_SESSION['nama'];
  $caption = $_POST['caption'];
  $price = $_POST['price'];
  $status = $_POST['status'];

  $mysqli = new mysqli("localhost", "root", "", "mybidding");
  
  $insert = $mysqli->prepare("INSERT INTO items(iduser_owner, name, date_posting, price_initial, status, image_extention) VALUES (?, ?, CURRENT_TIMESTAMP, ?, ?, ?)");
  
  $uploadOk = 0;
  

  if(isset($_FILES['fileToUpload']))
  {
    $type = $_FILES['fileToUpload']['type'];
    $nama = $_FILES['fileToUpload']['name'];
    $ukuranarr = $_FILES['fileToUpload']['tmp_name'];
    for ($i=0; $i < sizeof($ukuranarr); $i++) { 
      
      $ext = substr($type[$i], -3);
      
      $insert->bind_param('ssiss', $iduser, $caption, $price, $status, $ext);
      $insert->execute();

      $cari = $mysqli->query("SELECT * FROM items ORDER BY iditem DESC");
      $row = $cari->fetch_assoc();
      $namafile = $row['iditem'];
      $namafilefix = $namafile.".".$ext;
      $nama[$i] = $namafilefix;

      $allowTypes = array('jpg','png');
      if(move_uploaded_file($ukuranarr[$i], 'uploads/'.$nama[$i])){
        $uploadOk = 1;
      
      }
    }
  }

  if($uploadOk == 1)
  {
    header('location:home.php');
  }
  else
  {
    echo "Gagal Upload Harus .jpg atau .png";
  }

}



?>