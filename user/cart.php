<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>OKAERI | </title>
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
    <section id="checkout">

    </section>
    <?php include('script.php');?>
</body>
</html>