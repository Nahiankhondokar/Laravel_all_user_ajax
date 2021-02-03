 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body>
	
	

	<div class="wrap-table">
		<a id="add_student_modal_btn" class="btn btn-primary" href="">Add New Student</a>
		<a class="btn btn-warning" href="">Home Page</a>
		
		<div class="card shadow">
			<div class="card-body">
				<h2>All Student</h2>
				<div class="img"></div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Uname</th>
							<th>Gender</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="allStudent">
						
					
						
					</tbody>
				</table>
			</div>
		</div>
	</div>


	
		{{-- Add Student Model --}}

	<div  id="add_student_modal" class="modal fade">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header"  style="display: block;">
					<h4>Add New Student <button class="close" data-dismiss="modal">&times;</button></h4>
					<div class="msg"></div>
				</div>

				<div class="modal-body">
					<form id="add_student_form" action="" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="">Name</label>
							<input class="form-control" name="name" type="text">
						</div>

						<div class="form-group">
							<label for="">Email</label>
							<input class="form-control" name="email" type="text">
						</div>

						<div class="form-group">
							<label for="">Cell</label>
							<input class="form-control" name="cell" type="text">
						</div>

						<div class="form-group">
							<label for="">User Name</label>
							<input class="form-control" name="uname" type="text">
						</div>

						<div class="form-group">
							<label for="">Gender</label><br>
							
							<input class="" name="gender" value="male" type="radio" id="male"> <label for="male"> Male</label>

							<input class="" name="gender" value="female" type="radio" id="female"> <label for="female"> Female</label>
						</div>

						<div class="form-group">
							<label for="">Photo</label>
							<input class="form-control-file" name="photo" type="file">
						</div>

						<div class="form-group">
							<input class="btn btn-primary" value="Add" type="submit">
						</div>
						
					</form>
				</div>

				<div></div>
			</div>
		</div>
	</div>






	{{-- Single Student Model --}}

	<div id="single_student_modal" class="modal fade">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header"  style="">
					<h3 class="p-2" style="text-align: center; border:2px solid black; background:skyblue; color:black; width: 100%;">Students Profile</h3>
					<button class="close" data-dismiss="modal">&times;</button>
				</div>

					<img id="student_profile_img" src="" alt="" style="width: 150px; height:150px; border-radius:100%; margin:auto; display: block; padding: 5px 0px;">

				<div class="modal-body">
					<table class="table table-striped text-center">
						
						<tr>
							<td>Name</td>
							<td id="student_name"></td>
						</tr>
						<tr>
							<td>Email</td>
							<td id="student_email"></td>
						</tr>
						<tr>
							<td>Cell</td>
							<td id="student_cell"></td>
						</tr>
						<tr>
							<td>User Name</td>
							<td id="student_uname"></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td id="student_gender"></td>
						</tr>
					
					</table>
				
				</div>
			</div>
		</div>
	</div>






	{{-- Edit Student Modal --}}


	<div  id="edit_student_modal" class="modal fade">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header"  style="display: block;">
					<h4>Edit Student <button class="close" data-dismiss="modal">&times;</button></h4>
					<div class="msg"></div>
				</div>

				<div class="modal-body">
					<form id="add_student_form" action="" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label for="">Name</label>
							<input class="form-control" name="name" type="text">
						</div>

						<div class="form-group">
							<label for="">Email</label>
							<input class="form-control" name="email" type="text">
						</div>

						<div class="form-group">
							<label for="">Cell</label>
							<input class="form-control" name="cell" type="text">
						</div>

						<div class="form-group">
							<label for="">User Name</label>
							<input class="form-control" name="uname" type="text">
						</div>

						<div class="form-group">
							<label for="">Gender</label><br>
							
							<input class="" name="gender" value="male" type="radio" id="male"> <label for="male"> Male</label>

							<input class="" name="gender" value="female" type="radio" id="female"> <label for="female"> Female</label>
						</div>

						<div class="form-group">
							<label for="">Photo</label><br>

							<img src="" alt="" style="width: 150px; height:150px; border-radius:100%;">

							<input id="old_photo" class="form-control-file" name="old_photo" type="hidden">

							<input class="form-control-file" name="new_photo" type="file">
						</div>

						<div class="form-group">
							<input class="btn btn-primary" value="Update" type="submit">
						</div>
						
					</form>
				</div>

				<div></div>
			</div>
		</div>
	</div>







	<!-- JS FILES  -->
	<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/functions.js') }}"></script>
	<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>