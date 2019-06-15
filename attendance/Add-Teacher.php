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

 <?php require 'server.php';
  require 'includes/side-nav.php'; ?>
	<hr>




	<style>
		.home h1 {
            color: #296CC0;
            font-size: 30px;
        }

    </style>


	<div class="container-fluid mt-3">
	
		<ol class="breadcrumb active">
			<li>
				<h3><i class="fa fa-plus-square"></i> Add Teachers</h3>
			</li>
		</ol>
	</div>


<?php  ?>


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
								<input type="text" placeholder="Teacher's Name" class="form-control" name="nam">
							</div>
							<div class="form-group">
								<label for="category"> User Name:</label>
								<span class='pull-right' style='color:green;'></span>
								<span class='pull-right' style='color:red;'></span>
								<input type="text" placeholder="User Name" class="form-control" name="uname">
							</div>
							<div class="form-group">
								<label for="category"> Password:</label>
								<span class='pull-right' style='color:green;'></span>
								<span class='pull-right' style='color:red;'></span>
								<input type="text" placeholder="Password" class="form-control" name="pswd">
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
								<label for="category"> Assign Subject:</label>
								<span class='pull-right' style='color:green;'></span>
								<span class='pull-right' style='color:red;'></span>
								<span id="subjects_here">
									Select Department above to view subjects.
								</span>
							</div>
							<input type="submit" value="Add" name="teach_reg_submit" class="btn btn-primary">
						</form>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12">
						<table class="table table-hover table-bordered table-striped" style="font-size: 11px; font-weight: 100">
							<thead>
								<tr>
									<th>Sr #</th>
									<th>Name</th>
									<th>UName</th>
									<th>Password</th>
									<th>Department</th>
									<th>Subjects</th>
									<th>Edit</th>
									<th>Del</th>
								</tr>
							</thead>
							<tbody>
								<?php $sql = "SELECT * FROM teacher ORDER BY fk_dept";
								$res = mysqli_query($db, $sql);
								$i = 0;
								while ($teacher_row = mysqli_fetch_array($res)) { ?>
								 	<tr>
								 		<td><?php $i += 1; echo $i; ?></td>
								 		<td><?php echo $teacher_row['teach_name']; ?></td>
								 		<td><?php echo $teacher_row['uname']; ?></td>
								 		<td><?php echo $teacher_row['pass']; ?></td>
								 		<td>
								 			<?php $sql = "SELECT dept_name FROM department WHERE dept_id=".$teacher_row['fk_dept']."";
								 			echo mysqli_fetch_array(mysqli_query($db, $sql))['dept_name']; ?>	
								 		</td>
								 		<td><?php $sql = "SELECT fk_sub FROM teacher_subject WHERE fk_teach=".$teacher_row['teach_id']."";
								 		$result = mysqli_query($db, $sql);
								 		while ($row = mysqli_fetch_array($result)) {
								 			$sql = "SELECT sub_name from subject WHERE sub_id=".$row['fk_sub']."";
								 			echo mysqli_fetch_array(mysqli_query($db, $sql))['sub_name'].'<br>';
								 		} ?></td>
								 		<td><a href="#"><i class="fa fa-pencil"></i></a></td>
										<td><a href="#"><i class="fa fa-times"></i></a></td>
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
			<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script type="text/javascript">
	function myfunc(dept_id) {
    // alert(sub_id); // TEACHER
    if (dept_id == '') return false;
    else {
      $.ajax({
        type: 'POST',
        url: 'server.php',
        data: 'dept_id='+dept_id,
        success: function(result){
          $("#subjects_here").html(result);
          console.log(result);
        }
      });
    }
  }
</script>

</body>



</html>
