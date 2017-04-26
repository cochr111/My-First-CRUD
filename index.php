<?php
/*Here, we use the include_once function to ensure that our databse info stored in dbconfig is uploaded and thus usable on this page.*/

include_once 'dbconfig.php';

/*Here, we create a process for the user to delete users from the database. This process gets the user id from the database using javascript, just very similarly to adding a user, only we delete from the database, and then keep the user on the current page. */
if(isset($_GET['delete_id']))
{
	$sql_query="DELETE FROM user_CRUD WHERE user_id=".$_GET['delete_id'];
	mysql_query($sql_query);
	header("Location: $_SERVER[PHP_SELF]");
}

?>
<!DOCTYPE html>
<html>
<head>
<title>BOOTSTRAP CRUD!</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />

<script type="text/javascript">
/*This function prompts the user that they want to edit the entry, and then uses the information from 

javascript:edt_id('<?php echo $row[0]; ?>')"
 
 which takes the database, sets it as an array, arranges the data as rows in that array, and then sets the user_id to row[0]

as the "id" to append to the URL. Basically, we are taking information from SQL and using it in javascript to change a URL here.  
 */
function edt_id(id)
{
	if(confirm('Are You Sure You Want To Edit This Entry?'))
	{
		window.location.href='edit_data.php?edit_id='+id;
	}
}

/*Same as above.*/
function delete_id(id)
{
	if(confirm('Are You Sure You Want To Delete This Entry?'))
	{
		window.location.href='index.php?delete_id='+id;
	}
}
</script>

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
  <h1>Create, Read, Update, and Delete With PHP and MySql</h1>      
  <p>Because if it's not optimized for the web, what are we doing here?!</p>
</div>
</div> <!-- container -->



<div class="container">

<table class="table table-hover">
  <thead class="thead-default">
  <a href="add_data.php"><button type="button" class="btn btn-success">Click Here To Add Data</button></a>
    <tr>
      <th scope="row">First Name</th>
      <th scope="row">Last Name</th>
      <th scope="row">City</th>
	  <th colspan="2" style="text-align: center;">Operations</th>
    </tr>
	</thead>

	<tbody>
    <?php
	/*Here, we select all the columns from the user_CRUD database table. Then we query the result of that. Then, we say, if the number of rows in that query we ran is greater than one (which means there is at leaast one entry) WHILE this condition is true, populate the table rows with row[1], row[2], and row[3], which are the first name, last name, and city name stored in MYSQL. The user_id is auto incremented and we will use it later. What this does is creates the table rows on the fly, using the MYSQL database information which is input from the user.*/
	$sql_query="SELECT * FROM user_CRUD";
	$result_set=mysql_query($sql_query);
	if(mysql_num_rows($result_set)>0)
	{
        while($row=mysql_fetch_row($result_set))
		{
		?>
            <tr>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
			
<!--$row[0] is "chosen" or echoed here because it contains the auto-incremented user id. This code runs some javascript when the user clicks the included images of a pencil or a red X. The php then echoes the user ID as the object to run through the javascript which then prompts the user to confirm that they want to edit the user's info, then the href takes the user to the edit_data.php file but simultaneously, runs a query string through the edit_data.php file and thus, sets the auto-incremented user id to become a part of the URL. This information also comes into play when we go into the PHP code of the edit_data.php file 

Appropriate Javascript in the Script Tag Above

function edt_id(id)
{
	if(confirm('Are You Sure You Want To Edit This Entry?'))
	{
		window.location.href='edit_data.php?edit_id='+id;<---------------- WE ARE APPENDING THE USER ID TO THE URL AND THEREBY GENERATING THE edit_id  																VARIABLE SIMULTANEOUSLY
	}
}

 -->
 <!--If the user clicks the edit or delete "icons", the resulting href in the anchor tag will run the javascript script coded at the top-->
            <td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')"><img src="b_edit.png" align="EDIT" /></a></td>
            <td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><img src="b_drop.png" align="DELETE" /></a></td>
            </tr>
        <?php
		}
	}
	/*If there is some problem, just parrot to the user that no data was found*/
	else
	{
		?>
        <tr>
        <td colspan="5">No Data Was Found!</td>
        </tr>
        <?php
	}
	?>
	</tbody>
    </table>
    </div>




    <!--These scripts are required to add because of bootstrap-->
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
