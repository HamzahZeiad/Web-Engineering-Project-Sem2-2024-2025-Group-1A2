<!DOCTYPE html>
<html>
<head>

<style type="text/css">
*
{
   margin:0px;
   padding:0px;
}

.container
{
   width:800px;
   border:2px solid green;
   border-top:none; 
   margin-left:auto;
   margin-right:auto;   
}

.header
{
   height:90px;     
   border-bottom:2px solid green;     
}

.middle
{
   height:500px; 
   background-color:pink;   
}

.footer
{
   height:80px;
   border-top: 2px solid green;   
}

h1
{
   padding:10px;
}

h2
{
   padding:10px;
   text-align:center;
}

table
{
   padding-top: 30px;
   padding-left:10px;
}

td
{
   height:30px;
}

.error
{
   font-style:bold;
   color:red;
}


</style>
</head>
<body>


<?php
$error ="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    
   if(!empty($_POST['txtname']))    
   {
      if(!empty($_POST['psw']))
	  {
            // to make a connection with database
		$con = mysqli_connect("localhost", "root") or die(mysqli_connect_error());

	        // to select the targeted database
	        mysqli_select_db($con,"user") or die(mysqli_error());
		
	        // to create a query to be executed in sql
	        $name = $_POST['txtname'];
	        $pw = $_POST['psw'];
	        $query = "insert into members values('','$name','$pw')";

	        // to run sql query in database
	        $result = mysqli_query($con, $query);
	     
		//Check whether the insert was successful or not
	        if($result) 
	        {
		        
                    echo('Your are registered');
					
		}
		else 
	        {
			        
	            die("Insert failed");
	        }
	  }
	  else
	  {
	       $error ="Please input Password!";
	  }
   }
   else
      $error ="Please input username!";
}
?>



<div class="container">

<div class="header">
<h1> Registration </h1>
</div>

<div class="middle">
<h2>Registration</h2>

<table>
<form action="insert_mysqli.php" method="post">
<tr>
<td> UserName:</td> <td><input type="Text" name="txtname"> </td> </tr>
<tr>
<td>Password:</td> <td><input type="Password" name="psw"> </td> </tr>
<tr>
<td colspan ="2"><input id="submit_button" type = "submit" value="Submit" > </td>
</tr>
<tr> <td class="error" colspan ="2"> <?php echo $error ?> </td></tr>
</table>
</form>

</div>

<div class="footer">
<h2>Footer Here</h2>
</div>

</div>
</body>
</html>