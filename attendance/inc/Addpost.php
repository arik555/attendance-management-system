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

    <div id="mySidenav" class="sidenav mt-0">
        <ul class="list-group active">
            <li class=" active list-group-item d-flex justify-content-between align-items-center">
                <span class="clpsebtn badge badge-primary badge-pill"></span>

                <div class="container ">
                    <div class="row ">
                        <div class="col-xs-12">
                            <img src="img/logo.jpg">
                        </div>


                    </div>

                    <div class="row">

                        <div class="col-xs-12">
                            <h5>Welcome | <span>dimentionDx</span></h5>
                        </div>

                    </div>

                </div>

            </li>


            <li class="  list-group-item d-flex justify-content-between align-items-center">
                <a href="#"><i class="fas fa-home"></i> Home</a>
                <span class="badge badge-primary badge-pill">12</span>
            </li>



            <li class="  list-group-item d-flex justify-content-between align-items-center">
                <a href="#"><i class="fas fa-clipboard"></i> Attaindance</a>
                <span class="badge badge-primary badge-pill">12</span>
            </li>



            <li class="  list-group-item d-flex justify-content-between align-items-center">
                <a href="#"><i class="fas fa-rss-square"></i> Blog</a>
                <span class="badge badge-primary badge-pill">12</span>
            </li>



            <li class="  list-group-item d-flex justify-content-between align-items-center">
                <a href="#"><i class="fas fa-flag-checkered"></i> Notice</a>
                <span class="badge badge-primary badge-pill">12</span>
            </li>


            <li class="  list-group-item d-flex justify-content-between align-items-center">
                <a href="#"><i class="fas fa-question-circle"></i> Quiz</a>
                <span class="badge badge-primary badge-pill">12</span>
            </li>
            <li class="  list-group-item d-flex justify-content-between align-items-center">
                <a href="#"><i class="fas fa-question-circle"></i> xyz</a>
                <span class="badge badge-primary badge-pill">12</span>
            </li>
            <li class="  list-group-item d-flex justify-content-between align-items-center">
                <a href="#"><i class="fas fa-question-circle"></i> xyz</a>
                <span class="badge badge-primary badge-pill">12</span>
            </li>


        </ul>
    </div>
    <hr>



    <div class="container-fluid header " style="background: #ffffff;">

        <div class="row">
            <div class="col-6 d-flex">
                <span style="font-size:22px;cursor:pointer;padding-left: 15px; color: #487996 ;line-height: 75px" onclick="openNav()">&#9776; </span>
                <h5 style="line-height: 75px; font-style: bold; font-family: 'Oswald', sans-serif;     font-size: 1.25rem !important; padding-left: 8px; color:#296CC0;">MY SIEM </h5>
            </div>
            <div class="col-3 d-flex"></div>
            <div class="col-3 d-flex controls">
                <h5 style="line-height: 84px; color: #487996; padding-right: 6px"><i class="fas fa-user-cog"></i></h5>
                <h5><i style=" line-height: 84px; color: #487996;" class="fas fa-power-off"></i></h5>
            </div>
        </div>
    </div>
    <style>
        .home h1 {
            color: #296CC0;
            font-size: 30px;
        }
     

    </style>


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
                    
                   <a style="color: #000000 !important; te"   class="text-white" href="all-post.html"><li class="list-group-item"> <i class="fa fa-file-text"></i> All Posts</li></a> 
                   
                    <a style="color: #000000 !important; te"   class="text-white" href="media.html"><li class="list-group-item"> <i class="fa fa-file-text"></i> Media</li></a>
                    
                    <a style="color: #000000 !important; te"   class="text-white" href="comments.html"><li class="list-group-item"> <span class='badge'></span><i class="fa fa-comment"></i> Comments<span class="badge badge-primary badge-pill pull-right">14</span> </li></a>
                    
                    
                    <a style="color: #000000 !important; te"   class="text-white" href="categories.html"><li class="list-group-item"> <i class="fa fa-folder-open"></i> Categories</li></a>
                    
                    <a style="color: #000000 !important; te"   class="text-white" href="users.html"><li class="list-group-item"> <i class="fa fa-folder-open"></i> <i class="fa fa-users"></i> Users</li></a>

                </ul>
            </div>

            <div class="col-md-9 mt-3">
                <h3 style="color: #007BFF"><i class="fa fa-plus-square"></i> Add New Post</h3>
                <hr>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title:*</label>

                        <input type="text" name="title" placeholder="Type Post Title Here" value="" class="form-control">
                    </div>

                    <div class="form-group">
                        <a href="" class="btn btn-primary">Add Media</a>
                    </div>

                    <div class="form-group">
                        <textarea name="post-data" id="textarea" rows="10" class="form-control"></textarea>

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
                                    <option>Science and Tech</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tags">Tags:*</label>
                                <input type="text" name="tags" placeholder="Your Tags Here" value="" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="status">Status:*</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="publish">Publish</option>
                                    <option> draft </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Add Post" name="submit">
                </form>
            </div>



        </div>
    </div>










    <footer class="mt-3">

        <h5>All rights reserved 2019, SIEM SILIGURI.</h5>
    </footer>

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
