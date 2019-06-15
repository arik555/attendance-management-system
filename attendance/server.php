<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$error = "";
$sql = "";

error_reporting(E_ALL ^ E_WARNING);
// $db is the database connection object

function get_results($sql, $value, $db)
{
	$result = mysqli_query($db, $sql);
	if ($result){
		while ($row = mysqli_fetch_array($result)) {
			if ($value == 'SEM') {
				$x = $row['sem_name'];
				$arr = explode("_", $x);
				return $arr[1];
			} elseif ($value == 'DEPT') {
				return $row['dept_name'];
			}
		}
	}
}

require 'includes/config.php';

// ajax called here -> TEACHER -- ATT ONLY
if (isset($_POST['t_sub_id'])) {
	$sub_id = mysqli_real_escape_string($db, $_POST['t_sub_id']);
	$sql = "SELECT * FROM subject where sub_id=".$sub_id."";
	// echo $sql;
	$result = mysqli_query($db, $sql);
	// echo "<h1>".$result."</h1>";
	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			$sub_row = mysqli_fetch_array($result);
			// print_r($sub_row);
			$sql = "SELECT * FROM student WHERE fk_dept=".$sub_row['fk_dept']." AND fk_sem=".$sub_row['fk_sem']."";
			// echo $sql;
			// <<< DISPLAY ITEMS >>>
			$display_semester = get_results("SELECT * FROM semester WHERE sem_id=".$sub_row['fk_sem']."", 'SEM', $db);
			$display_department = get_results("SELECT * FROM department WHERE dept_id=".$sub_row['fk_dept']."", 'DEPT', $db);
			$display_year = ceil(floatval($display_semester)/2);
			// <<< END >>>
			$result = mysqli_query($db, $sql);
			if ($result) {
				$check = "";
				while ($each = mysqli_fetch_array($result)) {
					$check .= "<input type='checkbox' name='stud[]' value=".$each['stud_id']." />".$each['stud_name']."<br>";
				}
				echo $check."@_@".$display_department."@_@".$display_year."@_@".$display_semester;
			}
		}
	}
}


if (isset($_POST['trpt_sub_id'])) {
	$subject_id = mysqli_real_escape_string($db, $_POST['trpt_sub_id']);
	$subarr = array();
	$sql="SELECT Count(*) FROM attendance WHERE fk_sub='$subject_id' GROUP BY time_stamp";
	// echo $sql;
	$result05 = mysqli_query($db, $sql);
	$total_num_classes = 0;
	while ($row = mysqli_fetch_array($result05)) {
		$total_num_classes += 1;
	}
	$sql = "SELECT * FROM subject WHERE sub_id='$subject_id'";
	$result3 = mysqli_query($db, $sql);
	while ($row = mysqli_fetch_array($result3)) {
		$subject_id = $row['sub_id'];
		$subject_name = $row['sub_name'];
		array_push($subarr, $subject_name);
		$department = $row['fk_dept'];
		$semester = $row['fk_sem'];
		$sql = "SELECT * FROM student WHERE fk_dept='$department' AND fk_sem='$semester'";
		$result4 = mysqli_query($db, $sql);
		while ($student = mysqli_fetch_array($result4)) {
			$student_id = $student['stud_id'];
			$student_name = $student['stud_name'];
			$sql="SELECT Count(*) FROM attendance WHERE fk_sub='$subject_id' AND fk_stud='$student_id'";
			$result5 = mysqli_query($db, $sql);
			while ($att_record = mysqli_fetch_array($result5)) {
				// echo $subject_name.'<br>';
				$temp = array();
				// echo $student_name.'<br>';
				// echo $att_record[0].'<br><br>';
				// echo $total_num_classes.' total <br>';
				// echo "Percentage of Attendance: ";
				$percent = ((float)$att_record[0]/(float)$total_num_classes)*100;
				// echo $percent;
				array_push($temp, $student_name, $att_record[0], $percent);
				array_push($subarr, $temp);
			}
		}
	}
	// print_r($subarr);
	$main_string = $subject_name."@_@".$total_num_classes."@_@";
	$tbl_det = '';
	for ($i=1; $i < sizeof($subarr); $i++) {
		$tbl_det .= "<tr>";
		foreach ($subarr[$i] as $value) {
			$tbl_det .= "<td>".$value."</td>";
		}
		$tbl_det .= "</tr>";
	}
	$html = "<table class='table'>
	<thead>
		<tr>
			<th>Student Name</th>
			<th>Attendance</th>
			<th>Percent</th>
		</tr>
	</thead>
	<tbody>".$tbl_det."
	</tbody>
	</table>";
	$main_string .= $html;
	$sub_id = $subject_id;
	$sql = "SELECT * FROM subject where sub_id=".$sub_id."";
	// echo $sql;
	$result = mysqli_query($db, $sql);
	// echo "<h1>".$result."</h1>";
	if ($result) {
		if (mysqli_num_rows($result) > 0) {
			$sub_row = mysqli_fetch_array($result);
			$sql = "SELECT * FROM student WHERE fk_dept=".$sub_id['fk_dept']." AND fk_sem=".$sub_id['fk_sem']."";
			// <<< DISPLAY ITEMS >>>
			$display_semester = get_results("SELECT * FROM semester WHERE sem_id=".$sub_id['fk_sem']."", 'SEM', $db);
			$display_department = get_results("SELECT * FROM department WHERE dept_id=".$sub_id['fk_dept']."", 'DEPT', $db);
			$display_year = ceil(floatval($display_semester)/2);
			// <<< END >>>
			$result = mysqli_query($db, $sql);
			if ($result) {
				$check = "";
				while ($each = mysqli_fetch_array($result)) {
					$check .= "<input type='checkbox' name='stud[]' value=".$each['stud_id']." />".$each['stud_name']."<br>";
				}
				echo $main_string."@_@".$display_department."@_@".$display_year."@_@".$display_semester;
			}
		}
	}

}

// ajax called here -> STUDENT -  ATT REPORT
if (isset($_POST['s_sub_id'])) {
	$sub_id = mysqli_real_escape_string($db, $_POST['s_sub_id']);
	/* No of students present on each date 
	$sql = "SELECT COUNT(att_id) FROM attendance WHERE fk_sub='$sub_id' GROUP BY time_stamp";
	*/
	$main_string = '';
	$sql = "SELECT COUNT(*) FROM attendance WHERE fk_sub='$sub_id' GROUP BY time_stamp";
	$result = mysqli_query($db, $sql);
	$total_num_classes = 0;
	while ($row = mysqli_fetch_array($result)) {
		$total_num_classes += 1;
	}
	if ($total_num_classes > 0) {
		$stud_id = $_SESSION['uid'];
		$sql = "SELECT * FROM attendance WHERE fk_sub='$sub_id' AND fk_stud='$stud_id' 
		GROUP BY time_stamp";
		$result = mysqli_query($db, $sql);
		$student_present = 0;
		while ($row = mysqli_fetch_array($result)) {
			$student_present += 1;
		}
		$main_string .= "Student was present for ".$student_present." out of ".$total_num_classes." days";
		$percentage = (floatval($student_present)/floatval($total_num_classes))*100;
		$main_string .= "<br>Attendance Percentage = ".$percentage."%";
	}
	else {
		$main_string .= "No record found.";
	}
	echo $main_string;
}




if (isset($_POST['attd_sub'])) {
	// $present_stud = implode(",", $_POST['stud']);
	print_r($_POST);
	if(empty($_POST['stud'])) {
		echo "<script>alert('Please select students!'); </script>";
	}
	else {
		$sql = "INSERT INTO attendance(fk_stud, fk_sub, fk_ins) VALUES ";
		foreach ($_POST['stud'] as $value) {
			$sql .= "(".$value.", ".$_POST['subject'].", ".$_SESSION['ins']."),";
		}
		$sql = rtrim($sql, ',');
		mysqli_query($db, $sql) or die(mysqli_error($db));
		echo "<script>alert('Attendance was saved.');</script>";
	}
}

if (isset($_POST['login_sub'])){
	$uname = mysqli_real_escape_string($db, $_POST['uname']);
	$pass = mysqli_real_escape_string($db, $_POST['pass']);
	$user_type = mysqli_real_escape_string($db, $_POST['user_type']);
	$x = true;
	$error = '';
	if ($user_type == 'T'){
		$sql = "SELECT * FROM teacher WHERE uname='$uname' AND pass='$pass'";
		$result = mysqli_query($db, $sql);
		if (mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
			// print_r($row);
			$_SESSION['uid'] = $row['teach_id'];
			$_SESSION['deptx'] = $row['fk_dept'];
			$sql = "SELECT * FROM department WHERE dept_id=".$row['fk_dept']."";
			$result = mysqli_query($db, $sql);
			$row2 = mysqli_fetch_array($result);
			$_SESSION['role'] = "TEACHER (".$row['teach_name']." of ".$row2['dept_name']." department)";
			$_SESSION['tname'] = $row['teach_name'];
			header('Location: teacher_dash.php');
			exit;
		}
		else {
			$error = 'Invalid Username and Password.';
		}
	}
	if ($user_type == 'S'){
		$sql = "SELECT * FROM student WHERE roll='$uname' AND roll='$pass'";
		$result = mysqli_query($db, $sql);
		if (mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
			// print_r($row);
			$_SESSION['uid'] = $row['stud_id'];
			$_SESSION['deptx'] = $row['fk_dept'];
			$sql = "SELECT * FROM department WHERE dept_id=".$row['fk_dept']."";
			$result = mysqli_query($db, $sql);
			$row2 = mysqli_fetch_array($result);
			$_SESSION['role'] = "STUDENT (".$row['stud_name']." of ".$row2['dept_name']." department)";
			$_SESSION['sname'] = $row['stud_name'];
			header('Location: student_dash.php');
			exit;
		}
		else {
			$error = 'Invalid Username and Password.';
		}
	}
	if ($user_type == 'A'){
		$sql = "SELECT * FROM teacher WHERE uname='$uname' AND pass='$pass'";
		$result = mysqli_query($db, $sql);
		if (mysqli_num_rows($result) == 1){
			$row = mysqli_fetch_array($result);
			// print_r($row);
			$sql = "SELECT * FROM admin WHERE fk_teach=".$row['teach_id']."";
			$result = mysqli_query($db, $sql);
			if (mysqli_num_rows($result) == 1) {
				$row2 = mysqli_fetch_array($result);
				$_SESSION['uid'] = $row['teach_id'];
				$_SESSION['deptx'] = $row['fk_dept'];
				$_SESSION['role'] = $row2['role'];
				$_SESSION['admname'] = $row['teach_name'];
				header('Location: Admin_dash.php');
				exit;
			}
		}
		else {
			$error = 'Invalid Username and Password.';
		}
	}
}
if (isset($_POST['notice_submit'])) {
	$title = mysqli_real_escape_string($db, $_POST['title']);
	$body = mysqli_real_escape_string($db, $_POST['body']);
	$role = $_SESSION['role'];
	$dept_id = $_SESSION['deptx'];
	$teach_id = $_SESSION['uid'];

	$sql = "INSERT INTO notice (title, body, role, fk_teach, fk_dept) VALUES ('$title', '$body', '$role', '$teach_id', '$dept_id')";
	mysqli_query($db, $sql);


}

if (isset($_POST['teach_reg_submit'])) {
	$nam = mysqli_real_escape_string($db, $_POST['nam']);
	$uname = mysqli_real_escape_string($db, $_POST['uname']);
	$pswd = mysqli_real_escape_string($db, $_POST['pswd']);
	$dept = mysqli_real_escape_string($db, $_POST['dept']);
	$err = '';
	$subjs = $_POST['subjs'];
	$sql = "SELECT * FROM teacher WHERE uname='$uname'";
	if (mysqli_num_rows(mysqli_query($db, $sql)) < 1) {
		$sql = "INSERT INTO teacher (uname, pass, teach_name, fk_dept) VALUES ('$uname', '$pswd', '$nam', '$dept')";
		mysqli_query($db, $sql);
		$teach_id = mysqli_insert_id($db);
		$sql2 = "INSERT INTO teacher_subject (fk_teach, fk_sub) VALUES ";
		foreach ($subjs as $value) {
			$sql2 .= "(".$teach_id.", ".$value."),";
		}
		$sql2 = rtrim($sql2, ",");
		mysqli_query($db, $sql);
	} else {
		$err = 'Username already taken.';
	}
}

if (isset($_POST['dept_id'])) {
	$sql = "SELECT * FROM subject";
	$res = mysqli_query($db, $sql);
	$html = '';
	while ($row = mysqli_fetch_array($res)) {
		$html .= '   <input type="checkbox" name="subjs[]" value="'.$row['sub_id'].'">'.$row['sub_name'];
	}
	echo $html;
}

if (isset($_POST['subj_reg_submit'])) {
	$fname = mysqli_real_escape_string($db, $_POST['fullname']);
	$dept = mysqli_real_escape_string($db, $_POST['dept']);
	$sem = mysqli_real_escape_string($db, $_POST['sem']);
	$sub_code = mysqli_real_escape_string($db, $_POST['sub_code']);
	$err = '';
	$sql = "SELECT * FROM subject WHERE sub_name='$sub_code'";
	if (mysqli_num_rows(mysqli_query($db, $sql)) < 1) {
		$sql = "INSERT INTO subject (sub_name, full_name, fk_sem, fk_dept) VALUES ('$sub_code', '$fname', '$sem', '$dept')";
		mysqli_query($db, $sql);
	} else {
		$err = 'Subject-Code already taken.';
	}
}


if (isset($_POST['student_reg_submit'])) {
	$fname = mysqli_real_escape_string($db, $_POST['fullname']);
	$dept = mysqli_real_escape_string($db, $_POST['dept']);
	$sem = mysqli_real_escape_string($db, $_POST['sem']);
	$roll_no = mysqli_real_escape_string($db, $_POST['roll_no']);
	$contact_no = mysqli_real_escape_string($db, $_POST['contact_no']);

	$err = '';
	$sql = "SELECT * FROM student WHERE roll='$roll_no'";
	if (mysqli_num_rows(mysqli_query($db, $sql)) < 1) {
		$sql = "INSERT INTO student (roll, stud_name, stud_contact, fk_sem, fk_dept) VALUES ('$roll_no', '$fname', '$contact_no', '$sem', '$dept')";
		mysqli_query($db, $sql);
	} else {
		$err = 'Roll No. already taken.';
	}
}

?>
