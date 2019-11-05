<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <link rel="stylesheet" href="css/logincss.css">
    <title>Log In to Okaeri!</title>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section>
        <div id="log_container" class="py-4 d-block bg-white col-xl-3 col-lg-4 col-md-6 col-sm-10 col-xs-10 bg-white">
            <div class="jumbotron d-block text-center bg-transparent">
                <h1 class="display-4">Title</h1>
                <hr class="my-4">
                <form action="">
                    <input type="text" class="form-control mt-5 mb-3" id="exampleFormControlInput1" placeholder="Username">
                    <input type="password" class="form-control mb-3" id="exampleFormControlInput1" placeholder="Password">
                    <button class="btn btn-warning w-25 text-dark">Log In</button>
                </form>
            </div>
        </div>
    </section>
<!--SCRIPT-->
<?php include('script.php');?>
</body>
</html>