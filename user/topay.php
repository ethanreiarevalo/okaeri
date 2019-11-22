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
    <section id="sidenav" class="col-xl-2">
        <a href="trackall.php">
            <div class="text-center mt-4 border-right py-3">
                All
            </div>
        </a>
        <a href="topay.php">
            <div class="text-center py-3 border-right border-warning">
                To Pay
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
            <div class="text-center py-3">
                Cancelled
            </div>
        </a>
    </section>
    <section>

    </section>
    <?php include('script.php');?>
</body>
</html>