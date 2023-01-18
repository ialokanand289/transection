<?php
$server="localhost";
$username="root";
$password="";
$database="transection";

//connect a connection
$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    die("error!" . mysqli_connect_error());
}

//connect to datebase
// if($_SERVER["REQUEST_METHOD"]=="POST"){
//     $title=$_POST["title"];
//     $amount=$_POST["amount"];
//     $description=$_POST["description"];

//     $sql="INSERT INTO `data` (`sno`, `title`, `amount`, `description`, `dt`) VALUES (NULL, '$title', '$amount', '$description', current_timestamp())";
//     $result=mysqli_query($conn,$sql);
//     echo "Submit Successfully";

?>
<html>
    <head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
  
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['date', 'amount'],
            <?php 
            $sql="select * from 'data'";
            $result=mysqli_query($conn,$sql);
            while($data=mysqli_fetch_array($result));{
              $dt=$data['dt'];
              $amount=$data['amount'];
            ?>
              ['<?php echo $dt;?>', '<?php echo $amount;?>']
            <?php
                 }
            ?>
          ]);
  
          var options = {
            title: 'Company Performance',
            curveType: 'function',
            legend: { position: 'bottom' }
          };
  
          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
  
          chart.draw(data, options);
        }
      </script>
    </head>
    <body>
      <div id="curve_chart" style="width: 900px; height: 500px"></div>

      
    </body>
  </html>
  