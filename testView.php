</DOCTYPE HTML>

<html>	
<head>
<h1 align="center">Welcome to Tech Warriors Database</h1>
 </head>
<body>
Please Select A Query From the Drop Down:
<form action="#" method="get">
<select name="QuerySelector">
<option value=""></option>
<option value="None"</option>
<option value="SELECT * FROM `cs411tech_dbo.playerTenure`">tenure</option>
</select>
<input type="submit" name="submit" value="Submit Query" />
</form>
<?php
$conn = mysqli_connect("localhost", "cs411tech_testtest", "%Gd~zouycV]l", "cs411tech_dbo");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//isset makes sure value is not null -- even though using dropdown still good to check
if (!empty($_REQUEST['QuerySelector']))
{
	echo "<script>console.log('request');</script>";
	
echo '<meta http-equiv="refresh" content="0; URL=https://cs411tech.web.illinois.edu/insert.php">';
		/*
		$url = array('INSERT INTO PLAYERS TABLE'=>'https://cs411tech.web.illinois.edu/insert.php');
		 echo "<script>console.log('$url');</script>";
		header("location: $url");
		*/

}

if(isset($_POST['submit']))
{
	
	
	$selected= $_POST['QuerySelector'];  
	
	$sql = $selected;
	
	if($sql=="INSERT INTO PLAYERS TABLE")
	{
		echo "<script>console.log('ljasdlkfjasdf');</script>";
		header('Location: insert.php');
	}
	$result = $conn->query($sql);
	if($sql == "SELECT * FROM `cs411tech_dbo.playerTenure`")
	{
		echo "From the drop down you selected this query :" .$selected; 
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				echo "<br> playerID: ". $row["playerID"]. " debut: ". $row["debut"]. " finalGame:" . $row["finalGame"]. " tenureInDays :" . $row["tenureInDays "]. "</br>";
			}
		
		}else 
		{
		echo "No results from query";
		}
	}
	else if($sql == "SELECT * FROM `cs411tech_dbo.Batting`")
	{
		echo "From the drop down you selected this query :" .$selected; 
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				echo "<br> playerID: ". $row["playerID"]. " yearID:" . $row["yearID"]. " stint:" . $row["stint"]. " teamID:" . $row["teamID"]. " teamID:" . $row["teamID"]. " lgID:" . $row["lgID"]. " G:" . $row["G"]. " AB:" . $row["AB"]. " R:" . $row["R"]. " H:" . $row["H"]. " 2B:" . $row["2B"]. " 3B:" . $row["3B"]. " HR:" . $row["HR"]. " RBI:" . $row["RBI"]. " SB:" . $row["SB"]. " CS:" . $row["CS"]. " BB:" . $row["BB"]. " SO:" . $row["SO"]. " IBB:" . $row["IBB"]. " HBP:" . $row["HBP"]. " SH:" . $row["SH"]. " SF:" . $row["SF"]. " GIDP:" . $row["GIDP"]."</br>";
			}
		
		}else 
		{ 
		echo "No results from query";
		}
	}
	else if($sql == "")
	{
		echo "No Query Selected ";
	}


}
echo "Connected successfully";

mysqli_close($conn);
?>
</body>
</html>