<?php
session_start();
$loginError = "";
if($_SERVER ["REQUEST_METHOD"] == "POST"){

    include('connection.php');

    $email = $_POST['email']; 
    $password = $_POST['password'];
    //checking user in database
    $sql = "SELECT * FROM useraccounts WHERE userEmail='$email' && userPassword='$password'"; 
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result);
    if($row['userEmail']==$email && $row['userPassword']==$password && $row['userType']=="user" && $row['status']=="Active"){
        //register the userID in session
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['userEmail'] = $row['userEmail'];
        $_SESSION['userPassword'] = $row['userPassword'];
        echo "<script>window.location.href= 'user';</script>";
    }else if($row['userEmail']==$email && $row['userPassword']==$password && $row['userType']=="user" && $row['status']=="Inactive"){
        //register the userID in session
        $loginError = "Email has been Deactivated!";
    }else if($row['userEmail']==$email && $row['userPassword']==$password && $row['userType']=="Admin"){
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['userEmail'] = $row['userEmail'];
        $_SESSION['userPassword'] = $row['userPassword'];
        echo "<script>window.location.href= 'admin';</script>";
    }else{
        $loginError = "email or password Incorrect!";
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
    <link rel="stylesheet" href="css/logincss.css">
    <title>Log In to Okaeri!</title>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section>
        <div id="log_container" class=" d-block col-xl-3 col-lg-4 col-md-6 col-sm-10 col-xs-10 bg-dark shadow">
            <div class="jumbotron d-block text-center bg-transparent">
                <h1 class="text-white">Login Now!</h1>
                <span class="error text-danger"><?php echo $loginError; ?></span><br>
                <hr class="my-4 bg-white">
                <form action="<?php htmlspecialchars("PHP_SELF"); ?>" method="post"> 
                    <input type="text" class="form-control mt-5 mb-3 text-center" id="exampleFormControlInput1" placeholder="Email" name="email">
                    <input type="password" class="form-control mb-3 text-center" id="exampleFormControlInput1" placeholder="Password" name="password">
                    <button class="btn btn-warning w-50 text-white" type="submit">Log In</button>
                </form>
            </div>
        </div>
    </section>
<!--SCRIPT-->
<?php include('script.php');?>
</body>
</html>