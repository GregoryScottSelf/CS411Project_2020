<?php 
//query 1 
 $connect = mysqli_connect("localhost", "cs411tech_testtest", "%Gd~zouycV]l", "cs411tech_dbo");  
 $query = "SELECT DISTINCTROW TEM.`name` as NAME, count(`playerID`) as PLYR_CNT FROM `cs411tech_dbo.Batting` BAT
join (SELECT distinct `teamID`, `name` FROM `cs411tech_dbo.Teams`) TEM on BAT.`teamID` = TEM.`teamID`
group by NAME
order by PLYR_CNT desc
limit 12";  

 $result = mysqli_query($connect, $query);  
 
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
                          ['NAME','PLYR_CNT'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                            echo "['".$row["NAME"]."', ".$row["PLYR_CNT"]."],";
                          }  
                          ?>  
                     ]);  
                var t = {  
                    title: 'Player Distribution'
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('columnchart_values'));

                chart.draw(OurChart, t);  
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