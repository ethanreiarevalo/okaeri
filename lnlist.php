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
                
            </div>
        </div>
        <div id="card" class="mt-5">
            <div class="row justify-content-center">
            <?php
                include('connection.php');
                $getItems = "SELECT * FROM products where productType = 'Light Nove' order by productDateReceived desc";
                $result = mysqli_query($connection, $getItems);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                ?>
                    <div class="card m-3 border border-warning" style="width:220px; height:500px;">
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
    </section>
    <?php include('script.php');?>
</body>
</html>