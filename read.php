<!doctype html>
<html>
<head> <h1 align=center>Read From Player Table</h1><head>
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
Please Enter a PlayerID to be read from the Rewards Player Table
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
 
 $sql="SELECT * FROM `cs411tech_dbo.AwardsPlayers` where playerID='$playerID'";
 $result = $conn->query($sql);
if(isset($_GET['submit'])){
 if (mysqli_query($conn, $sql)) {
    echo "Record from table:";
	echo"<br></br>";
} 
if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				echo "<br> AwardID: ". $row["awardID"]. " lgID: ". $row["lgID"]. " Notes:" . $row["notes"]. " PlayerID:" . $row["playerID"].  " Tie:" . $row["tie"] . " yearID:" . $row["yearID"]."</br>";
			}
		
		}else 
		{
		echo "No results from query";
		}
}

 mysqli_close($conn);
 ?>

<body>
</form>
</html>