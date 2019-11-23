<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include('css.php');?>
    <title>Manage the Accounts</title>
</head>
<body>
    <header>
        <?php include('nav.php');?>
    </header>
    <section class="jumbotron bg-transparent">
        <h1 class="display-4">Manage your customer Accounts here</h1>
        
        <hr class="my-4">
        <div class="table table-responsive">
            <table id="table" class="table table-responsive table-bordered w-100">
                <tr class="thead-dark text-center">
                    <th>
                        Customer Email
                    </th>
                    <th>
                        Customer Name
                    </th>
                    <th>
                        Address
                    </th>
                    <th>
                        Contact Number
                    </th>
                    <th>
                        Status
                    </th>
                </tr>
                <div id="card" class="col-xl-9  mt-5 overflow-hidden">
            <div class="container">
                <div class="row justify-content-center">
                <?php
                    include('../connection.php');
                    $getItems = "SELECT * FROM useraccounts INNER JOIN userdetails ON useraccounts.userEmail = userdetails.email where useraccounts.userType = 'user'";
                    $result = mysqli_query($connection, $getItems);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                    ?>
                        <tr class="text-center">
                            <td>
                                <?php echo $row['userEmail']; ?>
                            </td>
                            <td>
                                <?php $name = $row['fName']." ".$row['lName'];
                                echo $name; ?>
                            </td>
                            <td>
                                <?php echo $row['address']; ?>
                            </td>
                            <td>
                                <?php echo $row['contactNo']; ?>
                            </td>
                            <td>
                               <?php 
                                 if($row['status'] === "Inactive"){
                                    echo "<button id='inactive' class='btn btn-danger'><i>".$row['status']."</i></button>";
                                } else{
                                    echo "<button id='active' class='btn btn-primary'><i>".$row['status']."</i></button>";
                                }
                                ?>
                            </td>
                            
                        </tr> 
                    <?php 
                        }}
                    ?> 
                </div>
            </div>
        </div>
                <!-- <tr>
                    <td>
                        John doe
                    </td>
                    <td>
                        Regina Ville Saint Street
                    </td>
                    <td>
                        09120012378
                    </td>
                    <td>
                        <button class="btn btn-primary"><i class="fa fa-edit"></i></button>
                    </td>
                </tr> -->

            </table>
        </div>
    </section>
    <section class="container">
        <div class="jumbotron">
            <p class="lead">Add courier account</p>
            <hr class="my-4">
            <form action="" method="post">
                <input type="text" class="form-control m-1" name="name" id="name" placeholder="Name">
                <input type="password" class="form-control m-1" name="password" id="password" placeholder="courier password">
                <input type="text" class="form-control m-1" disabled value="Courier">
                <button class="btn btn-primary m-1">Add the Courier</button>
            </form>
        </div>
    </section>

    <!-- <script>
        function press(){
            var table = document.getElementById('table');
                var active = '<button id="status" class="btn btn-primary"><i>Active</i></button>';
                var inactive = '<button id="status" onclick="press()" class="btn btn-primary"><i>Inactive</i></button>';
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         rIndex = this.rowIndex;
                        // alert(this.cells[4].innerHTML);
                        var thevalue  = this.cells[4].innerHTML.toString();
                        if(thevalue ===  toString(inactive)){
                            alert("try");
                        }else{
                            alert(thevalue+inactive);
                        }
                        
                        // document.getElementById('itemcode').value = this.cells[0].innerHTML;
                        // document.getElementById("p_name").value = this.cells[1].innerHTML;
                        // document.getElementById("author").value = this.cells[2].innerHTML;
                        // document.getElementById("publisher").value = this.cells[3].innerHTML;
                        // document.getElementById("language").value = this.cells[4].innerHTML;
                    };
                }
        }
    </script> -->
    <?php include('script.php');?>
</body>
</html>