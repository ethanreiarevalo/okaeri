<?php
session_start(); 
include('../connection.php');
if(isset($_SESSION ["userID"])){
  if($_SERVER ["REQUEST_METHOD"] == "POST"){
    $genre = $_POST['genre'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $language = $_POST['language'];
    $type = $_POST['type'];
    $dPublished = $_POST['dPublished'];
    $dReceived = $_POST['dReceived'];
    $stock = $_POST['stock'];
    $price = $_POST['price'];
    $image = $_FILES['fileToUpload']['name'];
    $productGenre = '';

    foreach($genre as $pgenre){
      if($productGenre == ''){
        $productGenre = $pgenre;
      }else{
        $productGenre = $productGenre.', '.$pgenre;
      }
    }

    if(mysqli_query($connection,"INSERT INTO products VALUES (null, '$title', '$author', '$publisher', '$type',
    '$language', '$dReceived', '$dPublished', $productGenre, 'product_image/".$image."', '$stock', '$price', null)")){
      echo "uploaded to database";

      $target_dir = "C:/xampp/htdocs/www.okaeri.com/product_image/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);  
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      
      // Check if image file is a actual image or fake image

      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
      
      
      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }
      
      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }
      
      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }
      
      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
          $message = 'File Successfully Added';
          echo "<script type='text/javascript'>alert('$message');</script>";
                
          echo "<script>window.location.href='../admin';</script>";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }




    } else {

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
              <!-- you need to encrypt the form to submit an image -->
              <form action="<?php htmlspecialchars("PHP_SELF"); ?>" enctype="multipart/form-data" method="post"> 
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
                <input type="text" class="form-control mb-1" placeholder="Stock" name="stock">
                <input type="text" class="form-control mb-1" placeholder="Price" name="price">
                <div class="row">
                  <div class="container col-xl-4">
                    <div class="container custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="adventure">
                      <label class="custom-control-label" for="adventure">Adventure</label>
                    </div>
                    <div class="container custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="romance">
                      <label class="custom-control-label" for="romance">Romance</label>
                    </div>
                    <div class="container custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="sliceoflife">
                      <label class="custom-control-label" for="sliceoflife">Slice of Life</label>
                    </div>
                  </div>

                  <div class="container col-xl-4">
                    <div class="container custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="action">
                      <label class="custom-control-label" for="action">Action</label>
                    </div>
                    <div class="container custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="horror">
                      <label class="custom-control-label" for="horror">Horror</label>
                    </div>
                    <div class="container custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="fantasy">
                      <label class="custom-control-label" for="fantasy">Fantasy</label>
                    </div>
                  </div>
                </div>
                <textarea name="summary" id="summary" class="form-control" cols="30" rows="10" placeholder="Enter Product Summary here"></textarea>
                <input type="file" id="fileToUpload" name="fileToUpload" class="form-control-file" placeholder="Upload Photo" accept="image/*">
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