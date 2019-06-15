<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--    vendor-->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/loader.css" rel="stylesheet">

	<!--fonts-->
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


	<!-- custom script-->

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

	<!--custom css-->
	<style>
		body,
		html {
			background: #ffffff;
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: Oswald, sans-serif;
		}

		h4 {
			font-style: normal;
			font-size: 14px;
			font-weight: 300;
		}

		.sidenav {
			border-color: transparent !important;
			border: none;
			height: 100%;
			width: 0;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #ffffff;
			overflow-x: hidden;
			transition: 0.5s;
			padding-top: 0px;
		}

		.sidenav .activee {

			height: 220px;
			background-image: linear-gradient(to right top, #2e0603, #390907, #440b0a, #4f0e0c, #5a120c, #6a150d, #7a180e, #8a1c0d, #a41f0d, #bf210c, #da240b, #f62607);
			color: #ffff;
			transition: 0.3s;
		}

		.sidenav .active h5 {
			padding-top: 6px;
			font-family: 'Oswald', sans-serif;



		}

		.sidenav a {
			color: #000000;
			font-family: 'Oswald', sans-serif;
			font-size: 14px;

			font-weight: 100;

		}

		.user-logo img {
			border-radius: 15px;
			background-position: left top;
			background-repeat: no-repeat;
			background: cover;
			width: 75px;
			height: 75px;
		}

		.sidenav a {
			padding: 8px 8px 8px 10px;
			text-decoration: none;
			font-size: 25px;

			display: block;
			transition: 0.1s;
		}

		.sidenav a:hover {
			color: aqua;
		}

		.sidenav .closebtn {
			position: absolute;
			top: 0;
			right: 25px;
			font-size: 36px;
			margin-left: 50px;
		}

		.mynav {
			background-color: #fff;
			box-shadow: rgba(0, 0, 0, .05) 0 4px 12px 0;
			color: #000;
			display: block;
			left: 0;
			position: fixed;
			right: 0;
			top: 0;
			z-index: 9;
		}

		.mynav h4 {
			font-family: 'Oswald', sans-serif;
			line-height: 40px;
			font-style: normal;
			font-size: 15px;
			font-weight: 300;
		}

		.activee h5 {
			font-size: 12px;
			font-weight: 100;
			padding-left: 5px;
			letter-spacing: 2PX;
		}

		.mylist-group-item {
			position: relative;
			display: block;
			padding: .75rem 1.25rem;
			margin-bottom: -1px;
			background-color: #fff;
			background: none !important;
		}

		.sidenav h5 {
			font-style: normal;
			font-size: 14px;
			font-weight: 100;
		}

		.mylist-group-item {
			border: none !important;
		}

	</style>

</head>




<body>
	<div class="container-fluid mynav d-flex">
		<h4><i class="fa fa-bars" onclick="openNav()"></i> My SIEM</h4>

	</div>


	<div id="mySidenav" class="sidenav mt-0">
		<ul class="list-group active">
			<li onclick="closeNav()" class=" activee list-group-item d-flex  align-items-center">
				<div class="user-logo">
					<img src="img/logo.jpg" ;>
				</div>
				<h5>
					<?php if(isset($_SESSION['role'])) { echo $_SESSION['role']; } ?>
				</h5>
			</li>
		</ul>
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="student_dash.php">
						<h5><i class="fas fa-home"> </i> Home</h5>
					</a>
				</div>
			</div>
		</div>
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="Attaindance.php">
						<h5><i class="fas fa-home"> </i> View My Attendence</h5>
					</a>
				</div>
			</div>
		</div>
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="Home.php">
						<h5><i class="fas fa-circle"> </i> News Feed</h5>
					</a>
				</div>
			</div>
		</div>
		<div class="panel-group ">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" href="#atn">
							<h5><i class="fas fa-rss-square"> </i> Adds</h5>
						</a>
					</h4>
				</div>
				<div id="atn" class="panel-collapse collapse">
					<ul class="list-group">
						<li class="list-group-item mylist-group-item">
							<a href="">
								<h5><i class="fa fa-check"></i> Post Add</h5>
							</a>
						</li>
						<li class="list-group-item mylist-group-item">
							<h5><i class="fa fa-book"></i> Buy</h5>
						</li>

					</ul>
				</div>
			</div>
		</div>


		<!--<div class="panel-group ">-->
		<!--    <div class="panel panel-default">-->
		<!--        <div class="panel-heading">-->
		<!--            <h4 class="panel-title">-->
		<!--                <a data-toggle="collapse" href="#test">-->
		<!--                    <h5><i class="fas fa-rss-square"> </i> Blog</h5>-->
		<!--                </a>-->
		<!--            </h4>-->
		<!--        </div>-->
		<!--        <div id="test" class="panel-collapse collapse">-->
		<!--            <ul class="list-group">-->
		<!--                <li class="list-group-item mylist-group-item">-->
		<!--                    <a href="Addpost.php"><h5><i class="fas fa-file"></i> All Post</h5></a>-->
		<!--                </li>-->
		<!--                <li class="list-group-item mylist-group-item">-->
		<!--                    <a href="Addpost.php"><h5><i class="fas fa-plus-square"></i> Add POst</h5></a>-->
		<!--                </li>-->
		<!--                <li class="list-group-item mylist-group-item">-->
		<!--                    <h5><i class="fa fa-database"></i> Media</h5>-->
		<!--                </li>-->
		<!--                <li class="list-group-item mylist-group-item">-->
		<!--                    <a href="comments.php"><h5><i class="fas fa-comment"></i> Comments</h5></a>-->
		<!--                </li>-->
		<!--                <li class="list-group-item mylist-group-item">-->
		<!--                    <a href="users.php"><h5><i class="fas fa-users"></i> Users</h5></a>-->
		<!--                </li>-->
		<!--            </ul>-->
		<!--        </div>-->
		<!--    </div>-->
		<!--</div>-->


		<div class="panel-group ">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" href="#ntc">
							<h5><i class="fas fa-rss-square"> </i> Notice</h5>
						</a>
					</h4>
				</div>
				<div id="ntc" class="panel-collapse collapse">
					<ul class="list-group">
						<!--<li class="list-group-item mylist-group-item">-->
						<!--    <h5><i class="fa fa-pencil"></i> Compose</h5>-->
						<!--</li>-->
						<li class="list-group-item mylist-group-item">
							<a href="student_view_notice.php"><h5><i class="fa fa-eye"></i> View</h5></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--<div class="panel-group ">-->
		<!--    <div class="panel panel-default">-->
		<!--        <div class="panel-heading">-->
		<!--            <h4 class="panel-title">-->
		<!--                <a data-toggle="collapse" href="#qz">-->
		<!--                    <h5><i class="fas fa-rss-square"> </i> Quiz</h5>-->
		<!--                </a>-->
		<!--            </h4>-->
		<!--        </div>-->
		<!--        <div id="qz" class="panel-collapse collapse">-->
		<!--            <ul class="list-group">-->
		<!--                <li class="list-group-item mylist-group-item">-->
		<!--                    <h5><i class="fa fa-paper-plane"></i> Launch</h5>-->
		<!--                </li>-->
		<!--                <li class="list-group-item mylist-group-item">-->
		<!--                    <h5><i class="fa fa-question"></i> Questions</h5>-->
		<!--                </li>-->
		<!--                <li class="list-group-item mylist-group-item">-->
		<!--                    <h5><i class="fa fa-file-o"></i> Results</h5>-->
		<!--                </li>-->
		<!--            </ul>-->
		<!--        </div>-->
		<!--    </div>-->
		<!--</div>-->

		<div class="panel-group ">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" href="#fal">
							<h5><i class="fas fa-user"> </i> View Faculty</h5>
						</a>
					</h4>
				</div>
				<div id="fal" class="panel-collapse collapse">
					<ul class="list-group">
						<?php $sql="SELECT * FROM department";
						$res = mysqli_query($db, $sql);
						while ($dep = mysqli_fetch_array($res)) { ?>
						 <li class="list-group-item mylist-group-item" style="font-size: 1rem;">
<a href="view_faculty.php?fdept=<?php echo($dep['dept_id']); ?>"><i class="fa fa-briefcase"></i> <?php echo $dep['dept_name']; ?></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>


		<div class="panel-group ">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" href="#sub">
							<h5><i class="fas fa-book"> </i> Manage Subjects</h5>
						</a>
					</h4>
				</div>
				<div id="sub" class="panel-collapse collapse">
					<ul class="list-group">
						<li class="list-group-item mylist-group-item">
							<h5><i class="fas fa-book"></i> Syllabus</h5>
						</li>
						<!--<li class="list-group-item mylist-group-item">-->
						<!--    <h5><i class="fas fa-user-eye"></i> View</h5>-->
						<!--</li>-->
						<!--<li class="list-group-item mylist-group-item">-->
						<!--    <h5><i class="fas fa-window-close-o"></i> Delete</h5>-->
						<!--</li>-->
					</ul>
				</div>
			</div>
		</div>
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="#">
						<a href="logout.php">
							<h5><i class="fa fa-cog"></i> Logout</h5>
						</a>
					</a>
				</div>
			</div>
		</div>
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
					<a href="#">
						<h5><i class="fa fa-cog"></i> About</h5>
					</a>
				</div>
			</div>
		</div>

	</div>
