<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>Manage Sales</title>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section>
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
                </tr>

                <tr>
                    <td>
                    </td>
                </tr>
            </table>
        </div>
    </section>
    <?php include('script.php');?>
</body>
</html>