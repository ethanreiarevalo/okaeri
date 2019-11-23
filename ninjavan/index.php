<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>NinjaVan-OKAERI</title>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section class="container">
        <div class="row">
            <div class="jumbotron bg-transparent w-100">
                <h1 class="display-4">Update Delivery</h1>
                <hr class="my-4">
                <div class="table table-responsive">
                    <table class="table-responsive table-bordered text-center">
                        <tr class="thead-dark">
                            <th>
                                Tracking Number
                            </th>
                            <th>
                                Delivery Address
                            </th>
                            <th>
                                Reciever
                            </th>
                            <th>
                                Delivery Date
                            </th>
                            <th>
                                Status
                            </th>
                        </tr>

                        <tr>
                            <td>
                                12345
                            </td>
                            <td>
                                Regina Ville Saint Street
                            </td>
                            <td>
                                Ethan Rei
                            </td>
                            <td>
                                11/23/19
                            </td>
                            <td>
                                <p class="lead text-success">Delivered</p>
                                <!-- <button class="btn btn-danger">Undelivered</button>
                                <p class="lead text-danger">Cancelled</p> -->
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php include('script.php');?>
</body>
</html>