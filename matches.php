<?php
session_start();

if(!isset($_SESSION['username']) || $_SESSION['usertype']!="admin"){
header("location:index.php");
}

include 'admin_header.php';
?>

<!-- Datepicker -->
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<style>
.pho::placeholder,.datepicker::placeholder{
	opacity: 0.6;
}
.btn-win:hover{
	box-shadow: 1px 1px 10px 1px #28a745;
}
.smal{
	font-size:1rem;
}
.btn{
	border-radius: 5px;
}
</style>

<div class="container opaque p-5 resp shadow-lg">
  <h2 class="text-center font-weight-bold" style="font-family: 'Saira Stencil One';margin-top: -10px;"><u>Matches :</u></h3>
	<div class="row">

	<div class="col-sm-12 col-md-4 form-group d-flex justify-content-left">
		<select class="form-control mt-1 shadow" onchange="readMatches(this.value)">
			<option value="all" selected>All</option>
			<option value="Cricket">Cricket</option>
			<option value="Football">Football</option>
			<option value="Badminton">Badminton</option>
			<option value="Basketball">Basketball</option>
			<option value="Kho-Kho">Kho-Kho</option>
		</select>
	</div>
  <div class="col-sm-12 col-md-4 d-flex justify-content-center">
		<button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#myModal"><i class="material-icons smal">add</i> Add New Matches </button>
	</div>
  </div>
  <br>

  <table class="table table-hover table-striped table-bordered" id="matchData">
        <thead>
						<tr class=" thead-dark text-white text-center">
						<th>No.</th>
            <th>Match ID</th>
						<th>Sport</th>
						<th>Team 1</th>
						<th>Team 2</th>
            <th>Place</th>
            <th>Time</th>
						<th>Date</th>
            <th>Edit/Delete</th>
						</tr>
        </thead>
        <tbody class="text-center">

        </tbody>
  </table>
</div>

<!-- insert new match Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">New Match</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div class="form-group">
        	<label for="firstname">Match ID : </label>
        	<input type="text" name="match_id" id="match_id" class="form-control pho" placeholder="eg: 1221">
        </div>
				<div class="form-group">
					<label for="firstname">Sport : </label>
					<select class="form-control" id="sport">
						<option value="Cricket">Cricket</option>
						<option value="Football">Football</option>
						<option value="Badminton">Badminton</option>
						<option value="Basketball">Basketball</option>
						<option value="Kho-Kho">Kho-Kho</option>
					</select>
				</div>
        <div class="form-group">
        	<label for="firstname">Team 1 : </label>
        	<input type="text" name="team1" id="team1" class="form-control pho" placeholder="">
        </div>
        <div class="form-group">
        	<label for="firstname">Team 2 : </label>
        	<input type="text" name="team2" id="team2" class="form-control pho" placeholder="">
        </div>
        <div class="form-group">
        	<label for="firstname">Place : </label>
        	<input type="text" name="place" id="place" class="form-control pho" placeholder="eg: University Ground">
        </div>
				<div class="form-group">
        	<label for="firstname"> Time : </label>
        	<input type="time" name="time" id="time" class="form-control pho" placeholder="">
        </div>
        <div class="form-group col-md-6">
        	<label for="firstname"> Date : </label>
        	<input type="text" name="date" id="date" class="datepicker" placeholder="yyyy-mm-dd">
        </div>
      </div>

      <div class="form-group custom-input-space has-feedback">
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id='addMatch' onclick="addMatch()">Add Match</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
</div>

<!-- update Modal -->
<div class="modal" id="update_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Match</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div class="form-group">
        	<label for="match_idupd">Match ID : </label>
        	<input type="text" name="" id="match_idupd" class="form-control" placeholder="eg: 1221" contenteditable="true">
        </div>
				<div class="form-group">
					<label for="firstname">Sport : </label>
					<select class="form-control" id="sportupd">
						<option value="Cricket">Cricket</option>
						<option value="Football">Football</option>
						<option value="Badminton">Badminton</option>
						<option value="Basketball">Basketball</option>
						<option value="Kho-Kho">Kho-Kho</option>
					</select>
				</div>
				<label for="team1upd">Update Team 1 : </label>
        <div class="input-group mb-2">
        	<input type="text" name="" id="team1upd" class="form-control" placeholder="" contenteditable="true">
					<div class="input-group-append">
					<button type="button" class="btn btn-success btn-win" data-dismiss="modal" onclick="winner(team1upd.value,match_idupd.value)">Winner</button>
				</div>
				</div>
				<label for="team2upd">Update Team 2 : </label>
        <div class="input-group mb-2">
        	<input type="text" name="" id="team2upd" class="form-control" placeholder="" contenteditable="true">
					<div class="input-group-append">
					<button type="button" class="btn btn-outline-success btn-win font-weight-bold" data-dismiss="modal" onclick="winner(team2upd.value,match_idupd.value)">Winner</button>
        </div>
				</div>
        <div class="form-group">
        	<label for="placeupd">Update Place : </label>
        	<input type="text" name="" id="placeupd" class="form-control" placeholder="eg: University Ground" contenteditable="true">
        </div>
				<div class="form-group">
        	<label for="timeupd">Update Time : </label>
        	<input type="time" name="" id="timeupd" class="form-control" placeholder="" contenteditable="true">
        </div>
        <div class="form-group col-md-6">
        	<label for="dateupd">Update Date : </label>
        	<input type="text" name="" id="dateupd" class="datepick" placeholder="yyyy-mm-dd">
        </div>
      </div>

      <div class="form-group custom-input-space has-feedback">
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="updateMatch()">Update Match</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<input type="hidden" id='hidden_id' name="" value="">
				<input type="hidden" id='hidden_mid' name="" value="">
      </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer -->
<div class="footer">
	<footer><center><em>"Victory is in having done your best, if you have done your best, you've won " - Bill Bowerman</em></center></footer>
</div>

<script type="text/javascript">
	var sport = 'all';
  $(document).ready(function(){
		readMatches(sport);
		$('.datepicker').datepicker({
    format: "yyyy-mm-dd"
	});
		$('.datepick').datepicker({
			format: "yyyy-mm-dd"
	});
});



 		function readMatches(sport){
			var sport = sport;
			console.log(sport);
			$.ajax({
				url  : "matches_db.php",
				type : "post",
				data : { sport:sport },
				success:function(data,status){
					$('tbody').html(data);
					$('#matchData').DataTable(
						{retrieve:true,
						 "lengthChange":true,
						 "lengthMenu":[5,10,25,50],
						 "pageLength": 5,
						 scrollX : true,
						 "sScrollXInner": "100%",
						 "scrollCollapse": true,
						 pagingType : "first_last_numbers",
						 responsive : true,
						 oLanguage: {
											sLengthMenu: "Display _MENU_ Matches",
											sInfoFiltered: "",
											sInfoEmpty: ""
										}
					});
				}
			});
		}

  	function addMatch(){
			var sport = $('#sport').val();
			console.log(sport);
  		var team1 = $('#team1').val();
  		var team2 = $('#team2').val();
      var place = $('#place').val();
      var match_id = $('#match_id').val();
      var date = $('#date').val();
			var time = $('#time').val();
			// var conf= confirm('u sURE u WANA add match?')
			// if (conf==true) {

  		$.ajax({
  			url: "matches_db.php",
  			type: "post",
  			data:{team1 : team1,
                team2 : team2,
                place : place,
				match_id: match_id,
				sport: sport,
				date: date,
				time: time
				} ,
				success: function(data,status){ console.log("supp"); readMatches(sport);}
			 });
  	}

		function GetMatchDetails(id){
			$('#hidden_id').val(id);
			$.post("matches_db.php",{
				id:id },
				function(data,status){
					var user = JSON.parse(data);
					$('#match_idupd').val(user.match_id);
					$('#hidden_id').val(user.id);
					$('#hidden_mid').val(user.match_id);
					$('#sportupd').val(user.sport);
					$('#team1upd').val(user.team1);
					$('#team2upd').val(user.team2);
					$('#placeupd').val(user.place);
					$('#dateupd').val(user.date);
					$('#timeupd').val(user.time);
			});
			$('#update_modal').modal("show");
		}

		function updateMatch(){
			var mid = $('#hidden_mid').val();
			var match_idupd = $('#match_idupd').val();
			var sportupd = $('#sportupd').val();
			var team1upd = $('#team1upd').val();
  		var team2upd = $('#team2upd').val();
      var placeupd = $('#placeupd').val();
			console.log(sportupd);
      var dateupd = $('#dateupd').val();
			var timeupd = $('#timeupd').val();
			var hidden_idupd = $('#hidden_id').val();
			// var conf= confirm('u sURE u want to update match?')
		// if (conf==true) {
			$.ajax({
  			url: "matches_db.php",
  			type: "post",
  			data:{hidden_idupd:hidden_idupd,
				mid:mid,
				team1upd : team1upd,
        team2upd : team2upd,
        placeupd : placeupd,
				match_idupd: match_idupd,
				sportupd: sportupd,
				dateupd: dateupd,
				timeupd: timeupd
				} ,
				success: function(data,status){
									 $('update_modal').modal("hide");
									 readMatches(sportupd);}
			 });
		}

		function winner(winner,id){
			console.log(winner,id);
			// var conf = confirm(winner + ' won match ' + id +'?');
			// if(conf==true){
			$.ajax({
				url:"matches_db.php",
				type:"post",
				data:{ idw:id,winner:winner },
				success:function(data,status){ readMatches('all'); }
			});
		}

		function DeleteMatch(match_id){
			// var conf = confirm("Do you want to delete ?");
			// if(conf == true){
				$.ajax({
					url:"matches_db.php",
					type:"post",
					data:{ match_id:match_id },
					success:function(data,status){ readMatches('all'); }
				});
			// }
		}

  </script>

</body>
</html>
