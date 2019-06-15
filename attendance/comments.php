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
//if(!isset($_SESSION['username'])){
//    header('Location: login.php');
//}
//else if(isset($_SESSION['username']) && $_SESSION['role'] == 'author'){
//    header('location: comments.php');
//}

//$session_username = $_SESSION['username'];

if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    $del_check_query = "SELECT * FROM comments WHERE id = $del_id";
    $del_check_run = mysqli_query($db, $del_check_query);
    if(mysqli_num_rows($del_check_run) > 0){
        $del_query = "DELETE FROM `comments` WHERE `comments`.`id` = $del_id";
        if(isset($_SESSION['username']) && $_SESSION['role'] == 'admin'){
            if(mysqli_query($db, $del_query)){
                $msg = "Comment Has been Deleted";
            }
            else{
                $error = "Comment has not been deleted";
            } 
        }
    }
    else{
        header('location: comments.php');
    }
}

if(isset($_GET['approve'])){
    $approve_id = $_GET['approve'];
    $approve_check_query = "SELECT * FROM comments WHERE id = $approve_id";
    $approve_check_run = mysqli_query($db, $approve_check_query);
    if(mysqli_num_rows($approve_check_run) > 0){
        $approve_query = "UPDATE `comments` SET `status` = 'approve' WHERE `comments`.`id` = $approve_id";
        if(isset($_SESSION['username']) && $_SESSION['role'] == 'admin'){
            if(mysqli_query($db, $approve_query)){
                $msg = "Comment Has Been Approved";
            }
            else{
                $error = "Comment Has Not Been Approved";
            } 
        }
    }
    else{
        header('location: comments.php');
    }
}

if(isset($_GET['unapprove'])){
    $unapprove_id = $_GET['unapprove'];
    $unapprove_check_query = "SELECT * FROM comments WHERE id = $unapprove_id";
    $unapprove_check_run = mysqli_query($db, $unapprove_check_query);
    if(mysqli_num_rows($unapprove_check_run) > 0){
        $unapprove_query = "UPDATE `comments` SET `status` = 'pending' WHERE `comments`.`id` = $unapprove_id";
        if(isset($_SESSION['username']) && $_SESSION['role'] == 'admin'){
            if(mysqli_query($db, $unapprove_query)){
                $msg = "Comment Has Been Unapproved";
            }
            else{
                $error = "Comment Has Not Been Unapproved";
            } 
        }
    }
    else{
        header('location: comments.php');
    }
}

if(isset($_POST['checkboxes'])){
    
    foreach($_POST['checkboxes'] as $user_id){
        
        $bulk_option = $_POST['bulk-options'];
        
        if($bulk_option == 'delete'){
            $bulk_del_query = "DELETE FROM `comments` WHERE `comments`.`id` = $user_id";
            mysqli_query($db, $bulk_del_query);
        }
        else if($bulk_option == 'approve'){
            $bulk_author_query = "UPDATE `comments` SET `status` = 'approve' WHERE `comments`.`id` = $user_id";
            mysqli_query($db, $bulk_author_query);
        }
        else if($bulk_option == 'pending'){
            $bulk_admin_query = "UPDATE `comments` SET `status` = 'pending' WHERE `comments`.`id` = $user_id";
            mysqli_query($db, $bulk_admin_query);
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
                <h3><i class="fa fa-plus-square"></i> Manage Comments</h3>
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
               <form action="" method="post">
                <div class="container">
                  <?php
                   $query = "SELECT * FROM comments ORDER BY id DESC";
                    $run = mysqli_query($db, $query);
                    if(mysqli_num_rows($run) > 0){
                    ?>
                   
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <select name="bulk-options" id="" class="form-control">
                                        <option value="delete">Delete</option>
                                        <option value="approve">Approve</option>
                                        <option value="pending">Unapprove</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Apply">
                                </div>
                            </div>
                        </div>
                  
                </div>
                <div class="row comment-table">
                    <div class="col-12 .comment-table">
   					 <?php
                        if(isset($error)){
                            echo "<span style='color:red;' class='pull-right'>$error</span>";
                        }
                        else if(isset($msg)){
                            echo "<span style='color:green;' class='pull-right'>$msg</span>";
                        }
                    ?>
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                               <th><input type="checkbox" id="selectallboxes"></th>
                                <th>Sr #</th>
                                <th>Date</th>
                                <th>Username</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Reply</th>
                                <th>Del</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            while($row = mysqli_fetch_array($run)){
                                $id = $row['id'];
                                $username = $row['username'];
                                $status = $row['status'];
                                $comment = $row['comment'];
                                $post_id = $row['post_id'];
                                $date = getdate($row['date']);
                                $day = $date['mday'];
                                $month = substr($date['month'],0,3);
                                $year = $date['year'];
                            ?>
                            <tr>
                               <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id;?>"></td>
                                <td><?php echo $id;?></td>
                                <td><?php echo "$day $month $year";?></td>
                                <td><?php echo $username;?></td>
                                <td><?php echo $comment;?></td>
                                <td><span style="color:<?php if($status == 'approve'){echo 'green';}else if($status == 'pending'){echo 'red';}?>;"><?php echo ucfirst($status);?></span></td>
                                <td><a href="comments.php?approve=<?php echo $id;?>">Approve</a></td>
                                <td><a href="comments.php?unapprove=<?php echo $id;?>">Unapprove</a></td>
                                <td><a href="comments.php?reply=<?php echo $post_id;?>"><i class="fa fa-reply"></i></a></td>
                                <td><a href="comments.php?del=<?php echo $id;?>"><i class="fa fa-times"></i></a></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
  				 <?php
                    }
                    else{
                        echo "<center><h2>No Users Availabe Now</h2></center>";
                    }
                    ?>

                    </div>
                </div>
                </form>
            </div>
			
            
            
            
            
            
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
