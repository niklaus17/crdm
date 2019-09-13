<?php
include('header.php');
include('navbar.php');
?>

<title>CRDM - User activity</title>

<body>

<?php if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) { ?>

<div class="col-sm-12 text-center">
  <table class="table table-bordered table-striped" id= "table-id">
    <thead>
    <tr class="success " style="font-weight:bold">

        <td>Secția</td>
        <td>Cabinetul</td>
        <td>Nume PC</td>
        <td>IP</td>
        <td>Mac address</td>
        <td>Internet</td>
        <td>Comentariu</td>
        <td>Utilizator</td>
    </tr>
    <?php
        $count=1;
          $sql="SELECT * FROM ip order by id";
        ?>
        <?php
        $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
        while($row = mysqli_fetch_array ($result_set) )
        {
    ?>

  </thead>
<tbody id="myTable">
  <tr>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
      <td> </td>
  </tr>

</tbody>
  </table>

<?php		}		?>
<?php		}		?>
