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
                <a href="toship.php">
                    <div class="text-center py-3">
                        To Ship
                    </div>
                </a>
                <a href="torecieve.php">
                    <div class="text-center py-3">
                        To Recieve
                    </div>
                </a>
                <a href="completed.php">
                    <div class="text-center py-3">
                        Completed
                    </div>
                </a>
                <a href="cancelled.php">
                    <div class="text-center border-right border-warning py-3">
                        Cancelled
                    </div>
                </a>
            </div>
            <div id="table">
                <div class="table table-responsive table-bordered mt-4">
                    <table>
                        <tr class="thead-dark">
                            <th>Product Cover</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php include('script.php');?>
</body>
</html>