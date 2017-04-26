<?php
/*Here, we use the include_once function to ensure that our databse info stored in dbconfig is uploaded and thus usable on this page.*/
include_once 'dbconfig.php';

/*If the user clicks the button with the name "btn-save", which in the HTML is actually: 

<input id="submit" name="btn-save" type="submit" value="&nbsp;&nbsp;Add User To Database&nbsp;" class="btn btn-info">
 
 DO THE FOLLOWING
*/
if(isset($_POST['btn-save']))
{
/*Create 3 variables that will store the information that the user entered in the form under first name, last name, and city.*/
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$city_name = $_POST['city_name'];

	
/*Create another variable that will insert the information into the user_CRUD database under first_name, last_name, and user_city.*/
	$sql_query = "INSERT INTO user_CRUD (first_name,last_name,user_city) VALUES('$first_name','$last_name','$city_name')";
	
/*Here, we get a little scripty. If the information has been entered into the database, we want the user to know that. Thus, we are going to use basic javascript to let them know, hey, the information has been added. So, we use a simple alert in a script tag in the html. Also, once the information has been added, we probably also want the user to go back to the page with the users on it to see the user they've added, so, change window location. */
	if(mysql_query($sql_query))
	{
		?>
		<script type="text/javascript">
		alert('The New User Has Been Added');
		window.location.href='index.php';
		</script>
		<?php
	}
	/*If this does not happen, or if there is some kind of error when adding the information into the database, a different alert will show, and no redirect will happen.*/
	else
	{
		?>
		<script type="text/javascript">
		alert('An Error Occurred While Adding The New User');
		</script>
		<?php
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>ADD A USER!</title>
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
  <h1>Add A User To Our Database</h1>      
  <p>This page will allow you to add a user to our database and see it on the homepage. There is not database validation here, meaning you could enter the same info again and again, but, the user can simply delete duplicate information anyway.</p>
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
    <input name="first_name" class="form-control form-control-danger" type="text" value="First Name" required>
  </div>
</div>


<div class="form-group has-danger">
  <label for="last-name" class="col-2 col-form-label" style="text-align: center;">Last Name</label>
  <div class="col-10">
    <input name="last_name" class="form-control form-control-danger" type="text" value="Last Name" required>
  </div>
</div>

<div class="form-group has-danger">
  <label for="city" class="col-2 col-form-label" style="text-align: center;">City</label>
  <div class="col-10">
    <input name="city_name" class="form-control form-control-danger" type="text" value="City" required>
  </div>
</div>

<!--IT IS ESSENTIAL THAT THE SUBMIT BUTTON NOT BE A BUTTON, BUT AN INPUT. IT ALSO MUST BE IN A FORM GROUP OTHERWISE BOOTSTRAP CANNOT CONNECT TO THE PHP ABOVE.-->
<div class="form-group">
<div class="col-xs-6 col-sm-offset-2">
<input id="submit" name="btn-save" type="submit" value="&nbsp;&nbsp;Add User To Database&nbsp;" class="btn btn-info">
</div>
</div>

<br>
<br>

<div class="form-group">
<div class="col-xs-6 col-sm-offset-2">
<a href="index.php">
<button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>&nbsp; &nbsp;Back To Home Page</button>
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
