<?php
include_once("db_connect.php");
       if(isset($_GET['id']))
        {
        $sql_query="DELETE FROM formular_2 WHERE id='".$_GET['id']."'";
    		$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
        $sql_query="SELECT * FROM uploads WHERE formular_id='".$_GET['id']."'";
        $resultset = mysqli_query($conn, $sql_query);
        while($row = mysqli_fetch_array($resultset)) {
            if(file_exists('uploads/' . $row['file'])) {
              unlink('uploads/' . $row['file']);
            }
          }
          $sql_query="DELETE FROM uploads WHERE formular_id='".$_GET['id']."'";
          $resultset = mysqli_query($conn, $sql_query);
      }
    header('Location:formular.php');
?>
