<html>
<head> <h1 align=center>Trade Players to other Teams</h1><head>
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
<form action="#" method="post">
<?php
$conn = mysqli_connect("localhost", "cs411tech_testtest", "%Gd~zouycV]l", "cs411tech_dbo");
$sql = "select  playerID from `cs411tech_dbo.People`";
$result = mysqli_query($conn, $sql);
?>
<div>
<select name="PlayerID">


<?php
	while($rows = $result->fetch_assoc())
	{
		$player = $rows['playerID'];
		echo "<option value='$player'>$player</option>";
		

	}
echo "</select>";

//$sql2 = "select  teamID from `cs411tech_dbo.Teams`";
//$result2 = mysqli_query($conn, $sql);
	
//echo "<input type=submit name=submit>";
?>
<select name="TeamID">
<?php
$sql2 = "select  teamID from `cs411tech_dbo.Teams`";
$result2 = mysqli_query($conn, $sql2);
	while($rows = $result2->fetch_assoc())
	{
		$team = $rows['teamID'];
		echo "<option value='$team'>$team</option>";
		

	}
echo "</select>";

//$sql2 = "select  teamID from `cs411tech_dbo.Teams`";
//$result2 = mysqli_query($conn, $sql);
	
//echo "<input type=submit name=submit>";
?>

<input type="submit" name="submit">

</div>
<?php
	$playerID = $_POST['PlayerID'];
	$teamID = $_POST['TeamID'];
	//echo "hello" .$playerID .$teamID;
	$sql3 = "select teamID from `cs411tech_dbo.Fielding` where playerID = '$playerID' order by yearID desc limit 1";
	$result3 = mysqli_query($conn, $sql3);
	
	//echo "test";
	while($rows = $result3->fetch_assoc())
	{
		$team2 = $rows['teamID'];
		//echo $team2;
		$sql4="INSERT INTO TradedPlayers (NewTeamID, OldTeamID, playerID) VALUES ('$teamID','$team2','$playerID')";
		if (mysqli_query($conn, $sql4)) {
			echo "Successfully Inserted Record: this was inserted to TradedPlayers table and player was tradded to : '$teamID' and updated in fielding table. ";
			$sql5="Update`cs411tech_dbo.Fielding` set teamID='$teamID' where playerID ='$playerID' order by yearID DESC,POS limit 1";
			if (mysqli_query($conn, $sql5)) {
				echo "Successfully Updated Record in Fielding table ".$teamID;				
			}
		}
		else{
			echo "failed";
		}
		

	}
	$sql6 = "SELECT * FROM `cs411tech_dbo.Fielding` where playerID='$playerID' order by yearID DESC, POS limit 1";
	$result4 = mysqli_query($conn, $sql6);
	
	//insert statement 
	
	
	//update statement 
	
		/*if(isset = $_POST(['PlayerID']))
		{
			echo "hello" .$playerID;
		}*/

?>
  <div class="container">  
                               
                <div >  
                     <table >  
                          <tr>  
                               <th>Player ID</th>  
                               <th>Team ID</th>  
                                
                          </tr>  
                          <?php  
                          while($row = mysqli_fetch_array($result4))  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["playerID"]; ?></td>  
                               <td><?php echo $row["teamID"];?></td>  
                               
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div> 

</form>
<body>
<html>