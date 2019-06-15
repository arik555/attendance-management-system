<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/User.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="css/Attaindance.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

</head>

<body>

	<?php require 'server.php'; require 'admin_dash_nav.php'; ?>
	<hr>



	<div class="container-fluid header " style="background: #ffffff;">

		<div class="row">
			<div class="col-6 d-flex">
				<span style="font-size:22px;cursor:pointer;padding-left: 15px; color: #487996 ;line-height: 75px" onclick="openNav()">&#9776; </span>
				<h5 style="line-height: 75px; font-style: bold; font-family: 'Oswald', sans-serif;     font-size: 1.25rem !important; padding-left: 8px; color:#296CC0;">MY SIEM </h5>
			</div>
			<div class="col-3 d-flex"></div>
			<div class="col-3 d-flex controls">
				<h5 style="line-height: 84px; color: #487996; padding-right: 6px"><i class="fas fa-user-cog"></i></h5>
				<h5><i style=" line-height: 84px; color: #487996;" class="fas fa-power-off"></i></h5>
			</div>
		</div>
	</div>
	<style>
		.home h1 {
            color: #296CC0;
            font-size: 30px;
        }

    </style>


	<div class="container-fluid">

		<ol class="breadcrumb active">
			<li>
				<h3><i class="fa fa-plus-square"></i> Add Students</h3>
			</li>
		</ol>
	</div>





	<div class="container">
		<div class="row">


			<div class="col-md-12 mt-3">
				<div class="row">
					<div class="col-12">
						<form action="" method="post">
							<p style="color: red;"><?php if(isset($err)) { echo $err; } ?></p>
							<div class="form-group">
								<label for="category"> Full Name:</label>
								<span class='pull-right' style='color:green;'></span>
								<span class='pull-right' style='color:red;'></span>
								<input type="text" placeholder="Student's Name" class="form-control" name="fullname">
							</div>
							<div class="form-group">
								<label for="category"> Department:</label>
								<span class='pull-right' style='color:green;'></span>
								<span class='pull-right' style='color:red;'></span>
								<select class="form-control" name="dept" onchange="myfunc(this.value)">
									<option value="">Select Department</option>
									<?php $sql = "SELECT * FROM department";
									$res = mysqli_query($db, $sql);
									while ($row = mysqli_fetch_array($res)) { ?>
										<option value="<?php echo $row['dept_id'] ?>"><?php echo $row['dept_name']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="category"> Semester:</label>
								<span class='pull-right' style='color:green;'></span>
								<span class='pull-right' style='color:red;'></span>
								<select class="form-control" name="sem">
									<option value="">Select Semester</option>
									<?php $sql = "SELECT * FROM semester";
									$res = mysqli_query($db, $sql);
									while ($row = mysqli_fetch_array($res)) { ?>
										<option value="<?php echo $row['sem_id'] ?>"><?php echo $row['sem_name']; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="category"> Roll No:</label>
								<span class='pull-right' style='color:green;'></span>
								<span class='pull-right' style='color:red;'></span>
								<input type="number" placeholder="MAKAUT Roll No" class="form-control" name="roll_no">
							</div>
							<div class="form-group">
								<label for="category"> Contact No:</label>
								<span class='pull-right' style='color:green;'></span>
								<span class='pull-right' style='color:red;'></span>
								<input type="number" placeholder="Contact No" class="form-control" name="contact_no">
							</div>
							<input type="submit" value="Add" name="student_reg_submit" class="btn btn-primary">
						</form>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12">
						<table class="table table-hover table-bordered table-striped" style="font-size: 11px; font-weight: 100">
							<thead>
								<tr>
									<th>Sr #</th>
									<th>Full Name</th>
									<th>Department</th>
									<th>Semester</th>
									<th>Roll No.</th>
									<th>Contact No.</th>
									<th>Edit</th>
									<th>Del</th>
								</tr>
							</thead>
							<tbody>
								<?php $sql = "SELECT * FROM student ORDER BY fk_dept, fk_sem";
								$res = mysqli_query($db, $sql);
								$i = 0;
								while ($student_row = mysqli_fetch_array($res)) { ?>
								 	<tr>
								 		<td><?php $i += 1; echo $i; ?></td>
								 		<td><?php echo $student_row['stud_name']; ?></td>
								 		<td>
								 			<?php $sql = "SELECT dept_name FROM department WHERE dept_id=".$student_row['fk_dept']."";
								 			echo mysqli_fetch_array(mysqli_query($db, $sql))['dept_name']; ?>	
								 		</td>
								 		<td>
								 			<?php $sql = "SELECT sem_name FROM semester WHERE sem_id=".$student_row['fk_sem']."";
								 			echo mysqli_fetch_array(mysqli_query($db, $sql))['sem_name']; ?>	
								 		</td>
								 		<td><?php echo $student_row['roll']; ?></td>
								 		<td><?php echo $student_row['stud_contact']; ?></td>
								 		<td><a href=""><i class="fa fa-pencil"></i></a></td>
										<td><a href=""><i class="fa fa-times"></i></a></td>
								 	</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>










			<script>
				function openNav() {
					document.getElementById("mySidenav").style.width = "60%";
				}

				function closeNav() {
					document.getElementById("mySidenav").style.width = "0";
				}

			</script>
			<script src="js/post.js"></script>
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>



</html>
