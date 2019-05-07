<?php
include('db_connect.php');
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Raport</title>

  <style>

    .page {
      width: 21cm;
      min-height: 29.7cm;
      padding: 2cm;
      margin: 1cm auto;
      border: 1px #D3D3D3 solid;
      border-radius: 5px;
      background: white;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      }

    @page  {
      size: A4;
      margin: 0;
    }

    @media print {
      tr, td {
        border: 1px solid black;
      }

      td {
        margin-left: 5px;
      }

}

    table {
       border-collapse: collapse;
        margin-top: 10px;
     }

     tr, td {
       border: 1px solid black;
     }

     td {
       margin-left: 5px;
     }

  </style>
</head>
<body>

  <div  class="page">

<div class="head">

      <h3 align="right">Aprobat___________________________<br>
          Nume / Prenume___________________________<br>
          Data___________________________
      </h3>
</div><br><br>


    <div style="text-align: center">
      <h3 style="text-transform: padding: 0px; margin: 0px;">Formular de instalare a piesei de schimb/accesoriu la dispozitivul medical</h3>
    </div><br><br>

    <?php
      $sql="SELECT * FROM formular";
        $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
        while($row = mysqli_fetch_array ($result_set) )
        {
    ?>

    <strong><label>Date beneficiar:</label></strong>
    <table width="100%">
      <tr>
        <th>Cabinetul:</th>
        <td><?= $row['cabinet'] ?></td>
        <th rowspan="2" style="vertical-align: middle;">Executor:</th>
        <td rowspan="2"><?= $row['executor'] ?></td>
      </tr>
      <tr>
        <th style="vertical-align: middle;">Sectia:</th>
        <td>
          <?php
          $section_id = $row['section_id'];
          $section_query = "SELECT  section from sectie where id = " . $section_id;
          $result = mysqli_query($conn, $section_query) or die(mysqli_error($conn));
          $section_name = mysqli_fetch_assoc($result)['section'];
          echo $section_name;
          ?>
         </td>
      </tr>
    </table><br><br>

    <strong><label>Date dispozitiv medical:</label></strong>
      <table width="100%">
        <tr>
          <td>Denumire dispozitiv:</td>
          <td><?= $row['nume_dispozitiv'] ?></td>
          <td>Anul producerii: </td>
          <td><?= $row['anul_producerii_dispozitiv'] ?></td>
        </tr>
        <tr>
          <td>Model:</td>
          <td><?= $row['model_dispozitiv'] ?></td>
          <td>Nr. serie:</td>
          <td colspan="4"><?= $row['nr_serie_dispozitiv'] ?></td>
        </tr>
        <tr>
          <td>Producator:</td>
          <td><?= $row['producator_dispozitiv'] ?></td>
          <td>Numar inventar:</td>
          <td colspan="4"><?= $row['numar_inventar'] ?></td>
        </tr>
      </table>
      <?php		}		?>
  </div>

</body>
</html>
