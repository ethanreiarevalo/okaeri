<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
   
    <title>OKAERI | Join Now!</title>
    <style>
        html, body{
            padding: 0%;
            margin: 0%;
            background: url("image/login_bg_2.jpg");
            height: 100vh;
            width: 100%;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section>
        <div id="log_container" class=" d-block col-xl-4 col-lg-4 col-md-6 col-sm-10 col-xs-10 bg-dark">
            <div class="jumbotron d-block text-center bg-transparent">
                <h1 class="text-white">Join us Now!</h1>
                
                <hr class="my-4 bg-white">
                <form action="" method="post"> 
                    <input type="text" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="First name" name="fname">
                    <input type="text" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Last name" name="lname">
                    <input type="date" class="form-control mb-1 text-center" id="exampleFormControlInput1" name="date">
                    <input type="text" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Address" name="address">
                    <input type="text" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Contact No." name="contact">
                    <input type="email" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Email" name="email">
                    <input type="username" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Username" name="username">
                    <input type="password" class="form-control mb-3 text-center" id="exampleFormControlInput1" placeholder="Password" name="password">

                    <button class="btn btn-warning w-50 text-dark" type="submit">Register</button>
                </form>
            </div>
        </div>
    </section>
    <!-- SCRIPT -->
    <?php include('script.php');?>
</body>
</html>