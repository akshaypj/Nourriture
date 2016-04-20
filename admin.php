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
    margin: 2% 20%;	
}
#insert_provider, #insert_entry, #delete_provider{
	display: none;
}

#insert_provider_button, #delete_provider_button, #insert_entry_button
{
	outline: none;	
	margin: 10px;
}

#provider_info_admin td input, #provider_info_admin td select, #provider_name, #delete_submit, #delete_who{
	outline:none;
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
	width: 940px;
    margin-left: 18%
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
    width: 25%;
    padding: 10px 0 17px;
    letter-spacing: .07em;
    text-transform: uppercase;
    border-right: 2px solid black;
}

.titleBlock .section div a {
    font-size: 17px;
    padding-bottom: 6px;
    color: black;
    letter-spacing: .07em;
    text-transform: uppercase;
    text-decoration: none;
}


.titleBlock .section div.active a {
    font-size: 17px;
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

.user-details{
	text-align: center;
	padding-top: 20px;

}

#puser_pwd{
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

/*ADD A RECORD*/

#provider_info td {
    padding: 10px;
}

#provider_info td input, #provider_info td select, #provider_info td textarea {
    background-color: rgb(202,239,248);
    border: 1px solid rgb(167, 207, 234);
}    

.error{
	font-weight: bold;
	color: red;
}

/*END HERE*/


/*Retrieve*/

.tdClass, .tdClassheader {
    padding-left: 20px;
    padding-right: 10px;
    font-family: Oswald,Helvetica,sans-serif;
    font-size: 13px;
    color: #000;
    letter-spacing: .07em;
    font-weight: 500;
}

.tdClassheader {
    font-style: bold;
    font-weight: 700;
    font-size: 15px;
    background-color: #78CEED;
}

.tableHolder{
	padding-top:10px;
}

/*END HERE*/

.contentDiv{
	padding: 10px 0px 30px 0px;
    margin-top: 26px;
	background-color: white;    
}	

.separator{
    height: 2px;
    background-color: rgba(0, 0, 0, 0.07);
    margin: 20px 20px 10px 20px;
}

.lowerElement {
    margin-bottom: 18px;
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


.formatText{
    font-weight: 700;
    font-size: 16px;
    margin-bottom: 6px;
}


</style>

<head>
  <title>Nourriture</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script>
		$(document).ready(function(){
			$('.how_muchinuser').keyup(function () { 
	   			this.value = this.value.replace(/[^0-9\.]/g,'');
			});

			$(".leftTab").click(function(){
				$(".tabContent").hide();				
				$("#userContent").show();

				$(".tabHeader").removeClass("active");				
				$(".leftTab").addClass("active");
			});

			$(".rightTab").click(function(){
				$(".tabContent").hide();					
				$("#providerContent").show();				

				$(".tabHeader").removeClass("active");				
				$(".rightTab").addClass("active");				
			});

			$(".tab3").click(function(){
				$(".tabContent").hide();					
				$("#addRecord").show();				

				$(".tabHeader").removeClass("active");				
				$(".tab3").addClass("active");				
			});

			$(".tab4").click(function(){
				$(".tabContent").hide();					
				$("#retrieve").show();				

				$(".tabHeader").removeClass("active");				
				$(".tab4").addClass("active");				
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
					<div class="leftTab active tabHeader"><a>Add/Remove User</a></div>
					<div class="rightTab tabHeader" style="float:left;"><a>Add/Remove Provider</a></div>
					<div class="tab3 tabHeader" style="float:left;"><a>Add a record</a></div>
					<div class="tab4 tabHeader"><a>Retrieve</a></div>
				
				</div>
			</div>

			<div class="contentDiv">
				<div id="userContent" class="tabContent">
					<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
						<div class = "user-details">
						<span id = "insert_user_span">User Name:</span><input type="textbox" id="puser_name" name="user_name"><br>
						<span id = "insert_user_span">Password: </span><input type="password" id="puser_pwd" name="user_pwd"><br>
						<span><input type="submit" id="insert_submit" value="Insert" name="Insert_User"></span>
						</div>		

						<div class ="separator"></div>

						<div class = "user-details">
						<span id = "insert_user_span">Select User: </span>
							<select id="delete_who" name="delete_who_user">					
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
							if (isset($_POST['Delete_User'])){  
								del_func();
							}else if(isset($_POST['Insert_User'])){
								add_func();
							}
							function del_func(){
								$myDeluser=$_POST['delete_who_user']; 
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

				<div id="providerContent" class="inactive tabContent">
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

				<div id="addRecord" class="inactive tabContent">
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
								</select>
								</div>

								<div class="info_parameter formatText">Description:</div>
								<div><input class="lowerElement" type="textarea" id="desc" name="descriptioninuser" rows="4" cols="20"></div>


								<div class="info_parameter formatText">Date:</div>
								<div><input type="date" id="datepicker" class="lowerElement" name="datesinuser"></div>

								<div><input type="submit" class="submit_button_cls" name="Submit_Entry" value="Submit" onclick="validateForm()"></div>
							</div>
						</div>
					</form>
					<?php
							if (isset($_POST['Submit_Entry'])){ 
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
			 			
								$query  = "INSERT INTO example(provider,foodtype,quantity,description,dates,units) VALUES('$myprovider','$myfoodtype','$myquantity','$mydescription','$mydate','$myunit')";
								$result = mysqli_query($link, $query);													
							}
					?>				
				</div>

				<div id="retrieve" class="inactive tabContent">
					<div class="tableHolder">
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
	</div>
</body>
</html>