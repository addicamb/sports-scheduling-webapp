<?php
session_start();

if(!isset($_SESSION['username']) || $_SESSION['usertype']!="admin"){
header("location:index.php");
}

include 'admin_header.php';
?>

<div class="container p-5 bg-light resp ">
  <h2>Trials :</h2>
  <div class="col-sm-12 d-flex justify-content-center" >
    <button type="button" class="btn btn-success my-2" data-toggle="modal" data-target="#myModal"> Add New Trials </button>
  </div>
  <div class="row trialinfo">

  </div>
</div>

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">New Trial</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

        <div class="form-group">
        	<label for="firstname">Trial ID : </label>
        	<input type="text" name="trial_id" id="trial_id" class="form-control pho" placeholder="eg: 1221">
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
          <label> Date & Time : </label>
          <input type="datetime-local" name="datentime" class="form-control" id="datentime" >
        </div>
        <label>Registration Fees : </label>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">₹</span>
          </div>
          <input type="number" class="form-control pho" placeholder="in Rs." id="fees" name="fees">
        </div>
        <div class="form-group">
        	<label>Link : </label>
        	<input type="url" name="link" id="link" class="form-control pho" placeholder="google forms link">
        </div>
        <div class="form-group">
        	<label>Description (optional) :</label>
        	<textarea id="description" class="form-control pho" placeholder="rules..."></textarea>
        </div>
      </div>



      <div class="form-group custom-input-space has-feedback">
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id='addtrial' onclick="addTrial()">Add Trial</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

$(document).ready(function(){
  readTrials();
});

function readTrials(){
  var trial = "trial";

  $.ajax({
    url : "trials_db.php",
    type : "post",
    data :{ trial : trial },
    success:function(data,success){
      $('.trialinfo').html(data);  }
  });
}

function addTrial(){
  var trial_id = $('#trial_id').val();
  var sport = $('#sport').val();
  var fees = $('#fees').val();
  var link = $('#link').val();
  var datentime = $('#datentime').val();
  var description = $('#description').val();
  console.log(description);
  $.ajax({
    url:"trials_db.php",
    type:'post',
    data: { trial_id :trial_id,
      sport : sport,
      fees : fees ,
      link : link ,
      datentime : datentime ,
      description : description,
       },
     success:function(data,status){ readTrials(); }
   });
}

function DeleteTrial(trial_id){
  var conf = confirm("Do you want to delete ?");
  if(conf == true){
    $.ajax({
      url:"trials_db.php",
      type:"post",
      data:{ trial_id:trial_id },
      success:function(data,status){ readTrials(); }
    });
  }
}

</script>
