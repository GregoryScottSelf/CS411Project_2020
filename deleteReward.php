<!doctype html>
<html>
<head> <h1 align=center>Delete Records From Rewards Player Table</h1><head>
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
Please Enter a PlayerID to be deleted from the Rewards Player Table
<form action="#" method="get">
<div class="container">
	<label>PlayerID</label>
	<input type="text" name="playerID" > 
	<input type="submit" name="submit" >
</div>
</form>
<?php
$conn = mysqli_connect("localhost", "cs411tech_testtest", "%Gd~zouycV]l", "cs411tech_dbo");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$playerID = $_GET['playerID'];
 
 $sql="Delete FROM `cs411tech_dbo.AwardsPlayers` where playerID='$playerID'";
if(isset($_GET['submit'])){
 if (mysqli_query($conn, $sql)) {
    echo "Record Deleted From the Rewards Player Table.";
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