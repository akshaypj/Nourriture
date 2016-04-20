<!DOCTYPE html>
<html>

<style>
body{
	margin:0px;
}
#form{
    margin: 15px 50px;
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
	margin-bottom:20px;
}

.active{
	display:block;
}

.inactive{
	display:none;
}

/* For the tab addition*/

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

.sectionion div.active {
    background-color: #000;
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

.tdClass, .tdClassheader{
	padding-left: 20px;
	padding-right: 10px;
	font-family: Oswald,Helvetica,sans-serif;
	font-size: 13px;
    color: #000;
    letter-spacing: .07em;
    font-weight: 500;
}

.tdClassheader{
	font-style: bold;
	font-weight: 700;
	font-size: 15px;
	background-color: #78CEED;
}

.retrieveData{
	margin-top: 30px;
}

.formatText{
    font-weight: 700;
    font-size: 16px;
    margin-bottom: 6px;
}

.lowerElement{
	margin-bottom: 18px;
	width:100%;
}

#who, #unit{
    width: 100%;
}

input, .selClass{
	height: 36px;
    line-height:30px;
    outline: none;
}

 .submit_button_cls{
	padding: 8px 24px 8px 24px;
	font-family: -webkit-body;
	background-color: black;
	color: white;
	width: 160px;
	height: 50px;
	margin-left: 175px;
	margin-bottom: 20px;	
	outline: none;
	font-size: 16px;
	font-weight: 700;
	text-align: center;
}

.contentDiv{
	padding: 10px 0px 10px 0px;
    margin-top: 26px;
	background-color: white;    
}	

</style>


<head>
  <title>Nourriture</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
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
				<div class="sectionion">
					<div class="leftTab active"><a>Add a record</a></div>
					<div class="rightTab"><a>Retrieve</a></div>
				</div>
			</div>

			<div class="contentDiv">
				<div id="addRecordContent">
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
						<div id="form">
							<div id="success_message" name="success_message"></div>  		    

							<div id="provider_info">
								<div class="formatText" id ="provider_name">Provider:</div> 
								<div class="provideDropdown lowerElement"> 
									<select id="who" name="whoinuser" class="selClass">
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
											echo "<option value=$Nameselect class='selClass'> $Nameselect </option>";
										}
									?>
									</select>
								</div>

								<div class="formatText" id ="food_type_name">Food Type:</div>
								<div><input type="text" id="what" name="whatinuser" class = "whatinuser lowerElement"></div>
								<div><span id="errorFoodType" class="inactive error">Foodtype cannot be empty</span></div>

								<div class="info_parameter formatText">Quantity:</div>
								<div><input type="text" id="how_much" class="how_muchinuser lowerElement" name="how_muchinuser" number="true" required></div>
								<div><span id="errorQuantity" class="inactive error">Enter numbers</span></div>

								<div class="info_parameter formatText">Unit:</div>
								<div class="info_parameter lowerElement">
								<select id="unit" name="unit" class="unit" value="Units">
									<option value="gallons">Gallons</option>																	  									
									<option value="kgs">Kgs</option>									
									<option value="litres">Litres</option>																	  								  
									<option value="ounces">Oz</option>																	  
									<option value="pounds">Lb</option>																	  
									<option value="units">Units</option>
								 </select></div>

								<div class="info_parameter formatText">Description:</div>
								<div><input class="lowerElement" type="textarea" id="desc" name="descriptioninuser" rows="4" cols="20"></div>


								<div class="info_parameter formatText">Date:</div>
								<div><input type="date" id="datepicker" class="lowerElement" name="datesinuser"></div>

								<div><input type="submit" class="submit_button_cls" name="Submit_Entry" value="Submit" onclick="validateForm()"></div>
							</div>
						</div>
					</form>
					<?php
							if (isset($_POST['Submit_Entry'])){ //If it is the first time, it does nothing  
								sel_func();
							}
							function sel_func(){
								$myprovider=htmlspecialchars($_POST['whoinuser']); 
								$myfoodtype=$_POST['whatinuser']; 
								$myquantity=$_POST['how_muchinuser'];
								$myunit=$_POST['unit'];
								$mydescription=$_POST['descriptioninuser'];
								$mydate=$_POST['datesinuser'];


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
			 			
								$query  = "INSERT INTO example(provider,foodtype,quantity,description,dates,units) VALUES('$myprovider','$myfoodtype','$myquantity','$mydescription','$mydate', '$myunit')";
								$result = mysqli_query($link, $query);
							}
					?>
				</div>
				
				<div id="retrieveContent" class="inactive">
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
			            $query  = "SELECT * FROM example";
			            $result = mysqli_query($link, $query);
			            echo "<table border='1' width='100%' class='retrieveData'>
			            <tr>
			              <td height='58' class='tdClassheader'>Provider </td>
			              <td height='58' class='tdClassheader'>Quantity</td>
			              <td height='58' class='tdClassheader'>Units</td>
			              <td height='58' class='tdClassheader'>Food type</td>
			              <td height='58' class='tdClassheader'>Description</td>
			              <td height='58' class='tdClassheader'>Dates</td>
			            </tr>";
			            while($row = mysqli_fetch_array($result))
			            {
			            echo "<tr>";
			            echo "<td height='58' class='tdClass'>".$row['provider']."</td>";
			            echo "<td height='58' class='tdClass'>".$row['quantity']."</td>";
			            echo "<td height='58' class='tdClass'>".$row['units']."</td>";
			            echo "<td height='58' class='tdClass'>".$row['foodtype']."</td>";
			            echo "<td height='58' class='tdClass'>".$row['description']."</td>";
			            echo "<td height='58' class='tdClass'>".$row['dates']."</td>";
			            echo "</tr>";
			            }
			            echo "</table>";
					?>  
				</div>			
			</div>


			
		</div>
	</div>
</body>

<script type="text/javascript">

	$(document).ready(function(){
		$('.how_muchinuser').keyup(function () { 
   			 this.value = this.value.replace(/[^0-9\.]/g,'');
		});

		$(".leftTab").click(function(){
			$("#retrieveContent").hide();
			$("#addRecordContent").show();
			$(".leftTab").addClass("active");
			$(".rightTab").removeClass("active");				
		});


		$(".rightTab").click(function(){
			$("#addRecordContent").hide();				
			$("#retrieveContent").show();	
			$(".leftTab").removeClass("active");
			$(".rightTab").addClass("active");				
		});
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
</html>