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

	<?php require 'includes/config.php'; require 'server.php';
	require 'includes/side-nav.php'; ?>
	<hr>



	<style>
		.home h1 {
            color: #296CC0;
            font-size: 30px;
        }

    </style>


	<div class="container-fluid">

		<ol class="breadcrumb active">
			<li>
				<h3><i class="fa fa-plus-square"></i> Add Subject</h3>
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
								<label for="category"> Name:</label>
								<span class='pull-right' style='color:green;'></span>
								<span class='pull-right' style='color:red;'></span>
								<input type="text" placeholder="Subject Name" class="form-control" name="fullname">
							</div>

							<div class="form-group">
								<label for="category"> Department:</label>
								<span class='pull-right' style='color:green;'></span>
								<span class='pull-right' style='color:red;'></span>
								<select class="form-control" name="dept">
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
								<label for="category">Paper Code</label>
								<span class='pull-right' style='color:green;'></span>
								<span class='pull-right' style='color:red;'></span>
								<input type="text" placeholder="code" class="form-control" name="sub_code" style="text-transform: uppercase;">
							</div>
							<input type="submit" value="Add" name="subj_reg_submit" class="btn btn-primary">
						</form>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12">
						<table class="table table-hover table-bordered table-striped" style="font-size: 11px; font-weight: 100">
							<thead>
								<tr>
									<th>Sr#</th>
									<th>Name</th>
									<th>Department</th>
									<th>Sem</th>
									<th>Code</th>
									<th>Edit</th>
									<th>Del</th>
								</tr>
							</thead>
							<tbody>
								<?php $sql = "SELECT * FROM subject ORDER BY fk_dept, fk_sem";
								$res = mysqli_query($db, $sql);
								$i = 0;
								while ($subject_row = mysqli_fetch_array($res)) { ?>
								 	<tr>
								 		<td><?php $i += 1; echo $i; ?></td>
								 		<td><?php echo $subject_row['sub_name']; ?></td>
								 		<td>
								 			<?php $sql = "SELECT dept_name FROM department WHERE dept_id=".$subject_row['fk_dept']."";
								 			echo mysqli_fetch_array(mysqli_query($db, $sql))['dept_name']; ?>	
								 		</td>
								 		<td>
								 			<?php $sql = "SELECT sem_name FROM semester WHERE sem_id=".$subject_row['fk_sem']."";
								 			echo mysqli_fetch_array(mysqli_query($db, $sql))['sem_name']; ?>	
								 		</td>
								 		<td><?php echo $subject_row['sub_name']; ?></td>
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
