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
        $fullname = $fname.$lname;
        $userID = '';

        $sql = "SELECT * FROM useraccounts WHERE userEmail='$email' && userPassword='$password'"; 
        $result = mysqli_query($connection,$sql);
        $row = mysqli_fetch_array($result);
        //check if email already exists
        if($row['userEmail']==$email){
            $signupError = "Email Already Exist";
        }else{
            //insert account
            $signup = mysqli_query($connection, "INSERT INTO useraccounts VALUES (null, '$email', '$password', 'user', 'Active')");
            //insert account details
            $accntDetails = mysqli_query($connection, "INSERT INTO userdetails VALUES ('$email','$fname','$lname','$address','$contact','$date','$sex')");
            
            //select userID
            $selectSql = "SELECT * FROM useraccounts WHERE userEmail='$email' && userPassword='$password'"; 
            $selectSqlResult = mysqli_query($connection, $selectSql);
            $sqlRow = mysqli_fetch_array($selectSqlResult);
            if(!empty($sqlRow['userID'])){
                $userID = $sqlRow['userID'];
            }else{
                echo '$sqlResult is empty';
            }
            
            //create table for cart
            $createCartSql = "CREATE TABLE ".$userID."cart (productID INT(10), amount INT(10))";
            $createCart = mysqli_query($connection, $createCartSql);
            //create table for purchases records
            $createPurchasesSql = "CREATE TABLE ".$userID."purchases (productID INT(10), amount INT(10), datePurchase DATE, salesID int(10), paymentMethod VARCHAR(16), orderStatus VARCHAR(15))";
            $createPurchases = mysqli_query($connection, $createPurchasesSql);


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
            background: url("image/login_bg.jpg") center no-repeat;
            width: 100%;
            height: 100%;
            background-size: cover;
        }
        .jumbotron.d-block.text-center.mb-0.p-4 {
            background-image: linear-gradient(45deg, #4d4897bd, #758989);
        }
    </style>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section>
        <div id="log_container" class="d-block col-xl-4 col-lg-4 col-md-6 col-sm-10 col-xs-10 bg-transparent mt-1 mx-auto">
            <div class="jumbotron bg-transparent d-block text-center mb-0 p-4">
                <h1 class="text-white">Join us Now!</h1>
                <span class="error text-danger font-weight-bold"><?php echo $signupError; ?></span><br>
                <hr class="my-4 bg-white">
                <form auto-complete= "off" action="<?php htmlspecialchars("PHP_SELF"); ?>" method="post"> 
                    <input type="text" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="First name" name="fname" required>
                    <input type="text" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Last name" name="lname" required>
                    <input type="date" class="form-control mb-1 text-center" id="exampleFormControlInput1" name="date" required>
                    <input type="text" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Address" name="address" required>
                    <input type="text" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Contact No." name="contact" required>
                    <input type="email" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Email" name="email" required>
                    <input type="username" class="form-control mb-1 text-center" id="exampleFormControlInput1" placeholder="Sex" name="sex" required>
                    <input type="password" class="form-control mb-3 text-center" id="exampleFormControlInput1" placeholder="Password" name="password" required>

                    <button class="btn btn-warning w-50 text-white font-weight-bold" type="submit">Register</button>
                </form>
            </div>
        </div>
    </section>
    <!-- SCRIPT -->
    <?php include('script.php');?>
</body>
</html>