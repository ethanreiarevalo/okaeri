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
                    <img src="" alt="">
                </td>
                <td>
                    Komi-san
                </td>
                <td>
                    2
                    <button>edit</button>
                </td>
                <td>
                    200
                </td>
            </tr>

        </table>
    </section>
    <section id="checkout" class="col-xl-4 position-fixed">
        <div class="jumbotron border border-dark">
            <h5>Total Amount: </h5>
            <hr class="my-4 bg-dark">
            
        </div>
    </section>
    <?php include('script.php');?>
</body>
</html>