<?php
session_start();

if($_SESSION['usertype']!="guest"){
header("location:index.php");
}

include 'guest_header.php';
?>

<div class="container p-5 bg-light resp shadow-lg">

  <h1><u>Trials:</u></h1>
  <hr>
  <div class="row trialinfo">

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
    url : "trials_guest_db.php",
    type : "post",
    data :{ trial : trial },
    success:function(data,status){
      $('.trialinfo').html(data);
    }
  });
}
</script>
</body>
</html>
