<?php

$conn = mysqli_connect("localhost","root","","sports");

extract($_POST);

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
			$data .= '<div class="card bg-white col-md-6 shadow-lg border-light target">
		    			<div class="card-body">
							<h4 class="">'.$row['sport'].'</h6>
              <p>Match '.$row['match_id'].', at '.$row['place'].', <kbd>'.$day.' '.$date.'</kbd></p><hr>
              <p class="bg-success col-md-6 text-white lead font-weight-bold" style="border-radius: 3px">'.$t1.'</p>
              <p class="bg-light col-md-6 text-secondary font-weight-bold" style="border-radius: 3px""><del>'.$t2.'</del></p>
              <p></p>
							</div></div>';
      $t1='';
      $t2='';
		}
	}
	echo $data;
}
