<?php
$showAlert=false;
$showError=false;
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
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $name=$_POST["name"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];
  $mob_no=$_POST["mob_no"];

  $existSql="select * from user where email='$email'";
  $result= mysqli_query($conn,$existSql);
  $numExistRows= mysqli_num_rows($result);
  if($numExistRows>0){
    $showError=" username Already Exists.";
  } 
  else{
      if(($password==$cpassword)){
        $sql="INSERT INTO `user` (`name`, `email`, `password`,`mob_no`, `dt`) VALUES ('$name', '$email', '$password','$mob_no', current_timestamp())";
        $result= mysqli_query($conn,$sql);
        if ($result){
        $showAlert=true;
      }
  }
  else{
      $showError="Password do not match";
  }
}
}

  
//   $sql="INSERT INTO `user` (`name`, `email`, `password`, `mob_no`) VALUES ('$name', '$email','$password', '$mob_no')";
//   $result= mysqli_query($conn,$sql);

//   echo "Submit Sucessfully";

// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Registration Page - Welcome to our Page. </title>
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
        <a class="nav-link" href="#">Sign In</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="login.php">Log In</a>
      </li>
      <li class="nav-item">
            <a class="nav-link" href="insert.php">Insert Data</a>
        </li>
  
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav> 

    <section class="vh-100 gradient-custom">
      
        <div class="container py-5 h-50">
        <?php
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> Your account is now created and you can login. 
      </div>';
    }
    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong> Warning!</strong>' .$showError.'
        </div>';
    }
    ?> 
          <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
              <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                  <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                  <form action="#" method="POST">
      
                    <div class="row">
                      <div class="col-md-6 mb-4">
      
                        <div class="form-outline">
                          <input type="text" id="name" name="name" class="form-control form-control-lg" />
                          <label class="form-label" for="name">Name</label>
                        </div>
      
                      </div>
                     
                      </div>
                  
      
                    <div class="row">
                      <div class="col-md-6 mb-4 d-flex align-items-center">
      
                        <div class="form-outline datepicker w-100">
                          <input type="email" class="form-control form-control-lg" name="email" id="email" />
                          <label for="email" class="form-label">Email Id</label>
                        </div>
      
                      </div>
                      
                    </div>
      
                    <div class="row">
                      <div class="col-md-6 mb-4 pb-2">
      
                        <div class="form-outline">
                          <input type="password" name="password" id="password" class="form-control form-control-lg" />
                          <label class="form-label" for="password">Password</label>
                        </div>
                        <br>

                        <div class="form-outline">
                          <input type="password" name="cpassword" id="cpassword" class="form-control form-control-lg" />
                          <label class="form-label" for="cpassword">Confirm Password</label>
                        </div>
                
      
                      </div>
                      <div class="col-md-6 mb-4 pb-2">
      
                        <div class="form-outline">
                          <input type="number" id="mob_no"  name="mob_no" class="form-control form-control-lg" />
                          <label class="form-label" for="phoneNumber">Phone Number</label>
                        </div>
      
                      </div>
                    </div>
      
             
                    <div class="mt-4 pt-2">
                      <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                    </div>
      
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!-- MDB -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>  
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"
></script>
</body>
</html>