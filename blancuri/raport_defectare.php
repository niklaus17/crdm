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

<?php
  $sql="SELECT * FROM formular_4 where id =" . $_GET['id'];
    $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
    while($row = mysqli_fetch_array ($result_set) )
    {
?>
    <div style="text-align: center">
      <h3 style="text-transform: padding: 0px; margin: 0px;">Formular de  <?= $row['chek1'] ?> a dispozitivului medical</h3>
    </div><br><br>

    <strong><label>Se completează de către secția medicală:</label></strong>
    <table width="100%">
      <tr>
        <td width="5%">1</td>
        <td width="40%">Denumirea instituției:</td>
        <td><?= $row['institutia'] ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Locația:</td>
        <td><?= $row['locatia'] ?></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Număr inventar:</td>
        <td><?= $row['numar_inventar'] ?></td>
      </tr>
      <tr>
        <td>4</td>
        <td>Data de non-utilizare a dispozitivului medical:</td>
        <td><?= $row['data_non'] ?></td>
      </tr>
    </table><br>

    <strong><label>Se completează de către departamentul/secția de inginerie biomedicală:</label></strong>
    <table width="100%">
      <tr>
        <td width="5%">5</td>
        <td width="40%">Producator:</td>
        <td><?= $row['producator'] ?></td>
      </tr>
      <tr>
        <td>6</td>
        <td>Anul producerii:</td>
        <td><?= $row['anul_producerii'] ?></td>
      </tr>
      <tr>
        <td>7</td>
        <td>Nume dispozitiv:</td>
        <td><?= $row['nume_dispozitiv'] ?></td>
      </tr>
      <tr>
        <td>8</td>
        <td>Model:</td>
        <td><?= $row['model'] ?></td>
      </tr>
      <tr>
        <td>9</td>
        <td>Numar de serie:</td>
        <td><?= $row['numar_serie'] ?></td>
      </tr>
      <tr>
        <td>10</td>
        <td>Număr inventar:</td>
        <td><?= $row['numar_inventar_2'] ?></td>
      </tr>
    </table><br>

    <strong><label>Se completează de către departamentul contabilitate:</label></strong>
    <table width="100%">
      <tr>
        <td width="5%">11</td>
        <td width="40%">Uzura:</td>
        <td><<?= $row['uzura'] ?></td>
      </tr>
      <tr>
        <td>12</td>
        <td>Data dării în exploatare:</td>
        <td><?= $row['data_exploatare'] ?></td>
      </tr>
      <tr>
        <td>13</td>
        <td>Termenul de eploatare:</td>
        <td><?= $row['termen'] ?></td>
      </tr>
      <tr>
        <td>14</td>
        <td>Preț nominal:</td>
        <td><?= $row['pret'] ?></td>
      </tr>
      <tr>
        <td>15</td>
        <td>Valoarea curentă a dispozitivului:</td>
        <td><?= $row['valoarea'] ?></td>
      </tr>
    </table><br>

    <strong><label>Descrierea stării tehnice a dispozitivului:</label></strong>
    <table width="100%">
      <tr>
        <td style="height: 20px;"><?= $row['descrierea'] ?></td>
      </tr>
    </table>
    <br>

    <strong><label>Cauza neutralizarii:</label></strong>
    <table width="100%">
      <tr>
        <td style="height: 20px;"><?= $row['cauza'] ?></td>
      </tr>
    </table>
    <br>

    <strong><label>Nota:</label></strong>
    <table width="100%">
      <tr>
        <td style="height: 20px;"><?= $row['nota'] ?></td>
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
