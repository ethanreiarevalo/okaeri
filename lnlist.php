<!-- LN LIST WHEN MANGA LINK IS CLICKED -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>OKAERI | Manga List</title>
    <style>
        html,body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section class="row">
        <div id="options" class="col-xl-3">
            <div class="jumbotron bg-transparent">
                <h3>Light Novel List</h3>
                <p class="mb-3">Sort By:</p>
                <form action="" method="">
                    <h5>Language</h5>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="All" name="example1" value="All">
                      <label class="custom-control-label" for="All">All</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="Japanese" name="example1" value="Japanese">
                      <label class="custom-control-label" for="Japanese">Japanese</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="English" name="example1" value="English">
                      <label class="custom-control-label" for="English">English</label>
                    </div>
                    <hr class="my-3 bg-warning">
                    <h5>Genre</h5>
                    <div class="container custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="genre[]" id="action">
                      <label class="custom-control-label float-left" for="action">Action</label>
                    </div>
                    <div class="container custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="genre[]" id="horror">
                      <label class="custom-control-label float-left" for="horror">Horror</label>
                    </div>
                    <div class="container custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="genre[]" id="fantasy">
                      <label class="custom-control-label float-left" for="fantasy">Fantasy</label>
                    </div>
                    <button class="btn btn-success mt-3 w-100">Sort</button>
                </form>
            </div>
        </div>

        <div id="card" class="col-xl-9 mt-5 overflow-hidden">
            <div class="container">
                <div class="row justify-content-center">
                <?php
                    include('connection.php');
                    $getItems = "SELECT * FROM products where productType = 'Light Novel' order by productDateReceived desc";
                    $result = mysqli_query($connection, $getItems);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                    ?>
                        <div class="card col-lg-2 col-md-3 m-3 shadow border border-warning p-0">
                            <img class="card-img-top" src="<?php echo $row['productImage']; ?>" alt="">
                            <div class="card-body text-center">
                            <h6 class="card-title" style= "height: 17vh;"><?php echo $row['productTitle']; ?></h6>
                                <p class="card-text text-danger font-weight-bold">Price: ₱<?php echo $row['productPrice'];?></p>
                                <form action="item.php" method="post">
                                    <input type="hidden" id="productID" name="productID" value="<?php echo$row['productID']; ?>">
                                    <button class="btn btn-success">Add to cart</button>
                                </form>
                            </div> 
                        </div>
                    <?php 
                        }}
                    ?> 
                </div>
            </div>
        </div>
    </section>
    
    <?php include('script.php');?>
</body>
</html>