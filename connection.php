<?php
    $connection = mysqli_connect ("localhost","root","","okaeri");
        if (mysqli_connect_errno()){
		    echo "Failed to connect to mysql: " . mysqli_connect_error ();
	    } 
?>	