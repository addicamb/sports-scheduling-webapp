<?php
session_start();

if($_SESSION['usertype']!="guest"){
header("location:index.php");
}
include 'guest_header.php';
require 'conndb.php';
?>

<html>
<link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.1.0/css/rowGroup.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
<head>
<title>Match Schedule</title>
<style media="screen">
.opaque{
	background: rgba(255, 255, 255);
}
.blue{
	background-color: #17a2b8;
	color:white;
}
.dtrg-group{
	text-align: left;
	font-style: italic;
	color: white;
}
</style>
</head>
<body>
<div class="container opaque p-3 resp">
  <h3 class="text-center font-weight-bold"><u>Matches :</u></h3>
	<hr>
	<button id="starred_matches" class="btn btn-warning btn-sm d-flex ml-auto font-weight-bold" type="button" name="starred" onclick="saved_matches()">Starred Matches</button>
  <div class="">
  <table class="table table-hover showmatch" id="mydata" style="">
        <thead class="d-none">
						<tr class=" thead-dark text-white text-center ">
						<!-- <th style="width:2%">No.</th> -->
            <th>Time</th>
						<th>Sport</th>
						<th>Team 1</th>
						<th style="width:2%"></th>
						<th>Team 2</th>
            <th>Place</th>
						<th>Date</th>
						<th>Star</th>
            <!-- <th>Delete</th> -->
						</tr>
        </thead>
        <tbody class="text-center">

        </tbody>
  </table>
</div>
</div>
<!-- Footer -->
<div class="footer">
	<footer><center><em>"Victory is in having done your best, if you have done your best, you've won " - Bill Bowerman</em></center></footer>
</div>

<script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@beta/dist/js.cookie.min.js"></script>
<script>

$(document).ready(function(){
  showmatch();
	// $("#starred_matches").click(function(){
	// 	$(this).toggleClass("blue btn-outline-info");
	// 	$(this).text($(this).text() == 'Starred Matches' ? 'All Matches' : 'Starred Matches');
	// 	// $("#getnotice").toggle();
	// });
});

function saved_matches{
  
}

function showmatch(){
  var showmatch = "showmatch";
  $.ajax({
    url : "matches_guest_db.php",
    type : "post",
    data :{ showmatch:showmatch },
    success:function(data,status){
      $('tbody').html(data);
      $('#mydata').DataTable({
                  "lengthChange":true,
                  "lengthMenu":[5,10,25,50],
                  "iDisplayLength": 5,
									scrollX : true,
									"sScrollXInner": "100%",
                  // "scrollCollapse": true,
                  responsive: true,
									ordering: false,
									"order": [[5]],
									dom: 'lBfrtp',
        					buttons: [
														{extend:'print',
														text:'Print Match Schedule',
														title:'Match Schedule',
														key: {
												           key: 'p',
												           altkey: true
												         },
														class:'prt',
														// customize: function ( win ) {
														// $(win.document.body).find('th').addClass('d-none'); }
													}
														],
									rowGroup: {
        											dataSrc: 6,
															startClassName: 'table-start-group',
															startRender:
																function ( rows, group ) {
																		return $('<tr><td style="background-color: #212529; padding-left: 20px" colspan="7">' + group + '</td></tr>')
											        }
														},
									"columnDefs": [
			            									{ "visible": false, "targets": 6 }
			        									],
									oLanguage: {
															sLengthMenu: "Display _MENU_ Matches",
		 													sInfo: "",
		 												}
                  });
				// $('.dt-button').css({"background-image":"", "background-color":"green"});
    }
  });
}

</script>
