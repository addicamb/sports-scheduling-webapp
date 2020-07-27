<?php
session_start();

if(!isset($_SESSION['username']) || $_SESSION['usertype']!="admin"){
header("location:index.php");
}

include 'admin_header.php';
?>
<style media="screen">
	.bold{
		font-weight: bold;
	}
</style>
<div class="container opaque p-4 resp shadow mt-5">

	<div class="mt-3 mb-0 alert alert-success success" style='display: none;'><span class="success-text"></span><span style="float:right; cursor: pointer;" class="success-close">&times;</span></div>
  <div class="mt-3 mb-0 alert alert-danger error" style='display: none;'> <span class="error-text"></span><span style="float:right; cursor: pointer;" class="error-close">&times;</span></div>
	<div class="p-2" style="border-left:5px solid pomegranate"><h2>Update Login Details :</h2></div><hr>

	<ul class="nav nav-tabs">
		<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#upduser">Change Username</a></li>
		<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#updpass">Change Password</a></li>
		<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addnew">Add New Admin</a></li>
	</ul>

	<div class="tab-content mt-3">
	<div class="tab-pane container active" id='upduser'>
		<div class="col-md-6">
			<form id="update_username">
				<label for="current_passowrd" class="bold">Current Username :</label>
				<input type="text" class="form-control" name="current_username" id="current_username">
				<label for="new_password" class="bold">New Username :</label>
				<input type="text" class="form-control" name="new_username" id="new_username"><br>
				<input type="hidden" name="update_username" value="update_username">
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
		</div>
	</div>
	<div class="tab-pane container fade" id='updpass'>
    <div class="col-md-6">
			<form id="update_password">
				<label for="current_passowrd" class="bold">Current Password :</label>
				<input type="password" class="form-control" name="current_password" id="current_password">
				<label for="new_password" class="bold">New Password :</label>
				<input type="password" class="form-control" name="new_password" id="new_password">
				<label for="confirm_password" class="bold">Confirm Password :</label>
				<input type="password" class="form-control" name="confirm_password" id="confirm_password"><br>
				<input type="hidden" name="update" value="update">
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
		</div>
	  </div>

		<div class="tab-pane container fade" id='addnew'>
			<div class="col-md-6">
				<form id="update_username1">
					<label for="new_password" class="bold">New Username :</label>
					<input type="text" class="form-control" name="new_username" id="new_username"><br>
				</form>
			</div>
	    <div class="col-md-6">
				<form id="update_password1">
					<label for="new_password" class="bold">New Password :</label>
					<input type="password" class="form-control" name="new_password" id="new_password">
					<label for="confirm_password" class="bold">Confirm Password :</label>
					<input type="password" class="form-control" name="confirm_password" id="confirm_password"><br>
					<input type="hidden" name="update" value="update">
					<button type="submit" class="btn btn-primary">Add</button>
				</form>
			</div>
		</div>
		</div>
	</div>

<?php include 'footer.php'; ?>

<script type="text/javascript">

	$('#update_username').on('submit',function(e){
		e.preventDefault();
		$.ajax({
			url:"pass_update_db.php",
			type: "post",
			data: $('#update_username').serialize(),
			success: function(data, status){
				var response=JSON.parse(data);
				if(response.success){
					$('.success-text').text(response.success);
					$('.success').show();
				}
				else{
					$('.error-text').text(response.error);
					$('.error').show();
				}
				$('#update_username').trigger('reset');
			}
		});
	});

	$('.success-close').click(function(){
		$('.success').hide();
	});
	$('.error-close').click(function(){
		$('.error').hide();
	});

  $('#update_password').on('submit',function(e){
		e.preventDefault();
		$.ajax({
			url:"pass_update_db.php",
			type: "post",
			data: $('#update_password').serialize(),
			success: function(data, status){
				var response=JSON.parse(data);
				if(response.success){
					$('.success-text').text(response.success);
					$('.success').show();
				}
				else{
					$('.error-text').text(response.error);
					$('.error').show();
				}
				$('#update_password').trigger('reset');
			}
		});
	});

	$('.success-close').click(function(){
    $('.success').hide();
  });
  $('.error-close').click(function(){
    $('.error').hide();
  });
</script>


</body>
</html>
