<?php
include('../connection.php');
session_start();

$userID = $_SESSION['userID'];
$cartName = $userID."cart";
// $productID = $_SESSION['productID'];
// $itemQuantity = $_SESSION['itemQuantity'];




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>OKAERI | </title>
    <style>
        #checkout{
            position:fixed;
            bottom: 0;
            right:0;
        }
    </style>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section id="tablecart" class="table-responsive">
        <table class="table table-bordered table-striped text-center mt-5">
            <thead class="thead-dark">
                <tr>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <?php
                $totalPrice = 0;
                $cartSql = "SELECT * FROM `$cartName`";
                $cartQuery = mysqli_query($connection,$cartSql);
                if($cartQuery->num_rows > 0 ){
                    while($row = $cartQuery->fetch_assoc()){
                        $productQuantity = $row['amount'];
                        $productID = $row['productID'];
                        $productDetails = "SELECT * FROM products WHERE productID = '$productID'";
                        $productDetailsQuery = mysqli_query($connection,$productDetails);
                        $productRow = mysqli_fetch_array($productDetailsQuery);
                        if($productRow['productID'] == $productID){
                            
                            $productTitle = $productRow['productTitle'];
                            $productImage = $productRow['productImage'];
                            $productPrice = $productRow['productPrice'];
                            $productTPrice = $productQuantity * $productPrice;
                            $totalPrice = $totalPrice + $productTPrice; 
                                // echo $productTitle." ".$productImage." ".$productPrice;
                            ?>
                            <tr>
                                <td>
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    <img src="../<?php echo $productImage;?>" alt="">
                                </td>
                                <td>
                                    <?php echo $productTitle; ?>
                                </td>
                                <td>
                                    <?php echo $productQuantity; ?>
                                    <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                </td>
                                <td>
                                    <?php echo $productTPrice; ?>
                                </td>
                            </tr>
                            <?php  
                        }
                    }
                }
            ?>
            
        </table>
    </section>
    <section id="checkout" class="col-xl-4 position-fixed">
        <div class="jumbotron border border-dark">
            <h5>Total Amount: <span>&#8369;</span><?php echo $totalPrice;?> </h5>
            <hr class="my-4 bg-dark">
            <button class="btn btn-primary" onclick="popup()">Checkout as Debit</button>
            <button class="btn btn-success" onclick="popup_two()">Checkout as COD</button>
        </div>
    </section>

    <!-- DO NOT CHANGE THIS SECTION -->
    <!-- POPUP LOGIN FIRST -->
    <!-- DO NOT CHANGE -->
    <head>
        <style>
            .pop{
                position:fixed;
                width: 100%;
                height: 100vh;
                top: 8%;
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
    <div id="modal1" class="popup">
        <div class="row w-100 justify-content-center">
            <div class="jumbotron bg-dark text-white">
                <div class="cl row justify-content-center bg-warning text-dark text-center" onclick="popup()">x</div>
                <h4>Please Confirm the information below</h4>
                <p for="">Addressed to: </p>
                <p for="">Delivery Address: </p>
                <p for="">Delivered by: Ninja Van</p>
                <div class="container">
                    <div class="row align-content-center">
                        <label for="deliveramount">Delivery Amount:</label>
                        <input type="text" id="deliveramount" class="form-control col-xl-2" disabled value="50">
                    </div>
                </div>
                <div class="container">
                    <div class="row align-content-center">
                        <label for="promo">Delivery Amount:</label>
                        <input type="text" id="promo" class="form-control col-xl-8" placeholder="Enter promo/voucher code">
                    </div>
                </div>
                <hr class="my-2 bg-warning">
                <div class="container">
                    <h6>Please Enter Debit Card Info</h6>
                    <div class="row justify-content-center mb-2">
                        <input type="text" class="form-control col-xl-2 text-center mx-1" placeholder="0000">
                        <span>-</span>
                        <input type="text" class="form-control col-xl-2 text-center mx-1" placeholder="0000">
                        <span>-</span>
                        <input type="text" class="form-control col-xl-2 text-center mx-1" placeholder="0000">
                        <span>-</span>
                        <input type="text" class="form-control col-xl-2 text-center mx-1" placeholder="0000">
                    </div>
                    <div class="row justify-content-center mb-2">
                        <input type="text" class="form-control col-xl-2 text-center mx-1" placeholder="cvv">
                        <input type="text" class="form-control col-xl-2 text-center mx-1" placeholder="Until">
                    </div>
                </div>
                <button class="btn btn-danger w-100">Checkout</button>
            </div>
        </div>
    </div>

    <div id="modal2" class="popup">
        <div class="row w-100 justify-content-center">
            <div class="jumbotron bg-dark text-white">
                <div class="cl row justify-content-center bg-warning text-dark text-center" onclick="popup_two()">x</div>
                <h4>Please Confirm the information below</h4>
                <p for="">Addressed to: </p>
                <p for="">Delivery Address: </p>
                <p for="">Delivered by: Ninja Van</p>
                <div class="container">
                    <div class="row align-content-center">
                        <label for="deliveramount">Delivery Amount:</label>
                        <input type="text" id="deliveramount" class="form-control col-xl-2" disabled value="50">
                    </div>
                </div>
                <div class="container">
                    <div class="row align-content-center">
                        <label for="promo">Delivery Amount:</label>
                        <input type="text" id="promo" class="form-control col-xl-8" placeholder="Enter promo/voucher code">
                    </div>
                </div>
                <hr class="my-2 bg-warning">
                <button class="btn btn-danger w-100">Checkout</button>
            </div>
        </div>
    </div>


    <!-- DO NOT CHANGE THIS -->
    <script>
        var t = document.getElementById("modal1");
        var h = document.getElementById("modal2");
        function popup(){
            if (t.className === "popup"){
                t.className = "pop";
            }
            else{
                t.className = "popup";
            }
        }

        function popup_two(){
            if (h.className === "popup"){
                h.className = "pop";
            }
            else{
                h.className = "popup";
            }
        }
    </script>
    <?php include('script.php');?>
</body>
</html>