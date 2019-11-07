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