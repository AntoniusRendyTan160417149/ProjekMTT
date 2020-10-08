<?php
session_start();

if(!isset($_SESSION['nama']))
{
	header('location:login.php');
}
?>

<!DOCTYPE html>
<html>
<body>


<form action="addphoto.php" method="post" enctype="multipart/form-data">
    Select image to upload: 
    <input type="file" name="fileToUpload[]" id="fileToUpload" multiple="multiple"><br><br>
    
    Caption : <br><textarea name="caption"></textarea><br>
    Price : <br> <input type="number" name="price"><br>
    STATUS : <br><input type="text" name="status" value="OPEN" readonly><br><br>
    <input type="submit" value="submit" name="submit"><p>
</form>

</body>
</html>