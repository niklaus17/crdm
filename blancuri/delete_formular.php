<?php

include_once("db_connect.php");


       if(isset($_GET['delete']) && isset($_GET['file']))
        {
    		if(file_exists('uploads/' . $_GET['file'])) {
    			unlink('uploads/' . $_GET['file']);
    		}

            $sql_query="DELETE FROM formular WHERE id='".$_GET['id']."'";

    		$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));

        }


    header('Location:formular.php');

?>
