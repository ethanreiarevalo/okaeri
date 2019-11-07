<?php
session_start(); 
include('../connection.php');
if(isset($_SESSION ["userID"])){
  if($_SERVER ["REQUEST_METHOD"] == "POST"){
    
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $language = $_POST['language'];
    $type = $_POST['type'];
    $dPublished = $_POST['dPublished'];
    $dReceived = $_POST['dReceived'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    if(mysqli_query($connection,"INSERT INTO products VALUES ()")){
      
    }
  }
    
}else if(!isset($_SESSION ["userID"])){
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
              <form action="<?php htmlspecialchars("PHP_SELF"); ?>" method="post"> 
                <p class="lead">Add Item</p>
                <hr class="my-2 bg-white">
                <input type="text" class="form-control mb-1" placeholder="Title" name="title">
                <input type="text" class="form-control mb-1" placeholder="Author" name="author">
                <input type="text" class="form-control mb-1" placeholder="Publisher" name="publisher">
                <div class="input-group mb-1">
                    <select class="custom-select" id="inputGroupSelect01" name="language">
                      <option selected>Language</option>
                      <option value="1">Japanese</option>
                      <option value="2">English</option>
                    </select>
                </div>
                <div class="input-group mb-1">
                    <select class="custom-select" id="inputGroupSelect02" name="type">
                      <option selected>Type of Product</option>
                      <option value="1">Manga</option>
                      <option value="2">Light Novel</option>
                    </select>
                </div>
                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Date Published</label>
                    </div>
                    <input type="date" class="form-control" name="dPublished">
                </div>
                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Date Received</label>
                    </div>
                    <input type="date" class="form-control" name="dReceived">
                </div>
                <input type="text" class="form-control mb-1" placeholder="Stock" pattern= "[0-9]" name="stock">
                <input type="text" class="form-control mb-1" placeholder="Price" pattern= "[0-9]" name="price">
                <input type="file" class="form-control-file" placeholder="Upload Photo" accept="product_image/*" name="image">
                <button class="btn btn-warning" type="submit">Submit</button>
              </form>
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