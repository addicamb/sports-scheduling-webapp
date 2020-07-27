<?php
session_start();

if(!isset($_SESSION['username']) || $_SESSION['usertype']!="admin"){
header("location:index.php");
}
$conn = mysqli_connect("localhost","root","","sports");
$msg='';
//new team
if(isset($_POST['submit']))
{
  if(isset($_POST['sport']))
  {$sport = $_POST['sport'];}

  if(isset($_POST['team']))
  {$team = $_POST['team'];}

  $query = "INSERT INTO teams (sport,name) values ('$sport','$team')";
  if(mysqli_query($conn,$query))
	$msg='Added successfully';
	else
	$msg='Error';
}

include 'admin_header.php';
?>
<style media="screen">
	.bold{
		font-weight: bold;
	}
</style>
<div class="container opaque p-4 resp shadow mt-5">
	<form action="team_add.php" method="post">
		<div class="form-group col-sm-12 col-md-4 ">
			<select class="form-control mt-1 shadow" name="sport">
				<option value="Cricket">Cricket</option>
				<option value="Football">Football</option>
				<option value="Badminton">Badminton</option>
				<option value="Basketball">Basketball</option>
				<option value="Kho-Kho">Kho-Kho</option>
			</select>
		</div>
		<div class="form-group col-sm-12 col-md-4 ">
			<input class="form-control" type="text" name="team" value="">
		</div>
		<button type="submit" class="btn btn-primary ml-3" name="submit">Add</button>
	</form>
	<h5 class="alert text-success"><?= $msg; ?></h5>
</div>

<?php include 'footer.php'; ?>

<script type="text/javascript">

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
