<!DOCTYPE HTML>
<html>  
<body>
  
<div class="wrapper">
<div class="box-content">
<div class="header">
  <h2>Register</h2>
</div>
  <form action="inputRegis.php" method="post">
    <input type="text" name="iduser" class="inputnama" placeholder="ID User"><br>
    <input type="text" name="name" class="inputn" placeholder="Full Name"><br>
    <input type="password" name="password" class="inputpw" placeholder="Password"><br>
    <input type="submit" name="regis" class="btn">
  </form>
</div>
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
.inputnama,.inputn,.inputpw{
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
