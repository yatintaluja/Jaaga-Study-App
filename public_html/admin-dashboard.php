<?php
session_start();
if(!isset($_SESSION['userid'])){
header ('Location: index.php');
}
$uid=$_SESSION['userid'];
$con=mysql_connect("localhost","","") or die(mysql_error());
$db=mysql_select_db("") or die(mysql_error());
$id=$_REQUEST['idd'];
if(isset($_POST['submit']))
{

  $title=$_POST['title'];
  $desc=$_POST['description'];
  $status=$_POST['status'];
  # code...
$priority=$_POST['type'];
 $temp=$_FILES['image']['tmp_name'];
 if(is_uploaded_file($_FILES['image']['tmp_name']))
{
  //echo "hi";
  $temp=$_FILES['image']['tmp_name'];
  $pic="images/".$_FILES['image']['name'];
  move_uploaded_file($temp,$pic);
  $query1=mysql_query("update issue set title='".$title."',status='".$status."',description='".$desc."',image='". $pic."',priority='".$priority."' where id='".$id."'") or die(mysql_error());
  
}
else
{
//echo "<pre>"; print_r($_FILES); echo "</pre>";
$query1=mysql_query("update issue set title='".$title."',status='".$status."',description='".$desc."',priority='".$priority."' where id='".$id."'") or die(mysql_error());

  }

}
if(isset($_REQUEST['id1']))
{
$id1=$_REQUEST['id1'];
$query2=mysql_query("delete from issue where id='".$id1."'")or die(mysql_error());

}
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
        <a class="navbar-brand" href="login.html">
          JAAGA STUDY
        </a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="issues.php">Check Issues</a></li>
        <li><a href="create.php">Create new Issue</a></li>
        <li><a href="index.php">logout</a></li>
      </ul>
    </div> <!-- container -->
  </div> 
  </div>

		<div class="container">
			<div class="row">
        <table class="table">
          <thead>
              <tr style="color:red; font-size:1.5em">
                <td>Title</td><td>Description</td><td>Reporter</td><td>Priority</td><td>Status</td><td>Image</td><td>Action</td>
              </tr>
          </thead>
            <tbody>
			<?php while($row=mysql_fetch_array($query))	{
			$query1=mysql_query("select name from user where id='". $row['uid']."'");
			while($row1=mysql_fetch_array($query1)){
			$uname=$row1['name'];
			}
			?><div class="col-md-12">
						  <tr> 
                <td class="col-md-2"><h3><?php echo $row['title'];?></h3></td>
                  <td class="col-md-3"><h4><?php echo $row['description'];?><br /></h4></td>
                  <td class="col-md-2"><h4><?php echo $uname;?><br /></h4></td>
                  <td class="col-md-1"><h4><?php echo $row['priority'];?></h4></td>
                  <td class="col-md-1"><h4><?php echo $row['status'];?></h4></td>
                  <td class="col-md-2"><img class="thumbnail" src="<?php echo $row['image'];?>" width=100px height=100px alt="food" /></td>
                  <td class="col-md-1"><a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-primary">Edit</a></td>
                  <td class="col-md-1"><a href="admin-dashboard.php?id1=<?php echo $row['id'];?>" class="btn btn-primary">Delete</a></td>
                  
                </tr>
                
                <?php }?>
                </tbody>
           </table>
					    <a href="admincreate.php" class="btn btn-danger">Create new Issue</a>
            </div>
			</div>
		</div>


</body>

