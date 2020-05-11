<!doctype html>
<html>
<head> <h1 align=center>Update Rewards Player Table</h1><head>
<body>
<style>
.container {
  width: 500px;
  clear: both;
}

.container input {
  width: 100%;
  clear: both;
}
</style>
<form action="#" method="get">
<div class="container">


	
		<label>awardID</label>
		<input type="text" name="awardID" > 
	
	
		<label>lgID</label> &nbsp &nbsp &nbsp
		<input type="text" name="lgID" > 


		<label>Notes</label>
		<input type="text" name="Notes" > 

	
		<label>playerID</label>
		<input type="text" name="playerID" > 
	
	
		<label>Tie</label>&nbsp &nbsp
		<input type="text" name="Tie" > 
	
	
		<label>YearID</label>
		<input type="text" name="YearID" > 
	
		<input type="submit" name="submit" >

</div>

<?php
$conn = mysqli_connect("localhost", "cs411tech_testtest", "%Gd~zouycV]l", "cs411tech_dbo");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$Award=$_GET['awardID'];
$lgID=$_GET['lgID'];
$Notes=$_GET['Notes'];
$playerID=$_GET['playerID'];
$Tie=$_GET['Tie'];
$YearID=$_GET['YearID'];
 
 $sql="UPDATE `cs411tech_dbo.AwardsPlayers` SET playerID='$playerID', awardID='$Award', yearID='$YearID', lgID='$lgID', tie='$Tie', notes='$Notes' where playerID='$playerID'";
if(isset($_GET['submit'])){
 if (mysqli_query($conn, $sql)) {
    echo "Record has been Updated";
} 
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
 mysqli_close($conn);
 ?>

<body>
</form>
</html>