<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>Delivery Update</title>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section class="container">
        <div class="row">
            <div class="jumbotron bg-transparent w-100">
                <h1 class="display-4">Delivery Update</h1>
                <hr class="my-4">
                <div class="table table-responsive">
                    <table id="table" class="table table-bordered">
                        <tr class="thead-dark text-center">
                            <th>
                                Product
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Total Price
                            </th>
                            <th>
                                Tracking Number
                            </th>
                            <th>
                                Delivery Date
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php include('script.php');?>
</body>
</html>