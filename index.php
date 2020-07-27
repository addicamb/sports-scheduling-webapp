<?php
session_start();
$conn =new mysqli('localhost','root','','sports') or die(mysqli_error($conn));
$msg="";

if(isset($_POST['login'])){
  $username=mysqli_real_escape_string($conn,$_POST['username']) ;
  $password=mysqli_real_escape_string($conn,$_POST['password']);
  $password=sha1($password);
  $usertype=mysqli_real_escape_string($conn,$_POST['usertype']);

  $sql ="SELECT * FROM login WHERE username=? AND password=? AND usertype=? LIMIT 1";
  $stmt=$conn->prepare($sql);
  $stmt->bind_param("sss",$username,$password,$usertype);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  session_regenerate_id();
  $_SESSION['username'] =$row['username'];
  $_SESSION['usertype'] =$row['usertype'];
  session_write_close();

  if($result->num_rows==1 && $_SESSION['usertype']=="admin"){
    header("location:admin.php");
  }
  else if($result->num_rows==1 && $_SESSION['usertype']=="guest"){
    header("location:guest.php");
  }
  else{
    $msg="Username or password is incorrect !";
  }
}
 ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>Rait Sports</title>
   <link rel="icon" href="images/rs.jpg" sizes="16x16">
   <link rel="stylesheet"
   href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
   integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
   <!-- Custom fonts for this template-->
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
         rel="stylesheet">
   <!-- Custom styles for this template-->
   <link href="css/logincss.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="style.css">
   <style>
   .card{
     border-radius:10px;
     width:450px;
     padding: 30px;
   }

input[type=text]::placeholder,input[type=password]::placeholder{
  color: gray;
  font-size:16px;
}
.see{
color: gray;
}
img{
   margin-left:20%;
   margin-top:10%;
   width:50%;
 }
 .form-control:hover{
   box-shadow: 5px 5px 20px  rgb(0,0,0, 0.2);
 }

   @media only screen and (max-width: 768px) {
   body {

   }
   img{
      margin-left:20%;
      margin-top:10%;
      width:50%;
    }
    .card{
      width:100%;
      padding: 10px;
      margin: 0;
    }
 }
   </style>

 </head>

 <body id="bg">

<div class="container">
  <div class="row">
  <div class="col col-sm-12">
  <div class="card m-5 mx-auto col-sm-12" style="box-shadow: 5px 5px 20px 0px rgb(10,10,10, 0.5);">
    <img class="img-fluid d-block mx-auto" src="images/rs2.jpg"/>
    <br>
    <div class="col-sm-12 col-lg-12">
      <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
         <i>(For Admin only)</i>
      </div>

              <form class="user" action="<?= $_SERVER['PHP_SELF']  ?>" method="post">
                  <div class="input-group mb-3 input-group-lg">
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control-user" id="inputGroup-sizing-default">
                      <i class="material-icons" >person_outline</i>
                      </span>
                    </div>
                    <input type="text"autocomplete="off" name="username" class="form-control form-control-user" placeholder="Username" required  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                  <div class="input-group mb-3 input-group-lg">
                    <div class="input-group-prepend">
                      <span class="input-group-text form-control-user" id="inputGroup-sizing-default">
                      <i class="material-icons" >security</i>
                      </span>
                    </div>
                    <input type="password"autocomplete="off" name="password" class="form-control form-control-user" placeholder="Password" required  aria-label="Default" aria-describedby="inputGroup-sizing-default">
                  </div>
                  <div class="input-group mb-3 d-none">
                  <div class="input-group-prepend">
                    <label class="input-group-text see" for="inputGroupSelect01">Type</label>
                  </div>
                  <select name="usertype" class="custom-select see" id="inputGroupSelect01">
                      <option value="">Select type</option>
                      <option value="admin" selected>admin</option>
                      <option value="guest">guest</option>
                  </select>
                  </div>
                  <center><a href='forgot_password.php' class="text-danger font-weight-bold"><em>Forgot Username/Password?</em></a></center>
                    <hr>
                    <div class="">
                    <center><button type="submit" name="login" class="btn btn-primary form-control"> Login </button></center>
                    <h5 class="text-danger text-center"><?= $msg; ?></h5><br>
                    <center><a href='guest.php' class="text-success font-weight-bold" onclick="<?= $_SESSION['usertype']='guest' ?>"><em>Continue as a guest </em> &#8677;</a></center>
                    </div>
                </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
