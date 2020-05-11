 <?php 
//query 1 
 $connect = mysqli_connect("localhost", "cs411tech_testtest", "%Gd~zouycV]l", "cs411tech_dbo");  
 $query = "SELECT peo.`nameFirst` as FirstName, (`tenureInDays`/365) as TenureYear FROM `playerTenure` pt 
join `cs411tech_dbo.People` peo on pt.`playerID` = peo.`playerID` order by `tenureInDays` DESC limit 25";  

 $result = mysqli_query($connect, $query);  
 
 //query 2
 $query2 = "SELECT lgID, count(*) as number FROM `cs411tech_dbo.AwardsPlayers` GROUP BY lgID";  
 $result2 = mysqli_query($connect, $query2); 
 
 //query 3
  
$query3 = "SELECT P.`nameFirst` as Player_NM, count(A.`awardID`) as AWD_CNT FROM `cs411tech_dbo.People` P
join `cs411tech_dbo.AwardsPlayers` A on P.`playerID` = A.playerID
group by P.`nameFirst`
order by AWD_CNT desc
limit 10";  

$result3 = mysqli_query($connect, $query3);  

//query 4

 
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(DrawColumn);  
           function DrawColumn()  
           {  
                var OurChart = google.visualization.arrayToDataTable([  
                          ['FirstName','TenureYear'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                            echo "['".$row["FirstName"]."', ".$row["TenureYear"]."],";
                          }  
                          ?>  
                     ]);  
                var t = {  
                    title: 'Player Tenure'
                     };  
                var chart = new google.visualization.LineChart(document.getElementById('columnchart_values'));

                chart.draw(OurChart, t);  
           }  
		   
		   google.charts.setOnLoadCallback(DrawC2);  
           function DrawC2()  
           {  
                var OurChart = google.visualization.arrayToDataTable([  
                          ['lgID', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row["lgID"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var ti = {  
                      title: 'Number of Players in each League',                       
                     };  
                var chart = new google.visualization.ColumnChart(document.getElementById('cc'));  
                chart.draw(OurChart, ti);  
           }  
		   
		   google.charts.setOnLoadCallback(DoC);  
           function DoC()  
           {  
                var info = google.visualization.arrayToDataTable([  
                          ['Player_NM', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row["Player_NM"]."', ".$row["AWD_CNT"]."],";  
                          }  
                          ?>  
                     ]);  
                var ti = {  
                      title: 'Top 10 Awarded Players',                       
                     };  
                var chart = new google.visualization.ColumnChart(document.getElementById('view_q'));  
                chart.draw(info, ti);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
               
                <br />  
                <div id="columnchart_values" style="width: 900px; height: 500px;"></div>  
           </div>  
		    <div style="width:900px;">  
               
                <br />  
                <div id="cc" style="width: 900px; height: 500px;"></div>  
           </div>
		    <div style="width:900px;">  
               
                <br />  
                <div id="view_q" style="width: 900px; height: 500px;"></div>  
           </div>
      </body>  
 </html> 