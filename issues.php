<?php
session_start();
if(!isset($_SESSION['userid'])){
header ('Location: index.php');
}

$uid=$_SESSION['userid'];
$con=mysql_connect("localhost","","") or die(mysql_error());
$db=mysql_select_db("") or die(mysql_error());
$query=mysql_query("select * from issue")or die(mysql_error());

//echo "select * from issue where uid='".$uid."'";
?>




<html>
<head>
	<title>
		Issues
	</title>
	<!--css file -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
	<link rel="stylesheet" type="text/css" href="css/styles.css" >
</head>
<body>
	 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          JAAGA STUDY
        </a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="issues.php">Check Issues</a></li>
        <li><a href="create.php">Create new Issue</a></li>
        <li><a href="logout.php">logout</a></li>
      </ul>
    </div> <!-- container -->
  </div> 
  </div>

		<div class="container">
			<div class="row">
        <table class="table">
          <thead><tr style="color:red; font-size:2em">
            <td>Title</td>
            <td>Description</td>
            <td>Priority</td>
            <td>Status</td>
            <td>Image</td>
          </tr></thead>
            <tbody>
			<?php while($row=mysql_fetch_array($query))	{
			
			$query1=mysql_query("select name from user where id='". $row['uid']."'");
			while($row1=mysql_fetch_array($query1)){
			$uname=$row1['name'];
			}
			?><div class="col-md-12">
			
					
						  <tr> 
                <td class="col-md-3"><h3><?php echo $row['title'].'<br><span style="color:grey;font-size:0.4em;vertical-align:-100%;line-height:30px;text-align:left;">Reported by: <span style="color:green">'. $uname.'</span></span>';?></h3></td>
                  <td class="col-md-3"><h4><?php echo $row['description'];?><br /></h4></td>
                  <td class="col-md-2"><h4><?php echo $row['priority'];?></h4></td>
                  <td class="col-md-2"><h4><?php echo $row['status'];?></h4></td>
                  <td class="col-md-2"><img class="thumbnail" src="<?php echo $row['image'];?>" width=100px height=100px alt="food" /></td>
                </tr>
                
                <?php }?>
                </tbody>
                </table>
					    <a href="create.php" class="btn btn-danger">Create new Issue</a>
            </div>
			</div>
		</div>


</body>

