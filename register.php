<?php
    session_start();
    $signupError = "";
    if($_SERVER ["REQUEST_METHOD"] == "POST"){
        include('connection.php');
        $email = $_POST['email']; 
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $date = $_POST['date'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $sex = $_POST['sex'];

        $sql = "SELECT * FROM useraccounts WHERE userEmail='$email' && userPassword='$password'"; 
        $result = mysqli_query($connection,$sql);
        $row = mysqli_fetch_array($result);
        //check if email already exists
        if($row['userEmail']==$email){
            $signupError = "Email Already Exist";
        }else{
            //insert account
            $signup = mysqli_query($connection, "INSERT INTO useraccounts VALUES (null, '$email', '$password', 'user')");
            //insert account details
            $accntDetails = mysqli_query($connection, "INSERT INTO userdetails VALUES ('$email','$fname','$lname','$address','$contact','$date','$sex')");
            echo "<script>window.location.href='login.php';</script>";
        }
    }
    
?>
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
                <span class="error text-danger"><?php echo $signupError; ?></span><br>
                <hr class="my-4 bg-white">
                <form action="<?php htmlspecialchars("PHP_SELF"); ?>" method="post"> 
                    <input type="text" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="First name" name="fname">
                    <input type="text" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Last name" name="lname">
                    <input type="date" class="form-control mb-1 text-center" id="exampleFormControlInput1" name="date">
                    <input type="text" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Address" name="address">
                    <input type="text" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Contact No." name="contact">
                    <input type="email" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Email" name="email">
                    <input type="username" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Sex" name="sex">
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