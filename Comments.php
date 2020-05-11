<!doctype html>
<html>
<head> <h1 align=center>Comments Blog</h1><head>
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

.content {
    margin-top:auto;
    margin-bottom:auto;
    text-align:center;
}
.center {
  text-align: center;
  border: 3px solid red;
}
</style>
<form action="#" method="get">
<div class="container">


	
		<label>PlayerID</label>
		<input type="text" name="playerID" > 
	
	
		<label>Comment to add</label> &nbsp &nbsp &nbsp
		<input type="text" name="Comment" > 


	
		<input type="submit" name="submit" >

</div>

<?php
$conn = mysqli_connect("localhost", "cs411tech_testtest", "%Gd~zouycV]l", "cs411tech_dbo");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$PlayerID=$_GET['playerID'];
$Comment=$_GET['Comment'];
//echo $PlayerID;
//echo $Comment;


//$sql=$conn->prepare("INSERT INTO `cs411tech_dbo.AwardsPlayers` (playerID, awardID, yearID, lgID, tie, notes) VALUES (?,?,?,?,?,?)");
//$sql->bind_param("sss", $Award, $lgID, $Notes,$playerID,$Tie,$YearID);
//$sql->execute();
$sql="INSERT INTO Comments (playerID, Comm) VALUES ('$PlayerID','$Comment')";

if(isset($_GET['submit'])){
 if (mysqli_query($conn, $sql)) {
    echo "Successfully Inserted Record";
} 

else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
$sql2 = "Select * from Comments C inner join `cs411tech_dbo.People` P on P.playerID = C.playerID where C.playerID='$PlayerID'";
$result2 = mysqli_query($conn, $sql2);
$sql3 = "Select * from Comments";
$result3= mysqli_query($conn, $sql3);

 ?>
<div class="container">  
                               
                <div >  
                     <table >  
                          <tr>  
                               <th>Player ID</th>  
                               <th>Comment</th>  
                                
                          </tr>  
                          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["playerID"]; ?></td>  
                               <td><?php echo $row["Comm"];?></td>  
                               
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>
	   
		   <div class="center" >
                               
                <div class="center">  
                     <table >  
                          <tr>  
                               <th>Player ID</th>  
                               <th>Comment</th>  
                                
                          </tr>  
                          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["playerID"]; ?></td>  
                               <td><?php echo $row["Comm"];?></td>  
                               
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div> 
<?php
mysqli_close($conn);
 ?>
<body>
</form>
</html>