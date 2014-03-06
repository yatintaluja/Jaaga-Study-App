<?php
session_start();
if(!isset($_SESSION['userid'])){
header ('Location: index.php');
}
$uid=$_SESSION["userid"];
$con=mysql_connect("localhost","","") or die(mysql_error());
$db=mysql_select_db("") or die(mysql_error());

if(isset($_POST['submit']))
{

  $title=$_POST['title'];
  $desc=$_POST['description'];
  $status=$_POST['status'];

  # code...
$priority=$_POST['type'];
 $temp=$_FILES['image']['tmp_name'];
  $pic="images/".$_FILES['image']['name'];
  move_uploaded_file($temp,$pic);

$query=mysql_query("insert into issue (title,description,image,priority,uid,status) values ('".$title."','".$desc."','".$pic."','".$priority."','".$uid."','".$status."')") or die(mysql_error());

header("Location:issues.php");
}


?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Jaaga Student Job Board</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    body {
      background: #f6f6f6;
      margin-top: 70px;
      margin-left: 2%;
      margin-right: 2%;
    }
    .coloumnBox {
      background:white;
      margin-right:1%;
    }
  </style>
</head>
<body>
  
  <!-- Navigation Bar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Jaaga</a>
      </div> <!-- navbar-header -->
      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
        
        <li><a href="issues.php">Issues</a></li>
        <li>
          <form class="navbar-form navbar-right" role="form" action="logout.php">
            <button type="submit" class="btn btn-primary">Logout</button>
          </form>
        </li>
      </ul>
      </div><!-- navbar-collapse -->
    </div><!-- container-fluid -->
  </nav><!-- navbar -->

  <div class="container-fluid">
    
    <div class="row">
      
      <div class="col-md-8 coloumnBox">
        <h2>Create An Issue</h2>
        <hr>
        <form role="form" enctype="multipart/form-data" method="post" action="create.php">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter a title for your issue!">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image">
            <p class="help-block">Upload image of your issue here</p>
          </div>
          
          <div class="form-group">
            <label for="">Priority of your Issue</label>
            <select class="form-control" name="type">
              <option>Normal</option>
              <option>Important</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Status</label>
            <select class="form-control" name="status">
              <option>Pending</option>
              <option>Done</option>
            </select>
          </div>
          <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </form>
        <p>
          <hr>
        </p>
      </div>
      <div class="col-md-3 coloumnBox">
        <h3>Tag this Issue</h3>
        <hr>
          <p>
            <a href="#" class="btn btn-warning btn-xs">study <span class="badge">12</span></a>  
          </p>
          <p>
            <a href="#" class="btn btn-danger btn-xs">study <span class="badge">2</span></a>  
          </p>
          <p>
            <a href="#" class="btn btn-success btn-xs">study <span class="badge">32</span></a>  
          </p>
          <p>
            <hr>
          </p>
      </div>

    </div>

  </div>

  <script src="/js/lib/jquery.min.js"></script>
  <script src="/js/lib/bootstrap.min.js"></script>
</body>
</html>
