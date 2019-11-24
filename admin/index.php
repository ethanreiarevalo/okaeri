<?php
session_start(); 
include('../connection.php');
if(isset($_SESSION ["userID"])){
  if($_SERVER ["REQUEST_METHOD"] == "POST"){
    $genre = $_POST['genre'];
    $title = addslashes($_POST['title']);
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
    $summary = addslashes($_POST['summary']);


    foreach($genre as $pgenre){
      if($productGenre == ''){
        $productGenre = $pgenre;
      }else{
        $productGenre = $productGenre.', '.$pgenre;
      }
    }

    if(mysqli_query($connection,"INSERT INTO products VALUES (null, '$title', '$author', '$publisher', '$type',
    '$language', '$dReceived', '$dPublished', '$productGenre', 'product_image/".$image."', '$stock', '$price', '$summary')")){
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
      echo "upload failed!!!".mysqli_error($connection);
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
                <input type="text" class="form-control mb-1" placeholder="Title" name="title" required>
                <input type="text" class="form-control mb-1" placeholder="Author" name="author" required>
                <input type="text" class="form-control mb-1" placeholder="Publisher" name="publisher" required>
                <div class="input-group mb-1">
                    <select class="custom-select" id="inputGroupSelect01" name="language">
                      <option selected>Language</option>
                      <option value="Japanese">Japanese</option>
                      <option value="English">English</option>
                    </select>
                </div>
                <div class="input-group mb-1">
                    <select class="custom-select" id="inputGroupSelect02" name="type">
                      <option selected>Type of Product</option>
                      <option value="Manga">Manga</option>
                      <option value="Light Novel">Light Novel</option>
                    </select>
                </div>
                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Date Published</label>
                    </div>
                    <input type="date" class="form-control" name="dPublished" required>
                </div>
                <div class="input-group mb-1">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Date Received</label>
                    </div>
                    <input type="date" class="form-control" name="dReceived" required>
                </div>
                <input type="text" class="form-control mb-1" placeholder="Stock" name="stock" required>
                <input type="text" class="form-control mb-1" placeholder="Price" name="price" required>
                <div class="row">
                  <div class="container mb-1 col-xl-5">
                    <div class="container custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="genre[]" id="adventure" value="adventure">
                      <label class="custom-control-label float-left" for="adventure">Adventure</label>
                    </div>
                    <div class="container custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="genre[]" id="romance" value="romance">
                      <label class="custom-control-label float-left" for="romance">Romance</label>
                    </div>
                    <div class="container custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="genre[]" id="sliceoflife" value="slice of life">
                      <label class="custom-control-label float-left" for="sliceoflife">Slice of Life</label>
                    </div>
                  </div>

                  <div class="container mb-1 col-xl-5">
                    <div class="container custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="genre[]" id="action" value="action">
                      <label class="custom-control-label float-left" for="action">Action</label>
                    </div>
                    <div class="container custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="genre[]" id="horror" value="horror">
                      <label class="custom-control-label float-left" for="horror">Horror</label>
                    </div>
                    <div class="container custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="genre[]" id="fantasy" value="fantasy">
                      <label class="custom-control-label float-left" for="fantasy">Fantasy</label>
                    </div>
                  </div>
                </div>
                <textarea name="summary" id="summary" class="form-control mb-1" cols="30" rows="10" placeholder="Enter Product Summary here" required></textarea>
                <label for="fileToUpload" class="float-left">Upload a cover image (200x300)</label>
                <input type="file" id="fileToUpload" name="fileToUpload" class="form-control-file mb-1" placeholder="Upload Photo" accept="image/*" required>
                <button class="btn btn-warning" type="submit">Submit</button>
              </form>
            </div>
        </div>
        <div id="tables" class="table table-responsive col-xl-8">
            <table id="mytable" class="table text-center">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Language</th>
                    <th>Type</th>
                    <th>Date Recieved</th>
                    <th>Date Published</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Edit</th>
                </tr>
                <?php
                  $sql = "SELECT productTitle, productAuthor, productPublisher,
                    productLanguage, productType, productDateReceived, productDatePublished, productStock, productPrice FROM products";
                  $result = mysqli_query($connection,$sql);
                  if($result->num_rows >0){
                    while($row = $result->fetch_assoc()){
                      echo '<tr><td>' .$row["productTitle"]. '</td>
                      <td>' .$row["productAuthor"]. '</div></td>
                      <td>' .$row["productPublisher"]. '</div></td>
                      <td>' .$row["productLanguage"]. '</td>
                      <td>' .$row["productType"]. '</div></td>
                      <td>' .$row["productDateReceived"]. '</td>
                      <td>' .$row["productDatePublished"]. '</div></td>
                      <td>' .$row["productStock"]. '</div></td>
                      <td>' .$row["productPrice"]. '</div></td>
                      <td><center><button class= "btn btn-primary" onclick="popup()"><i class="fa fa-edit"></i></button></center></td></tr>'
                      ;
                    }
                  }
                ?>
            </table>
        </div>
    </section>
<!-- DO NOT CHANGE MODAL FOR EDIT -->
<style>
  .pop{
      position:fixed;
      width: 100%;
      height: 100vh;
      top: 23%;
  }
  .popup{
      display:none;
  }
  .cl{
      height: 20px;
      width: 20px;
      border-radius: 50%;
      cursor: pointer;
  }
</style>
    <div id="modal" class="popup">
        <div class="row w-100 justify-content-center">
            <div class="jumbotron text-center">
                <div class="cl row justify-content-center bg-warning text-dark" onclick="popup()">x</div>
                <form action="update.php" enctype="multipart/form-data" method="post">
                  <input type="text" class="form-control" name="p_name" id="p_name">
                  <label for="stock" >Edit Stock</label>
                  <input type="number" id="stock" min="0" class="form-control" name="stock">
                  <label for="price">Edit Price</label>
                  <input type="text" id="price" class="form-control" name="price">
                  <button class="btn btn-success mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
<!-- SCRIPT     -->
<script>
    var t = document.getElementById("modal");

    function popup  (){
        if (t.className === "popup"){
            t.className = "pop";
        }
        else{
            t.className = "popup";
        }
    }

  var table = document.getElementById("mytable");
  
  for(var i = 1; i < table.rows.length; i++)
  {
      table.rows[i].onclick = function()
      {
           //rIndex = this.rowIndex;
           //alert(this.cells[1].innerHTML);
          document.getElementById("p_name").value = this.cells[0].innerHTML;
          document.getElementById("stock").value = this.cells[7].innerHTML;
          document.getElementById("price").value = this.cells[8].innerHTML;
      };
  }
</script>
<?php include('script.php');?>
</body>
</html>