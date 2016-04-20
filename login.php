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

.error_invalidinput_bottom{
	font-size: 14px;
    font-family: -webkit-body;
    padding-bottom: 12px;
    color:red;	
    text-align: center;
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
	margin-bottom: 20px;	
	outline: none;
	font-size: 16px;
	font-weight: 700;
}


/*Header Format - Lavina Advani*/
.header-background{
	padding: 1% 2%;
	color: #2B4A56;
	font-family: Oswald,Helvetica,sans-serif;
	background-color: #78CEED;
	font-weight: 700;
	font-style: bold;
	font-size: 40px;
}

.headerFont{
	font-size: 70px;
}
.headerSubFont{
	font-size: 20px;
}
h5, h1 {
    display: inline-block;
}

</style>
<head>
  <title>Nourriture</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="jquery.cookie.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<script>
		$(document).ready(function(){
			var activeTabIndex = $.cookie("activeTabIndex");

			if(activeTabIndex == 1){
				$(".rightTab").addClass("active");
				$("#credentials_member").show();
				$("#credentials_admin").hide();	
			}			
			else{
				$(".leftTab").addClass("active");	
				$("#credentials_admin").show();
				$("#credentials_member").hide();								
			}
				
			$(".leftTab").click(function(){
				$("#credentials_admin").show();
				$("#credentials_member").hide();
				$(".leftTab").addClass("active");
				$(".rightTab").removeClass("active");				
				$.cookie("activeTabIndex", 0);				
			});

			$(".rightTab").click(function(){
				$("#credentials_member").show();				
				$("#credentials_admin").hide();	
				$(".leftTab").removeClass("active");
				$(".rightTab").addClass("active");				
				$.cookie("activeTabIndex", 1);
			});						
		});

	function validateForm_login() {
		//check for food type
		var x  = $(".whatinuser").val();
	    if (x == null || x == "") {
	    	$("#errorFoodType").removeClass("inactive").addClass("active");
	    }else{
	    	$("#errorFoodType").removeClass("active").addClass("inactive");	    	
	    }

	    //check for quantity		
		var y =  $(".how_muchinuser").val();			
		if(y == null || y == ""){
			$("#errorQuantity").removeClass("inactive").addClass("active");
		}
		if(!$.isNumeric( x ) || x == null || x == ""){
			$("#errorQuantity").removeClass("inactive").addClass("active");
		}
		else {
			$("#errorQuantity").removeClass("active").addClass("inactive");	
		}
	}

	</script>
</head>

<body>

	<header>
        <div id="main-container">
        	<div id="backg" class="header-background">
        	<h1 class="headerFont"><b><i>Nourriture</i></b> </h1><h5 class="headerSubFont">   &nbsp; &nbsp;  The track to an ideal deed...</h5>
			</div>
        </div>
    </header>

	<div class="backgroundContainer">

		<div class= "mainContainer">

			<div class="titleBlock">
				<div class="select_title">Register As</div>
				<div class="sectionion">
					<div class="leftTab inactive"><a>Administrator</a></div>
					<div class="rightTab inactive"><a>Staff Member</a></div>
				</div>
			</div>

			<div class="content">

				<div id="credentials_admin" class="contentDiv inactive">
					<form id = "adminForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" > 
						<input name="identity" value="admin" hidden>
						<div id="name">
							<div class="formatText" id ="name_span">Administrator Name:</div> 
							<input class= "formatInput" type="textbox" id="admin_username" name="admin_username">
						</div>
						<div id="password">
							<div class="formatText"  id ="password_span">Password: </div>
							<input class= "formatInput" type="password" id="admin_password_input" name="admin_password">
						</div>

						<div id="submitHolder">
							<input id ="admin_submit_button" type="submit" name="Submit1" value="LOGIN">
						</div> 
					</form>
					<?php
						if (isset($_POST['Submit1'])){ //If it is the first time, it does nothing  rgba(69, 187, 230, 0.72); 0.64
							sel2();
						}

						function sel2(){
							$myusername=$_POST['admin_username']; 
							$mypassword=$_POST['admin_password']; 
							if(empty($myusername) || empty($mypassword)){
								echo "<div class='error_invalidinput_bottom active'> Please fill in Username and Password both</div>";
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
			 			
								$query  = "SELECT * FROM credential WHERE username = '$myusername' and password = '$mypassword'";
								$result = mysqli_query($link, $query);

								if(!$result){
			    					die('There was an error running the query [' . $dbb->error . ']');
								}else{
									$count =  mysqli_num_rows($result);
									if($count==1){
										$_SESSION['username'] = $myusername; 
										$_SESSION['password'] =  $mypassword;
										echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";	
									}else {
										echo "<div class='error_invalidinput_bottom active'> Wrong Username or Password, try again</div>";
									}
								}
//							$mysqli->close();
							}		
						}
					?>
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
							<input class= "formatInput" type="password" id="member_password_input" name="member_password">
						</div>
										
						<div id="submitHolder">
							<input id ="member_submit_button" type="submit" name="Submit2" value="LOGIN">
						</div> 
					</form>

					<?php
						if (isset($_POST['Submit2'])){ 
							sel();
						}
						function sel(){
							$myusername=$_POST['member_username']; 
							$mypassword=$_POST['member_password']; 
							if(empty($myusername) || empty($mypassword)){
								echo "<div class='error_invalidinput_bottom active'> Please fill in Username and Password both</div>";
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
			 			
								$query  = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
								$result = mysqli_query($link, $query);

								if(!$result){
			    					die('There was an error running the query [' . $dbb->error . ']');
								}else{
									$count =  mysqli_num_rows($result);
									if($count==1){
										$_SESSION['username'] = $myusername; 
										$_SESSION['password'] =  $mypassword;
										echo "<script type='text/javascript'> document.location = 'user.php'; </script>";
									}else {
										echo "<div class='error_invalidinput_bottom active'> Wrong Username or Password, try again</div>";
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