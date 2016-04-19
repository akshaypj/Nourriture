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

#provider_info td{
	padding: 10px;
}

#provider_info td.info_parameter{	
	font-family: -webkit-body;
	font-size: 18px;
}

#provider_info td input, #provider_info td select{
	background-color: rgb(202,239,248);
    border: 1px solid rgb(167, 207, 234);
}

#success_message{
	font-family: -webkit-body;
	font-size: 18px;
	color:green;	
}
</style>

<?php
	if (isset($_POST['Submit'])){
		//print("clicked");
	}
?>
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
		});
</script>
</head>

<body>
	<div id="header"></div>
	<form method="POST" name="myform">
		<div id="form"  class="col-lg-9">
		<div id="success_message" name="success_message"></div>
		<table id="provider_info">
			<tr>
				<td class="info_parameter">Provider:</td>
				<td><select id="who" name="whoinuser">
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
				</td>
			</tr>

			<tr>
				<td class="info_parameter">Food Type:</td>
				<td><input type="text" id="what" name="whatinuser"></td>
			</tr>.
			<tr>	
				<td class="info_parameter">Quantity:</td>
				<td><input type="text" id="how_much" name="how_muchinuser"></td>
			</tr>
			<tr>	
				<td class="info_parameter">Description:</td>
				<td><input type="text" id="desc" name="descriptioninuser"></td>
			</tr>
			<tr>	
				<td class="info_parameter">Date:</td>
				<td><input type="text" id="datepicker" name="datesinuser"></td>
			</tr>
			<tr>
				<td><input type="submit" name="Submit" value="Submit"></td>
				<td></td>
			</tr>
		</table>	
		</div>
	</form>
</body>
<?php
if (isset($_POST['Submit'])){ 
						Insert_Record_func();
					}
					
					function Insert_Record_func(){
						$servername = "localhost";
						$username = "root";
						$password = "";
						$dbname = "test";
						$conn = mysqli_connect($servername, $username, $password, $dbname);
						$nam=$_POST['whoinuser'];
						$foodtype=$_POST['whatinuser'];
						$quant=$_POST['how_muchinuser'];
						$desc=$_POST['descriptioninuser'];
						$dates=$_POST['datesinuser'];
						$query3="INSERT INTO example(provider,foodtype,quantity,description,dates) VALUES('$nam','$foodtype','$quant','$desc','$dates')";
						$result3 = mysqli_query($conn,$query3);
						
					}
?>
<script type="text/javascript">
	
function validateForm() {
    var x = document.forms["myform"]["whatinuser"].value;
    console.log(x);
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
}

</script>					
</html>