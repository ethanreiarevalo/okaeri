<?php
session_start();
include('../connection.php');

if(empty($_SESSION['userID'])){
    echo "<script>window.location.href='../login.php';</script>";
}else{
    if($_SERVER ["REQUEST_METHOD"] == "POST"){
        $voucherCode = $_POST['voucher'];
        $voucherName = $_POST['voucher_name'];
        $voucherAmount = $_POST['voucher_amount'];
        $voucherDiscount = $_POST['voucher_discount'];

        

        $addVoucher = mysqli_query($connection, "INSERT INTO vouchers VALUES ('$voucherCode', '$voucherName', '$voucherAmount')");
            
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
    <title>OKAERI | Vouchers and Promos</title>
    <style>
        html, body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
    <header>
        <?php include('nav.php')?>
    </header>
    <section class="row">
        <div class="container">
            <div class="jumbotron bg-transparent">
                <h1 class="display-4">Add new Vouchers and Promos</h1>
                <hr class="my-4">
                <div class="row justify-content-center">
                    <form class="col-xl-4 m-1" action="<?php htmlspecialchars("PHP_SELF"); ?>" method="post">
                        <input type="text" id="voucher_name" class="form-control text-center my-1" name="voucher_name" placeholder="Enter Voucher Name">
                        <input type="text" id="voucher_amount" class="form-control text-center my-1" name="voucher_amount" placeholder="Enter Amount of voucher">
                        <input type="text" id="voucher_discount" class="form-control text-center my-1" name="voucher_discount" placeholder="Enter Discount of voucher">
                        <input type="text" id="voucher_input" class="form-control text-center" name="voucher" placeholder="Click Generate to get random voucher code.">
                        <div class="container mt-2 text-center">
                            <input type="button" placeholder="generate" onclick = "g()" value="Generate" class="btn btn-primary" name="generate">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </form>
                    <div clas="table table-responsive m-1" id="table">
                        <table class="table table-bordered table-responsive text-center">
                            <tr class="thead-dark">
                                <th>
                                    Voucher Code
                                </th>
                                <th>
                                    Voucher Name
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Discount
                                </th>
                            </tr>
                            <?php
                                $vouchersSql = "SELECT * FROM vouchers";
                                $salesQuery = mysqli_query($connection,$vouchersSql);
                                if($salesQuery->num_rows > 0 ){
                                    while($row = $salesQuery->fetch_assoc()){
                                        $salesID = $row['voucherID'];
                                        $salesAmount = $row['voucherName'];
                                        $salesDate = $row['voucherAmount'];
                                        $voucherDiscount = $row['voucherDiscount'];

                            ?>
                            <tr>
                                <td>
                                    <?php echo $salesID; ?>
                                </td>
                                <td>
                                    <?php echo $salesAmount; ?>
                                </td>
                                <td>
                                    <?php echo $salesDate; ?>
                                </td>
                                <td>
                                    <?php echo $voucherDiscount; ?>
                                </td>
                            </tr>
                            <?php
                                    }
                                }else{
                                    echo 'no vouchers yet';
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function g(){
            var val = Math.floor(1000 + Math.random() * 9000);
            document.getElementById("voucher_input").value =val;
            // alert(val);
        }
    
    </script>
    <?php include('script.php');?>
</body>
</html>