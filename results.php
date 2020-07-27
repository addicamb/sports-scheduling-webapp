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
.form-control:hover{
	box-shadow: 5px 5px 20px  rgb(0,0,0, 0.2);
}
.btn-danger:hover{
	box-shadow: 1px 1px 10px 1px #dc3545;
}
.bg-win{
	background: linear-gradient(to right, #28a745 50%,rgba(255, 255, 255, 0.2));
			/* box-shadow: 1px 1px 10px 1px #28a745; */
}
.bg-lose{
	background: linear-gradient(to right,#ecf0f1 50%,rgba(255, 255, 255, 0.2));
}
.mb-10{
	margin-bottom: 5rem;
}
</style>

<div class="container bg-white p-5 resp shadow mt-5 mb-10">
	<div class="row">
	<h2 class="col-md-6" style="border-left:5px solid green"><u>Results :</u></h2>
	<input class='col-6 col-md-2 form-control mb-2' type="text" id="search" placeholder="Search..." onkeyup="search_page()">
	<div class="form-group col-md-4 ml-auto">
		<select class="form-control" onchange="readResults(this.value)">
			<option value="all" selected>All</option>
			<option value="Cricket">Cricket</option>
			<option value="Football">Football</option>
			<option value="Badminton">Badminton</option>
			<option value="Basketball">Basketball</option>
			<option value="Kho-Kho">Kho-Kho</option>
		</select>
	</div>
</div>
	<hr>
  <div class="row resultinfo">

  </div>
</div>

<!-- Footer -->
<div class="footer">
  <footer><center><em>"Victory is in having done your best, if you have done your best, you've won " - Bill Bowerman</em></center></footer>
</div>

<script type="text/javascript">

$(document).ready(function(){
  readResults('all');
});

function readResults(sport){
  var sport = sport;
	console.log(sport);
  $.ajax({
    url : "results_db.php",
    type : "post",
    data :{ sport : sport },
    success:function(data,success){
      $('.resultinfo').html(data);  }
  });
}

function search_page() {
  var input = document.getElementById("search");
  var filter = input.value.toLowerCase();
  var nodes = document.getElementsByClassName('target');

  for (i = 0; i < nodes.length; i++) {
    if (nodes[i].innerText.toLowerCase().includes(filter)) {
      nodes[i].style.display = "block";
    } else {
      nodes[i].style.display = "none";
    }
  }
}

// function addTrial(){
//   var trial_id = $('#match_id').val();
//   var sport = $('#sport').val();
//   var fees = $('#fees').val();
//   var link = $('#link').val();
//   var datentime = $('#datentime').val();
//   var description = $('#description').val();
//   console.log(description);
//   $.ajax({
//     url:"results_db.php",
//     type:'post',
//     data: { match_id :match_id,
//       sport : sport,
//       fees : fees ,
//       link : link ,
//       datentime : datentime ,
//       description : description,
//        },
//      success:function(data,status){ readResults(); }
//    });
// }

function DeleteResult(match_id){
  var conf = confirm("Do you want to delete ?");
  if(conf == true){
    $.ajax({
      url:"results_db.php",
      type:"post",
      data:{ match_id:match_id },
      success:function(data,status){ readResults('all'); }
    });
  }
}

</script>

















</body>
