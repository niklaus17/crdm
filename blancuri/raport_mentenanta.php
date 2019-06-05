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
      <h3 style="text-transform: padding: 0px; margin: 0px;">Fișa de mentenanță a dispozitivului medical</h3>
    </div><br><br>

    <?php
      $sql="SELECT * FROM formular_3 where id =" . $_GET['id'];
        $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
        while($row = mysqli_fetch_array ($result_set) )
        {
    ?>

    <strong><label>Date beneficiar:</label></strong>
    <table width="100%">
      <tr>
        <th width="25%">Cabinetul:</th>
        <td><?= $row['cabinet3'] ?></td>
        <th rowspan="2" style="vertical-align: middle;" width="6%">Executor:</th>
        <td rowspan="2"><?= $row['executor3'] ?></td>
      </tr>
      <tr>
        <th>Secția:</th>
        <td width="41%">
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
          <td width="30%"><?= $row['nume_dispozitiv3'] ?></td>
          <td width="20%">Anul producerii: </td>
          <td width="25%"><?= $row['anul_producerii_dispozitiv3'] ?></td>
        </tr>
        <tr>
          <td>Model:</td>
          <td><?= $row['model_dispozitiv3'] ?></td>
          <td>Nr. serie:</td>
          <td colspan="4"><?= $row['nr_serie_dispozitiv3'] ?></td>
        </tr>
        <tr>
          <td>Producător:</td>
          <td><?= $row['producator_dispozitiv3'] ?></td>
          <td>Număr inventar:</td>
          <td colspan="4"><?= $row['numar_inventar3'] ?></td>
        </tr>
      </table><br><br>

      <strong><label>Durata de exploatare a dispozitivului medical:</label></strong>
      <table width="100%">
        <tr>
          <td>Data de procurare:</td>
          <td><?= $row['data_proc'] ?></td>
          <td>Data de instalare:</td>
          <td><?= $row['data_inst'] ?></td>
        </tr>
      </table>
      <br>

      <table width="100%">
        <tr>
          <th>Mentenață</th>
          <th>Supus</th>
          <th colspan="3">Rsponsabil, informații de contact:</th>
        </tr>
        <tr>
          <td>Mentenață preventivă:</td>
          <td><?= $row['chek1_3'] ?></td>
          <td colspan="2"><?= $row['respons'] ?></td>
        </tr>
        <tr>
          <td>Verificarea periodică:</td>
          <td><?= $row['chek2_3'] ?></td>
          <td>Periodicitatea:</td>
          <td><?= $row['luni3'] ?> luni</td>
        </tr>
      </table><br>

      <strong><label for="comment">Comentarii:</label></strong>
      <table width="100%">
        <tr>
          <td style="height: 20px;"><?= $row['comentarii3'] ?></td>
        </tr>
      </table><br><br><br>

      <table width="100%" >
        <tr style="border:none;">
          <td style="border:none;" width="60%"><strong> Șef secție: </strong> <?= $row['beneficiar3'] ?></td>
          <td style="border:none;">Semnătura ____________________</td>
        </tr>
      </table><br>
      <table width="100%" >
        <tr style="border:none;">
          <td style="border:none;" width="60%"><strong> Executor/Inginer: </strong> <?= $row['inginer1_3'] ?></td>
          <td style="border:none;">Semnătura ____________________</td>
        </tr>
      </table><br>
      <table width="100%" >
        <tr style="border:none;">
          <td style="border:none;" width="60%"><strong> Executor/Inginer: </strong> <?= $row['inginer2_3'] ?></td>
          <td style="border:none;">Semnătura ____________________</td>
        </tr>
      </table><br>
      <table width="100%" >
        <tr style="border:none;">
          <td style="border:none;" width="60%"><strong> Executor/Inginer: </strong> <?= $row['inginer3_3'] ?></td>
          <td style="border:none;">Semnătura ____________________</td>
        </tr>
      </table>

      <?php		}		?>
  </div>

</body>
</html>
