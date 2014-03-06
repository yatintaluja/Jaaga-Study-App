<?php
session_start();
if(!isset($_SESSION['userid'])){
header ('Location: index.php');
}
$uid=$_SESSION["userid"];
$id=$_REQUEST['id'];
$_SESSION['idd']=$_REQUEST['id'];
$con=mysql_connect("localhost","","") or die(mysql_error());
$db=mysql_select_db("") or die(mysql_error());


$row=mysql_query("select * from issue where id='".$id."'");

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
        <li><a href="#">Home</a></li>
        <li><a href="#">Issues</a></li>
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
     <?php while($result=mysql_fetch_array($row)) {?>
      <div class="col-md-8 coloumnBox">
        <h2>Create An Issue</h2>
        <hr>
        <form role="form" enctype="multipart/form-data" method="post" action="admin-dashboard.php">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter a title for your issue!" value="<?php echo $result['title'];?>">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" class="form-control"><?php echo $result['description'];?></textarea>
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
   <input type="hidden" value="<?php echo $_REQUEST['id'];?>">
          <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </form>
        <p>
          <hr>
        </p>
        <?php }?>
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
