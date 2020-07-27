<?php

$conn = mysqli_connect("localhost","root","","sports");

extract($_POST);

//read trials
if(isset($_POST['trial'])){
	$data = '';

	$displayquery = " SELECT * FROM trials";
	$result = mysqli_query($conn,$displayquery);

	if(mysqli_num_rows($result) > 0){

		while ($row = mysqli_fetch_array($result)) {

			$data .= '<div class="card bg-light col-md-6 shadow-lg border-light">
		    			<div class="card-body">
							<h2 class="">'.$row['sport'].'</h2>
              <p>'.$row['datentime'].'</p>
							<p>'.$row['place'].'</p>
              <p>₹'.$row['fees'].'</p>
							<p>'.$row['description'].'</p>
              <p><a href='.$row['link'].' target="_blank">'.$row['link'].'</a></p>
              <button type="button" onclick="DeleteTrial('.$row['trial_id'].')" class="btn btn-danger btn-sm">Delete</button>
							</div></div>';
		}
	}
	echo $data;
}

//insert trial

if(isset($_POST['trial_id']) && isset($_POST['sport']) && isset($_POST['link']) && isset($_POST['datentime']) && isset($_POST['fees']))
{
	echo "stringgggggg";
	$description = $_POST['description'];
	$query = "INSERT INTO trials (trial_id,sport,datentime,fees,link,description) VALUES('$trial_id','$sport','$datentime','$fees','$link','$description')";

	if(mysqli_query($conn,$query)){
    echo "Record was inserted successfully.";
	}
else{
    echo "ERROR: Could not able to execute $query . " . mysqli_error($conn);
		 }
}

//delete trial

elseif(isset($_POST['trial_id'])){
	$deletequery = "DELETE FROM trials WHERE trial_id= '$trial_id' ";
	mysqli_query($conn,$deletequery);
	echo "deleteddddddddddddddddd";
}

//update trials
