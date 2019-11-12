<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to OKAERI!</title>
    <?php include('css.php');?>
    <link rel="stylesheet" href="css/">
    <style>
        html,body{
            overflow-x:hidden;
        }
        a:hover{
            color:#ffc107 !important;
        }
        header{
            border-bottom: 2px solid #ffc107 !important;
        }
        
        
    </style>
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
                    <img class="d-block w-100" src="image/banner1.png" alt="">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="image/banner2.png" alt="">
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
        
        <div class="container mt-3 position-relative">
            <h4>NEW RELEASES</h4>
            <div class="row justify-content-between">
                <a id="npbtn" class="bg-dark col-xl-1 text-center" href="#my-carousel2" data-slide="prev" role="button">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a id="npbtn" class="bg-dark col-xl-1 text-center" href="#my-carousel2" data-slide="next" role="button">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>    
            <div class="row position-relative">
                <div id="my-carousel2" class="carousel slide w-100 col-xl-10" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#my-carousel" data-slide-to="0" aria-current="location"></li>
                        <li data-target="#my-carousel" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container d-flex">
                                <?php
                                include('connection.php');
                                $getItems = "SELECT * FROM products";
                                $result = mysqli_query($connection, $getItems);
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){

                                ?>
                                    <div class="card mx-2 border border-warning">
                                        <img class="card-img-top" src="<?php echo $row['productImage']; ?>" alt="">
                                        <div class="card-body text-center">
                                            <p class="card-title"><?php echo $row['productTitle']; ?></p>
                                            <p class="card-text">Price: <?php echo $row['productPrice'];?></p>
                                            <form action="item.php" method="post">
                                                <input type="hidden" id="productID" name="productID" value="<?php echo$row['productID']; ?>">
                                                <button class="btn btn-warning">Add to cart</button>
                                            </form>
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
                    
                </div>
            </div>
        </div>
    </section>

    <!-- SCRIPT -->
    <?php include('script.php');?>
</body>
</html>