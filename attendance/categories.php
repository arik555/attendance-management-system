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
    <link href="css/loader.css" rel="stylesheet">
    <script src="js/pace.js"></script>
    <style>     img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
                display:none!important;
            }</style>
</head>

<body>
    <?php require "includes/side-nav.php";
	include 'includes/config.php';
	
//	if(!isset($_SESSION['username'])){
//    header('Location: login.php');
//}
//else if(isset($_SESSION['username']) && $_SESSION['role'] == 'author'){
//    header('Location: index.php');
//}

if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
}

if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    
//   if(isset($_SESSION['username']) and $_SESSION['role'] == 'admin'){
        $del_query = "DELETE FROM categories WHERE id = '$del_id'";
        if(mysqli_query($db, $del_query)){
            $del_msg = "Category Has Been Deleted";
         }
        else{
            $del_error = "Category Has not Been Deleted";
        }
//    }
}

if(isset($_POST['submit'])){
    $cat_name = mysqli_real_escape_string($db, strtolower($_POST['cat-name']));
    
    if(empty($cat_name)){
        $error = "Must Fill This Field";
    }
    else{
        $check_query = "SELECT * FROM categories WHERE category = '$cat_name'";
        $check_run = mysqli_query($db, $check_query);
        if(mysqli_num_rows($check_run) > 0){
            $error = "Category Already Exist";
        }
        else{
            $insert_query = "INSERT INTO categories (category) VALUES ('$cat_name')";
            if(mysqli_query($db, $insert_query)){
                $msg = "Category Has Been Added";
            }
            else{
                $error = "Category Has not Been Added";
            }
        }
    }
}

if(isset($_POST['update'])){
    $cat_name = mysqli_real_escape_string($db, strtolower($_POST['cat-name']));
    
    if(empty($cat_name)){
        $up_error = "Must Fill This Field";
    }
    else{
        $check_query = "SELECT * FROM categories WHERE category = '$cat_name'";
        $check_run = mysqli_query($db, $check_query);
        if(mysqli_num_rows($check_run) > 0){
            $up_error = "Category Already Exist";
        }
        else{
            $update_query = "UPDATE `categories` SET `category` = '$cat_name' WHERE `categories`.`id` = $edit_id";
            if(mysqli_query($db, $update_query)){
                $up_msg = "Category Has Been Updated";
            }
            else{
                $up_error = "Category Has not Been Updated";
            }
        }
    }
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	?>
    <div class="container-fluid">
        <div class="container home">
            <h1><i class="fa fa-tachometer"> </i> DASHBOARD <small style="color: #999999;">Blog</small></h1>
            <hr>
        </div>
        <ol class="breadcrumb active">
            <li>
                <h3><i class="fa fa-plus-square"></i> Manage Categories</h3>
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

            <div class="col-md-9 mt-3">
                <div class="row">
                    <div class="col-12">
                           <form action="" method="post">
                                <div class="form-group">
                                    <label for="category">Category Name:</label>
                                    <?php
                                    if(isset($msg)){
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    }
                                    else if(isset($error)){
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    }
                                    ?>
                                    <input type="text" placeholder="Category Name" class="form-control" name="cat-name">
                                </div>
                                <input type="submit" value="Add Category" name="submit" class="btn btn-primary">
                            </form>
                          <?php
                            if(isset($_GET['edit'])){
                                $edit_check_query = "SELECT * FROM categories WHERE id = $edit_id";
                                $edit_check_run = mysqli_query($db, $edit_check_query);
                                if(mysqli_num_rows($edit_check_run) > 0){
                                    
                               $edit_row = mysqli_fetch_array($edit_check_run);
                                    $up_category = $edit_row['category'];
								}
							}
                            ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                         <?php
                            $get_query = "SELECT * FROM categories ORDER BY id DESC";
                            $get_run = mysqli_query($db, $get_query);
                            if(mysqli_num_rows($get_run) > 0){
                                
                                if(isset($del_msg)){
                                        echo "<span class='pull-right' style='color:green;'>$del_msg</span>";
                                    }
                                    else if(isset($del_error)){
                                        echo "<span class='pull-right' style='color:red;'>$del_error</span>";
                                    }
                            ?>
                        <table class="table table-hover table-bordered table-striped" style="font-size: 11px; font-weight: 100">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Category Name</th>
<!--                                    <th>Edit</th>-->
                                    <th>Del</th>
                                </tr>
                            </thead>
                            <tbody>
                                   <?php 
                                    while($get_row = mysqli_fetch_array($get_run)){
                                        $category_id = $get_row['id'];
                                        $category_name = $get_row['category'];
                                    ?>
                                    <tr>
                                        <td><?php echo $category_id;?></td>
                                        <td><?php echo ucfirst($category_name);?></td>
<!--                                        <td><a href="categories.php?edit=<?php echo $category_id;?>"><i class="fa fa-pencil"></i></a></td>-->
                                        <td><a href="categories.php?del=<?php echo $category_id;?>"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                    <?php }?>

                            </tbody>
                        </table>
                           <?php
                            }
                            else{
                                echo "<center><h3>No Categories Found</h3></center>";
                            }
                            ?>
                    </div>
                </div>
            </div>

<!--
            <footer class="mt-3">
                <h5>All rights reserved 2019, SIEM SILIGURI.</h5>
            </footer>
-->


            <script src="js/post.js"></script>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>



</html>
