<?php
include('db_connect.php');
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Raport</title>
    <link rel="shortcut icon" href="img/logo.png" />


  <style media="print">
    tr, td {
      border: 1px solid black;
      padding-left: 2px;
    }
    table {
       border-collapse: collapse;
        margin-top: 10px;
     }
  </style>
  <style media="screen">

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

    table {
       border-collapse: collapse;
        margin-top: 10px;
     }

     tr, td {
       border: 1px solid black;
       padding-left: 5px;
     }

     tr { border: solid thin; }

  </style>
</head>
<body>

  <div  class="page">

<div class="head">

      <h3 align="right">
          Aprobat___________________________<br>
          Nume / Prenume___________________________<br>
          Data___________________________
      </h3>
</div><br><br>


    <div style="text-align: center">
      <h3 style="text-transform: padding: 0px; margin: 0px;">Fișa de deservire a dispozitivul medical</h3>
    </div><br><br>

    <?php
      $sql="SELECT * FROM formular_2 where id =" . $_GET['id'];
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
        <th>Secția:</th>
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
          <td width="25%">Denumire dispozitiv:</td>
          <td width="30%"><?= $row['nume_dispozitiv'] ?></td>
          <td width="20%">Anul producerii: </td>
          <td width="25%"><?= $row['anul_producerii_dispozitiv'] ?></td>
        </tr>
        <tr>
          <td>Model:</td>
          <td><?= $row['model_dispozitiv'] ?></td>
          <td>Nr. serie:</td>
          <td colspan="4"><?= $row['nr_serie_dispozitiv'] ?></td>
        </tr>
        <tr>
          <td>Producător:</td>
          <td><?= $row['producator_dispozitiv'] ?></td>
          <td>Numar inventar:</td>
          <td colspan="4"><?= $row['numar_inventar'] ?></td>
        </tr>
      </table><br><br>

      <strong><label>Descrierea defecțiunii:</label></strong>
      <table width="100%">
        <tr>
          <td><?= $row['desc_defect'] ?></td>
        </tr>
      </table><br>

      <strong><label>Cauza defecțiunii:</label></strong>
      <table width="100%">
        <tr>
          <td>|<?= $row['cauza_defect'] ?></td>
        </tr>
      </table><br>

      <strong><label>Raport de reparație:</label></strong>
      <table width="100%">
        <tr>
          <td rowspan="2" style="vertical-align: middle;">Acțiuni întreprinse:</td>
          <td><?= $row['actiuni'] ?></td>
          <td style="vertical-align: middle;">Data: <br> Ore:</td>
          <td><?= $row['data_instalarii'] ?> <br> <?= $row['ore'] ?></td>
        </tr>
        <tr>
          <td>Testarea funcționării după reparație:</td>
          <td colspan="2"><?= $row['chek'] ?></td>
        </tr>
      </table><br>

      <strong><label>Materiale utilizate:</label></strong>
      <table width="100%">
        <tr>
          <td style="height: 20px;"><?= $row['materiale'] ?></td>
        </tr>
      </table><br>

      <strong><label for="comment">Comentarii:</label></strong>
      <table width="100%">
        <tr>
          <td style="height: 20px;"><?= $row['comentarii'] ?></td>
        </tr>
      </table><br><br><br>

      <table width="100%" >
        <tr style="border:none;">
          <td style="border:none;" width="60%"><strong> Șef secție: </strong> <?= $row['beneficiar'] ?></td>
          <td style="border:none;">Semnătura ____________________</td>
        </tr>
      </table><br>
      <table width="100%" >
        <tr style="border:none;">
          <td style="border:none;" width="60%"><strong> Executor/Inginer: </strong> <?= $row['inginer1'] ?></td>
          <td style="border:none;">Semnătura ____________________</td>
        </tr>
      </table><br>
      <table width="100%" >
        <tr style="border:none;">
          <td style="border:none;" width="60%"><strong> Executor/Inginer: </strong> <?= $row['inginer2'] ?></td>
          <td style="border:none;">Semnătura ____________________</td>
        </tr>
      </table><br>
      <table width="100%" >
        <tr style="border:none;">
          <td style="border:none;" width="60%"><strong> Executor/Inginer: </strong> <?= $row['inginer3'] ?></td>
          <td style="border:none;">Semnătura ____________________</td>
        </tr>
      </table>


      <?php		}		?>
  </div>

</body>
</html>
