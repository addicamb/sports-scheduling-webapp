<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta name="google-signin-client_id" content="538244115643-4oen2qh08rjjl3197k7g1m80btc9t5jq.apps.googleusercontent.com"> -->
	<link rel="icon" href="images/rs.jpg" sizes="16x16">

	<!-- bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- dataTables css-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Acme|Patua+One|Righteous|Russo+One|Roboto|Saira+Stencil+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Audiowide|Eater|Freckle+Face|Henny+Penny|Jolly+Lodger|Nosifer|Slackey&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<!-- icons library -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- <link rel="stylesheet" href="cdn.materialdesignicons.com/4.0.96/css/materialdesignicons.min.css"> -->
</head>
<style media="screen">
.opaque{
	background: url('images/bgdiv.jpg');
	background-size: cover;
}
</style>
<body id="bg">
<!-- header -->
	<div class="container-fluid" style="background : url('images/bgnav7.jpg');">
		<div class="text-center">
		<a class="navbar-brand" href="guest.php" style="font-family:Roboto,Sans-serif;font-size:25px;letter-spacing:1px;">
			<img src="images/rs5.png" alt="logo" class="" style="width:90px;"><span id="logotext">RS</span>
		</a>
		<a class="ml-3 text-right" href="https://www.facebook.com/raitsports/" target="_blank"><img src="images/facebook.png" alt="facebook" height="20px" width="20px"></a>
		<a class="ml-2 mr-2 text-right" href="https://www.instagram.com/raitsports/" target="_blank"><img src="images/instagram.png" alt="instagram" height="20px" width="20px"></a>
		</div>
	</div>

	<!-- Top Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark font-weight-bold" style="z-index:2; background: url('images/bgheader2.jpg'); font-family: 'Nunito'">
	<div class="container resp">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
	    	<ul class="navbar-nav">
						<li class="nav-item"><a class="nav-link " href="guest.php"><i class="far fa-newspaper mr-2 text-primary" aria-hidden="true"></i>Events</a>
							<!-- <div class="dropdown-menu" style="background-color:rgba(10,10,10)">
								<a class="dropdown-item" style="color:grey;" href="#">Stamina</a>
								<a class="dropdown-item" style="color:grey;" href="#">Olympia</a>
								<a class="dropdown-item" style="color:grey;" href="#">EPL</a>
							</div> -->
						</li>
						<li class="nav-item"><a class="nav-link" href="trials_guest.php"><i class="fas fa-bullhorn mr-2 text-light" aria-hidden="true"></i>Trials</a></li>
						<li class="nav-item"><a class="nav-link" href="matches_guest.php"><i class="fas fa-calendar mr-2 text-warning" aria-hidden="true"></i>Matches</a></li>

						<li class="nav-item"><a class="nav-link" href="results_guest.php"><i class="fas fa-poll-h mr-2 text-success" aria-hidden="true"></i>Results</a></li>
						<!--<li><a href="#"><i class="far fa-bell mr-2" aria-hidden="true"></i></a></li> -->
				</ul>
				<ul class="navbar-nav ml-auto">
						<!-- <li class="nav-item"><a class="nav-link" href="#"><i class="fas fa-info-circle mr-2 " aria-hidden="true"></i>About</a></li> -->
						<li class="nav-item dropdown"><a class="nav-link" href="index.php" data-toggle="tooltip" title="For Admin only"><i class="fas fa-sign-in-alt mr-2 text-danger" aria-hidden="true"></i>Login</a></li>
						<!-- <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out mr-2 text-danger" aria-hidden="true"></i>Logout</a></li> -->
							<!-- <img src="https://img.icons8.com/color/25/000000/google-logo.png"> -->
	    	</ul>
			</div>
	</div>
</nav>

		<!-- <div class="middle">
	    <h1>COMING SOON</h1>
	    <hr >
	    <p id='demo'></p>
	  </div> -->

		<!-- jquery -->
			<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	 		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script src="https://apis.google.com/js/platform.js" async defer></script>
		<!--bootstrap js-->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<!-- Datatable -->
			<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

			<script>
			$(document).ready(function(){
				var x = window.matchMedia("(max-width: 1000px)")
				changeClass(x) // Call listener function at run time
				x.addListener(changeClass) // Attach listener function on state changes

				function changeClass(x) {
	  				if (x.matches) {
	    			$(".resp").removeClass('container').addClass('container-fluid');
						$(".home").removeClass('p-5');
	  			}else{
						$('.resp').removeClass('container-fluid').addClass('container');
					}
				}
			});
			</script>

		<!-- <script type="text/javascript">
		//close navbar on clicking anywhere on the page in mobile/tab
		$(function() {
  		$(document).click(function (event) {
    	$('.navbar-collapse').collapse('hide');
  		});
		});
		// Set the date we're counting down to
		var countDownDate = new Date("Oct 1, 2019 00:00:00").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "R U Readyyyyyy";
  }
}, 1);

		</script> -->
