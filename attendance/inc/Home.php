<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Charm:700" rel="stylesheet">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>HOME </title>

    <!-- Bootstrap -->
    <link rel="icon" type="image/png" href="img/logo.jpg">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css'>

    <link href="css/bootstrap.min.css" rel="stylesheet">
   
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <?php require 'server.php'; ?>
    <div class="container-fluid app-name ">

        <h4>Siem Siliguri</h4>
        <hr>

    </div>


    <div class="container blog-navigation" id="navbar">
        <nav class="navbar navbar-expand-lg navbar-light" >
            <a class="navbar-brand" href="#"><img class="app-logo" src="img/logo.jpg"> News Today </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"> </span>
            </button>
            <div class="collapse navbar-collapse justify-content-end " id="navbarNavDropdown">
                <ul class="navbar-nav  ">
                    <li class="nav-item ">
                        <a class="nav-link" href="Home.php">Department News <span class="sr-only">(current)</span></a>
                    </li>
<?php 
if(!isset($_SESSION['uid'])) { ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="SignIn.php">LogIn <span class="sr-only">(current)</span></a>
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
                    <img src="img/1.jpg">
                    <div class="carousel-caption">
                        <h3>SIEM IN NEWS</h3>
                        <p>Sucessful implementation X-RAW PROGRAMME</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/2.jpg">
                    <div class="carousel-caption">
                        <h3>STUDENTS TODAY</h3>
                        <p>Participate in E-summet 2019</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/3.jpg">
                    <div class="carousel-caption">
                        <h3>INSPIRE WORKS</h3>
                        <p>We love the Big Apple!</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .notice {
            margin-top: 30px;
            height: 40px;
            background-color: brown;
            color: #ffffff;
        }

        .notice h5 {
            line-height: 36px;
        }


    </style>

    <div class="container notice mb-3">
        <div class="row">
            <div class="col-3">
                <h5>Notice</h5>
            </div>
            <div class="col-8">
                <marquee direction="left">
                    <h5>Notice</h5>
                </marquee>
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
                                <div class="day">02</div>
                                <div class="month">April</div>
                                <div class="year">2019</div>
                            </div>
                            <div class="col-md-8 post-title">
                                <a href="#">
                                    <h2>This is post title</h2>
                                </a>
                                <p>Written by: <span>dimenionDx</span></p>
                            </div>
                            <div class="col-md-2 profile-picture">
                                <img src="img/logo.jpg" alt="profiloe pic">
                            </div>

                        </div>
                        <a href=""><img src="img/3.jpg" alt="post pic" style="width: 100%; overflow: hidden; background: cover;"></a>
                        <p class="desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <a href="" class="btn btn-primary">Read more...</a>
                        <div class="bottom">
                            <span class="first"><a href="" style="color:#7d7a7a !important;"><i class="fa fa-folder"> Category</i></a></span>
                            <span class="second"><a href="" style="color:#7d7a7a !important;"><i class="fa fa-comment"> Comment</i></a></span>
                        </div>
                    </div>
                    <div class="post">
                        <div class="row">
                            <div class="col-md-2 post-date">
                                <div class="day">02</div>
                                <div class="month">April</div>
                                <div class="year">2019</div>
                            </div>
                            <div class="col-md-8 post-title">
                                <a href="#">
                                    <h2>This is post title</h2>
                                </a>
                                <p>Written by: <span>dimenionDx</span></p>
                            </div>
                            <div class="col-md-2 profile-picture">
                                <img src="img/logo.jpg" alt="profiloe pic">
                            </div>

                        </div>
                        <a href=""><img src="img/3.jpg" alt="post pic" style="width: 100%; overflow: hidden; background: cover;"></a>
                        <p class="desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <a href="" class="btn btn-primary">Read more...</a>
                        <div class="bottom">
                            <span class="first"><a href="" style="color:#7d7a7a !important;"><i class="fa fa-folder"> Category</i></a></span>
                            <span class="second"><a href="" style="color:#7d7a7a !important;"><i class="fa fa-comment"> Comment</i></a></span>
                        </div>
                    </div>
                    <div class="post">
                        <div class="row">
                            <div class="col-md-2 post-date">
                                <div class="day">02</div>
                                <div class="month">April</div>
                                <div class="year">2019</div>
                            </div>
                            <div class="col-md-8 post-title">
                                <a href="#">
                                    <h2>This is post title</h2>
                                </a>
                                <p>Written by: <span>dimenionDx</span></p>
                            </div>
                            <div class="col-md-2 profile-picture">
                                <img src="img/logo.jpg" alt="profiloe pic">
                            </div>

                        </div>
                        <a href=""><img src="img/3.jpg" alt="post pic" style="width: 100%; overflow: hidden; background: cover;"></a>
                        <p class="desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <a href="" class="btn btn-primary">Read more...</a>
                        <div class="bottom">
                            <span class="first"><a href="" style="color:#7d7a7a !important;"><i class="fa fa-folder"> Category</i></a></span>
                            <span class="second"><a href="" style="color:#7d7a7a !important;"><i class="fa fa-comment"> Comment</i></a></span>
                        </div>
                    </div>

                    <center>
                        <nav id="pagination" style="display: flex; justify-content: center">
                            <ul class="pagination pagination-sm">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class=""><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </center>
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

                    <div class="widgets">
                        <div class="popular">
                            <h4>Popular Posts</h4>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <img src="img/1.jpg" alt="">
                                </div>
                                <div class="col-8 details">
                                    <h5>This is heading </h5>
                                    <p><i class="fa fa-clock-o"></i> 25 April 2019</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <img src="img/1.jpg" alt="">
                                </div>
                                <div class="col-8 details">
                                    <h5>This is heading </h5>
                                    <p><i class="fa fa-clock-o"></i> 25 April 2019</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <img src="img/1.jpg" alt="">
                                </div>
                                <div class="col-8 details">
                                    <h5>This is heading </h5>
                                    <p><i class="fa fa-clock-o"></i> 25 April 2019</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <img src="img/1.jpg" alt="">
                                </div>
                                <div class="col-8 details">
                                    <h5>This is heading </h5>
                                    <p><i class="fa fa-clock-o"></i> 25 April 2019</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="widgets">
                        <div class="popular">
                            <h4>Recent Posts</h4>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <img src="img/1.jpg" alt="">
                                </div>
                                <div class="col-8 details">
                                    <h5>This is heading </h5>
                                    <p><i class="fa fa-clock-o"></i> 25 April 2019</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <img src="img/1.jpg" alt="">
                                </div>
                                <div class="col-8 details">
                                    <h5>This is heading </h5>
                                    <p><i class="fa fa-clock-o"></i> 25 April 2019</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <img src="img/1.jpg" alt="">
                                </div>
                                <div class="col-8 details">
                                    <h5>This is heading </h5>
                                    <p><i class="fa fa-clock-o"></i> 25 April 2019</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <img src="img/1.jpg" alt="">
                                </div>
                                <div class="col-8 details">
                                    <h5>This is heading </h5>
                                    <p><i class="fa fa-clock-o"></i> 25 April 2019</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widgets">
                        <div class="popular">
                            <h4>Categories</h4>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <li> <a href="">Science</a></li>
                                    <li> <a href="">Technology</a></li>
                                    <li> <a href="">Education</a></li>
                                    <li> <a href="">Music</a></li>
                                </div>
                                <div class="col-6">
                                    <li> <a href="">Gaming</a></li>
                                    <li> <a href="">Sports</a></li>
                                    <li> <a href="">Health</a></li>
                                    <li> <a href="">General Blog</a></li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <footer class="mt-3">

        <h5>All rights reserved 2019, SIEM SILIGURI.</h5>
    </footer>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>

    </script>
</body>

</html>
