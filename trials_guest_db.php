<?php

$conn = mysqli_connect("localhost","root","","sports");

extract($_POST);

//read trials
if(isset($_POST['trial'])){
	$data =  '';

	$displayquery = " SELECT * FROM trials ";
	$result = mysqli_query($conn,$displayquery);

	if(mysqli_num_rows($result) > 0){

		while ($row = mysqli_fetch_array($result)) {

			$time = date('h:i A', strtotime($row['datentime']));
			$date=date("j M Y", strtotime($row['datentime']));
			$day=date("l", strtotime($row['datentime']));

			$data .= '<div class="card bg-light col-md-6 shadow-lg border-light">
		    			<div class="card-body target">
							<h2 class="">'.$row['sport'].'</h2>
							<div class="row">
							<div class="col-md-6">
              <p>'.$date.', '.$day.' '.$time.'</p>
							<p>'.$row['place'].'</p>
              <p>₹'.$row['fees'].'</p>
							<p>'.$row['description'].'</p>
							</div>
							<div class="col-md-4">
							<img class="mb-5" src="images/qrupi.jpeg" alt="" width="150">
							</div></div>
              <a href='.$row['link'].' target="_blank" class="d-flex text-decoration-none justify-content-center"><button class="btn btn-sm btn-danger"
							style="box-shadow: 2px 2px 10px 1px #dc3545;">Register Now</button></a>
							</div></div>';
		}
	}
    	echo $data;
}
