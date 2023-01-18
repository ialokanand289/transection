<!-- <!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Simple Line Chart"
	},
	data: [{        
		type: "line",
      	indexLabelFontSize: 16,
		dataPoints: [
			{ y: <?php echo 500 ?> },
			{ y: 414},
			{ y: 520, indexLabel: "\u2191 highest",markerColor: "red", markerType: "triangle" },
			{ y: 460 },
			{ y: 450 },
			{ y: 500 },
			{ y: 480 },
			{ y: 480 },
			{ y: 410 , indexLabel: "\u2193 lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
			{ y: 500 },
			{ y: 480 },
			{ y: 510 }
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
    <div class="container-fluid">

        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    </div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html> -->
<?php
$server="localhost";
$username="root";
$password="";
$database="transection";

// connect a connection
$conn=mysqli_connect($server,$username,$password,$database);
if(!$conn){
    //echo "success!";
//}
//else{
    die("error!".mysqli_connect_error());

}
$sql="select * from `data`";
$result=mysqli_query($conn,$sql);
?>
<?php
 

  
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Welcome-Transection Sheet</title>
    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css"
rel="stylesheet"
/>
</head>
<body>
<section class="vh-100 gradient-custom">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">i-Notes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="welcome.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registration.php">Sign In</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="login.php">Log In</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="insert.php">Insert Data</a>
        </li>
  
    </ul>
    <form class="form-inline my-2 my-lg-0" action="login.php" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> 

<div class="contaner">

<table class="table table-striped table-dark" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Title</th>
      <th scope="col">Amount</th>
      <th scope="col">Discription</th>
      <th scope="col">DATE</th>
    </tr>
  </thead>
  
  <tbody>
  <?php
                //print_r($result);
                if($result->num_rows>0){
                
                    while($row = $result->fetch_assoc()){


                      // $dataPointss = array(
                      //   array("y" => $row['amount'], "label" =>  $row['dt']),
                      // );
                      
                    
                     $data['y'] =    25 ;
                     $data['label'] ="Sunday";
                       
                     $arr =  [ 'y' =>  25 ,  'label' => "SUNDAY"];
                ?>
                <tr>
                    <td><?php echo $row['sno']; ?> </td>
                    <td><?php echo $row['title']; ?> </td>
                    <td><?php echo $row['amount']; ?> </td>
                    <td><?php echo $row['description']; ?> </td>
                    <td><?php echo $row['dt']; ?> </td>
                    </tr>
                <?php
                    }

                      
                    $dataPoints = array($arr);
                     

                    $dataPointss= array(
                    
                      array("y" => 15, "label" => "Monday"),
                      array("y" => 25, "label" => "Tuesday"),
                      array("y" => 5, "label" => "Wednesday"),
                      array("y" => 10, "label" => "Thursday"),
                      array("y" => 0, "label" => "Friday"),
                      array("y" => 20, "label" => "Saturday")
                    );
                     
                    echo"<pre>";
                    print_r($dataPoints);
                    print_r($dataPointss);
                }
                ?>
                
      

    </tbody>

</table>
  </div>
    <div class="container-fluid" style="background-color: white">
      <center>

        <div class="container py-5">
          
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
          
        </div>
      </center>
      
      </div>

</section>
    
</body>
 <!-- MDB -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> 
 <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script> 
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"
></script>
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
});
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Push-ups Over a Week"
	},
	axisY: {
		title: "Number of Push-ups"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

</html>