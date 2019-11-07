<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>OKAERI ADMIN</title>
    
</head>
<body>
<?php include('nav.php');?>
    <section id="fields" class="bg-dark col-xl-4">
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

        </div>
    </section>
    <section id="tables">
    </section>
<!-- SCRIPT     -->
<?php include('script.php');?>
</body>
</html>