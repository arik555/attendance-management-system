<?php
ob_start();
require "includes/config.php";
require "server.php";
if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    
   $views_query = "UPDATE `posts` SET `views` = views + 1 WHERE `posts`.`id` = $post_id";
    mysqli_query($db, $views_query);
    
    $query = "SELECT * FROM posts WHERE status = 'publish' and id = $post_id";
    $run = mysqli_query($db, $query);
    if(mysqli_num_rows($run) > 0){
        $row = mysqli_fetch_array($run);
        $id = $row['id'];
        $date = getdate($row['date']);
        $day = $date['mday'];
        $month = $date['month'];
        $year = $date['year'];
        $title = $row['title'];
        $image = $row['image'];
        $author_image = $row['author_image'];
        $author = $row['author'];
        $categories = $row['categories'];
        $post_data = $row['post_data'];
		$views = $row['views'];
    }
    else{
        header('Location: Home.php');
    }
}      
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Charm:700" rel="stylesheet">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>HOME </title>
	<link href="css/loader.css" rel="stylesheet">
	<script src="js/pace.js"></script>
	<!-- Bootstrap -->
	<link rel="icon" type="image/png" href="img/logo.jpg">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>

	<link href="css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="css/style.css">
	<style> img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"]{
                display:none!important;
            }</style>

</head>

<body>
	<div class="container-fluid app-name ">

		<h4>Siem Siliguri</h4>
		<hr>

	</div>


	<div class="container blog-navigation" id="navbar">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand" href="#"><img class="app-logo" src="img/logo.jpg"> News Today </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"> </span>
			</button>
			<div class="collapse navbar-collapse justify-content-end " id="navbarNavDropdown">
				<ul class="navbar-nav  ">
					
					<?php 
					if(!isset($_SESSION['uid'])) { ?>
					<li class="nav-item ">
						<a class="nav-link" href="Home.php">News Feed <span class="sr-only">(current)</span></a>
					</li>

					<?php } else { ?>
					<li class="nav-item ">
						<?php if(isset($_SESSION['tname'])) { ?>
						<a class="nav-link" href="teacher_dash.php">DashBoard <span class="sr-only">(current)</span></a>
						<?php } elseif (isset($_SESSION['sname'])) { ?>
						<a class="nav-link" href="student_dash.php">DashBoard <span class="sr-only">(current)</span></a>
						<?php } ?>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
					</li>

					<?php } ?>

				</ul>
			</div>
		</nav>

	</div>
	<hr>
	<style>
		.carousel-inner img {
            width: 100%;
            height: 80%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>
	<div class="container content" style="margin-top: 5px;">
		<div id="demo" class="carousel slide" data-ride="carousel">

			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
				<li data-target="#demo" data-slide-to="2"></li>
			</ul>

			<div class="carousel-inner" style="height: 100%;">
				<div class="carousel-item active">
					<img src="img/alacrityy.jpg">
					<div class="carousel-caption">
						<h5>FEST OF SIEM'S</h5>

					</div>
				</div>
				<div class="carousel-item">
					<img src="img/2.jpg">
					<div class="carousel-caption">
						<h5>STUDENTS TODAY</h5>

					</div>
				</div>
				<div class="carousel-item">
					<img src="img/3.jpg">
					<div class="carousel-caption">
						<h5>INSPIRE WORKS</h5>

					</div>
				</div>
			</div>

		</div>
	</div>

	<style>
		.desc{
        color:#000 !important;
    }
        .notice {
            margin-top: 30px;
            height: 40px;
            background-color: brown;
            color: #ffffff;
        }

        .notice h5 {
            line-height: 36px;
        }
.marq {
 
    overflow: hidden;
    position: ;
}

.marq h5 {
    position: relative;
    width: 100%;
    height: 100%;
    margin: 0;

    /* Starting position */
    -moz-transform: translateX(100%);
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
    /* Apply animation to this element */
    -moz-animation: marq 10s linear infinite;
    -webkit-animation: marq 10s linear infinite;
    animation: marq 10s linear infinite;
}

/* Move it (define the animation) */
@-moz-keyframes marq {
    0% {
        -moz-transform: translateX(100%);
    }

    100% {
        -moz-transform: translateX(-100%);
    }
}

@-webkit-keyframes marq {
    0% {
        -webkit-transform: translateX(100%);
    }

    100% {
        -webkit-transform: translateX(-100%);
    }
}

@keyframes marq {
    0% {
        -moz-transform: translateX(100%);
        /* Firefox bug fix */
        -webkit-transform: translateX(100%);
        /* Firefox bug fix */
        transform: translateX(100%);
    }

    100% {
        -moz-transform: translateX(-100%);
        /* Firefox bug fix */
        -webkit-transform: translateX(-100%);
        /* Firefox bug fix */
        transform: translateX(-100%);
    }
}

.marq h5:hover {
    -moz-animation-play-state: paused;
    -webkit-animation-play-state: paused;
    animation-play-state: paused;
}


    </style>

	<div class="container notice mb-3">
		<div class="row">
			<div class="col-3">
				<h5>Notice</h5>
			</div>
			<div class="col-9 ">
				<div class="marq">
					<h5>"WELCOME TO SIEM"</h5>
				</div>
			</div>
		</div>
	</div>
	<section class="mb-3">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="post">
						<div class="row">
							<div class="col-md-2 post-date">
								<div class="day">
									<?php echo  $day; ?>
								</div>
								<div class="month">
									<?php echo  $month; ?>
								</div>
								<div class="year">
									<?php echo  $year; ?>
								</div>
							</div>
							<div class="col-md-8 post-title">
								<a href="Home.php?cat=<?php echo $id;?>">
									<h2>
										<?php echo  ucfirst($title); ?>
									</h2>
								</a>
								<p>Written by: <span>
										<?php echo ucfirst($author); ?></span></p>
							</div>
							<div class="col-md-2 profile-picture">
								<img src="img/<?php echo $author_image ?>" alt="profiloe pic">
							</div>
						</div>
						<a href="Home.php?cat=<?php echo $id;?>"><img src="img/<?php echo $image; ?>" alt="post pic" style="width: 100%; overflow: hidden; background: cover;"></a>
						<p class="desc">
							<?php echo $post_data; ?>
						</p>
						<a href="Home.php?cat=<?php echo $id;?>" class="btn btn-primary">Read more...</a>
						<div class="bottom">
							<span class="first"><a href="#" style="color:#7d7a7a !important;"><i class="fa fa-folder">
										<?php echo ucfirst($categories); ?></i></a></span>
							<span class="second"><a href="" style="color:#7d7a7a !important;"><i class="fa fa-comment"> Comment</i></a></span>
							<span class="" style="padding-left:15px; color:blue;"><i class="fa fa-eye"> <?php echo $views;?></i> views</span>
						</div>
					</div>
					  <div class="related-posts">
                       <h3>Related Posts</h3><hr>
                        <div class="row">
                           <?php
                            $r_query = "SELECT * FROM posts WHERE status = 'publish' AND title LIKE '%$title%' LIMIT 3";
                            $r_run = mysqli_query($db,$r_query);
                            while($r_row = mysqli_fetch_array($r_run)){
                                $r_id = $r_row['id'];
                                $r_title = $r_row['title'];
                                $r_image = $r_row['image'];
                            ?>
                            <div class="col-sm-4">
                                <a href="post.php?post_id=<?php echo $r_id;?>">
                                    <img src="img/<?php echo $r_image;?>" alt="Slider One">
                                    <h6><?php echo $r_title;?></h6>
                                </a>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                       <div class="author">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="img/<?php echo $author_image;?>" alt="Profile Image" class="img-circle">
                            </div>
                            <div class="col-sm-9">
                                <h4><?php echo ucfirst($author);?></h4>
                                <?php
                                $bio_query = "SELECT * FROM users WHERE username = '$author'";
                                $bio_run = mysqli_query($db, $bio_query);
                                if(mysqli_num_rows($bio_run) > 0){
                                    $bio_row = mysqli_fetch_array($bio_run);
                                    $author_details = $bio_row['details'];
                                
                                ?>
                                <p><?php echo $author_details;?></p>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $c_query = "SELECT * FROM comments WHERE status = 'approve' and post_id = $post_id ORDER BY id DESC";
                    $c_run = mysqli_query($db,$c_query);
                    if(mysqli_num_rows($c_run) > 0){
                    ?>
                    <div class="comment">
                       <h3>Comments</h3>
                       <?php
                        while($c_row = mysqli_fetch_array($c_run)){
                            $c_id = $c_row['id'];
                            $c_name = $c_row['name'];
                            $c_username = $c_row['username'];
                            $c_image = $c_row['image'];
                            $c_comment = $c_row['comment'];
                        ?>
                       <hr>
                        <div class="row single-comment">
                            <div class="col-sm-2">
                                <img src="img/<?php echo $c_image;?>" alt="Profile Picture" class="img-circle">
                            </div>
                            <div class="col-sm-10">
                                <h4><?php echo ucfirst($c_name);?></h4>
                                <p><?php echo $c_comment;?></p>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <?php }
                    
                    if(isset($_POST['submit'])){
                        $cs_name = $_POST['name'];
                        $cs_email = $_POST['email'];
                        $cs_website = $_POST['website'];
                        $cs_comment = $_POST['comment'];
                        $cs_date = time();
                        if(empty($cs_name) or empty($cs_email) or empty($cs_comment)){
                          $error_msg = "All (*) feilds are Required";  
                        }
                        else{
                            $cs_query = "INSERT INTO `comments` (`date`, `name`, `username`, `post_id`, `email`, `website`, `image`, `comment`, `status`) VALUES ('$cs_date', '$cs_name', 'user', '$post_id', '$cs_email', '$cs_website', 'logo.jpg', '$cs_comment', 'pending')";
                            if(mysqli_query($db, $cs_query)){
                                $msg = "Comment Submited and waiting for Approval";
                                $cs_name = "";
                                $cs_email = "";
                                $cs_website = "";
                                $cs_comment = "";
                            }
                            else{
                                $error_msg = "Comment not sumited ".mysqli_error($db);
                            }
                        }
                    }
                    ?>
                    
<!--                    <div class="">-->
                        <div class="row comment-box">
                            <div class="col-sm-12">
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="full-name">Full Name:*</label>
                                        <input type="text" value="<?php if(isset($cs_name)){echo $cs_name;}?>" name="name" id="full-name" class="form-control" placeholder="Full Name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="email">Email Address:*</label>
                                        <input type="text" name="email" id="email" class="form-control" value="<?php if(isset($cs_email)){echo $cs_email;}?>" placeholder="Email Address">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="website">Website:</label>
                                        <input type="text" name="website" id="website" class="form-control" value="<?php if(isset($cs_website)){echo $cs_website;}?>" placeholder="Website Url">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="comment">Comment:*</label>
                                        <textarea id="comment" name="comment" cols="30" rows="10" placeholder="Your Comment Should be Here" class="form-control"><?php if(isset($cs_comment)){echo $cs_comment;}?></textarea>
                                    </div>
                                    
                                    <input type="submit" name="submit" class="btn btn-primary" value="Submit Comment">
                                    <?php
                                    if(isset($error_msg)){
                                        echo "<span style='color:red;' class='pull-right'>$error_msg</span>";
                                    }
                                    else if(isset($msg)){
                                        echo "<span style='color:green;' class='pull-right'>$msg</span>";
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
<!--                    </div>-->
				</div>
				<div class="col-md-4">
					<div class="widgets">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search for...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button">Go!</button>
							</span>
						</div><!-- /input-group -->
					</div>
					<!--widgets close-->
					<?php include 'includes/blog-side.php';?>					
				</div>
			</div>
		</div>
	</section>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>

	</script>
</body>

</html>
