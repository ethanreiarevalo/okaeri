<?php
session_start();
include('../connection.php');

if(empty($_SESSION['userID'])){
    echo "<script>window.location.href='../login.php';</script>";
}else{
    $userEmail = $_SESSION['userEmail'];
    $userID = $_SESSION['userID'];
    $userPurchases = $userID.'purchases';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>OKAERI | Track Your Order</title>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section class="container">
        <div class="row">
            <div id="sidenav" class="col-xl-2">
                <a href="trackall.php">
                    <div class="text-center mt-4 py-3">
                        All
                    </div>
                </a>
                <a href="processing.php">
                    <div class="text-center py-3">
                        Processing
                    </div>
                </a>
                <a href="torecieve.php">
                    <div class="text-center py-3">
                        Undelivered
                    </div>
                </a>
                <a href="completed.php">
                    <div class="text-center py-3">
                        Delivered
                    </div>
                </a>
                <a href="cancelled.php">
                    <div class="text-center border-right border-warning py-3">
                        Cancelled
                    </div>
                </a>
            </div>
            <div class="col-xl-10">
                <div id="table">
                    <div class="table table-responsive table-striped mt-4">
                        <table>
                            <tr class="thead-dark text-center">
                                <th>Product Cover</th>
                                <th>Product Name</th>
                                <th>Price</th>
                            </tr>
                            <?php
                                $sql = "SELECT * FROM `$userPurchases` INNER JOIN products ON `$userPurchases`.productID = products.productID where products.productID > 0 and orderStatus = 'Cancelled' order by datePurchase desc";
                                $salesQuery = mysqli_query($connection,$sql);
                                if(empty($salesQuery)){
                                    echo "</table>";
                                    echo "no results found";
                                }else if($salesQuery->num_rows > 0 ){
                                    while($row = $salesQuery->fetch_assoc()){
                                        $userOrderStatus = $userPurchases.'.orderStatus';
                                        $productImage = $row['productImage'];
                                        $productName = $row['productTitle'];
                                        $productPrice = $row['productPrice'];
                                        $productAmount = $row['amount'];
                                        $productTotalPrice = $productPrice * $productAmount;
                                        $productStatus = $row['orderStatus'];
                                        $productID = $row['productID'];
                                        $productSalesID = $row['salesID'];
                                        ?>
                                        <tr>
                                            <td>
                                                <img class="card-img-top" src="../<?php echo $row['productImage']; ?>" alt="">
                                            </td>
                                            <td>
                                                <?php echo $productName; ?>
                                            </td>
                                            <td>
                                                <?php echo $productTotalPrice; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }?>
                                    </table><?php
                                }else{
                                    echo "no results found";
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('script.php');?>
</body>
</html>