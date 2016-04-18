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
#insert_provider, #insert_entry, #delete_provider{
	display: none;
}

#insert_provider_button, #delete_provider_button, #insert_entry_button
{
	background-color: rgb(202,239,248);
	border: 1px solid rgb(167, 207, 234);
	margin: 10px;
}

#provider_info_admin td input, #provider_info_admin td select, #provider_name, #insert_submit, #delete_submit, #delete_who{
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
			//$('#form').height($(window).height() - $('#mainHeader').height());
			$("#insert_provider_button").click(function(){
				$("#delete_provider").hide();
				$("#insert_entry").hide();
				$("#insert_provider").show();
			});
			$("#delete_provider_button").click(function(){
				$("#insert_provider").hide();
				$("#insert_entry").hide();
				$("#delete_provider").show();
			});
			$("#insert_entry_button").click(function(){
				$("#insert_provider").hide();
				$("#delete_provider").hide();
				$("#insert_entry").show();
			});
		});
</script>
</head>

<body>
	<div id="header"></div>
	<form method="POST">
		<div id="form" class="col-lg-9">
			<div>	
				<input type="button" value="Insert New Provider" id="insert_provider_button"> 
				<input type="button" value="Delete Provider" id="delete_provider_button">
				<input type="button" value="Insert New Entry" id="insert_entry_button">
			</div>
			<div id="message">
				<span></span>
			</div>
			<div id="insert_provider">
				<span id = "insert_provider_span">Provider:</span> <input type="textbox" id="provider_name" name="provider_name">
				<input type="submit" id="insert_submit" value="Insert" name="Insert_Provider" style="margin: 0 0 0 10px;">
			</div>
			<div id="delete_provider">
				<select id="delete_who" name="delete_who">
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
				</select>
				<input type="submit" id="delete_submit" value="Delete" name="Delete_Provider" style="margin: 0 0 0 10px;">
			</div>
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
	</form>
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