 <?php

//session start bergna untuk mengambil nilai yg tersimpan di server walaupun kita membuka halaman lainnya 
session_start();

//isset itu buat ngecek
if (isset($_POST['iduser']) && isset($_POST['password']))
{
	//jika pada tombol submit dia mengklik maka. . .
	//login_user ini nama name dari button submit login
	if(isset($_POST['login_user']))
	{
		//-> menjalankan
		//localhost adalah nama xampp kita, root nama user , kosong adalah pw dari php my admin -->jika ada pwnya maka diisi sesuai dengan pw anda, mybidding adalah nama databasenya
		$mysqli = new mysqli("localhost","root","","mybidding"); //buat nyambungin ke database 
		
		//jika database ada yg salah maka memunculkan pesan eror 
		if($mysqli->connect_errno)
		{
			echo "Failed to connect to MySQL : ".$mysqli->connect_error;
		}

		$username = $_POST['iduser']; //variable
		$password = $_POST['password'];

		$md5password = md5($password); //gunanya untuk mengenscripsi sehingga nilainya sama dengan di database 

		$stmt = $mysqli->query("SELECT * FROM users WHERE iduser ='".$username."'"); //memasukkan data ke database dan kalo pake query gapake execute

		//row ini membaca table yg ada pada database 
		$row = $stmt->fetch_assoc(); //mengambil data menjadikan satu baris
		$pwd = $row['password']; //mengambil password dari database
		$salt = $row['salt']; //mengambil salt dari database

		$finalpwd = md5($md5password.$salt); //final pwd ini adalah gabungan antara encripsi pw + salt sehingga bisa masuk 

		//jika pw yg ada di database dan pw yg anda ketikkan sudah masa maka diabisa masuk
		if($pwd == $finalpwd)
		{	
			//jika session nama belum di buat maka kita buatkan terlebih dahulu
			if(!isset($_SESSION['nama'])){
				$_SESSION['nama']= $row['iduser'];
			}
			header('location:home.php?iduser='.$row['iduser']);		 				
		}
		else
		{
			header('location:login.php');			
		}
	}
}

?>



