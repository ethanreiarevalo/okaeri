<?php
session_start();
include('../connection.php');
$userEmail = $_SESSION['userEmail'];
$sql = "SELECT * FROM userdetails WHERE email = '$userEmail'";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result);
if($row['email']==$userEmail){
    $name = $row['fName']." ".$row['lName'];
    $birthday = $row['birthdate'];
    $address = $row['address'];
    $contact = $row['contactNo']; 
    $sex = $row['sex'];
    $email = $row['email'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>Document</title>
    <style>
        .hide{
            display: none !important;
        }
        .show{
            display: block !important;
        }
    </style>
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
                
                <p>Name: <?php echo $name; ?></p>
                <p>Sex: <?php echo $sex?></p>
                <p>Birthday: <?php echo $birthday; ?></p>
                <p>Age: </p>
                <p>Address: <?php echo $address; ?> <button class="btn btn-primary" onclick="popup()"><i class="fa fa-edit"></i></button></p>
                <form id="myform" class="hide" action="">
                    <input type="text" class="form-control" placeholder="Enter New Address">
                    <button class="btn btn-success mt-2">Submit</button>
                </form>
                <p>Contact Number: <?php echo $contact?></p>
                <p>Email: <?php echo $email?></p>
            </div>

            <div class="jumbotron bg-warning mt-5">
                <p class="lead">Purchase History Summary</p>
                <hr class="my-4">
                <p>Content</p>
            </div>
        </div>
    </section>
    <!-- DO NOT CHANGE -->
    <script>
        var t = document.getElementById("myform");

        function popup(){
            if (t.className === "hide"){
                t.className = "show";
            }
            else{
                t.className = "hide";
            }
        }
    </script>
    <?php include('script.php');?>
</body>
</html>