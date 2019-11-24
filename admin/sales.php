<?php
session_start();
include('../connection.php');

if(empty($_SESSION['userID'])){
    echo "<script>window.location.href='../login.php';</script>";
}else{
//getting monthly sales
    $startMonth = date('Y-m').'-1';
    $endMonth = date('Y-m').'-31';
    $monthlySql = "SELECT SUM(amount) as SumAmount FROM sales Where salesDate BETWEEN '$startMonth' and '$endMonth'";
    $monthlyResult = mysqli_query($connection,$monthlySql);
    $monthlyRow = mysqli_fetch_array($monthlyResult);
    if(!empty($monthlyRow['SumAmount'])){
        $MonthlySales = $monthlyRow['SumAmount'];
    }else{
        $MonthlySales = 0;
    }

    //getting weekly sales
    $day = date('w'); // exports the number of the day of the week i.e. 6 = saturday, 0 = sunday    
    $startWeek = date('Y-m-d', strtotime('-'.$day.' days'));
    $endWeek = date('Y-m-d', strtotime('+'.(6-$day).' days'));
    $weeklySql = "SELECT SUM(amount) as SumAmount FROM sales Where salesDate BETWEEN '$startWeek' and '$endWeek'";
    $weeklyResult = mysqli_query($connection,$weeklySql);
    $weeklyRow = mysqli_fetch_array($weeklyResult);
    if(!empty($weeklyRow['SumAmount'])){
        $WeeklySales = $weeklyRow['SumAmount'];
    }else{
        $WeeklySales = 0;
    }

    //getting daily sales
    $dateToday = date('Y-m-d');
    $dailySql = "SELECT SUM(amount) as SumAmount FROM sales Where salesDate = '$dateToday'";
    $dailyResult = mysqli_query($connection,$dailySql);
    $dailyRow = mysqli_fetch_array($dailyResult);
    if(!empty($dailyRow['SumAmount'])){
        $DailySales = $dailyRow['SumAmount'];
    }else{
        $DailySales = 0;
    }

    //check post method
    if($_SERVER ["REQUEST_METHOD"] == "POST"){
        $SelectedMonth = $_POST['month'];
        if($SelectedMonth=='All'){
            $salesSql = "SELECT * FROM sales";
            echo "i have value";
        }else if($SelectedMonth=='January'){
            $startMonth = date('Y').'-1-1';
            $endMonth = date('Y').'-1-31';
            $salesSql = "SELECT * FROM sales Where salesDate BETWEEN '$startMonth' and '$endMonth'";
    
        }else if($SelectedMonth=='February'){
            $startMonth = date('Y').'-2-1';
            $endMonth = date('Y').'-2-31';
            $salesSql = "SELECT * FROM sales Where salesDate BETWEEN '$startMonth' and '$endMonth'";
    
        }else if($SelectedMonth=='March'){
            $startMonth = date('Y').'-3-1';
            $endMonth = date('Y').'-3-31';
            $salesSql = "SELECT * FROM sales Where salesDate BETWEEN '$startMonth' and '$endMonth'";
    
        }else if($SelectedMonth=='April'){
            $startMonth = date('Y').'-4-1';
            $endMonth = date('Y').'-4-31';
            $salesSql = "SELECT * FROM sales Where salesDate BETWEEN '$startMonth' and '$endMonth'";
    
        }else if($SelectedMonth=='May'){
            $startMonth = date('Y').'-5-1';
            $endMonth = date('Y').'-5-31';
            $salesSql = "SELECT * FROM sales Where salesDate BETWEEN '$startMonth' and '$endMonth'";
    
        }else if($SelectedMonth=='June'){
            $startMonth = date('Y').'-6-1';
            $endMonth = date('Y').'-6-31';
            $salesSql = "SELECT * FROM sales Where salesDate BETWEEN '$startMonth' and '$endMonth'";
    
        }else if($SelectedMonth=='July'){
            $startMonth = date('Y').'-7-1';
            $endMonth = date('Y').'-7-31';
            $salesSql = "SELECT * FROM sales Where salesDate BETWEEN '$startMonth' and '$endMonth'";
    
        }else if($SelectedMonth=='August'){
            $startMonth = date('Y').'-8-1';
            $endMonth = date('Y').'-8-31';
            $salesSql = "SELECT * FROM sales Where salesDate BETWEEN '$startMonth' and '$endMonth'";
    
        }else if($SelectedMonth=='September'){
            $startMonth = date('Y').'-9-1';
            $endMonth = date('Y').'-9-31';
            $salesSql = "SELECT * FROM sales Where salesDate BETWEEN '$startMonth' and '$endMonth'";
    
        }else if($SelectedMonth=='October'){
            $startMonth = date('Y').'-10-1';
            $endMonth = date('Y').'-10-31';
            $salesSql = "SELECT * FROM sales Where salesDate BETWEEN '$startMonth' and '$endMonth'";
    
        }else if($SelectedMonth=='November'){
            $startMonth = date('Y').'-11-1';
            $endMonth = date('Y').'-11-31';
            $salesSql = "SELECT * FROM sales Where salesDate BETWEEN '$startMonth' and '$endMonth'";
    
        }else if($SelectedMonth=='December'){
            $startMonth = date('Y').'-12-1';
            $endMonth = date('Y').'-12-31';
            $salesSql = "SELECT * FROM sales Where salesDate BETWEEN '$startMonth' and '$endMonth'";
    
        }
    }else{
        $salesSql = "SELECT * FROM sales";
        $SelectedMonth = "All";
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
    <title>Manage Sales</title>
    <style>
        @media only screen and (max-width: 480px){
            #option{
            display: block !important;
            margin: 6%;
        }
        }
    </style>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section class="container">
        <div class="mt-5">
            <h5>Total Sales</h5>
            <p class="lead">This Month: <?php echo $MonthlySales; ?></p>
            <p class="lead">This Week: <?php echo $WeeklySales; ?></p>
            <p class="lead">Today: <?php echo $DailySales; ?></p>
        </div>
        <div id="option" class="row justify-content-between">
            <p>Total Sales for month of <?php echo $SelectedMonth; ?>: </p>
            <form action="<?php htmlspecialchars("PHP_SELF"); ?>" method="post"> 
                <div class="input-group w-100 d-flex mb-1">
                    <select class="custom-select w-25" id="inputGroupSelect01" name="month">
                      <option value="All">All</option>
                      <option value="January">January</option>
                      <option value="February">February</option>
                      <option value="March">March</option>
                      <option value="April">April</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="August">August</option>
                      <option value="September">September</option>
                      <option value="October">October</option>
                      <option value="November">November</option>
                      <option value="February">December</option>
                    </select>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <center>
        <div id="table" class="table-responsive mt-5">
            <table class="table table-responsive table-bordered">
                <tr class="thead-dark">
                    <th>
                        Sales Id
                    </th>
                    <th>
                        Amount
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Invoice
                    </th>
                    <th>
                        Payment Method
                    </th>
                    <th>
                        Status
                    </th>
                </tr>
                <?php
                    $salesQuery = mysqli_query($connection,$salesSql);
                    if($salesQuery->num_rows > 0 ){
                        while($row = $salesQuery->fetch_assoc()){
                            $salesID = $row['salesID'];
                            $salesAmount = $row['amount'];
                            $salesDate = $row['salesDate'];
                            $salesInvoice = $row['invoice'];
                            $salesPaymentMethod = $row['paymentMethod'];
                            $salesStatus = $row['deliveryStatus'];

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
                        <?php echo $salesInvoice; ?>
                        </td>
                        <td>
                        <?php echo $salesPaymentMethod; ?>
                        </td>
                        <?php echo $salesStatus; ?>
                        </td>
                    </tr>
                <?php
                        <td>
                        }
                    }
                ?>
            </table>
        </div>
        </center>
    </section>
    <?php include('script.php');?>
</body>
</html>