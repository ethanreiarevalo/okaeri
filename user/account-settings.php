<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>Document</title>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section class="container">
        <div class="row justify-content-between">
            <div class="jumbotron bg-transparent">
                <h1 class="display-4">Your Account</h1>
                <hr class="my-4">
                <p>Name: </p>
                <p>Birthday: </p>
                <p>Age: </p>
                <p>Address: </p>
                <p>Email: </p>
            </div>

            <div class="jumbotron bg-warning mt-5">
                <p class="lead">Purchase History Summary</p>
                <hr class="my-4">
                <p>Content</p>
            </div>
        </div>
    </section>
    <?php include('script.php');?>
</body>
</html>