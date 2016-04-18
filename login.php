<!DOCTYPE html>
<html>
<style>

body{
	margin:0px;
    background-color: rgba(204, 235, 253, 0.41) !important;
}

#form{
	    height: 300px;
	    margin: 15px;
	}

#user_button, #admin_button, #submit_button{
	  background-color: rgb(152,222,247);
	  border-width: 0px;
	  padding: 8px 24px 8px 24px;
	  font-size: 16px;
	  font-family: -webkit-body
}

#user_button:hover , #admin_button:hover{
	  background-color: rgb(102, 142, 157);
}

#credentials{
	display: none;
    padding: 14px 0px 0px 0px;
}	

#name, #password{
	  margin: 0px 0px 20px 0px;
}

#password_span, #name_span{
	font-family: -webkit-body;
    font-size: 18px;
}

#username, #password_input{
  background-color: rgb(202,239,248);
  border: 1px solid rgb(167, 207, 234);
}

#temp_div{
	font-size: 14px;
    font-family: -webkit-body;
    margin-top: 12px;
}

#error_message{
	font-size: 14px;
    font-family: -webkit-body;
    margin-top: 12px;
    color:red;	
}
</style>
<head>
  <title>Nourriture</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script>
		$(function(){
      		$("#header").load("banner.html"); 
    	});
		$(document).ready(function(){
			$("#user_button").click(function(){
				$("#credentials").show();
				$("#identity").val("user");
				$("#temp_text").html("Please Enter <b>User</b> Details");
			});
			$("#admin_button").click(function(){
				$("#credentials").show();
				$("#identity").val("admin");
				$("#temp_text").html("Please Enter <b>Admin</b> Details");
			});
		});
	</script>
</head>

<body>
	<div id="header"></div>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" > 
		<div id="form" class="col-lg-9">
			<div id="who">
				<input type="button" value="User" id="user_button"> 
				<input type="button" value="Admin" id="admin_button">
				<input type="text" id="identity" name="identity" value="" hidden>
			</div>
			<div id="temp_div">
				<span id="temp_text"><span>
			</div>
			<div id="credentials">
				<div id="name"><span id ="name_span">Username:</span> <input type="textbox" id="username" name="username"></div>
				<div id="password"><span id ="password_span">Password: </span><input type="textbox" id="password_input" name="password"></div>
				<div><input id ="submit_button" type="submit" name="Submit" value="Login"></div> 
			</div>
			<div id ="error_message">
				<span></span>
			</div>
		</div>
	</form>
	<?php
	if (isset($_POST['Submit'])){ //If it is the first time, it does nothing  
		//echo "hi"; 
		sel();
		}
	function sel(){
		//echo "hi"; 
		$myusername=$_POST['username']; 
		$mypassword=$_POST['password']; 
		if(empty($myusername) || empty($mypassword)){
			echo "You did not fill out the required fields.";
		}
		else{
			$user = 'root';
			$password = 'root';
			$db = 'test';
			$host = 'localhost';
			$port = 8889;

			DEFINE('DB_USERNAME', 'root');
			DEFINE('DB_PASSWORD', 'root');
			DEFINE('DB_HOST', 'localhost');
			DEFINE('DB_DATABASE', 'test');

			$dbb = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

 			if (mysqli_connect_error()) {
  				die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
 			}

			if($_POST['identity']=="user")
				$tbl_name="user";
			else
				$tbl_name="credential";
			
			$sql = <<<SQL
    SELECT *
    FROM $tbl_name
    WHERE username = "$myusername" and password = "$mypassword"
SQL;
			
			$result = $dbb->query($sql);
			if(!$result){
    			die('There was an error running the query [' . $dbb->error . ']');
				}else{
					$count =  mysqli_num_rows($result);
					if($count==1){
				// Register $myusername, $mypassword and redirect to file "login_success.php"
				$_SESSION['username'] = $myusername; 
				$_SESSION['password'] =  $mypassword;
				
				//echo "correct Username and Password";
				if($_POST['identity']=="user"){
					echo "<script type='text/javascript'> document.location = 'user.php'; </script>";
				}	
				else{
					echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
				}	
			}else {
			}
				}
				$mysqli->close();
			 //$rs=$mysqli->query($sql);
			// echo $rs;
			 

			/*$link = mysqli_init();
			WHERE 'username'='$myusername' and 'password'='$mypassword'
			$success = mysqli_real_connect(
			   $link, 
			   $host, 
			   $user, 
			   $password, 
			   $db,
			   $port
			);
*/
			/*$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "test";*/
	
			//$conn = mysqli_connect($servername, $username, $password, $dbname);	
			//$result = mysqli_query("SELECT * from '.$tbl_name' WHERE username='$myusername' and password='$mypassword'");
			
			//$rs=$conn->query($sql);
			//$result=mysqli_query($link, $sql);
			
			//$count=mysqli_num_rows($stmt);
			//echo $count+"hi";
			/*if($count==1){
				// Register $myusername, $mypassword and redirect to file "login_success.php"
				$_SESSION['username'] = $myusername; 
				$_SESSION['password'] =  $mypassword;
				//echo "correct Username and Password";
				if($_POST['identity']=="user")
					header("location:user.php");
				else
					header("location:admin.php");
			}*/
			/*else {
				//echo "Wrong Username or Password, try again";
			}*/
		}		
	}
?>	
</body>
</html>