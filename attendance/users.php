<!DOCTYPE html>
<?php 
include 'includes/config.php';
//if(!isset($_SESSION['username'])){
   // header('Location: login.php');
//}
//else if(isset($_SESSION['username']) && $_SESSION['role'] == 'author'){
  //  header('Location: index.php');
//}

if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    $del_check_query = "SELECT * FROM users WHERE id = $del_id";
	
    $del_check_run = mysqli_query($db, $del_check_query);
    if(mysqli_num_rows($del_check_run) > 0){
        $del_query = "DELETE FROM `users` WHERE `users`.`id` = $del_id";
      //  if(isset($_SESSION['username']) && $_SESSION['role'] == 'admin'){
            if(mysqli_query($db, $del_query)){
                $msg = "User Has been Deleted";
            }
            else{
                $error = "User has not been deleted";
            } 
      //  }
    }
    else{
        header('location: users.php');
    }
}

if(isset($_POST['checkboxes'])){
    
    foreach($_POST['checkboxes'] as $user_id){
        
        $bulk_option = $_POST['bulk-options'];
        
        if($bulk_option == 'delete'){
            $bulk_del_query = "DELETE FROM `users` WHERE `users`.`id` = $user_id";
            mysqli_query($db, $bulk_del_query);
        }
        else if($bulk_option == 'teacher'){
            $bulk_author_query = "UPDATE `users` SET `role` = 'teacher' WHERE `users`.`id` = $user_id";
            mysqli_query($db, $bulk_author_query);
        }
        else if($bulk_option == 'admin'){
            $bulk_admin_query = "UPDATE `users` SET `role` = 'admin' WHERE `users`.`id` = $user_id";
            mysqli_query($db, $bulk_admin_query);
        }
        
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
    <style>     img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
                display:none!important;
            }</style>
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

            <div class="col-md-9 mt-3">
                <div class="container">
                   
                    <?php
					include 'includes/config.php';
                    $query = "SELECT * FROM users ORDER BY id DESC";
                    $run = mysqli_query($db, $query);
                    if(mysqli_num_rows($run) > 0){
                    ?>
                   
                    <form method="post">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <select name="bulk-options" id="" class="form-control">
                                        <option value="delete">Delete</option>
                                        <option value="teacher">change to teacher</option>
                                        <option value="admin">change to admin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Apply">
                                </div>
                                   <div class="form-group">
                                    <a href="add-users.php" type="submit" class="btn btn-primary">Add New</a>
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
                        <table class="table table-bordered table-striped table-hover" style="font-size:13px;">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectallboxes"></th>
                                    <th>Sr #</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Edit</th>
                                    <th>Del</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while($row = mysqli_fetch_array($run)){
                                $id = $row['id'];
                                $first_name = ucfirst($row['first_name']);
                                $last_name = ucfirst($row['last_name']);
                                $email = $row['email'];
                                $username = $row['username'];
                                $role = $row['role'];
                                $image = $row['image'];
                                $date = getdate($row['date']);
                                $day = $date['mday'];
                                $month = substr($date['month'],0,3);
                                $year = $date['year'];
                            ?>
                                <tr>
                                    <td>
                                    
                                    <input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id;?>"></td>
                                       <td><?php echo $id;?></td>
                                <td><?php echo "$day $month $year";?></td>
                                <td><?php echo "$first_name $last_name";?></td>
                                <td><?php echo $username;?></td>
                                <td><?php echo $email;?></td>
                                <td><img src="img/<?php echo $image;?>" width="30px"></td>
                                <td>***********</td>
                                <td><?php echo ucfirst($role);?></td>
                                <td><a href="edit-user.php?edit=<?php echo $id;?>"><i class="fa fa-pencil"></i></a></td>
                                <td><a href="users.php?del=<?php echo $id;?>"><i class="fa fa-times"></i></a></td>
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
