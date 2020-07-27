<?php
session_start();

if($_SESSION['usertype']!="guest"){
header("location:index.php");
}

include 'guest_header.php';
?>

<div class="container p-5 bg-light resp">

  <h1 class="text-center"><u>Results:</u></h1>
  <hr>
  <div class="row">
  <div class="col-sm-12 col-md-4 form-group">
		<select class="form-control mt-1" onchange="readResults(this.value)">
			<option value="all" selected>All</option>
			<option value="Cricket">Cricket</option>
			<option value="Football">Football</option>
			<option value="Badminton">Badminton</option>
			<option value="Basketball">Basketball</option>
			<option value="Kho-Kho">Kho-Kho</option>
		</select>
  </div>
  <div class="col-md-3 ml-auto mb-2">
    <input class='form-control' type="text" id="search" placeholder="Search..." onkeyup="search_page()">
  </div>
	</div>

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

function readResults(sport){
  var sport = sport;
	console.log(sport);
  $.ajax({
    url : "results_guest_db.php",
    type : "post",
    data :{ sport : sport },
    success:function(data,success){
      $('.resultinfo').html(data);  }
  });
}
</script>
</body>
</html>
