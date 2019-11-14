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
            <tr>
                <td>
                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                    <img src="" alt="">
                </td>
                <td>
                    Komi-san
                </td>
                <td>
                    2
                    <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                </td>
                <td>
                    200
                </td>
            </tr>

        </table>
    </section>
    <section id="checkout" class="col-xl-4 position-fixed">
        <div class="jumbotron border border-dark">
            <h5>Total Amount: <span>&#8369;</span> </h5>
            <hr class="my-4 bg-dark">
            <button class="btn btn-primary">Checkout as Debit</button>
            <button class="btn btn-success">Checkout as COD</button>
        </div>
    </section>
    <?php include('script.php');?>
</body>
</html>