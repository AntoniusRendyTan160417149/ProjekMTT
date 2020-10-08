<?php
//membuat salt
function generateRandomString($length = 10) { //function random panjangnya 10 di salt
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; //isi salt dari 0-Z
    $charactersLength = strlen($characters); //strlen itu untuk menghitung panjang karakter
    $randomString = ''; //variable
    for ($i = 0; $i < $length; $i++) //melooping character untuk dimasukin ke salt sebanyak length 0-Z
    {
        $randomString .= $characters[rand(0, $charactersLength - 1)]; //gunanya untuk merandom antara 0-Z dimasukkan 1 1 sebanyak total karakter langsung ditambahkan ke variable random string
    }
    return $randomString;
}

  if(isset($_POST['regis'])) {
    $usn = $_POST['iduser'];
    $nama = $_POST['name'];
    $pwd = md5($_POST['password']);
    $salt = generateRandomString(); //ini memanggil diatas yg namanya generateRandom trus salt isinya udah ada dari yg diatas
    $fnlpwd = md5($pwd.$salt); //fnlpwd mwngencripsi pw dan salt
    
    //connect database lagi
    $mysqli = new mysqli("localhost", "root", "", "mybidding");

    if($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    }
    $res = $mysqli->query("SELECT * FROM users WHERE name = '".$usn."'");
    $row = $res->fetch_assoc();

    $cekUsn = $row['username'];
    if ($cekUsn!=$usn) { //jika username tidak sama maka bisa daftar
      $stmt = $mysqli->prepare("INSERT INTO users(iduser,name,password,salt) VALUES (?, ?, ?, ?)"); //memasukkan data baru ke database, knapa tanda tanya karena pengisiannya ada di bawah
      $stmt->bind_param('ssss', $usn, $nama, $fnlpwd, $salt); //'ssss' ini tipe string 4 kali kalo ada int brarti misal ke 2 int jadi 'siss'
      $stmt->execute(); //execute karena kita pakek prepare kalo query gausa dan tanda tanya langsung di isi $usn, $nama, $fnlpwd, $salt
      //$_SESSION["status"]="login";
      header('location:login.php');
    }
    else
    {
  	  echo "username tidak boleh sama";
    }
 }
?>



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