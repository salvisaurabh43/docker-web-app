<?php


if(empty($_REQUEST['username']) || empty($_REQUEST['pass']) || empty($_REQUEST['pass_confirm']))
{

}
else
{

        $username = $_REQUEST['username'];
        $pass = $_REQUEST['pass'];
	$pass_confirm = $_REQUEST['pass_confirm'];

	if($pass == $pass_confirm)
	{
        	$mysqli = new mysqli("db","root","example");


        	if($mysqli->connect_error)
        	{
        	        die("Connection Failed: " . $mysqli->connect_error);
        	}

        	$sql = "CREATE DATABASE IF NOT EXISTS enpm631_db";
        	$mysqli->query($sql);

		$mysqli->select_db("enpm631_db");

        	$sql = "CREATE TABLE IF NOT EXISTS users";
        	$mysqli->query($sql);


        	//$sql = "INSERT INTO users (name,password) VALUES('Test User', 'Test Password')";
        	//$reult = $mysqli->query($sql);

        	$sql = "SELECT * FROM users where name = '$username' AND password = '$pass'";
		$result = $mysqli->query($sql);
		$num_rows = $result->num_rows;
		//echo "<script>alert('".$num_rows."');</script>";
        	if($num_rows == 1)
        	{
        		echo "<script>alert('User Already Exists!');</script>";

	        }
	        else
	        {
			$sql = "INSERT INTO users (name,password) VALUES('$username', '$pass')";
	                $mysqli->query($sql);
			echo "<script>alert('User Added In The Database!');</script>";
	        }
	}
	else
	{
		echo "<script>alert('Passwords Do Not Match!');</script>";
	}
}
?>


<html>
<head>


</head>
<style>
* {box-sizing: border-box}

/* Full-width input fields */
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float:left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
}
</style>

<body>
<center>

<div style="width:100%;padding:20px">
	<h1>ENPM631 Project</h1>
</div>
<div style="width:60%">
 <form action="#" method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required>

    <label for="pass_confirm"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="pass_confirm" required>

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
    <a href="index.php"><p>Click here to Login</p></a>
    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>
</div>
</center>
</body>
</html>
