<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>OKAERI | Vouchers and Promos</title>
</head>
<body>
    <header>
        <?php include('nav.php')?>
    </header>
    <section class="row">
        <div class="container">
            <div class="jumbotron bg-transparent">
                <h1 class="display-4">Add new Vouchers and Promos</h1>
                <hr class="my-4">
                <div class="row justify-content-center">
                    <form class="col-xl-4 m-1" action="">
                        <input type="text" id="voucher_input" class="form-control text-center" name="voucher" placeholder="Click Generate to get random voucher code.">
                        <div class="container mt-2 text-center">
                            <input type="button" placeholder="generate" onclick = "g()" value="Generate" class="btn btn-primary" name="generate">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </form>
                    <div clas="table table-responsive m-1" id="table">
                        <table class="table table-bordered table-responsive text-center">
                            <tr class="thead-dark">
                                <th>
                                    Voucher Code
                                </th>
                                <th>
                                    Voucher Name
                                </th>
                                <th>
                                    Amount
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function g(){
            var val = Math.floor(1000 + Math.random() * 9000);
            document.getElementById("voucher_input").value = val;
            // alert(val);
        }
    
    </script>
    <?php include('script.php');?>
</body>
</html>