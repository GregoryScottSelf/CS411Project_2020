 <?php  
 $connect = mysqli_connect("localhost", "cs411tech_testtest", "%Gd~zouycV]l", "cs411tech_dbo");  
 $query = "SELECT P.`nameFirst` as Player_NM, count(A.`awardID`) as AWD_CNT FROM `cs411tech_dbo.People` P
join `cs411tech_dbo.AwardsPlayers` A on P.`playerID` = A.playerID
group by P.`nameFirst`
order by AWD_CNT desc
limit 10";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Player_NM', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["Player_NM"]."', ".$row["AWD_CNT"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Top 10 Awarded Players',                       
                     };  
                var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_values'));  
                chart.draw(data, options);  
           }  
           </script>  
      </head>  
      <body>  
           <br /><br />  
           <div style="width:900px;">  
               
                <br />  
                <div id="columnchart_values" style="width: 900px; height: 500px;"></div>  
           </div>  
      </body>  
 </html> 