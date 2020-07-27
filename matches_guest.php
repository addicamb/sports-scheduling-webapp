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
/* .dataTables_wrapper .dt-buttons {
  text-align:center;
} */
/* .prt{
	background: green;
	color: white;
} */
</style>
</head>
<body>
<div class="container opaque p-3 resp">
  <h2 class="text-center font-weight-bold"><u>Matches </u></h2>
	<hr>
	<button type="button" class="btn btn-sm btn-danger" onclick="clear_cookies()">Clear Cookies</button>
	<button class="btn btn-warning btn-sm d-flex ml-auto font-weight-bold star_match" type="button" name="starred" onclick="saved_matches(starry)" data-toggle="modal" data-target="#myModal">Starred Matches</button>
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
        <tbody class="text-center" id='all_matches'>

        </tbody>
  </table>
	</div>
</div>

<!-- saved match Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

	      <!-- Modal Header -->
	      <div class="modal-header">
	        <h4 class="modal-title">Saved Match</h4>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <!-- Modal body -->
	      <div class="modal-body">
					<div class="d-block">
				  <table class="table table-hover savedmatch" id="saveddata">
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
										</tr>
				        </thead>
				        <tbody class="text-center" id='saved'>

				        </tbody>
				  </table>
					</div>
	      </div>

	      <!-- Modal footer -->
	      <div class="modal-footer">
	        <!-- <button type="button" class="btn btn-primary" data-dismiss="modal" id='addMatch' onclick="addMatch()">Add Match</button> -->
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      </div>
	    </div>
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
  showmatch(starry);
	// $(".star_match").click(function(){
	// 	$(this).toggleClass("blue btn-outline-info");
	// 	$(this).text($(this).text() == 'Starred Matches' ? 'All Matches' : 'Starred Matches');
	// });
});

var starry=[];
if(Cookies.get('saved')==undefined)
{
	Cookies.set('saved','',{ expires: 183 });
}
starry=Cookies.get('saved').split(',');
// console.log(starry);
// starry.push(1005);
// Cookies.set('saved',starry,{ expires: 183 });
// starry.push("1005");
// console.log(starry);

function clear_cookies(){
	Cookies.remove('saved');
	console.log(Cookies.get('saved'));
}

function showmatch(starry){
  var showmatch = starry;
	// showmatch.shift();
	console.log(showmatch);
  $.ajax({
    url : "matches_guest_db.php",
    type : "post",
    data :{ showmatch:showmatch },
    success:function(data,status){
      $('#all_matches').html(data);
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

function starred(mid,icon,starry)
{
	console.log(starry);
	// alert(Cookies.get('saved'));
  if ($(icon).hasClass('star'))
	{
		$(icon).removeClass("far star").addClass("fas starred");
		if(!starry.includes(JSON.stringify(mid))) {
		starry.push(mid);
		console.log(starry);
		Cookies.set('saved',starry,{ expires: 183 });
		// alert(Cookies.get('saved'));
  	}
	}
  else if($(icon).hasClass('starred'))
	{
		$(icon).removeClass("fas starred").addClass("far star");
		starry.splice( starry.indexOf(JSON.stringify(mid)), 1 );
		console.log(starry);
    Cookies.set('saved',starry,{expires:183});
  }
}

function saved_matches()
{
	starry=(Cookies.get('saved')).split(',');
	starry.sort(function(a, b){return a - b});
	// starry.shift();
	// starry.reverse();
	console.log(starry);
	$.ajax({
		url : "matches_guest_db.php",
		type : "post",
		data : { starry:starry },
		success : function(data,status){
			console.log(data);
			$('#saved').html(data);
			$('#saveddata').DataTable({
											"lengthChange":true,
											"lengthMenu":[10,25,50],
											"iDisplayLength": 10,
											scrollX : true,
											"sScrollXInner": "100%",
											// "scrollCollapse": true,
											responsive: true,
											ordering: false,
											"order": [[5]],
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
																	sLengthMenu: "",
																	sInfo: "",
																},
											retrieve:true
			});
		}
	});
}

</script>
