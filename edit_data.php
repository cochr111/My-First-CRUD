<?php
include_once 'dbconfig.php';
if(isset($_GET['edit_id']))
{
	$sql_query="SELECT * FROM user_CRUD WHERE user_id=".$_GET['edit_id'];
	$result_set=mysql_query($sql_query);
	$fetched_row=mysql_fetch_array($result_set);
}
if(isset($_POST['btn-update']))
{
	// variables for input data
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$city_name = $_POST['city_name'];
	// variables for input data
	
	// sql query for update data into database
	$sql_query = "UPDATE user_CRUD SET first_name='$first_name',last_name='$last_name',user_city='$city_name' WHERE user_id=".$_GET['edit_id'];
	// sql query for update data into database
	
	// sql query execution function
	if(mysql_query($sql_query))
	{
		?>
		<script type="text/javascript">
		alert('Data Are Updated Successfully');
		window.location.href='index.php';
		</script>
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		alert('error occured while updating data');
		</script>
		<?php
	}
	// sql query execution function
}
if(isset($_POST['btn-cancel']))
{
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>EDIT A USER!</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>



<body>
 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Company Logo</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Action Menu <span class="caret"></span></a>
					<ul class="dropdown-menu">
							<li><a href="add_data.php">Add A User</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">Separated link</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#">One more separated link</a></li>
					</ul>
			</li>
			<li><a href="">Link 2</a></li>
			<li><a href="">Link 3</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav> 

	<br>
	<br>
	<br>
	
<div class="container">
<div class="jumbotron">
  <h1>Edit An Existing User's Information</h1>      
  <p>This page will allow you to edit a user's existing information in the MySQL database and see the changes on the homepage. This is accomplished with PHP GET from the homepage and MySql commands in PHP</p>
</div>
</div> <!-- container -->




<div class="container">

<div class="col-md-4 col-xs-12">
<!--EMPTY FOR POSITIONING-->
</div>

<div class="col-md-4 col-xs-12">
<!--BEGIN FORM-->
<form method="POST">

<div class="form-group has-danger">
  <label for="first-name" class="col-2 col-form-label" style="text-align: center;">First Name</label>
  <div class="col-10">
    <input name="first_name" class="form-control form-control-danger" type="text" value="<?php echo $fetched_row['first_name']; ?>" required>
  </div>
</div>


<div class="form-group has-danger">
  <label for="last-name" class="col-2 col-form-label" style="text-align: center;">Last Name</label>
  <div class="col-10">
    <input name="last_name" class="form-control form-control-danger" type="text" value="<?php echo $fetched_row['last_name']; ?>" required>
  </div>
</div>

<div class="form-group has-danger">
  <label for="city" class="col-2 col-form-label" style="text-align: center;">City</label>
  <div class="col-10">
    <input name="city_name" class="form-control form-control-danger" type="text" value="<?php echo $fetched_row['user_city']; ?>" required>
  </div>
</div>



<!--IT IS ESSENTIAL THAT THE SUBMIT BUTTON NOT BE A BUTTON, BUT AN INPUT. IT ALSO MUST BE IN A FORM GROUP OTHERWISE BOOTSTRAP CANNOT CONNECT TO THE PHP ABOVE.-->
<div class="form-group">
<div class="col-xs-6 col-sm-offset-2">
<input id="submit" name="btn-update" type="submit" value="&nbsp;&nbsp;&nbsp;Update User Info&nbsp;&nbsp;&nbsp;" class="btn btn-info">
</div>
</div>

<br>
<br>

<div class="form-group">
<div class="col-xs-6 col-sm-offset-2">
<a href="index.php">
<button type="button" name="btn-cancel" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp;&nbsp; Cancel Changes</button>
</a>
</div>
</div>
</form>
</div>

<div class="col-md-4 col-xs-12">
<!--EMPTY FOR POSITIONING-->
</div>

</div> <!--container-->




<br>
<br>
<br>



    <!--These scripts are required to add because of bootstrap-->
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>






</body>
</html>