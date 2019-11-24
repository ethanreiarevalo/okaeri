<!-- Item description and add to cart page here -->
<?php
    include('connection.php');
    
    $productID = $_POST['productID'];
    $sql = mysqli_query($connection, "SELECT * FROM products where productID = '$productID'");
    $row = mysqli_fetch_array($sql);
    if($row['productID'] == $productID){
        $productTitle = $row['productTitle'];
        $productAuthor = $row['productAuthor'];
        $productPublisher = $row['productPublisher'];
        $productType = $row['productType'];
        $productLanguage = $row['productLanguage'];
        $productDatePublished = $row['productDatePublished'];
        $productGenre = $row['productGenre'];
        $productImage = $row['productImage'];
        $productStock = $row['productStock'];
        $productPrice = $row['productPrice'];
        $productDescription = $row['productDescription'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title><?php echo $productTitle; ?></title>
    <style>
        html,body{
            overflow-x: hidden;
        }
        a:hover{
            color:#ffc107 !important;
        }
    </style>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section>
        <div class="row">
            <div class="container col-xl-1 mt-5">
                <center>
                    <img src="<?php echo $productImage; ?>" alt="">
                </center>
            </div>
            <div class="container col-xl-8">
                <div class="jumbotron bg-transparent">
                    <h1 class="display-4"><?php echo $productTitle; ?></h1>
                    <p class="lead">Type: <?php echo $productType; ?></p>
                    <p class="lead">Genre: <?php echo $productGenre; ?></p>
                    <hr class="my-4">
                    <p>ITEM SUMMARY </br> <?php echo $productDescription;?></p>
                    <b>Stock Available: <label id="p_stock" for=""><?php echo $productStock; ?></label></b>
                    <b><label id="outofstock" class="text-danger" for=""></label></b>
                    <hr class="my-4">
                    <div id="quantity-btn" class="row">
                        <div class="col-xl-5 d-flex">
                            <button id="minus-button" class="btn btn-danger mx-1" onclick="minusValue()">-</button>
                            <input type="text" class="form-control mx-1" id="integer_value">
                            <button id="plus-button" class="btn btn-primary mx-1" onclick="plusValue()">+</button>
                        </div>
                        <button id="button" class="btn btn-warning col-xl-2" onclick="popup()">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        var pstock = document.getElementById("p_stock").textContent;
        var intstock = parseInt(pstock);
        if(intstock < 1){
            document.getElementById("p_stock").style.display = "none";
            document.getElementById("outofstock").textContent = "Out of Stock"
            document.getElementById("quantity-btn").style.display = "none";
        }
    </script>
    <!-- DO NOT CHANGE THIS SECTION -->
    <!-- POPUP LOGIN FIRST -->
    <!-- DO NOT CHANGE -->
    <head>
        <style>
            .pop{
                position:fixed;
                width: 100%;
                height: 100vh;
                top: 23%;
            }
            .popup{
                display:none;
            }
            #modal img{
                width:100px;
                height:150px;
            }
            .cl{
                height: 20px;
                width: 20px;
                border-radius: 50%;
                cursor: pointer;
            }
        </style>
    </head>
    <div id="modal" class="popup">
        <div class="row w-100 justify-content-center">
            <div class="jumbotron bg-dark text-center">
                <div class="cl row justify-content-center bg-warning text-dark text-center" onclick="popup()">x</div>
                <img src="image/popup-image.png" alt="">
                <p class="lead text-white">You must login first!</p>
            </div>
        </div>
    </div>


    <!-- SCRIPT FOR THE INPUT BUTTON -->
    <!-- DO NOT CHANGE -->
    <script>
        var currentVal = document.getElementById("integer_value").value = "0";

        function plusValue(){
            var getValue = parseInt(document.getElementById("integer_value").value);
            var newValue = getValue + 1;
            document.getElementById("integer_value").value = newValue;
        }

        function minusValue(){
            var getValue = parseInt(document.getElementById("integer_value").value);
            var newValue = getValue - 1;
            document.getElementById("integer_value").value = newValue;

            var checknegative = document.getElementById("integer_value").value;

            if(checknegative < 0){
                document.getElementById("integer_value").value = 0;
            }
        }

        var t = document.getElementById("modal");

        function popup(){
            if (t.className === "popup"){
                t.className = "pop";
            }
            else{
                t.className = "popup";
            }
        }
    </script>
    <?php include('script.php');?>
</body>
</html>