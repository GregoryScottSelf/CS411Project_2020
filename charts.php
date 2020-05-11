 <?php  
 $connect = mysqli_connect("localhost", "cs411tech_testtest", "%Gd~zouycV]l", "cs411tech_dbo");  
 $query = "SELECT lgID, count(*) as number FROM `cs411tech_dbo.AwardsPlayers` GROUP BY lgID";  
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
                          ['lgID', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["lgID"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Number of Players in each League',                       
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