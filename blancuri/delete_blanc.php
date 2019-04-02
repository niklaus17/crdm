<?php

include_once("db_connect.php");

        $sql_query="DELETE FROM blancuri WHERE id='".$_GET['id']."'";

		$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));



    header('Location:blancuri.php');

?>
