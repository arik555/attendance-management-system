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
	<?php require "includes/config.php"; require 'server.php';
  if(!isset($_SESSION['uid'])) {  header('Location: index.php'); exit; }
  ?>
	<?php require 'includes/student-nav.php'; ?>




	<style>
		.home h1 {
            color: #296CC0;
            font-size: 30px;
        }

    </style>




	





	<div class="container-fluid  notice">
		<ol class="breadcrumb active">
			<li>NOTICE BOARD</li>
		</ol>
		<div class="container">
			<div class="row">
				<div class="col-md-6 mt-3 mb-3">
					<ul class="list-group head-style">
						<li class="list-group-item list-group-item-light d-flex justify-content-between align-items-center">
							<h5>NOTICE FROM ADMINISTRATIVE BODY</h5>
						</li>
						<?php 
                        $sql = "SELECT * FROM notice WHERE fk_dept=".$_SESSION['deptx']."";
                        $result = mysqli_query($db, $sql);
                        if (mysqli_num_rows($result) > 0){
                            while ($row = mysqli_fetch_array($result)) { ?>
						<li class=" list-group-item-action list-group-item d-flex justify-content-between align-items-center">
							<?php echo $row['title']." from ".$row['role']; ?> 
							<span class="badge date badge-pill" style="color: #0077F7">
								<?php echo $row['timestamp']; ?>
							</span>
							<span class="badge badge-success badge-pill " data-toggle="modal" data-target="#myModal" data-notice="<?php echo $row['body']; ?>">New</span>
						</li>
						<?php } } else { echo "No notice found."; }
                        ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- The Modal -->
	<div class="modal" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header d-flex">

					<img src="img/logo.jpg"><br>
					<h5 style="font-size: 15px; padding-left: 5px">

					</h5>
	

					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body">
					<dic class="conatiner">

						<p style="font-size: 15px;"> All the faculties of DCSE are hereby informed to attain an urgent feeting regarding the new session 2019 at HOD's desk at sharp 2.</p>
					</dic>
				</div>

				<!-- Modal footer -->
				<div class="modal-footer d-flex">
					<h5 style="color:darkgreen; 8px;">Auther: H.O.D (DSCE)</h5>
					<h5 style="color:darkgreen; font-size: 8px; padding-left: 5px">Date: 2-April-2018</h5>
				</div>

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
</body>

</html>
