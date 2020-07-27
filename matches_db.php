<?php

$conn = mysqli_connect("localhost","root","","sports");

extract($_POST);
// echo 'come in db';

//reading matches
if(isset($_POST['sport']))
{
	$sport = $_POST['sport'];
	$data =  '';

	if($sport=='all'){
	$displayquery = " SELECT * FROM matches ";
	$result = mysqli_query($conn,$displayquery);
	}
	else{
		$displayquery = " SELECT * FROM matches where sport='$sport' ";
		$result = mysqli_query($conn,$displayquery);
	}
	if(mysqli_num_rows($result) > 0){

		$number = 1;
		while ($row = mysqli_fetch_array($result)) {

			// $time = date('h:i A', strtotime($row['time']));
			$data .= '<tr>
				<td>'.$number.'.</td>
				<td>'.$row['match_id'].'</td>
				<td>'.$row['sport'].'</td>
				<td class="font-weight-bold">'.$row['team1'].'</td>
				<td class="font-weight-bold">'.$row['team2'].'</td>
				<td>'.$row['place'].'</td>
        <td>'.$row['time'].'</td>
				<td>'.$row['date'].'</td>
				<td><div class="btn-group">
					<button type="button" onclick="GetMatchDetails('.$row['id'].')" class="btn btn-warning btn-sm" title="Edit"><i class="material-icons smal">edit</i></button>
					<button type="button" onclick="DeleteMatch('.$row['match_id'].')" class="btn btn-danger btn-sm" title="Delete"><i class="material-icons smal">delete</i></button>
					</div>
				</td>
    		</tr>';
    		$number++;
			$data.='
			';
		}
	}
    	echo $data;
}

//insert match

if(isset($_POST['match_id']) && isset($_POST['team1']) && isset($_POST['team2']) && isset($_POST['place']) && isset($_POST['time']) && isset($_POST['date']) && isset($_POST['sport']))
{
	$query = "INSERT INTO matches (match_id,sport,team1,team2,place,time,date) VALUES('$match_id','$sport','$team1','$team2','$place','$time','$date')";

	if(mysqli_query($conn,$query)){
    echo "Record was inserted successfully.";
	}
else{
    echo "ERROR: Could not able to execute $query . " . mysqli_error($conn);
		 }
}

//delete match record

elseif(isset($_POST['match_id'])){
	$userid= $_POST['match_id'];
	$deletequery = "DELETE FROM matches WHERE match_id= '$userid' ";
	mysqli_query($conn,$deletequery);
	echo "deleteddddddddddddddddd";
}

if(isset($_POST['idw']) && isset($_POST['winner'])){
	$query = "INSERT INTO results(match_id,winner) VALUES('$idw','$winner')";
	mysqli_query($conn,$query);
}

/// get userid for update
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    $query = "SELECT * FROM matches WHERE id = '$id'";
    if (!$result = mysqli_query($conn,$query)) {
        exit(mysqli_error());
    }

    $response = array();

    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $response = $row;
        }
    }
		else {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}

///update table

if(isset($_POST['hidden_idupd']) && isset($_POST['mid']))
{
		echo "updatinnn....";
		$id = $_POST['hidden_idupd'];
		$match_idupd = $_POST['match_idupd'];
		$team1upd = $_POST['team1upd'];
		$team2upd = $_POST['team2upd'];
		$placeupd = $_POST['placeupd'];
		$dateupd = $_POST['dateupd'];
		$timeupd = $_POST['timeupd'];
		$sportupd = $_POST['sportupd'];

		// $timeupd = date('h:i a', strtotime($timeupd));
    $query = " UPDATE matches SET `match_id`='$match_idupd',`sport`='$sportupd',`team1`='$team1upd',`team2`='$team2upd',`place`='$placeupd',`time`='$timeupd',`date`='$dateupd' WHERE id= '$id' ";
		mysqli_query($conn,$query);
		$quer = " UPDATE results SET `match_id`='$match_idupd' WHERE match_id= '$mid' ";
		mysqli_query($conn,$quer);
}
?>
