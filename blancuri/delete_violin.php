<?php
include_once("db_connect.php");
       if(isset($_GET['id']))
        {
        $sql_query="DELETE FROM violin WHERE id='".$_GET['id']."'";
    		$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
        $sql_query="SELECT * FROM violin_file WHERE violin_id='".$_GET['id']."'";
        $resultset = mysqli_query($conn, $sql_query);
        while($row = mysqli_fetch_array($resultset)) {
            if(file_exists('uploads_violin/' . $row['file'])) {
              unlink('uploads_violin/' . $row['file']);
            }
          }
          $sql_query="DELETE FROM violin_file WHERE violin_id='".$_GET['id']."'";
          $resultset = mysqli_query($conn, $sql_query);
      }
    header('Location:violin.php');
?>
