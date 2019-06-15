<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/User.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link href="css/loader.css" rel="stylesheet">
	<script src="js/pace.js"></script>
	<style> img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
                display:none!important;
            }</style>
</head>

<body>
<?php require 'server.php';
 if(!isset($_SESSION['uid'])) {  header('Location: index.php'); exit; }
 if(!isset($_GET['fdept'])) { header('Location: student_dash.php'); exit; }
  ?>
	<?php require 'includes/student-nav.php'; ?>
	<style>
		.home h1 {
            color: #296CC0;
            font-size: 30px;
        }

        h5 {


            font-weight: 200;
            font-style: normal;
            font-size: 11px;

        }
        .notice-table{
            width: 100%;
            overflow-x: scroll;
            height: 500px;
            overflow-y: scroll;
        }
         a{
            text-decoration: none;
         }

    </style>
	<div class="container-fluid">
		<div class="container home">
			<h1><i class="fa fa-tachometer"> </i> Dashboard <small style="color: #999999;">Students Panel</small></h1>
			<hr>
		</div>
		<ol class="breadcrumb active">
			<li>VIEW ALL FACULTY OF <?php $res = mysqli_query($db, "SELECT dept_name from department where dept_id=".$_GET['fdept'].""); echo mysqli_fetch_array($res)['dept_name']; ?> DEPT.</li>
		</ol>
	</div>

	<div class="admin-notice">
		<div class="container-fluid">
			<div class="row mb-3">
				<div class="col-sm-12">
					<ul class="list-group">
						<li class="list-group-item text-white" style="background-color: #007BFF; ">List of Faculties</li>
					</ul>
					<div class="notice-table">
						<table class="table table-hover table-bordered table-striped" style="font-size: 1.2rem; font-weight: 100">
							<thead>
								<tr>
									<th>Sr #</th>
									<th>Name</th>
									<th>Department</th>
									<th>Subjects</th>
								</tr>
							</thead>
							<tbody>
								<?php $sql = "SELECT * FROM teacher WHERE fk_dept=".$_GET['fdept']."";
								$res = mysqli_query($db, $sql);
								$i = 0;
								while ($teacher_row = mysqli_fetch_array($res)) { ?>
								 	<tr>
								 		<td><?php $i += 1; echo $i; ?></td>
								 		<td><?php echo $teacher_row['teach_name']; ?></td>
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
								 	</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				
			</div>
		</div>









		<footer class="mt-3">

			<h5>All rights reserved 2019, SIEM SILIGURI.</h5>
		</footer>

		<script>
			function openNav() {
				document.getElementById("mySidenav").style.width = "60%";
			}

			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
			}

		</script>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
