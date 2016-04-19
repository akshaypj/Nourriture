<!DOCTYPE html>
<html>
<style>

body{
	margin:0px;
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

#name, #password {
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

.sectionion div.active {
    background-color: #000;
}

.backgroundContainer{
	background-image: url("background.jpg");
	background-repeat: no-repeat;
	width: 100%;
	margin: 0 auto;
    height: 1000px;
}
.mainContainer {
	width: 640px;
    margin-left: 28%;
}

.sectionion{
    border: 2px solid black;
}

.titleBlock .sectionion .leftTab {
    float: left;
}

.titleBlock .sectionion div {
    text-align: center;    
    cursor: pointer;
    display: inline-block;
    width: 50%;
    padding: 10px 0 17px;
    letter-spacing: .07em;
    text-transform: uppercase;
}

.titleBlock .sectionion div a {
    font-size: 24px;
    padding-bottom: 6px;
    color: black;
    letter-spacing: .07em;
    text-transform: uppercase;
    text-decoration: none;
}


.titleBlock .sectionion div.active a {
    font-size: 24px;
    padding-bottom: 6px;
    color: #fff;
    letter-spacing: .07em;
    text-transform: uppercase;
}

.titleBlock .select_title {
    text-align: center;
    font-weight: 700;
    margin: 0;
    font-size: 20px;
    color: #000;
    letter-spacing: .07em;
    line-height: 30px;
    padding: 20px 0;
    font-family: Oswald,Helvetica,sans-serif;
}

.active{
	display:block;

}

.inactive{
	display: none
}

.contentDiv{
	padding-top: 24px;
	margin: 24px 0px;

	background-color: white;
}

.header-background{
	padding: 2%;
	color: gray;
	font-family: Oswald,Helvetica,sans-serif;
	background-color: #45bbe6;
	font-weight: 700;
	font-style: bold;
	font-size: 40px;
}

.formatText{
    font-weight: 700;
    font-size: 16px;
    margin-bottom: 12px;
}

#adminForm, #memberForm{
	padding:20px 60px 0px 60px;
}

.formatInput{
    height: 40px;
    width: 100%;
    padding-left: 4px;
    outline: none;
}

#submitHolder{
	text-align: center;
}

#admin_submit_button, #member_submit_button{
	background-color: black;
	color: white;
	width: 160px;
	height: 50px;
	margin-bottom: 40px;	
	outline: none;
}

</style>
<head>
  <title>Nourriture</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<script>

		$(document).ready(function(){

			$(".leftTab").click(function(){
				$("#credentials_admin").show();
				$("#credentials_member").hide();
				$(".leftTab").addClass("active");
				$(".rightTab").removeClass("active");				
			});


			$(".rightTab").click(function(){
				$("#credentials_member").show();				
				$("#credentials_admin").hide();	
				$(".leftTab").removeClass("active");
				$(".rightTab").addClass("active");				
			});
		});

	</script>
</head>

<body>

	<header>
        <div id="main-container">
        	<div id="backg" class="header-background">
        	Nourriture
			</div>
        </div>
    </header>

	<div class="backgroundContainer">

		<div class= "mainContainer">

			<div class="titleBlock">
				<div class="select_title">Register As</div>
				<div class="sectionion">
					<div class="leftTab active"><a>Administrator</a></div>
					<div class="rightTab"><a>Staff Member</a></div>
				</div>
			</div>

			<div class="content">

				<div id="credentials_admin" class="contentDiv">
					<form id = "adminForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" > 
						<input name="identity" value="admin" hidden>
						<div id="name">
							<div class="formatText" id ="name_span">Administrator Name:</div> 
							<input class= "formatInput" type="textbox" id="admin_username" name="admin_username">
						</div>
						<div id="password">
							<div class="formatText"  id ="password_span">Password: </div>
							<input class= "formatInput" type="textbox" id="admin_password_input" name="admin_password">
						</div>
						<div id="submitHolder">
							<input id ="admin_submit_button" type="submit" name="Submit1" value="Login">
						</div> 
					</form>
				</div>

				<div id="credentials_member" class="contentDiv inactive">
					<form id = "memberForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" > 
						<input name="identity" value="user" hidden>
						<div id="name">
							<div class="formatText" id ="name_span">Staff Member Name:</div> 
							<input class= "formatInput" type="textbox" id="member_username" name="member_username">
						</div>
						<div id="password">
							<div class="formatText"  id ="password_span">Password: </div>
							<input class= "formatInput" type="textbox" id="member_password_input" name="member_password">
						</div>
						
						<div>
							Enter Image Text
							<input name="captcha" type="text">
							<img src="captcha.php" /><br>
						</div>

						<div id="submitHolder">
							<input id ="member_submit_button" type="submit" name="Submit2" value="Login">
						</div> 
					</form>

					<?php
						if (isset($_POST['Submit2'])){ //If it is the first time, it does nothing  
							sel();
						}
						function sel(){
							$myusername=$_POST['member_username']; 
							$mypassword=$_POST['member_password']; 
								if(empty($myusername) || empty($mypassword)){
									echo "You did not fill out the required fields.";
								}
								else{
									$user = 'root';
									$password = 'root';
									$db = 'test';
									$host = 'localhost';
									$port = 8889;

									$link = mysqli_init();
									$success = mysqli_real_connect(
									   $link, 
									   $host, 
									   $user, 
									   $password, 
									   $db,
									   $port
									);
				 			
									if($_POST['identity']=="user")
										$tbl_name="user";
									else
										$tbl_name="credential";
							
								
									$query  = "SELECT * FROM $tbl_name WHERE username = '$myusername' and password = '$mypassword'";
									$result = mysqli_query($link, $query);

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
									echo "Wrong Username or Password, try again";
							}
						}
								$mysqli->close();
						}		
					}

				?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>