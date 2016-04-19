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

#provider_info td input, #provider_info td select, #provider_info td textarea {
	background-color: rgb(202,239,248);
    border: 1px solid rgb(167, 207, 234);
}

#success_message{
	font-family: -webkit-body;
	font-size: 18px;
	color:green;	
}

.error{
	font-weight: bold;
	color: red;
}

.active{
	display:block;
}

.inactive{
	display:none;
}

</style>


<head>
  <title>Nourriture</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<body>
	<div id="header"></div>
	<form method="POST">
		<div id="form" class="col-lg-9">
		<div id="success_message" name="success_message"></div>  		    
		<table id="provider_info">
			<tr>
				<td class="info_parameter">Provider:</td>
				<td><select id="who" name="whoinuser">
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
					</select>
				</td>
			</tr>
			<tr>
				<td class="info_parameter">Food Type:</td>
				<td><input type="text" id="what" name="whatinuser" class = "whatinuser"></td>
				<td><span id="errorFoodType" class="inactive error">Foodtype cannot be empty</span></td>
			</tr>	
			<tr>	
				<td class="info_parameter">Quantity:</td>
				<td><input type="text" id="how_much" class="how_muchinuser" name="how_muchinuser" number="true" required></td>
				<td><span id="errorQuantity" class="inactive error">Enter numbers</span></td>

				<td class="info_parameter">
				<select id="unit" name="unit" class="unit" value="Units">
				  <option value="unit">Units</option>
				  <option value="kg">Kgs.</option>
				 </select></td>
			</tr>
			<tr>	
				<td class="info_parameter">Description:</td>
				<td><input type="textarea" id="desc" name="descriptioninuser" rows="4" cols="20"></td>
			</tr>
			<tr>	
				<td class="info_parameter">Date:</td>
				<td><input type="date" id="datepicker" name="datesinuser"></td>
			</tr>
			<tr>
				<td><input type="submit" name="Submit" value="Submit" onclick="validateForm()"></td>
				<td></td>
			</tr>
		</table>	
		</div>
	</form>
</body>

<script type="text/javascript">

	$(document).ready(function(){
		$('.how_muchinuser').keyup(function () { 
   			 this.value = this.value.replace(/[^0-9\.]/g,'');
		});

		//$('#datepicker').DatePicker();
	});

	function validateForm() {

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
					
</html>