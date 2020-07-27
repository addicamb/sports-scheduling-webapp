<?php
session_start();

$conn = mysqli_connect("localhost","root","","expenses");
$msg='';
//new team
include 'admin_header.php';

if(isset($_POST['expenses']))
{
  $dat='';
  $query = "SELECT * from expenditure";
  $result = mysqli_query($conn,$query);
  if(mysqli_num_rows($result) > 0){

    $number = 1;
    while ($row = mysqli_fetch_array($result)) {

      // $time = date('h:i A', strtotime($row['time']));
      $dat .= '<tr>
        <td>'.$number.'.</td>
        <td>'.$row['date'].'</td>
        <td>'.$row['activity'].'</td>
        <td>'.$row['cost'].'</td>
        </tr>';
        $number++;
      $dat.='
      ';
    }
  }
      echo $dat;
}

if(isset($_POST['submit']))
{
  if(isset($_POST['date']))
  {$date = $_POST['date'];}

  if(isset($_POST['item']))
  {$item = $_POST['item'];}

  if(isset($_POST['cost']))
  {$cost = $_POST['cost'];}

  $query = "INSERT INTO expenditure (date,activity,cost) values ('$date','$item','$cost')";
  if(mysqli_query($conn,$query))
	$msg='Added successfully';
	else
	$msg='Error';
}
?>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<style media="screen">
	.bold{
		font-weight: bold;
	}
</style>
<div class="container opaque p-4 resp shadow mt-5">
	<form action="expenses.php" method="post">
    <div class="form-group col-md-6">
      <label for="firstname"> Date : </label>
      <input type="text" name="date" id="date" class="datepicker" placeholder="yyyy-mm-dd">
    </div>
		<div class="form-group col-sm-12 col-md-4 ">
			<input class="form-control" type="text" name="item" value="">
		</div>
    <div class="form-group col-sm-12 col-md-4 ">
			<input class="form-control" type="number" name="cost" value="">
		</div>
		<button type="submit" class="btn btn-primary ml-3" name="submit">Add</button>
	</form>
	<h5 class="alert text-success"><?= $msg; ?></h5>
  <table class="table table-hover table-striped table-bordered" id="expenseData">
        <thead>
						<tr class=" thead-dark text-white text-center">
						<th>No.</th>
            <th>Date</th>
						<th>Activity</th>
						<th>Cost</th>
						</tr>
        </thead>
        <tbody class="text-center">

        </tbody>
  </table>
</div>

<?php include 'footer.php'; ?>

<script type="text/javascript">
  $(document).ready(function(){
    readMatches();
    $('.datepicker').datepicker({
    format: "yyyy-mm-dd"
    });
    });

  function readMatches(){
    var expenses = $('#date').val();
    console.log('sport');
    $.ajax({
      url  : "expenses.php",
      type : "post",
      data : {expenses:expenses},
      success:function(data,status){
        console.log(data);
        $('tbody').html(data);
        $('#expenseData').DataTable(
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
                    sLengthMenu: "Display _MENU_ items",
                    sInfoFiltered: "",
                    sInfoEmpty: ""
                  }
        });
      }
    });
  }
	// $('#update_username').on('submit',function(e){
	// 	e.preventDefault();
	// 	$.ajax({
	// 		url:"pass_update_db.php",
	// 		type: "post",
	// 		data: $('#update_username').serialize(),
	// 		success: function(data, status){
	// 			var response=JSON.parse(data);
	// 			if(response.success){
	// 				$('.success-text').text(response.success);
	// 				$('.success').show();
	// 			}
	// 			else{
	// 				$('.error-text').text(response.error);
	// 				$('.error').show();
	// 			}
	// 			$('#update_username').trigger('reset');
	// 		}
	// 	});
	// });
	//
	// $('.success-close').click(function(){
	// 	$('.success').hide();
	// });
	// $('.error-close').click(function(){
	// 	$('.error').hide();
	// });
</script>


</body>
</html>
