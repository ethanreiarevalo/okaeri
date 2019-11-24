<?php
session_start();
include('../connection.php');
$count = '';

//add search post to search session
if(!empty($_POST['search'])){
  $_SESSION['search'] = '%'.$_POST['search'].'%';
}

$search = $_SESSION['search'];

//check if language was selected
if(empty($_POST['Language'])){
  $productLanguage = "productLanguage is not null";
}else{
  $productLanguage = "productLanguage = '".$_POST['Language']."'";
}

//check if genre was selected
$productGenre = '';
if(empty($_POST['genre'])){
  $productGenre = "productGenre is not null";
}else{
  $arrayGenre = $_POST['genre'];
  foreach($arrayGenre as $arrGenre){
    if($productGenre == ''){
      $productGenre = "productGenre LIKE '%".$arrGenre."%'";
    }else{
      $productGenre = $productGenre." or productGenre LIKE '%".$arrGenre."%'";
    }
  }
  $productGenre = "(".$productGenre.")";
}

//check if Type was selected
if(empty($_POST['Type'])){
  $productType = "productType is not null";
}else{
  $productType = "productType = '".$_POST['Type']."'";
}

//set get items query
$getItems = "SELECT * FROM products where ".$productType." and ".$productGenre." and ".$productLanguage." and productTitle LIKE '$search' and productID > 0 order by productDateReceived desc";

//itemcount
$getItemCount = "SELECT count(productTitle) as counted FROM products where ".$productType." and ".$productGenre." and ".$productLanguage." and productTitle LIKE '$search' and productID > 0 order by productDateReceived desc";
  $resulta = mysqli_query($connection, $getItemCount);
  if(empty($resulta)){
    $count = 0;
  
  }else if(mysqli_num_rows($resulta) > 0){
    while($arow = mysqli_fetch_array($resulta)){
      $count = $arow['counted'];
    }
  }

?>



<!-- sEARCH LIST WHEN MANGA LINK IS CLICKED -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>OKAERI | Manga List</title>
    <style>
        html,body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section class="row">
        <div id="options" class="col-xl-3">
            <div class="jumbotron bg-transparent">
                <h3>Search Result</h3>
                <p class="mb-3"><?php echo $count; ?> Results found.</p>
                <p class="mb-3">Sort By</p>
                <form action="<?php htmlspecialchars("PHP_SELF"); ?>"enctype="multipart/form-data" method="post">
                    <h5>Type</h5>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="All" name="Type" value="MangaandLN">
                      <label class="custom-control-label" for="MangaandLN">All</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="Manga" name="Type" value="Manga">
                      <label class="custom-control-label" for="Manga">Manga</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="LightNovel" name="Type" value="LightNovel">
                      <label class="custom-control-label" for="LightNovel">Light Novel</label>
                    </div>
                    <hr class="my-3 bg-warning">
                    <h5>Language</h5>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="All" name="Language" value="All">
                      <label class="custom-control-label" for="All">All</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="Japanese" name="Language" value="Japanese">
                      <label class="custom-control-label" for="Japanese">Japanese</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input" id="English" name="Language" value="English">
                      <label class="custom-control-label" for="English">English</label>
                    </div>
                    <hr class="my-3 bg-warning">
                    <h5>Genre</h5>
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
                    <button class="btn btn-success mt-3 w-100">Sort</button>
                </form>
            </div>
        </div>
        <div id="card" class="col-xl-9 mt-5 overflow-hidden">
            <div class="container">
                <div class="row justify-content-between">
                <?php
                    // include('connection.php');
                    $result = mysqli_query($connection, $getItems);
                    if(empty($result)){
                      echo "no results found";
                    }else if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                    ?>
                        <div class="card col-lg-2 col-md-3 m-3 shadow border border-warning p-0">
                            <img class="card-img-top" src="../<?php echo $row['productImage']; ?>" alt="">
                            <div class="card-body text-center">
                            <h6 class="card-title" style= "height: 15vh;"><?php echo $row['productTitle']; ?></h6>
                                <p class="card-text text-danger font-weight-bold">Price: ₱<?php echo $row['productPrice'];?></p>
                                <form action="item.php" method="post">
                                    <input type="hidden" id="productID" name="productID" value="<?php echo$row['productID']; ?>">
                                    <button class="btn btn-success">Add to cart</button>
                                </form>
                            </div> 
                        </div>
                    <?php 
                        }
                      }else{
                          echo "nothing found";
                        }
                    ?> 
                </div>
            </div>
    </section>
    <?php include('script.php');?>
</body>
</html>