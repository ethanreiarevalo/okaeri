<?php
session_start(); 
include('../connection.php');
if(isset($_SESSION ["userID"])){
    // $user_id = $_SESSION["userID"];
    // $get_record = mysqli_query($connection, "SELECT * FROM accountdetailstbl WHERE userID= '$user_id'");
    // $row = mysqli_fetch_array($get_record);
    // if($row['userID'] = $user_id){
    //     $db_name = $row ["userFname"];
    //     // $db_email = $row["email"];
    // }     
}else if(!isset($_SESSION ["userID"])){
    // echo "<script language = 'javascript'>alert('You must login first!')</script>";
    echo "<script>window.location.href='../index.php';</script>";   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>OKAERI ADMIN</title>
    <style>
        html,body{
            overflow-x:hidden;
        }
        #tables{
            overflow-x:scroll;
        }
    </style>
</head>
<body>
<?php include('nav.php');?>
    <section class="row">
        <div id="fields" class="bg-dark col-xl-4">
            <div class="jumbotron d-block text-center text-white bg-transparent">
                <p class="lead">Add Item</p>
                <hr class="my-2 bg-white">
                <input type="text" class="form-control mb-1" placeholder="Title">
                <input type="text" class="form-control mb-1" placeholder="Author">
                <input type="text" class="form-control mb-1" placeholder="Publisher">
                <div class="input-group mb-1">
                    <select class="custom-select" id="inputGroupSelect01">
                      <option selected>Language</option>
                      <option value="1">Japanese</option>
                      <option value="2">English</option>
                    </select>
                </div>
                <div class="input-group mb-1">
                    <select class="custom-select" id="inputGroupSelect02">
                      <option selected>Type of Product</option>
                      <option value="1">Manga</option>
                      <option value="2">Light Novel</option>
                    </select>
                </div>
                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Date Published</label>
                    </div>
                    <input type="date" class="form-control">
                </div>
                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Date Recieved</label>
                    </div>
                    <input type="date" class="form-control">
                </div>
                <input type="text" class="form-control mb-1" placeholder="Stock" pattern= "[0-9]" >
                <input type="text" class="form-control mb-1" placeholder="Price" pattern= "[0-9]" >
                <input type="file" class="form-control-file" placeholder="Upload Photo" accept="image">
                <button class="btn btn-warning">Submit</button>
            </div>
        </div>
        <div id="tables" class="col-xl-8">
            <table class="table">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Language</th>
                    <th>Type</th>
                    <th>Date Recieved</th>
                    <th>Date Published</th>
                    <th>Price</th>
                </tr>
            </table>
        </div>
    </section>
<!-- SCRIPT     -->
<?php include('script.php');?>
</body>
</html>