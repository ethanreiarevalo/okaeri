<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>Manage Sales</title>
    <style>
    </style>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section class="container">
        <div class="mt-5">
            <h5>Total Sales</h5>
            <p class="lead">This Month:</p>
            <p class="lead">This Week:</p>
            <p class="lead">Today:</p>
        </div>
        <div class="row justify-content-between">
            <p>Total Sales: </p>
            <div class="input-group w-25 mb-1">
                <select class="custom-select w-25" id="inputGroupSelect01" name="month">
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
                </tr>

                <tr>
                    <td>
                    </td>
                </tr>
            </table>
        </div>
        </center>
    </section>
    <?php include('script.php');?>
</body>
</html>