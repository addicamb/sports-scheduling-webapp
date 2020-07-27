<?php

$conn = mysqli_connect("localhost","root","","sports");

extract($_POST);
// echo 'come in db';

//read trials
if(isset($_POST['sport'])){
	$sport = $_POST['sport'];
	$data = '';
  $t1 = '';
  $t2 = '';

	if($sport=='all'){
		$displayquery = " SELECT * FROM results INNER JOIN matches ON results.match_id=matches.match_id";
		$result = mysqli_query($conn,$displayquery);
	}
	else {
		$displayquery = " SELECT * FROM results INNER JOIN matches ON results.match_id=matches.match_id where sport='$sport' order by date desc";
		$result = mysqli_query($conn,$displayquery);
	}

	if(mysqli_num_rows($result) > 0){

		while ($row = mysqli_fetch_array($result)) {

      $date=date("j M Y", strtotime($row['date']));
      $day=date("l", strtotime($row['date']));

      if ($row['team2']==$row['winner']) {
        $t1 = $row['team2'];
        $t2 = $row['team1'];
      }
			else {
				$t1 = $row['team1'];
        $t2 = $row['team2'];
			}
			$data .= '<div class="card bg-white col-md-5 shadow border-light m-4 target">
		    			<div class="card-body">
							<h5 class="">'.$row['sport'].'</h6>
              <p>Match '.$row['match_id'].', at '.$row['place'].','.$day.' '.$date.'</p><hr>
              <p class="bg-win col-md-6 text-white font-weight-bold lead" style="border-radius: 3px">'.$t1.'</p>
							<p class="bg-lose col-md-6 text-secondary font-weight-bold" style="border-radius: 3px"">'.$t2.'</p>
							<p></p>
              <span class="d-flex justify-content-center"><button type="button" onclick="DeleteResult('.$row['match_id'].')" class="btn btn-danger btn-sm">Delete</button></span>
							</div></div>
							';
      $t1='';
      $t2='';
		}
	}
	echo $data;
}

//delete result

elseif(isset($_POST['match_id'])){
	$deletequery = "DELETE FROM results WHERE match_id= '$match_id' ";
	mysqli_query($conn,$deletequery);
	echo "deleteddddddddddddddddd";
}
