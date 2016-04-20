<!DOCTYPE html>
<html>

<style>

body{
	margin:0px;
    background-color: rgba(204, 235, 253, 0.41) !important;
}

.active{
	display:block;

}

.inactive{
	display: none
}

#form{
	    height: 300px;
	    margin: 15px;
	}
#insert_provider, #insert_entry, #delete_provider{
	display: none;
}

#insert_provider_button, #delete_provider_button, #insert_entry_button
{
	background-color: rgb(202,239,248);
	border: 1px solid rgb(167, 207, 234);
	margin: 10px;
}

#provider_info_admin td input, #provider_info_admin td select, #provider_name, #delete_submit, #delete_who{
	background-color: rgb(202,239,248); 
    border: 1px solid rgb(167, 207, 234);
}

#provider_info_admin td.info_parameter, {	
	font-family: -webkit-body;
	font-size: 18px;
}

#provider_info_admin td {
	padding: 10px;
}

#insert_provider_span, #message{
	font-family: -webkit-body;
	font-size: 18px;
}

#insert_provider, #delete_provider, #message{
	margin: 10px;
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

/*Tab addition*/

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

.section{
    border: 2px solid black;
}

.section div.active {
    background-color: #000;
}
.titleBlock .section .leftTab {
    float: left;
}

.titleBlock .section div {
    text-align: center;    
    cursor: pointer;
    display: inline-block;
    width: 50%;
    padding: 10px 0 17px;
    letter-spacing: .07em;
    text-transform: uppercase;
}

.titleBlock .section div a {
    font-size: 24px;
    padding-bottom: 6px;
    color: black;
    letter-spacing: .07em;
    text-transform: uppercase;
    text-decoration: none;
}


.titleBlock .section div.active a {
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


/* NEW CSS*/
.user-details{
	text-align: center;
	padding-top: 20px;

}
#puser_name{
	background-color: rgb(202,239,248); 
    border: 1px solid rgb(167, 207, 234);
}

#puser_pwd{
	background-color: rgb(202,239,248); 
    border: 1px solid rgb(167, 207, 234);
    margin: 12px -8px 0 0;
}

#insert_user_span{
	font-family: -webkit-body;
	font-size: 18px;
	padding: 20px;
}

#insert_provider_span{
	font-family: -webkit-body;
	font-size: 18px;
	padding: 20px;	
}

#insert_submit{
	margin: 20px 0 0 10px;
	background-color: black;
	opacity: 0.8;
	color: white;
	width: 120px;
	height: 40px;	
	outline: none;
	font-size: 18px;	
}

#delete_submit{
	margin: 20px 0 0 10px;
	background-color: black;
	opacity: 0.8;
	color: white;
	width: 120px;
	height: 40px;	
	outline: none;
	font-size: 18px;
}

hr{
	border-top: 1px solid #B7B3B0 !important;
}

#delete_who{
	width: 150px;
}



/* NEW CSS END*/

</style>
<head>
  <title>Nourriture</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script>

		$(document).ready(function(){

			$(".leftTab").click(function(){
				$("#userContent").show();
				$("#providerContent").hide();

				$(".leftTab").addClass("active");
				$(".rightTab").removeClass("active");				
			});


			$(".rightTab").click(function(){
				$("#providerContent").show();				
				$("#userContent").hide();	

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
        	<h1 class="headerFont"><b><i>Nourriture</i></b> </h1><h5 class="headerSubFont">   &nbsp; &nbsp;  The track to an ideal deed...</h5>
			</div>
        </div>
    </header>
    
	<div class="backgroundContainer">
		<div class= "mainContainer">
			<div class="titleBlock">
				<div class="select_title">What do you wish to do</div>
				<div class="section">
					<div class="leftTab active"><a>Add/Remove User</a></div>
					<div class="rightTab"><a>Add/Remove Provider</a></div>
				</div>
			</div>

			<div id="userContent">
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
					<div class = "user-details">
					<span id = "insert_user_span">User Name:</span><input type="textbox" id="puser_name" name="user_name"><br>
					<span id = "insert_user_span">Password: </span><input type="password" id="puser_pwd" name="user_pwd"><br>
					<span><input type="submit" id="insert_submit" value="Insert" name="Insert_User"></span>
					</div>		
					<hr>

					<div class = "user-details">
					<span id = "insert_user_span">Select User: </span>
						<select id="delete_who" name="delete_who">					
						 <?php
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

									$query="SELECT username FROM user";
									$result = mysqli_query($link, $query);

									while ($row=mysqli_fetch_array($result)) {
										$Nameselect=$row["username"];
										echo "<option value=$Nameselect> $Nameselect </option>";
									}
								?>
					</select><br>
					<input type="submit" id="delete_submit" value="Delete" name="Delete_User">
				</div>
				</form>
				<?php
						if (isset($_POST['Delete_User'])){ //If it is the first time, it does nothing  
							del_func();
						}else if(isset($_POST['Insert_User'])){
							add_func();
						}
						function del_func(){
							$myDeluser=$_POST['delete_who']; 
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
		 			
							$query  = "DELETE FROM user WHERE username = '$myDeluser'";
							$result = mysqli_query($link, $query);
						}

						function add_func(){
							$myAdduser=$_POST['user_name']; 
							$myAdduserPwd=$_POST['user_pwd']; 
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
		
							$query  = "INSERT INTO user(username, password) VALUES('$myAdduser','$myAdduserPwd')";
							$result = mysqli_query($link, $query);
						}
				?>
			</div>

			<div id="providerContent" class="inactive">
				<form method="POST">
					<div class = "user-details">
					<span id = "insert_provider_span">Provider Company:</span> <input type="textbox" id="provider_name" name="provider_name"><br>
					<input type="submit" id="insert_submit" value="Insert" name="Insert_Provider"><br>

					<hr>
					<span id = "insert_user_span">Select Provider: </span>
						<select id="delete_who" name="delete_who_provider">
						  <?php 
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

									$query="SELECT companyName FROM providerCompany";
									$result = mysqli_query($link, $query);

									while ($row=mysqli_fetch_array($result)) {
										$Nameselect=$row["companyName"];
										echo "<option value=$Nameselect> $Nameselect </option>";
									}
							?>
					</select><br>
					<input type="submit" id="delete_submit" value="Delete" name="Delete_Provider">
					</div>
				</form>
				<?php
						if (isset($_POST['Delete_Provider'])){ //If it is the first time, it does nothing  
							del_func_provider();
						}else if(isset($_POST['Insert_Provider'])){
							add_func_provider();
						}
						function del_func_provider(){
							$myDelprovider=$_POST['delete_who_provider']; 
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
		 			
							$query  = "DELETE FROM providerCompany WHERE companyName = '$myDelprovider'";
							$result = mysqli_query($link, $query);
						}

						function add_func_provider(){
							$myAddprovider=$_POST['provider_name']; 
	
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
		
							$query  = "INSERT INTO providerCompany(companyName) VALUES ('$myAddprovider')";
							$result = mysqli_query($link, $query);
						}
				?>



			</div>
		</div>
	</div>

<!-- REMOVE 
		<div id="form" class="col-lg-9">								
			<div id="insert_entry">
				<table id="provider_info_admin">	
					<tr>
						<td class="info_parameter">Provider:</td>
						<td><select id="who" name="who">
							 <?php
							  $servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "test";
							$conn = mysqli_connect($servername, $username, $password, $dbname);
							$query="SELECT Name FROM sourcelist";
							$result=mysqli_query($conn,$query);
							while ($row=mysqli_fetch_array($result)) {
								$Nameselect=$row["Name"];
								echo "<option> $Nameselect </option>";
								}	
								?>
							</select></td>
					</tr>
					<tr>
						<td class="info_parameter">Food Type:</td>
						<td><input type="text" id="what" name="what"></td>
					</tr>
					<tr>	
						<td class="info_parameter">Quantity:</td>
						<td><input type="text" id="how_much" name="how_much"></td>
					</tr>
					<tr>	
						<td class="info_parameter">Description:</td>
						<td><input type="text" id="desc" name="desc"></td>
					</tr>
					<tr>	
						<td class="info_parameter">Date:</td>
						<td><input type="text" id="datepicker" name="date"></td>
					</tr>
					<tr>
						<td><input type="submit" value="Insert" name="Insert_Record"></td>				
					</tr>
				</table>
			</div>	
		</div>

TILL HERE -->

</body>



<?php
	if (isset($_POST['Insert_Provider'])){ 
		Insert_Provider_func();
	}
	
	if (isset($_POST['Delete_Provider'])){ 
				Delete_Provider_func();
			}
	
	if (isset($_POST['Insert_Record'])){ 
				Insert_Record_func();
	}
		
	function Insert_Record_func(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "test";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$nam=$_POST['who'];
		$foodtype=$_POST['what'];
		$quant=$_POST['how_much'];
		$desc=$_POST['desc'];
		$dates=$_POST['date'];
		$query3="INSERT INTO example(provider,foodtype,quantity,description,dates) VALUES('$nam','$foodtype','$quant','$desc','$dates')";
		$result3 = mysqli_query($conn,$query3);
		//echo "record inserted";
	}
	
	function Delete_Provider_func(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "test";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		//echo "record deleted";
		$del=$_POST['delete_who'];
		$query2="DELETE FROM sourcelist where Name='$del'";
		$result2 = mysqli_query($conn,$query2);
	}		
	function Insert_Provider_func(){
		$myname = $_POST['provider_name'];
		if(empty($myname)){
			echo "You did not fill out the required fields.";
		}
		else{
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "test";
			$conn = mysqli_connect($servername, $username, $password, $dbname);	
			$sql = "INSERT INTO sourcelist VALUES ('$myname')";
			$result = mysqli_query($conn,$sql);
			//echo "Provider inserted";
		}
	}	
?>
</html>