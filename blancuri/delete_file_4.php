<?php
include_once("db_connect.php");
       if(isset($_GET['id']))
        {
        $sql_query="SELECT * FROM uploads4 WHERE id='".$_GET['id']."'";
        $resultset = mysqli_query($conn, $sql_query);
        while($row = mysqli_fetch_array($resultset)) {
            if(file_exists('uploads/' . $row['file'])) {
              unlink('uploads/' . $row['file']);
            }
          }
          $sql_query="DELETE FROM uploads4 WHERE id='".$_GET['id']."'";
          $resultset = mysqli_query($conn, $sql_query);
      }
    header('Location:formular.php');
?>
