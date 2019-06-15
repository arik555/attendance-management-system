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
  if(!isset($_SESSION['uid'])) {  header('Location: index.php'); exit; }
  ?>
	<?php require 'includes/config.php';
	if(isset($_SESSION['tname'])) { require 'includes/teacher-nav.php'; }
	if(isset($_SESSION['sname'])) { require 'includes/student-nav.php'; }
	 ?>


	<style>
		.home h1 {
            color: #296CC0;
            font-size: 30px;
        }
		ul {
		  list-style-type: none !important;
		}
    </style>
	<div class="container-fluid">
		<div class="container home">
			<h1><i class="fa fa-tachometer"> </i> Dashboard <small style="color: #999999;">Teachers Panel</small></h1>
			<hr>
		</div>
		<ol class="breadcrumb active">
			<li style="list-style-type: none;">MARK ATTENDENCE</li>
		</ol>
	</div>
	<?php if(isset($_SESSION['tname'])) { ?>
	<form method="post">

		<div class="container">
			<div class="row">
				<div class="col-3">
					<li style="list-style-type: none;">
						<H5 style="color: darkcyan">DEPT: <span id="dept"></span></H5>
					</li>
				</div>
				<div class="col-2">
					<li style="list-style-type: none;">
						<H5 style="color: green">YEAR: <span id="year"></span></H5>
					</li>
				</div>
				<div class="col-2">
					<li style="list-style-type: none;">
						<H5 style="color: brown">SEM: <span id="sem"></span></H5>
					</li>
				</div>
				<div class="col-5">
					<li style="list-style-type: none;">
						<H5 style="color: black">SUB: <span id="subj">
								<select onchange="myFunTeach(this.value)" id="subjects" name="subject" required>
									<option value="">Select Subject</option>
									<?php  $sql = "SELECT * FROM teacher_subject WHERE fk_teach=".$_SESSION['uid']."";
                            $result = mysqli_query($db, $sql);
                            while ($row = mysqli_fetch_array($result)) { ?>
									<?php $subject_idx = $row['fk_sub'];
                                        $sql = "SELECT * FROM subject WHERE sub_id='$subject_idx'";
                                        $result2 = mysqli_query($db, $sql);
                                        while($row2 = mysqli_fetch_array($result2)) {
                                            echo '<option value="'.$subject_idx.'">'.$row2['sub_name'].'</option>';
                                            ?>
									<?php } 
                                       ?>
									<?php  }  ?>
								</select>
							</span></H5>
					</li>
				</div>
			</div>
		</div>



		<div class="container anyClass">
			<div class="row">
				<div class="col-12">
					<ul class="list-group">
						<div id="ajax_elems_teach">

						</div>
					</ul>
				</div>
			</div>
		</div>
		<div class="container">
			<input class="btn  btn-success" type="submit" name="attd_sub">
		</div>
	</form>
	<form method="post">
		<div class="container-fluid mt-3">

			<ol class="breadcrumb active">
				<li style="list-style-type: none;"> ATTENDENCE REPORT</li>
			</ol>

			<div class="container">
				<div class="row">
					<div class="col-3">
						<li style="list-style-type: none;">
							<H5 style="color: darkcyan">DEPT: <span id="deptrpt"></span></H5>
						</li>
					</div>
					<div class="col-2">
						<li style="list-style-type: none;">
							<H5 style="color: green">YEAR: <span id="yearrpt"></span></H5>
						</li>
					</div>
					<div class="col-2">
						<li style="list-style-type: none;">
							<H5 style="color: brown">SEM: <span id="semrpt"></span></H5>
						</li>
					</div>
					<div class="col-5">
						<li style="list-style-type: none;">
							<H5 style="color: black">SUB: <span id="subj">
									<select onchange="myFunTeachrpt(this.value)" id="subjects" name="subject" required>
										<option value="">Select Subject</option>
										<?php  $sql = "SELECT * FROM teacher_subject WHERE fk_teach=".$_SESSION['uid']."";
                            $result = mysqli_query($db, $sql);
                            while ($row = mysqli_fetch_array($result)) { ?>
										<?php $subject_idx = $row['fk_sub'];
                                        $sql = "SELECT * FROM subject WHERE sub_id='$subject_idx'";
                                        $result2 = mysqli_query($db, $sql);
                                        while($row2 = mysqli_fetch_array($result2)) {
                                            echo '<option value="'.$subject_idx.'">'.$row2['sub_name'].'</option>';
                                            ?>
										<?php } 
                                       ?>
										<?php  }  ?>
									</select>
								</span></H5>
						</li>
					</div>
				</div>
			</div>

		
		<style>
			#tbl {
            font-size: 13px;
        }
    </style>
		<div class="container anyClass">
			<div class="row">
				<div class="col-12">
					<ul class="list-group">
						<div id="ajax_elems_teach_report">
							<h4>Subject: <span id="sub_name"></span></h4>
							<h4>Total No. of Classes: <span id="tot_class"></span></h4>
							<div>
								<span id="tblrpt"></span>
							</div>

						</div>
					</ul>
				</div>
			</div>
		</div>
	</form>
	<?php } elseif(isset($_SESSION['sname'])) { 

$sql = "SELECT fk_dept, fk_sem FROM student WHERE stud_id=".$_SESSION['uid']."" ;
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$dept = $row['fk_dept']; $sem = $row['fk_sem']; $year = ceil(floatval($sem)/2);
    ?>
	<div class="container-fluid">
		<div class="container home">
			<h1><i class="fa fa-tachometer"> </i> Dashboard <small style="color: #999999;">Attendance Report</small></h1>
			<hr>
		</div>
		<ol class="breadcrumb active">
			<div class="container">
				<div class="row">
					<div class="col-3">
						<li style="list-style-type: none;">
							<H4 style="color: darkcyan">DEPARTMENT: <span id="dept">
									<?php echo $dept; ?></span></H4>
						</li>
					</div>
					<div class="col-3">
						<li style="list-style-type: none;">
							<H4 style="color: green">YEAR: <span id="year">
									<?php echo $year; ?></span></H4>
						</li>
					</div>
					<div class="col-3">
						<li style="list-style-type: none;">
							<H4 style="color: brown">SEMESTER: <span id="sem">
									<?php echo $sem; ?></span></H4>
						</li>
					</div>
					<div class="col-3">
						<li style="list-style-type: none;">
							<H4 style="color: black">SUBJECT:
								<span id="subj">
									<select onchange="myFunStud(this.value)" id="subjects" name="subject" required>
										<option value="">Select Subject</option>
										<?php 
                                        $sql = "SELECT sub_id, sub_name FROM subject WHERE fk_dept='$dept' AND fk_sem='$sem'";
                                        $result = mysqli_query($db, $sql); 
                                        while ($row = mysqli_fetch_array($result)) { ?>
										<option value="<?php echo($row['sub_id']); ?>">
											<?php echo $row['sub_name']; ?>
										</option>
										<?php } ?>
									</select>
								</span>
							</H4>
						</li>
					</div>
				</div>
			</div>

		</ol>
	</div>
	<div class="container anyClass">
		<div class="row">
			<div class="col-12">
				<ul class="list-group">
					<div id="ajax_elems_stud">

					</div>
				</ul>
			</div>
		</div>
	</div>


	<?php } ?>

	<script>
		function absent() {

			var element = document.getElementById(document.getElementById("hen").parentElement.id);
			document.getElementById(document.getElementById("hen").parentElement.id);
			element.classList.add("absent");

		}

		function present() {

			var element = document.getElementById(document.getElementById("hen").parentElement.id);
			document.getElementById(document.getElementById("hen").parentElement.id);
			element.classList.add("present");

		}

		function openNav() {
			document.getElementById("mySidenav").style.width = "60%";
		}

		function closeNav() {
			document.getElementById("mySidenav").style.width = "0";
		}

	</script>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script type="text/javascript">
		function myFunTeach(sub_id) {
			// alert(sub_id); // TEACHER
			if (sub_id == '') return false;
			else {
				$.ajax({
					type: 'POST',
					url: 'server.php',
					data: 't_sub_id=' + sub_id,
					success: function(result) {
						var arr = result.split("@_@");
						$("#ajax_elems_teach").html(arr[0]);
						$("#dept").html(arr[1]);
						$("#year").html(arr[2]);
						$("#sem").html(arr[3]);
						//console.log(result);
					}
				});
			}
		}

		function myFunTeachrpt(sub_id) {
			// alert(sub_id); // TEACHER
			if (sub_id == '') return false;
			else {
				$.ajax({
					type: 'POST',
					url: 'server.php',
					data: 'trpt_sub_id=' + sub_id,
					success: function(result) {
						var arr = result.split("@_@");
						$("#sub_name").html(arr[0]);
						$("#tot_class").html(arr[1]);
						$("#tblrpt").html(arr[2])
						$("#deptrpt").html(arr[3]);
						$("#yearrpt").html(arr[4]);
						$("#semrpt").html(arr[5]);
						//console.log(arr);
					}
				});
			}
		}

		function myFunStud(sub_id) {
			// alert(sub_id); // TEACHER
			if (sub_id == '') return false;
			else {
				$.ajax({
					type: 'POST',
					url: 'server.php',
					data: 's_sub_id=' + sub_id,
					success: function(result) {
						$("#ajax_elems_stud").html(result);
						//console.log(result);
					}
				});
			}
		}

	</script>

	<!-- <script type="text/javascript">
  function myFun2(sub_id) {
    // alert(sub_id); // STUDENT
    if (sub_id == '') return false;
    else {
      $.ajax({
        type: 'POST',
        url: 'server.php',
        data: 'stud_sub_id='+sub_id,
        success: function(result){
          var arr = result.split("@_@");
          $("#ajax_elems").html(arr[0]);
          $("#dept").html(arr[1]);
          $("#year").html(arr[2]);
          $("#sem").html(arr[3]);
          console.log(result);
        }
      });
    }
  }
</script>
 -->
</body>



</html>
