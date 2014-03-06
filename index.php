<?php
session_start();
$con=mysql_connect("localhost","****","****") or die(mysql_error());
$db=mysql_select_db("**") or die(mysql_error());

if(isset($_POST['submit']))
{

  $email1=$_POST['email'];
$pass2=$_POST['pass'];
$tab=mysql_query("select * from user where email='".$email1."' AND password ='".$pass2."'");

$row=mysql_fetch_array($tab);

if(isset($row['name']))
{
 $_SESSION["username"]=$row['name'];
 $_SESSION["userid"]=$row['id'];
 if($_SESSION["username"]=="Akshay")
 {
 header("Location:admin-dashboard.php");
 }
 else
 {
  header("Location:issues.php");
 
 }
}
 else 
 {
  
 $msg="invalid user";
 }

}


?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Signin </title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="login.css" rel="stylesheet">

   <style type="text/css">
   body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}</style>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" action="index.php" method="post">
        <h2 class="form-signin-heading">Jaaga Study: Login</h2>
        <input type="email" class="form-control" placeholder="Email address" required autofocus name="email">
        <input type="password" class="form-control" placeholder="Password" required name="pass">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <?php if(isset($msg))
        {
          echo "<p style='color:red';>To login, either Get a Password or Hack it!</p>";
        }
        ?>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
