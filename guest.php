<?php
session_start();

if($_SESSION['usertype']!="guest"){
header("location:index.php");
}
include 'guest_header.php';
?>

<style>
/* Make the image fully responsive */
.carousel-inner img {
    width: 100%;
    height: 100%;
}
p{
  font-size: 20px;
}
.opaq{
  background: rgba(10, 10, 10, 0.5);
}
</style>

<div class="container opaq text-white p-5 resp home">
 <div class="row p-5">
   <div class="col-sm-12 col-md-6">
           <div id="slide1" class="carousel slide" data-ride="carousel">

       <!-- Indicators -->
       <ul class="carousel-indicators">
         <li data-target="#slide1" data-slide-to="0" class="active"></li>
         <li data-target="#slide1" data-slide-to="1"></li>
         <li data-target="#slide1" data-slide-to="2"></li>
       </ul>

       <!-- The slideshow -->
       <div class="carousel-inner">
         <div class="carousel-item active">
           <img src="images/slide5.jpg" alt="Los Angeles" width="1100" height="500">
         </div>
         <div class="carousel-item">
           <img src="images/slide1.jpg" alt="Chicago" width="1100" height="500">
         </div>
         <div class="carousel-item">
           <img src="images/slide3.jpg" alt="New York" width="1100" height="500">
         </div>
       </div>

       <!-- Left and right controls -->
       <a class="carousel-control-prev" href="#slide1" data-slide="prev">
         <span class="carousel-control-prev-icon"></span>
       </a>
       <a class="carousel-control-next" href="#slide1" data-slide="next">
         <span class="carousel-control-next-icon"></span>
       </a>
     </div>
   </div>
   <div class="col-sm-12 col-md-6">
     <center> <h1>STAMINA</h1> </center>
     <br>
     <p>Stamina is the Inter-DY sports festival. <br>
       Stamina includes sports like Football, Box Cricket, Chess, Bad-Minton,
       Basketball, Kabaddi, Kho-kho, lawn-tennis, Carrom, Volleyball and Throwball.</p>
   </div>
 </div>
 <hr>
 <div class="row p-5">
   <div class="col-sm-12 col-md-6">
     <center> <h1>Olympia</h1> </center>
     <br>
     <p>
       Olympia is an intra- DYP University sports fest. Olympia 2017 being the 10th Year anniversary was the biggest and the most special one till date.<br>
       Olympia 2K17 had 16 sports going all over the University and Sports academy campus.<br>
       D Y Patil’s Ramrao Adik Institution of Technology completed a triple of winning the Olympia trophy.<br>
       Over all these years, Olympia has grown which was once just a thought is now the most awaited festival of the D Y Patil University.
     </p>
   </div>
   <div class="col-sm-12 col-md-6">
           <div id="slide2" class="carousel slide" data-ride="carousel">

       <!-- Indicators -->
       <ul class="carousel-indicators">
         <li data-target="#slide2" data-slide-to="0" class="active"></li>
         <li data-target="#slide2" data-slide-to="1"></li>
         <li data-target="#slide2" data-slide-to="2"></li>
       </ul>

       <!-- The slideshow -->
       <div class="carousel-inner">
         <div class="carousel-item active">
           <img src="images/slide1.jpg" alt="Los Angeles" width="1100" height="500">
         </div>
         <div class="carousel-item">
           <img src="images/slide2.jpg" alt="Chicago" width="1100" height="500">
         </div>
         <div class="carousel-item">
           <img src="images/slide3.jpg" alt="New York" width="1100" height="500">
         </div>
       </div>

       <!-- Left and right controls -->
       <a class="carousel-control-prev" href="#slide2" data-slide="prev">
         <span class="carousel-control-prev-icon"></span>
       </a>
       <a class="carousel-control-next" href="#slide2" data-slide="next">
         <span class="carousel-control-next-icon"></span>
       </a>
     </div>
   </div>
 </div>
 <hr>
 <div class="row p-5">
   <div class="col-sm-12 col-md-6">
           <div id="slide3" class="carousel slide" data-ride="carousel">

       <!-- Indicators -->
       <ul class="carousel-indicators">
         <li data-target="#slide3" data-slide-to="0" class="active"></li>
         <li data-target="#slide3" data-slide-to="1"></li>
         <li data-target="#slide3" data-slide-to="2"></li>
       </ul>

       <!-- The slideshow -->
       <div class="carousel-inner">
         <div class="carousel-item active">
           <img src="images/slide4.jpg" alt="Los Angeles" width="1100" height="500">
         </div>
         <div class="carousel-item">
           <img src="images/slide5.jpg" alt="Chicago" width="1100" height="500">
         </div>
         <div class="carousel-item">
           <img src="images/slide6.jpg" alt="New York" width="1100" height="500">
         </div>
       </div>

       <!-- Left and right controls -->
       <a class="carousel-control-prev" href="#slide3" data-slide="prev">
         <span class="carousel-control-prev-icon"></span>
       </a>
       <a class="carousel-control-next" href="#slide3" data-slide="next">
         <span class="carousel-control-next-icon"></span>
       </a>
     </div>
   </div>
   <div class="col-sm-12 col-md-6">
     <center> <h1>EPL</h1> </center>
     <br>
     <p>
       EPL is the annual college cricket tournament having teams amongst Rait's various
       departments and committees.
     </p>
   </div>
 </div>
</div>
<!-- Footer -->
<div class="footer">
  <footer><center><em>"Victory is in having done your best, if you have done your best, you've won " - Bill Bowerman</em></center></footer>
</div>
