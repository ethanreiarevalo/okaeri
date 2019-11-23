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
        .hide-c{
            display: none !important;
        }
        .show-c{
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
            <div class="col-xl-8 col-lg-8 col-md-12">
                <div class="jumbotron bg-transparent">
                    <h1>Your Account</h1>
                    <hr class="my-4">
                    <p>Name: <?php echo $name; ?></p>
                    <p>Sex: <?php echo $sex?></p>
                    <p>Birthday: <?php echo $birthday; ?></p>
                    <p>Age: </p>
                    <p class= "mb-1">Address: <?php echo $address; ?> <button class="btn btn-primary" onclick="popup()"><i class="fa fa-edit"></i></button></p>
                    <form id="myform" class="hide-c" action="">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control" placeholder="Enter New Address">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                    <p class= "mb-1">Contact Number: <?php echo $contact?> <button class="btn btn-primary" onclick="popup_c()"><i class="fa fa-edit"></i></button></p>
                    <form id="myform-c" class="hide-c" action="">
                        <div class="row">
                            <div class="col-8">
                                <input type="text" class="form-control" placeholder="Enter Contact Number">
                            </div>
                            <div class="col-4">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                    <p>Email: <?php echo $email?></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12">
                <div class="jumbotron bg-warning mt-5 h-75">
                    <p class="lead">Purchase History Summary</p>
                    <hr class="my-4">
                    <p>Content</p>
                </div>
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
        var c = document.getElementById("myform-c");

        function popup_c(){
            if (c.className === "hide-c"){
                c.className = "show-c";
            }
            else{
                c.className = "hide-c";
            }
        }
    </script>
    <?php include('script.php');?>
</body>
</html>