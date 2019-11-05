<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="image/OKAERI_tab.png" type="image/gif" sizes="16x16"> 
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
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
</body>
</html>