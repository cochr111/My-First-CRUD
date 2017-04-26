<?php
/*Here, we use the include_once function to ensure that our databse info stored in dbconfig is uploaded and thus usable on this page.*/

include_once 'dbconfig.php';

/*Here, we code the php to say, IF you get the message or the input from the button who's name is "edit_it" DO the following:
1. Select all columns from the user_CRUD table WHERE the the user_id= THE RESULT OF THE mysql_fetch_row($result_set) function in the index.php file.
2. Set the variable result_set equal to the result of that query, or more simply, that information that was extracted in step 1 
3. Place the result in an array, so we can use it later.
*/
if(isset($_GET['edit_id']))
{
	$sql_query="SELECT * FROM user_CRUD WHERE user_id=".$_GET['edit_id'];
	$result_set=mysql_query($sql_query);
	$fetched_row=mysql_fetch_array($result_set);
}


/*
If the user clicks the button with the name "btn-save", which in the HTML is actually: 

<input id="submit" name="btn-update" type="submit" value="&nbsp;&nbsp;&nbsp;Update User Info&nbsp;&nbsp;&nbsp;" class="btn btn-info">
 
 DO THE FOLLOWING
*/
if(isset($_POST['btn-update']))
{
/*Create 3 variables that will store the information that the user entered in the form under first name, last name, and city.*/
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$city_name = $_POST['city_name'];
	
/*Create another variable that will UPDATE the information in the user_CRUD database under first_name, last_name, and user_city WHERE their user_id = the edit ID extracted on the index.php page*/

	$sql_query = "UPDATE user_CRUD SET first_name='$first_name',last_name='$last_name',user_city='$city_name' WHERE user_id=".$_GET['edit_id'];

	
/*If the user updates the user information correctly, just as in add_data.php, alert them that they have updated it correctly, and then take them back to the homepage so they can immediately see their changes.*/
	if(mysql_query($sql_query))
	{
		?>
		<script type="text/javascript">
		alert('Data Are Updated Successfully');
		window.location.href='index.php';
		</script>
		<?php
	}
	/*If the user makes a mistake OR, if the database has an error, let the user know */
	else
	{
		?>
		<script type="text/javascript">
		alert('There was an error while updating the user data');
		</script>
		<?php
	}
}

/*If the user changes their mind, and wants to cancel the changes, this will take them back to the home page if the click the button with the name "btn-cancel"*/
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
