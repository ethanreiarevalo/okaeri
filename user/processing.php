<?php
session_start();
include('../connection.php');
$userEmail = $_SESSION['userEmail'];
$userID = $_SESSION['userID'];
$userPurchases = $userID.'purchases';
//cancel order
if($_SERVER ["REQUEST_METHOD"] == "POST"){
    $productID = $_POST['productID'];
    $productSalesID = $_POST['productSalesID'];
    $productTotalPrice = $_POST['productTotalPrice'];
    $updateUserPurchase = mysqli_query($connection, "UPDATE `$userPurchases` set orderStatus = 'Cancelled' where productID = '$productID' and salesID = '$productSalesID'");
    $updateSales = mysqli_query($connection, "UPDATE sales set amount = amount - '$productTotalPrice' where salesID = '$productSalesID'");
    $selectSales = "SELECT * FROM sales where salesID = '$productSalesID'";
    $result = mysqli_query($connection,$selectSales);
    $row = mysqli_fetch_array($result);
    if($row['amount']==50){
        $updateSales = mysqli_query($connection, "UPDATE sales set amount = 0, deliveryStatus = 'Cancelled' where salesID = '$productSalesID'");
    }
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
                    <div class="text-center border-right border-warning py-3">
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
                    <div class="text-center py-3">
                        Cancelled
                    </div>
                </a>
            </div>
            <div class="col-xl-10">
                <div id="table">
                    <div class="table table-responsive table-striped  mt-4">
                        <table>
                            <tr class="thead-dark text-center">
                                <th>Product Cover</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Cancel</th>
                            </tr>
                            <?php
                                $sql = "SELECT * FROM `$userPurchases` INNER JOIN products ON `$userPurchases`.productID = products.productID where products.productID > 0 AND orderStatus = 'Undelivered' AND datePurchase <= CURDATE() order by datePurchase desc";
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
                                            <td>
                                                <form auto-complete= "off" action="<?php htmlspecialchars("PHP_SELF"); ?>" method="post"> 
                                                    <input type="hidden" id="productID" name="productID" value="<?php echo $productID; ?>">
                                                    <input type="hidden" id="productSalesID" name="productSalesID" value="<?php echo $productSalesID; ?>">
                                                    <input type="hidden" id="productTotalPrice" name="productTotalPrice" value="<?php echo $productTotalPrice; ?>">
                                                    <button class="btn btn-danger">Cancel Order</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }?>
                                    </table><?php
                                }else{
                                    echo "no results found";
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('script.php');?>
</body>
</html>