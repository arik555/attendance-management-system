<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/User.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="css/loader.css" rel="stylesheet">
    <script src="js/pace.js"></script>
    <style>     img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
                display:none!important;
            }</style>
</head>

<body>

<?php 
	require "includes/side-nav.php";
	include 'includes/config.php';
	
	
?>


    <div class="container-fluid">
        <div class="container home">
            <h1><i class="fa fa-tachometer"> </i> DASHBOARD <small style="color: #999999;">Blog</small></h1>
            <hr>
        </div>
        <ol class="breadcrumb active">
            <li>
                <h3><i class="fa fa-plus-square"></i> Manage Blog</h3>
            </li>
        </ol>
    </div>





    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <ul class="list-group">
                    <li class="list-group-item text-white" style="background-color: #007BFF; ">Manage Post</li>
                    
                   <a style="color: #000000 !important; te"   class="text-white" href="all-post.php"><li class="list-group-item"> <i class="fa fa-file-text"></i> All Posts</li></a> 
                   
                    <a style="color: #000000 !important; te"   class="text-white" href="media.php"><li class="list-group-item"> <i class="fa fa-file-text"></i> Media</li></a>
                    
                    <a style="color: #000000 !important; te"   class="text-white" href="comments.php"><li class="list-group-item"> <span class='badge'></span><i class="fa fa-comment"></i> Comments<span class="badge badge-primary badge-pill pull-right">14</span> </li></a>
                    
                    
                    <a style="color: #000000 !important; te"   class="text-white" href="categories.php"><li class="list-group-item"> <i class="fa fa-folder-open"></i> Categories</li></a>
                    
                    <a style="color: #000000 !important; te"   class="text-white" href="users.php"><li class="list-group-item"> <i class="fa fa-folder-open"></i> <i class="fa fa-users"></i> Users</li></a>

                </ul>
            </div>

            <div class="col-md-9 mt-3">
               
                <?php
                    if(isset($_POST['submit'])){
                        $date = time();
                        $title = mysqli_real_escape_string($db,$_POST['title']);
                        $post_data = mysqli_real_escape_string($db,$_POST['post-data']);
                        $categories = $_POST['categories'];
                        $tags = mysqli_real_escape_string($db,$_POST['tags']);
                        $status = $_POST['status'];
                        $image = $_FILES['image']['name'];
                        $tmp_name = $_FILES['image']['tmp_name'];
						
						

						
						
						
						
                        if(empty($title) or empty($post_data) or empty($tags) or empty($image)){
                            $error = "All (*) Feilds Are Required";
                            
                        }
                        else{
                            $insert_query = "INSERT INTO posts (date,title, author,author_image,image,categories,tags,post_data,views,status) VALUES ('$date','$title','added from session','logo.jpg','1.jpg','$categories','$tags','$post_data','0','$status')";
                            if(mysqli_query($db, $insert_query)){
                                $msg = "Post Has Been Added";
                                $path = "img/$image";
                                $title = "";
                                $post_data = "";
                                $tags = "";
                                $status = "";
                                $categories = "";
                                if(move_uploaded_file($tmp_name, $path)){
                                    copy($path, "../$path");
                                }
                            }
                            else{
                                $error = "Post Has not Been Added";
                            }
                        }
                    }
                    ?>
                <h3 style="color: #007BFF"><i class="fa fa-plus-square"></i> Add New Post</h3>
                <hr>
                           <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title">Title:*</label>
                                    <?php
                                    if(isset($msg)){
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    }
                                    else if(isset($error)){
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    }
                                    ?>
                                    <input type="text" name="title" placeholder="Type Post Title Here" value="<?php if(isset($title)){echo $title;}?>" class="form-control">
                                </div>
                                
<!--
                                <div class="form-group">
                                    <a href="media.php" class="btn btn-primary">Add Media</a>
                                </div>
-->
                                
                                <div class="form-group">
                                    <textarea name="post-data" id="textarea" rows="10" class="form-control"><?php if(isset($post_data)){echo $post_data;}?></textarea>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="file">Post Image:*</label>
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="categories">Categories:*</label>
                                            <select class="form-control" name="categories" id="categories">
                                                <?php
                                                $cat_query = "SELECT * FROM categories ORDER BY id DESC";
                                                $cat_run = mysqli_query($db, $cat_query);
                                                if(mysqli_num_rows($cat_run) > 0){
                                                    while($cat_row = mysqli_fetch_array($cat_run)){
                                                        $cat_name = $cat_row['category'];
                                                        echo "<option value='".$cat_name."' ".((isset($categories) and $categories == $cat_name)?"selected":"").">".ucfirst($cat_name)."</option>";
                                                        
                                                    }
                                                }
                                                else{
                                                    echo "<cetner><h6>No Category Available</h6></center>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tags">Tags:*</label>
                                            <input type="text" name="tags" placeholder="Your Tags Here" value="<?php if(isset($tags)){echo $tags;}?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="status">Status:*</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="publish" <?php if(isset($status) and $status == 'publish'){echo "selected";}?>>Publish</option>
                                                <option value="draft" <?php if(isset($status) and $status == 'draft'){echo "selected";}?>>Draft</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Add Post" name="submit">
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
