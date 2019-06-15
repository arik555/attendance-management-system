<!DOCTYPE html>
<?php 
include 'includes/config.php';



if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $edit_query = "SELECT * FROM users WHERE id = $edit_id";
    $edit_query_run = mysqli_query($db, $edit_query);
    if(mysqli_num_rows($edit_query_run) > 0){
        $edit_row = mysqli_fetch_array($edit_query_run);
        $e_first_name = $edit_row['first_name'];
        $e_last_name = $edit_row['last_name'];
        $e_role = $edit_row['role'];
        $e_image = $edit_row['image'];
        $e_details = $edit_row['details'];
    }
    else{
        //header('location: users.php');
    }
}
?>





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
	<link href="css/loader.css" rel="stylesheet">
	<script src="js/pace.js"></script>
	<style>
		img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
			display: none !important;
		}

	</style>
</head>

<body>

	<?php require "includes/side-nav.php";?>
	<div class="container-fluid">
		<div class="container home">
			<h1><i class="fa fa-tachometer"> </i> DASHBOARD <small style="color: #999999;">Blog</small></h1>
			<hr>
		</div>
		<ol class="breadcrumb active">
			<li>
				<h3><i class="fa fa-plus-square"></i> Manage Users</h3>
			</li>
		</ol>
	</div>





	<div class="container">
		<div class="row">
			<div class="col-md-3 mb-3">
				<ul class="list-group">
					<li class="list-group-item text-white" style="background-color: #007BFF; ">Manage Post</li>

					<a style="color: #000000 !important; te" class="text-white" href="all-post.php">
						<li class="list-group-item"> <i class="fa fa-file-text"></i> All Posts</li>
					</a>

					<a style="color: #000000 !important; te" class="text-white" href="media.php">
						<li class="list-group-item"> <i class="fa fa-file-text"></i> Media</li>
					</a>

					<a style="color: #000000 !important; te" class="text-white" href="comments.php">
						<li class="list-group-item"> <span class='badge'></span><i class="fa fa-comment"></i> Comments<span class="badge badge-primary badge-pill pull-right">14</span> </li>
					</a>


					<a style="color: #000000 !important; te" class="text-white" href="categories.php">
						<li class="list-group-item"> <i class="fa fa-folder-open"></i> Categories</li>
					</a>

					<a style="color: #000000 !important; te" class="text-white" href="users.php">
						<li class="list-group-item"> <i class="fa fa-folder-open"></i> <i class="fa fa-users"></i> Users</li>
					</a>

				</ul>
			</div>
                    <?php
                    if(isset($_POST['submit'])){
                        $first_name = mysqli_real_escape_string($db,$_POST['first-name']);
                        $last_name = mysqli_real_escape_string($db,$_POST['last-name']);
                        $password = mysqli_real_escape_string($db,$_POST['password']);
                        $role = $_POST['role'];
                        $image = $_FILES['image']['name'];
                        $image_tmp = $_FILES['image']['tmp_name'];
                        
                        $details = mysqli_real_escape_string($db,$_POST['details']);
                        
                        if(empty($image)){
                            $image = $e_image;
                        }
                        
                        $salt_query = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
                        $salt_run = mysqli_query($db, $salt_query);
                        $salt_row = mysqli_fetch_array($salt_run);
                        $salt = $salt_row['salt'];
                        
                        $insert_password = crypt($password, $salt);
                        
                        if(empty($first_name) or empty($last_name) or empty($image)){
                            $error = "All (*) feilds are Required";
                        }
                        else{
                            $update_query = "UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name', `image` = '$image', `role` = '$role', `details` = '$details'";
                            if(isset($password)){
                                $update_query .= ",`password` = '$insert_password'";
                            }
                            $update_query .= " WHERE `users`.`id` = $edit_id";
                            if(mysqli_query($db, $update_query)){
                                $msg = "User Has Been Updated";
                              //  header("refresh:0; url=edit-user.php?edit=$edit_id");
                                if(!empty($image)){
                                    move_uploaded_file($image_tmp, "img/$image");
                                }
                            }
                            else{
                                $error = "User Has Not Been Updated";
                            }
                        }
                    }
                    ?>
			<div class="col-md-7 mt-3">
				<div class="container">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="first-name">First Name:*</label>
							<?php
                                    if(isset($error)){
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    }
                                   else if(isset($msg)){
                                       echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                   }
                                   ?>
							<input type="text" id="first-name" name="first-name" class="form-control" value="<?php echo $e_first_name;?>" placeholder="First Name">
						</div>

						<div class="form-group">
							<label for="last-name">Last Name:*</label>
							<input type="text" id="last-name" name="last-name" class="form-control" value="<?php echo $e_last_name;?>" placeholder="Last Name">
						</div>

						<div class="form-group">
							<label for="Password">Password:*</label>
							<input type="password" id="password" name="password" class="form-control" placeholder="Password">
						</div>

						<div class="form-group">
							<label for="role">Role:*</label>
							<select name="role" id="role" class="form-control">
								<option value="author" <?php if($e_role=='author' ){echo "selected" ;}?>>Author</option>
								<option value="admin" <?php if($e_role=='admin' ){echo "selected" ;}?>>Admin</option>
							</select>
						</div>

						<div class="form-group">
							<label for="image">Profile Picture:*</label>
							<input type="file" id="image" name="image">
						</div>

						<div class="form-group">
							<label for="details">Details:*</label>
							<textarea name="details" id="details" cols="30" rows="10" class="form-control"><?php echo $e_details;?></textarea>
						</div>

						<input type="submit" value="Update User" name="submit" class="btn btn-primary">
					</form>
				</div>
			</div>
			<div class="col-md-2 mt-3">
				    
                           <?php
                               echo "<center><img src='img/$e_image' height='50%' width='50%'></center>";
                           ?>
                
			</div>
		</div>






		<!--


    <footer class="mt-3">

        <h5>All rights reserved 2019, SIEM SILIGURI.</h5>
    </footer>
-->

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
