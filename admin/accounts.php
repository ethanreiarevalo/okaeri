<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>Manage the Accounts</title>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section class="jumbotron bg-transparent">
        <h1 class="display-4">Manage your customer Accounts here</h1>
        
        <hr class="my-4">
        <div class="table table-responsive">
            <table class="table table-responsive table-bordered w-100">
                <tr class="thead-dark">
                    <th>
                        Customer Name
                    </th>
                    <th>
                        Address
                    </th>
                    <th>
                        Contact Number
                    </th>
                    <th>
                        Status
                    </th>
                </tr>
                <tr>
                    <td>
                        John doe
                    </td>
                    <td>
                        Regina Ville Saint Street
                    </td>
                    <td>
                        09120012378
                    </td>
                    <td>
                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                    </td>
                </tr>
            </table>
        </div>
    </section>
    <?php include('script.php');?>
</body>
</html>