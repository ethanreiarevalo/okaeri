<!-- <?php
    session_start(); 
    include('../connection.php');
    if(isset($_SESSION ["userID"])){
        // $user_id = $_SESSION["userID"];
        // $get_record = mysqli_query($connection, "SELECT * FROM accountdetailstbl WHERE userID= '$user_id'");
        // $row = mysqli_fetch_array($get_record);
        // if($row['userID'] = $user_id){
        //     $db_name = $row ["userFname"];
        //     // $db_email = $row["email"];
        // }     
    }else if(!isset($_SESSION ["userID"])){
        // echo "<script language = 'javascript'>alert('You must login first!')</script>";
        echo "<script>window.location.href='../index.php';</script>";   
    }
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>Welcome to OKAERI</title>
</head>
<body>
    <header>
        <?php include('nav.php');?>
        <div id="my-carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li class="active" data-target="#my-carousel" data-slide-to="0" aria-current="location"></li>
                <li data-target="#my-carousel" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../image/banner1.png" alt="">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../image/banner2.png" alt="">
                </div>
            </div>
            <a class="carousel-control-prev" href="#my-carousel" data-slide="prev" role="button">
                <span class="carousel-control-prev-icon bg-dark p-3" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#my-carousel" data-slide="next" role="button">
                <span class="carousel-control-next-icon bg-dark p-3" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>
    <section id="newrelease">
        <div class="row">
            
            <div id="my-carousel2" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li class="active" data-target="#my-carousel" data-slide-to="0" aria-current="location"></li>
                    <li data-target="#my-carousel" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container d-flex">
                            <?php
                            include('../connection.php');
                            $getItems = "SELECT * FROM products";
                            $result = mysqli_query($connection, $getItems);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){

                            ?>
                            <div class="card">
                                <img class="card-img-top" src="../<?php echo $row['productImage']; ?>" alt="">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $row['productTitle']; ?></h5>
                                    <p class="card-text">Price: <?php echo $row['productPrice'];?></p>
                                </div> 
                            </div>
                            <?php 
                                }}
                            ?>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container d-flex">
                        <div class="card">
                            <img class="card-img-top" src="product_image/saintyoungmen.jpg" alt="">
                            <div class="card-body text-center">
                                <h5 class="card-title">Komi-San</h5>
                                <p class="card-text">Price: 100</p>
                            </div> 
                        </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#my-carousel2" data-slide="prev" role="button">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#my-carousel2" data-slide="next" role="button">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            
        </div>
    </section>
    <!-- SCRIPT -->
    <?php include('script.php');?>
</body>
</html>