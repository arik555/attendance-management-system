<!--popular posts-->
                    <div class="widgets">
                        <div class="popular">
                            <h4>Popular Posts</h4>
                             <?php 
                            $p_query = "SELECT * FROM posts WHERE status = 'publish' ORDER BY views DESC LIMIT 4";
                            $p_run = mysqli_query($db,$p_query);
                            if(mysqli_num_rows($p_run) > 0){
                                while($p_row = mysqli_fetch_array($p_run)){
                                    $p_id = $p_row['id'];
                                    $p_date = getdate($p_row['date']);
                                    $p_day = $p_date['mday'];
                                    $p_month = $p_date['month'];
                                    $p_year = $p_date['year'];
                                    $p_title = $p_row['title'];
                                    $p_image = $p_row['image'];
                            ?>
                            <hr>
                            <div class="row">
                                <div class="col-4">
									<a href="Homee.php?post_id=<?php echo $p_id;?>"><img src="img/<?php echo $p_image;?>" alt=""></a>
                                </div>
                                <div class="col-8 details">
									<a href="Homee.php?post_id=<?php echo $p_id;?>"><h5><?php echo $p_title;?></h5></a>
                                    <p><i class="fa fa-clock-o"></i> <?php echo "$p_day $p_month $p_year";?></p>
                                </div>
                            </div>
                                <?php
                                 }
                            }
                            else{
                                echo "<h3>No Post Available</h3>";
                            }
                            ?>
                            
                         </div>
                    </div>
                    <!--Recent posts-->
                    <div class="widgets">
                        <div class="popular">
                            <h4>Recent Posts</h4>
                             <?php 
                            $p_query = "SELECT * FROM posts WHERE status = 'publish' ORDER BY id DESC LIMIT 5";
                            $p_run = mysqli_query($db,$p_query);
                            if(mysqli_num_rows($p_run) > 0){
                                while($p_row = mysqli_fetch_array($p_run)){
                                    $p_id = $p_row['id'];
                                    $p_date = getdate($p_row['date']);
                                    $p_day = $p_date['mday'];
                                    $p_month = $p_date['month'];
                                    $p_year = $p_date['year'];
                                    $p_title = $p_row['title'];
                                    $p_image = $p_row['image'];
                            ?>
                            <hr>
                                       <div class="row">
                                <div class="col-4">
                                    <img src="img/<?php echo $p_image;?>" alt="">
                                </div>
                                <div class="col-8 details">
                                    <h5><?php echo $p_title;?></h5>
                                    <p><i class="fa fa-clock-o"></i><?php echo "$p_day $p_month $p_year";?></p>
                                </div>
                            </div>
                      <?php
                                }
                            }
                            else{
                                echo "<h3>No Post Available</h3>";
                            }
                            ?>
                        </div>
                    </div>
                    <!--popular posts-->
                    <div class="widgets">
                        <div class="popular">
                            <h4>Categories</h4>
                            <hr>
                            <div class="row">
                                <div class="col-6">

                                    <?php
                                    $c_query = "SELECT * FROM categories";
                                    $c_run = mysqli_query($db,$c_query);
                                    if(mysqli_num_rows($c_run) > 0){
                                        $count = 2;
                                        while($c_row = mysqli_fetch_array($c_run)){
                                            $c_id = $c_row['id'];
                                            $c_category = $c_row['category'];
                                            $count = $count + 1;
                                            
                                            if(($count % 2) == 1){
                                                echo "<li><a href='home.php?cat=".$c_id."'>".(ucfirst($c_category))."</a></li>";
                                            }
                                            
                                        }
                                    }
                                    else{
                                        echo "<p>No Category</p>";
                                    }
                                    ?>
                                </div>
                                <div class="col-6">
                                    <?php
                                    $c_query = "SELECT * FROM categories";
                                    $c_run = mysqli_query($db,$c_query);
                                    if(mysqli_num_rows($c_run) > 0){
                                        $count = 2;
                                        while($c_row = mysqli_fetch_array($c_run)){
                                            $c_id = $c_row['id'];
                                            $c_category = $c_row['category'];
                                            $count = $count + 1;
                                            
                                            if(($count % 2) == 0){
                                                echo "<li><a href='home.php?cat=".$c_id."'>".(ucfirst($c_category))."</a></li>";
                                            }
                                            
                                        }
                                    }
                                    else{
                                        echo "<p>No Category</p>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    