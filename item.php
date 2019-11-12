<!-- Item description and add to cart page here -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title><!--Name of the Item here--></title>
    <style>
        html,body{
            overflow-x: hidden;
        }
        a:hover{
            color:#ffc107 !important;
        }
    </style>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section>
        <div class="row">
            <div class="container col-xl-1 mt-5">
                <center>
                    <img src="product_image/Komi-san.jpg" alt="">
                </center>
            </div>
            <div class="container col-xl-8">
                <div class="jumbotron bg-transparent">
                    <h1 class="display-4">ITEM NAME</h1>
                    <p class="lead">Type: Manga - paperback</p>
                    <hr class="my-4">
                    <p>ITEM SUMMARY</p>
                    <b>Stock Available: </b>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-xl-5 d-flex">
                            <button id="minus-button" class="btn btn-danger mx-1" onclick="minusValue()">-</button>
                            <input type="text" class="form-control mx-1" id="integer_value">
                            <button id="plus-button" class="btn btn-primary mx-1" onclick="plusValue()">+</button>
                        </div>
                        <button class="btn btn-warning col-xl-2">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SCRIPT FOR THE INPUT BUTTON -->
    <!-- DO NOT CHANGE -->
    <script>
        var currentVal = document.getElementById("integer_value").value = "0";

        function plusValue(){
            var getValue = parseInt(document.getElementById("integer_value").value);
            var newValue = getValue + 1;
            document.getElementById("integer_value").value = newValue;
        }

        function minusValue(){
            var getValue = parseInt(document.getElementById("integer_value").value);
            var newValue = getValue - 1;
            document.getElementById("integer_value").value = newValue;

            var checknegative = document.getElementById("integer_value").value;

            if(checknegative < 0){
                document.getElementById("integer_value").value = 0;
            }
        }
    </script>
    <?php include('script.php');?>
</body>
</html>