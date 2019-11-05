<?php
include('header.php');
include('navbar.php');
?>
  <style media="screen">
    .alert {
      position: absolute;
      top: 20px;
      left: 40vw;
      opacity: 0.9;
    }
    ul {
      list-style-type: none;
      margin: 0 0 10px, 0;
      padding: 0;
    }
  </style>

  <title>CRDM - Formular</title>
  <?php
    if (isset($_GET['success'])) {
      ?>

      <div class="alert alert-success">
        <strong>Success!</strong> Incarcare cu success!
      </div>

    <?php } ?>

  <body>
      <?php if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) { ?>

      <!-- /.modal-For insert date -->
      <div id="add_data_Modal" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Formular de instalare a piesei de schimb/accesoriu la dispozitivul medical</h4>
            </div>
            <form action="upload_formular.php" method="post" enctype="multipart/form-data" id="insert_form">

              <div class="modal-body">

                <label>Date beneficiar:</label>
                <table class="table table-bordered">
                  <tr>
                    <th style="vertical-align: middle;">Cabinetul:</th>
                    <td>
                      <input type="text" name="cabinet" class="form-control" required>
                    </td>
                    <th style="vertical-align: middle;">Executor:</th>
                    <td>
                      <input type="text" name="executor" class="form-control" required>
                    </td>
                  </tr>
                  <tr>
                    <th style="vertical-align: middle;">Sectia:</th>
                    <td>
                      <input type="hidden" name="id" id="id" value="">
                      <select name="section_id" id="section_id" class="form-control" required>
                        <option value="">SELECT</option>
                        <?php
                          $sql="SELECT * FROM sectie";
                          $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                          while($row = mysqli_fetch_array ($result_set) )
                          {
                            echo "<option value=\"" . $row['id'] . "\">" . $row['section'] ."</option>";
                          }
                      ?>
                      </select>
                    </td>
                    <th style="vertical-align: middle;">Data efectuării:</th>
                    <td>
                      <input type="text" name="data1" class="form-control datepicker-here" value="" placeholder="yyyy-mm-dd" required>
                    </td>
                  </tr>
                </table>

                <label>Date dispozitiv medical:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Denumire dispozitiv:</td>
                    <td>
                      <input type="text" name="nume_dispozitiv" class="form-control">
                    </td>
                    <td>Anul producerii:</td>
                    <td>
                      <input type="text" name="anul_producerii_dispozitiv" autocomplete="off" class="form-control datepicker-here" value="" placeholder="yyyy-mm-dd">
                    </td>
                  </tr>
                  <tr>
                    <td>Model:</td>
                    <td>
                      <input type="text" name="model_dispozitiv" class="form-control">
                    </td>
                    <td>Nr. serie:</td>
                    <td colspan="4">
                      <input type="text" name="nr_serie_dispozitiv" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Producător:</td>
                    <td>
                      <input type="text" name="producator_dispozitiv" class="form-control">
                    </td>
                    <td>Număr inventar:</td>
                    <td colspan="4">
                      <input type="text" name="numar_inventar" class="form-control" required>
                    </td>
                  </tr>
                </table>

                <label>Date piesa/accesoriu:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Denumire piesă/accesoriu:</td>
                    <td>
                      <input type="text" name="denumire_piesa" class="form-control">
                    </td>
                    <td>Anul producerii:</td>
                    <td>
                      <input type="text" name="anul_producerii_piesa" autocomplete="off" class="form-control datepicker-here"  placeholder="yyyy-mm-dd">
                    </td>
                  </tr>
                  <tr>
                    <td>Model:</td>
                    <td>
                      <input type="text" name="model_piesa" class="form-control">
                    </td>
                    <td>Nr. serie:</td>
                    <td colspan="4">
                      <input type="text" name="nr_serie_dispozitiv_piesa" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Producător:</td>
                    <td>
                      <input type="text" name="producator_piesa" class="form-control">
                    </td>
                    <td>Part number:</td>
                    <td colspan="4">
                      <input type="text" name="part_number" class="form-control">
                    </td>
                  </tr>
                </table>

                <label>Date cu privire la dispozitivul medical pentru care a fost instalată piesa/accesoriul:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Denumire piesă/accesoriu:</td>
                    <td>
                      <input type="text" name="denumire_piesa_instal" class="form-control">
                    </td>
                    <td>Anul producerii:</td>
                    <td>
                      <input type="text" name="anul_producerii_piesa_instal" autocomplete="off" class="form-control datepicker-here"  placeholder="yyyy-mm-dd">
                    </td>
                  </tr>
                  <tr>
                    <td>Model:</td>
                    <td>
                      <input type="text" name="model_piesa_instal" class="form-control">
                    </td>
                    <td>Nr. serie:</td>
                    <td>
                      <input type="text" name="nr_serie_dispozitiv_instal" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Producător:</td>
                    <td>
                      <input type="text" name="producator_piesa_instal" class="form-control">
                    </td>
                    <td>Altele*:</td>
                    <td>
                      <input type="text" name="altele" class="form-control">
                    </td>
                  </tr>
                </table>

                <label>Inspecție/Test de funcționalitate:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Data instalarii/ Montării:</td>
                    <td>
                      <input type="text" name="data_instalarii" autocomplete="off" class="form-control datepicker-here"  placeholder="yyyy-mm-dd">
                    </td>
                    <td>Perioada de garanție:</td>
                    <td>
                      <input type="number" name="garantie" class="form-control" placeholder="luni">
                    </td>
                  </tr>
                  <tr>
                    <td>Test de operare (verificarea funcționalității)</td>
                    <td colspan="4">
                      <input name="net" type="radio" value="Da"> Da &nbsp;&nbsp;
                      <input name="net" type="radio" value="Nu"> Nu
                    </td>
                  </tr>
                </table>

                <label for="comment">Comentarii:</label>
                <textarea class="form-control" rows="3" name="comentarii"></textarea>
                <br>

                <table class="table table-bordered">
                  <tr>
                    <td><strong>Beneficiar:</strong></td>
                    <td><strong>Executor/Inginer:</strong></td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" name="beneficiar" class="form-control" placeholder="nume, prenume">
                    </td>
                    <td>
                      <input type="text" name="furnizor" class="form-control" placeholder="nume, prenume">
                      <input type="text" name="furnizor1" class="form-control" placeholder="nume, prenume">
                      <input type="text" name="furnizor2" class="form-control" placeholder="nume, prenume">
                    </td>
                  </tr>
                </table>
              </div>

              <div class="modal-footer">
                <button type="submit" name="btn-upload" class="btn btn-primary">Încărcați</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- /.modal-For insert date 2 -->
      <div id="add_data_Modal_2" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Fisa de deservire a dispozitivului medical</h4>
            </div>
            <form action="upload_formular_2.php" method="post" enctype="multipart/form-data" id="insert_form_2">

              <div class="modal-body">

                <label>Date beneficiar:</label>
                <table class="table table-bordered">
                  <tr>
                    <th style="vertical-align: middle;">Cabinetul:</th>
                    <td>
                      <input type="text" name="cabinet2" class="form-control" required>
                    </td>
                    <th style="vertical-align: middle;">Executor:</th>
                    <td style="vertical-align: middle;">
                      <input type="text" name="executor2" class="form-control" required>
                    </td>
                  </tr>
                  <tr>
                    <th style="vertical-align: middle;">Sectia:</th>
                    <td>
                      <input type="hidden" name="id" id="id" value="">
                      <select name="section_id" id="section_id" class="form-control" required>
                        <option value="">SELECT</option>
                        <?php
                          $sql="SELECT * FROM sectie";
                          $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                          while($row = mysqli_fetch_array ($result_set) )
                          {
                            echo "<option value=\"" . $row['id'] . "\">" . $row['section'] ."</option>";
                          }
                      ?>
                      </select>
                    </td>
                    <th style="vertical-align: middle;">Data efectuării:</th>
                    <td>
                      <input type="text" name="data2" class="form-control datepicker-here" value="" placeholder="yyyy-mm-dd" required>
                    </td>
                  </tr>
                </table>


                <label>Date dispozitiv medical:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Denumire dispozitiv:</td>
                    <td>
                      <input type="text" name="nume_dispozitiv2" class="form-control">
                    </td>
                    <td>Anul producerii:</td>
                    <td>
                      <input type="text" name="anul_producerii_dispozitiv2" autocomplete="off" class="form-control datepicker-here">
                    </td>
                  </tr>
                  <tr>
                    <td>Model:</td>
                    <td>
                      <input type="text" name="model_dispozitiv2" class="form-control">
                    </td>
                    <td>Nr. serie:</td>
                    <td colspan="4">
                      <input type="text" name="nr_serie_dispozitiv2" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Producator:</td>
                    <td>
                      <input type="text" name="producator_dispozitiv2" class="form-control">
                    </td>
                    <td>Numar inventar:</td>
                    <td colspan="4">
                      <input type="text" name="numar_inventar2" class="form-control" required>
                    </td>
                  </tr>
                </table>

                <label for="comment">Descrierea defectiunii:</label>
                <textarea class="form-control" rows="2" name="desc_defect"></textarea>
                <br>

                <label for="comment">Cauza defectiunii:</label>
                <textarea class="form-control" rows="2" name="cauza_defect"></textarea>
                <br>

                <label>Raport de reparatie:</label>
                <table class="table table-bordered">
                  <tr>
                    <td rowspan="2" style="vertical-align: middle;">Actiuni intreprinse:</td>
                    <td>
                      <textarea class="form-control" rows="4" name="actiuni"></textarea>
                    </td>
                    <td style="vertical-align: middle;">Data: <br> Ore:</td>
                    <td>
                      <input type="text" name="data_instalarii2" autocomplete="off" class="form-control datepicker-here"><br>
                      <input type="number" name="ore" class="form-control" placeholder="ore">
                    </td>
                  </tr>
                  <tr>
                    <td>Testarea functionarii dupa reparatie</td>
                    <td colspan="4">
                      <input name="chek" type="radio" value="Functional"> Functional &nbsp;&nbsp;
                      <input name="chek" type="radio" value="Nefunctional"> Nefunctional
                    </td>
                  </tr>
                </table>

                <label for="materiale">Materiale utilizate:</label>
                <textarea class="form-control" rows="2" name="materiale"></textarea>
                <br>

                <label for="comentarii">Comentarii:</label>
                <textarea class="form-control" rows="2" name="comentarii2"></textarea>
                <br>

                <table class="table table-bordered">
                  <tr>
                    <td><strong>Sef sectie:</strong></td>
                    <td><strong>Executor / Inginer:</strong></td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" name="beneficiar2" class="form-control" placeholder="nume, prenume">
                    </td>
                    <td>
                      <input type="text" name="inginer1" class="form-control" placeholder="nume, prenume">
                      <input type="text" name="inginer2" class="form-control" placeholder="nume, prenume">
                      <input type="text" name="inginer3" class="form-control" placeholder="nume, prenume">
                    </td>
                  </tr>
                </table>
              </div>

              <div class="modal-footer">
                <button type="submit" name="btn-upload" class="btn btn-primary">Încărcați</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- /.modal-For insert date 3 -->
      <div id="add_data_Modal_3" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Fișa de mentenanța a dispozitivului medical</h4>
            </div>
            <form action="upload_formular_3.php" method="post" enctype="multipart/form-data" id="insert_form_3">

              <div class="modal-body">

                <label>Date beneficiar:</label>
                <table class="table table-bordered">
                  <tr>
                    <th style="vertical-align: middle;">Cabinetul:</th>
                    <td>
                      <input type="text" name="cabinet3" class="form-control" required>
                    </td>
                    <th style="vertical-align: middle;">Executor:</th>
                    <td style="vertical-align: middle;">
                      <input type="text" name="executor3" class="form-control" required>
                    </td>
                  </tr>
                  <tr>
                    <th style="vertical-align: middle;">Sectia:</th>
                    <td>
                      <input type="hidden" name="id" id="id" value="">
                      <select name="section_id" id="section_id" class="form-control" required>
                        <option value="">SELECT</option>
                        <?php
                          $sql="SELECT * FROM sectie";
                          $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                          while($row = mysqli_fetch_array ($result_set) )
                          {
                            echo "<option value=\"" . $row['id'] . "\">" . $row['section'] ."</option>";
                          }
                      ?>
                      </select>
                    </td>
                    <th style="vertical-align: middle;">Data efectuării:</th>
                    <td>
                      <input type="text" name="data3" class="form-control datepicker-here" value="" placeholder="yyyy-mm-dd" required>
                    </td>
                  </tr>
                </table>

                <label>Date dispozitiv medical:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Denumire dispozitiv:</td>
                    <td>
                      <input type="text" name="nume_dispozitiv3" class="form-control">
                    </td>
                    <td>Anul producerii:</td>
                    <td>
                      <input type="text" name="anul_producerii_dispozitiv3" autocomplete="off" class="form-control datepicker-here"  placeholder="yyyy-mm-dd">
                    </td>
                  </tr>
                  <tr>
                    <td>Model:</td>
                    <td>
                      <input type="text" name="model_dispozitiv3" class="form-control">
                    </td>
                    <td>Nr. serie:</td>
                    <td colspan="4">
                      <input type="text" name="nr_serie_dispozitiv3" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Producător:</td>
                    <td>
                      <input type="text" name="producator_dispozitiv3" class="form-control">
                    </td>
                    <td>Număr inventar:</td>
                    <td colspan="4">
                      <input type="text" name="numar_inventar3" class="form-control" required>
                    </td>
                  </tr>
                </table>
                <br>

                <table class="table table-bordered">
                  <tr>
                    <td>Model:</td>
                    <td>
                      <input type="text" name="model_1_3" class="form-control">
                    </td>
                    <td>Nr. serie:</td>
                    <td>
                      <input type="text" name="nr_serie_1_3" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Model:</td>
                    <td>
                      <input type="text" name="model_2_3" class="form-control">
                    </td>
                    <td>Nr. serie:</td>
                    <td colspan="4">
                      <input type="text" name="nr_serie_2_3" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Model:</td>
                    <td>
                      <input type="text" name="model_3_3" class="form-control">
                    </td>
                    <td>Nr. serie:</td>
                    <td colspan="4">
                      <input type="text" name="nr_serie_3_3" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Model:</td>
                    <td>
                      <input type="text" name="model_4_3" class="form-control">
                    </td>
                    <td>Nr. serie</td>
                    <td>
                      <input type="text" name="nr_serie_4_3" class="form-control">
                    </td>
                  </tr>
                </table>
                <br>

                <table class="table table-bordered">
                  <tr>
                    <th>Mentenața</th>
                    <th>Supus</th>
                    <th colspan="3">Rsponsabil, informații de contact:</th>
                  </tr>
                  <tr>
                    <td>Mentenața preventivă:</td>
                    <td>
                      <input name="chek1_3" type="radio" value="Da"> Da &nbsp;&nbsp;
                      <input name="chek1_3" type="radio" value="Nu"> Nu
                    </td>
                    <td colspan="2"><input type="text" name="respons" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Verificarea periodică:</td>
                    <td>
                      <input name="chek2_3" type="radio" value="Da"> Da &nbsp;&nbsp;
                      <input name="chek2_3" type="radio" value="Nu"> Nu
                    </td>
                    <td>Periodicitatea:</td>
                    <td><input type="number" name="luni3" class="form-control" placeholder="luni"></td>
                  </tr>
                </table>

                <label for="comentarii">Comentarii:</label>
                <textarea class="form-control" rows="2" name="comentarii3"></textarea>
                <br>

                <table class="table table-bordered">
                  <tr>
                    <td><strong>Șef secție:</strong></td>
                    <td><strong>Executor / Inginer:</strong></td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" name="beneficiar3" class="form-control" placeholder="nume, prenume">
                    </td>
                    <td>
                      <input type="text" name="inginer1_3" class="form-control" placeholder="nume, prenume">
                      <input type="text" name="inginer2_3" class="form-control" placeholder="nume, prenume">
                      <input type="text" name="inginer3_3" class="form-control" placeholder="nume, prenume">
                    </td>
                  </tr>
                </table>
              </div>

              <div class="modal-footer">
                <button type="submit" name="btn-upload" class="btn btn-primary">Încărcați</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- /.modal-For insert date 4 -->
      <div id="add_data_Modal_4" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Formular de defectare, conservare, casare a dispozitivului medical</h4>
            </div>
            <form action="upload_formular_4.php" method="post" enctype="multipart/form-data" id="insert_form_4">

              <div class="modal-body">

                <label>Formular de:</label> &nbsp;&nbsp;
                <input name="chek1_4" type="radio" value="defectare" required> Defectare &nbsp;&nbsp;
                <input name="chek1_4" type="radio" value="conservare" required> Conservare &nbsp;&nbsp;
                <input name="chek1_4" type="radio" value="casare" required> Casare &nbsp;&nbsp;

                <label>Data efectuării:</label>
                <label>
                <input type="text" name="data4" class="form-control datepicker-here" value="" placeholder="yyyy-mm-dd" required>
                </label><br>
                <label>Se completează de către secția medicală:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>1</td>
                    <td width="40%">Denumirea instituției:</td>
                    <td>
                      <input type="text" name="institutia" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Locația:</td>
                    <td>
                      <input type="text" name="locatia" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Număr inventar:</td>
                    <td>
                      <input type="text" name="numar_inventar4" class="form-control" required>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Data de non-utilizare a dispozitivului medical:</td>
                    <td><input type="text" name="data_non" autocomplete="off" class="form-control datepicker-here" placeholder="yyyy-mm-dd"></td>
                  </tr>
                </table>

                <label>Se completeaza de către departamentul/secția de inginerie biomedicală:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>5</td>
                    <td>Producător:</td>
                    <td><input type="text" name="producator" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>Anul producerii:</td>
                    <td><input type="text" name="anul_producerii" autocomplete="off" class="form-control datepicker-here" placeholder="yyyy-mm-dd"></td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>Nume dispozitiv:</td>
                    <td><input type="text" name="nume_dispozitiv4" class="form-control" required></td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>Model:</td>
                    <td><input type="text" name="model" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>Număr de serie:</td>
                    <td><input type="text" name="numar_serie" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td>Număr inventar:</td>
                    <td><input type="text" name="numar_inventar2_4" class="form-control"></td>
                  </tr>
                </table>

                <label>Se completează de către departamentul contabilitate:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>11</td>
                    <td>Uzura:</td>
                    <td><input type="text" name="uzura" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>12</td>
                    <td>Data dării în exploatare:</td>
                    <td><input type="text" name="data_exploatare" autocomplete="off" class="form-control datepicker-here" placeholder="yyyy-mm-dd"></td>
                  </tr>
                  <tr>
                    <td>13</td>
                    <td>Termenul de eploatare:</td>
                    <td><input type="text" name="termen" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>14</td>
                    <td>Preț nominal:</td>
                    <td><input type="text" name="pret" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>15</td>
                    <td>Valoarea curentă a dispozitivului:</td>
                    <td><input type="text" name="valoarea" class="form-control"></td>
                  </tr>
                </table>

                <label>Descrierea stării tehnice a dispozitivului:</label>
                <textarea class="form-control" rows="2" name="descrierea"></textarea>
                <br>

                <label>Cauza neutralizarii:</label>
                <textarea class="form-control" rows="2" name="cauza"></textarea>
                <br>

                <label>Notă:</label>
                <textarea class="form-control" rows="2" name="nota"></textarea>
                <br>

                <table class="table table-bordered">
                  <tr>
                    <td><strong>Șef secție:</strong></td>
                    <td><strong>Șef contabil:</strong></td>
                    <td><strong>Șef TI si TM:</strong></td>
                    <td><strong>Executor / Inginer:</strong></td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" name="beneficiar4" class="form-control" placeholder="nume, prenume">
                    </td>
                    <td>
                      <input type="text" name="contabil" class="form-control" placeholder="nume, prenume">
                    </td>
                    <td>
                      <input type="text" name="it" class="form-control" placeholder="nume, prenume">
                    </td>
                    <td>
                      <input type="text" name="inginer1_4" class="form-control" placeholder="nume, prenume">
                      <input type="text" name="inginer2_4" class="form-control" placeholder="nume, prenume">
                      <input type="text" name="inginer3_4" class="form-control" placeholder="nume, prenume">
                    </td>
                  </tr>
                </table>
              </div>

              <div class="modal-footer">
                <button type="submit" name="btn-upload" class="btn btn-primary">Încărcați</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
          <div class="panel-body">

            <ul class="nav nav-tabs">
              <li class="active"><a href="#A" data-toggle="tab">Formular de instalare</a></li>
              <li><a href="#B" data-toggle="tab">Fișă de deservire</a></li>
              <li><a href="#C" data-toggle="tab">Fișă de mentenanță</a></li>
              <li><a href="#D" data-toggle="tab">Formular de defectare</a></li>
            </ul>

            <div class="tabbable">
              <div class="tab-content">
                <div class="tab-pane active" id="A">
                  <div class="well well-sm">
                    <div class="container" id="tourpackages-carousel">

                      <div class="row">
                        <div class="col-lg-12">
                            <a class="btn icon-btn btn-primary pull-right"
                            data-toggle="modal" data-target="#add_data_Modal">
                            <span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span>
                            Adaugă formular de instalare
                          </a>
                        </div>

                        <?php
                           $sql="SELECT * FROM formular order by id DESC";
                          $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                          while($row = mysqli_fetch_array ($result_set) )
                          {
                        ?>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><br>
                          <div class="thumbnail">
                            <div class="caption">
                              <div class='col-lg-12'>
                                <span>Adăugat de : <?= $row['name'] ?></span>
                                <a href="#" class="confirm-delete" data-toggle="modal" data-target="#delete_Modal<?= $row['id']?>" data-id="<?php  echo $row[" id "] ?>"><span class="glyphicon glyphicon-trash pull-right text-danger"></span></a>
                                <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#edit_data_Modal_1"><span class="glyphicon glyphicon-edit pull-right text-primary"></span></a>
                              </div>
                              <div class='col-lg-12 well well-add-card'>
                                <h4>Cabinetul: <?= $row['cabinet'] ?></h4>
                                <h4>Nr. inventar: <?= $row['numar_inventar'] ?></h4>
                                <h4>Data efectuării: <?= explode(' ', $row['data1'])[0] ?></h4>
                              </div>
                              <div class='col-lg-12'>

                                        <!-- Modal fisiere -->
                                        <div class="modal fade" id="myModal<?= $row['id']?>" role="dialog">
                                          <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Fișiere încarcate</h4>
                                              </div>
                                              <div class="modal-body">
                                                <?php
                                                  $sql="SELECT * FROM uploads where formular_id = " .   $row['id'];
                                                  $result_set_files=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                                                  $total = $result_set_files->num_rows;
                                                  echo '<ul>';
                                                  while($rowIn = mysqli_fetch_array ($result_set_files) )
                                                  {
                                                    echo "<li><a href=\"uploads/" . $rowIn['file'] . "\" target=\"blank\" > " . $rowIn['file'] . "</a> din " .  explode(' ', $rowIn['data_upload'])[0] .
                                                    "<span class='glyphicon glyphicon-trash pull-right text-primary confirm-delete-file' data-id=" . $rowIn['id'] . " style='cursor:pointer'></span>"."</li>";
                                                  }
                                                  echo '</ul>'
                                                ?>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                              </div>

                      <a href="raport_instal.php?id=<?php echo $row['id'] ?>" target="_blank">
                        <button type="button" class="btn btn-danger btn-xs">Print raport</button>
                      </a>
                      <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#upload_data_Modal">
                        <button type="button" class="btn btn-primary btn-xs btn-add-file">Add file</button>
                      </a>
                      <button type="button" class="btn btn-info btn-xs btn-add-file" data-toggle="modal" data-target="#myModal<?= $row['id']?>">View files <span class="badge"> <?= $total ?></span></button>
                    </div>
                  </div>
                </div>

                <!-- /.modal-For Delete date -->
                <div id="delete_Modal<?= $row['id']?>" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Confirmă ștergera</h4>
                      </div>
                      <div class="modal-body">
                        <p>Șterge
                          <?php echo '<span class="text-danger" >Cabinetul: ' . $row["cabinet"] . ', Executor: ' . $row["executor"] . '</span> '; ?></p>
                      </div>
                      <div class="modal-footer">
                        <a class="btn btn-danger" href="delete_formular.php?id=<?php echo $row['id'] ?>">Confirmă</a>
                        <a href="#" data-dismiss="modal" class="btn btn-secondary btn-cancel">Anulează</a>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <?php		}		?>
              </div>
              <!-- End row -->
            </div>
            <!-- End container -->
          </div>
        </div><!-- End #A -->

        <div class="tab-pane" id="B">
          <div class="well well-sm">
              <div class="container" id="tourpackages-carousel">
                <div class="row">
                  <div class="col-lg-12">
                      <a class="btn icon-btn btn-primary pull-right"
                      data-toggle="modal" data-target="#add_data_Modal_2">
                      <span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span>
                      Adaugă fișă de deservire
                    </a>
                  </div>

                  <?php
                     $sql="SELECT * FROM formular_2 order by id DESC";
                    $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                    while($row = mysqli_fetch_array ($result_set) )
                    {
                  ?>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><br>
                    <div class="thumbnail">
                      <div class="caption">
                        <div class='col-lg-12'>
                          <span>Adaugat de : <?= $row['name'] ?></span>
                          <a href="#" class="confirm-delete" data-toggle="modal" data-target="#delete_Modal_2<?= $row['id']?>" data-id="<?php  echo $row[" id "] ?>"><span class="glyphicon glyphicon-trash pull-right text-danger"></span></a>
                          <a href="#" class="modal-edit_2" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#edit_data_Modal_2"><span class="glyphicon glyphicon-edit pull-right text-primary"></span></a>
                        </div>
                        <div class='col-lg-12 well well-add-card'>
                          <h4>Cabinetul: <?= $row['cabinet2'] ?></h4>
                          <h4>Nr. inventar: <?= $row['numar_inventar2'] ?></h4>
                          <h4>Data efectuării: <?= explode(' ', $row['data2'])[0] ?></h4>
                        </div>
                        <div class='col-lg-12'>

                          <!-- Modal -->
                          <div class="modal fade" id="myModal2<?= $row['id']?>" role="dialog">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Fișiere încarcate</h4>
                                </div>
                                <div class="modal-body">
                                  <?php
                                    $sql="SELECT * FROM uploads2 where formular_id = " . $row['id'];
                                    $result_set_files=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                                    $total = $result_set_files->num_rows;
                                    echo '<ul>';
                                    while($rowIn = mysqli_fetch_array ($result_set_files) )
                                    {
                                      echo "<li><a href=\"uploads/" . $rowIn['file'] . "\" target=\"blank\" > " . $rowIn['file'] . "</a> din " .  explode(' ', $rowIn['data_upload'])[0] .
                                      "<span class='glyphicon glyphicon-trash pull-right text-primary confirm-delete-file2' data-id=" . $rowIn['id'] . " style='cursor:pointer'></span>"."</li>";
                                    }
                                    echo '</ul>'
                                  ?>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>

                </div>

                <a href="raport_deservire.php?id=<?php echo $row['id'] ?>" target="_blank">
                  <button type="button" class="btn btn-danger btn-xs">Print raport</button>
                </a>
                <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#upload_data_Modal_2">
                  <button type="button" class="btn btn-primary btn-xs btn-add-file">Add file</button>
                </a>
                <button type="button" class="btn btn-info btn-xs btn-add-file" data-toggle="modal" data-target="#myModal2<?= $row['id']?>">View files <span class="badge"> <?= $total ?></span></button>

              </div>
            </div>
          </div>

          <!-- /.modal-For Delete date -->
          <div id="delete_Modal_2<?= $row['id']?>" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Confirmă ștergera</h4>
                </div>
                <div class="modal-body">
                  <p>Șterge
                    <?php echo '<span class="text-danger" >Cabinetul: ' . $row["cabinet2"] . ', Executor: ' . $row["executor2"] . '</span> '; ?></p>
                </div>
                <div class="modal-footer">
                  <a class="btn btn-danger" href="delete_formular_2.php?id=<?php echo $row['id'] ?>">Confirmă</a>
                  <a href="#" data-dismiss="modal" class="btn btn-secondary btn-cancel">Anulează</a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <?php		}		?>
        </div>
        <!-- End row -->
      </div>
      <!-- End container -->

          </div>
        </div><!-- End #B -->

        <div class="tab-pane" id="C">
          <div class="well well-sm">
              <div class="container" id="tourpackages-carousel">
                <div class="row">
                  <div class="col-lg-12">
                      <a class="btn icon-btn btn-primary pull-right"
                      data-toggle="modal" data-target="#add_data_Modal_3">
                      <span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span>
                      Adaugă fișă de mentenanță
                    </a>
                  </div>

                  <?php
                     $sql="SELECT * FROM formular_3 order by id DESC";
                    $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                    while($row = mysqli_fetch_array ($result_set) )
                    {
                  ?>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><br>
                    <div class="thumbnail">
                      <div class="caption">
                        <div class='col-lg-12'>
                          <span>Adaugat de : <?= $row['name'] ?></span>
                          <a href="#" class="confirm-delete" data-toggle="modal" data-target="#delete_Modal_3<?= $row['id']?>" data-id="<?php  echo $row[" id "] ?>"><span class="glyphicon glyphicon-trash pull-right text-danger"></span></a>
                          <a href="#" class="modal-edit_3" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#edit_data_Modal_3"><span class="glyphicon glyphicon-edit pull-right text-primary"></span></a>
                        </div>
                        <div class='col-lg-12 well well-add-card'>
                          <h4>Cabinetul: <?= $row['cabinet3'] ?></h4>
                          <h4>Nr. inventar: <?= $row['numar_inventar3'] ?></h4>
                          <h4>Data efectuării: <?= explode(' ', $row['data3'])[0] ?></h4>
                        </div>
                        <div class='col-lg-12'>

                          <!-- Modal -->
                          <div class="modal fade" id="myModal3<?= $row['id']?>" role="dialog">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Fișiere încarcate</h4>
                                </div>
                                <div class="modal-body">
                                  <?php
                                    $sql="SELECT * FROM uploads3 where formular_id = " .   $row['id'];
                                    $result_set_files=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                                    $total = $result_set_files->num_rows;
                                    echo '<ul>';
                                    while($rowIn = mysqli_fetch_array ($result_set_files) )
                                    {
                                      echo "<li><a href=\"uploads/" . $rowIn['file'] . "\" target=\"blank\" > " . $rowIn['file'] . "</a> din " .  explode(' ', $rowIn['data_upload'])[0] .
                                      "<span class='glyphicon glyphicon-trash pull-right text-primary confirm-delete-file3' data-id=" . $rowIn['id'] . " style='cursor:pointer'></span>"."</li>";
                                    }
                                    echo '</ul>'
                                  ?>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                <a href="raport_mentenanta.php?id=<?php echo $row['id'] ?>" target="_blank">
                  <button type="button" class="btn btn-danger btn-xs">Print raport</button>
                </a>
                <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#upload_data_Modal_3">
                  <button type="button" class="btn btn-primary btn-xs btn-add-file">Add file</button>
                </a>
                <button type="button" class="btn btn-info btn-xs btn-add-file" data-toggle="modal" data-target="#myModal3<?= $row['id']?>">View files <span class="badge"> <?= $total ?></span></button>

              </div>
            </div>
          </div>

          <!-- /.modal-For Delete date -->
          <div id="delete_Modal_3<?= $row['id']?>" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Confirmă ștergera</h4>
                </div>
                <div class="modal-body">
                  <p>Șterge
                    <?php echo '<span class="text-danger" >Cabinetul: ' . $row["cabinet3"] . ', Executor: ' . $row["executor3"] . '</span> '; ?></p>
                </div>
                <div class="modal-footer">
                  <a class="btn btn-danger" href="delete_formular_3.php?id=<?php echo $row['id'] ?>">Confirmă</a>
                  <a href="#" data-dismiss="modal" class="btn btn-secondary btn-cancel">Anulează</a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <?php		}		?>
        </div>
        <!-- End row -->
      </div>
      <!-- End container -->

          </div>
        </div><!-- End #C -->

        <div class="tab-pane" id="D">
          <div class="well well-sm">
              <div class="container" id="tourpackages-carousel">
                <div class="row">
                  <div class="col-lg-12">
                      <a class="btn icon-btn btn-primary pull-right" data-toggle="modal" data-target="#add_data_Modal_4">
                      <span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span>
                      Adaugă formular de defectare
                    </a>
                  </div>

                  <?php
                     $sql="SELECT * FROM formular_4 order by id DESC";
                    $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                    while($row = mysqli_fetch_array ($result_set) )
                    {
                  ?>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><br>
                    <div class="thumbnail">
                      <div class="caption">
                        <div class='col-lg-12'>
                          <span>Adaugat de : <?= $row['name'] ?></span>
                          <a href="#" class="confirm-delete" data-toggle="modal" data-target="#delete_Modal_4<?= $row['id']?>" data-id="<?php  echo $row[" id "] ?>"><span class="glyphicon glyphicon-trash pull-right text-danger"></span></a>
                          <a href="#" class="modal-edit_4" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#edit_data_Modal_4"><span class="glyphicon glyphicon-edit pull-right text-primary"></span></a>
                        </div>
                        <div class='col-lg-12 well well-add-card'>
                          <h4>Numar inventar: <?= $row['numar_inventar4'] ?></h4>
                          <h4>Nume dispozitiv: <?= $row['nume_dispozitiv4'] ?></h4>
                          <h4>Data efectuării: <?= explode(' ', $row['data4'])[0] ?></h4>
                        </div>
                        <div class='col-lg-12'>

                          <!-- Modal -->
                          <div class="modal fade" id="myModal4<?= $row['id']?>" role="dialog">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Fișiere încarcate</h4>
                                </div>
                                <div class="modal-body">
                                  <?php
                                    $sql="SELECT * FROM uploads4 where formular_id = " .   $row['id'];
                                    $result_set_files=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                                    $total = $result_set_files->num_rows;
                                    echo '<ul>';
                                    while($rowIn = mysqli_fetch_array ($result_set_files) )
                                    {
                                      echo "<li><a href=\"uploads/" . $rowIn['file'] . "\" target=\"blank\" > " . $rowIn['file'] . "</a> din " .  explode(' ', $rowIn['data_upload'])[0] .
                                      "<span class='glyphicon glyphicon-trash pull-right text-primary confirm-delete-file4' data-id=" . $rowIn['id'] . " style='cursor:pointer'></span>"."</li>";
                                    }
                                    echo '</ul>'
                                  ?>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>

                        </div>

                <a href="raport_defectare.php?id=<?php echo $row['id'] ?>" target="_blank">
                  <button type="button" class="btn btn-danger btn-xs">Print raport</button>
                </a>
                <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#upload_data_Modal_4">
                  <button type="button" class="btn btn-primary btn-xs btn-add-file">Add file</button>
                </a>
                <button type="button" class="btn btn-info btn-xs btn-add-file" data-toggle="modal" data-target="#myModal4<?= $row['id']?>">View files <span class="badge"> <?= $total ?></span></button>

              </div>
            </div>
          </div>

          <!-- /.modal-For Delete date -->
          <div id="delete_Modal_4<?= $row['id']?>" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Confirmă ștergera</h4>
                </div>
                <div class="modal-body">
                  <p>Șterge
                    <?php echo '<span class="text-danger" >Nr. inventar: ' . $row["numar_inventar4"] . ', Nume dispozitiv: ' . $row["nume_dispozitiv4"] . '</span> '; ?></p>
                </div>
                <div class="modal-footer">
                  <a class="btn btn-danger" href="delete_formular_4.php?id=<?php echo $row['id'] ?>">Confirmă</a>
                  <a href="#" data-dismiss="modal" class="btn btn-secondary btn-cancel">Anulează</a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

          <?php		}		?>
        </div>
        <!-- End row -->
      </div>
      <!-- End container -->

          </div>
        </div><!-- End #D -->


      </div>
      </div><!-- /tabbable -->

      </div>
      </div>
      </div>

      <!-- /.modal-For upload file -->
      <div id="upload_data_Modal" class="modal fade upload-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editati informația necesară</h4>
            </div>
            <div class="modal-body">

              <form action="upload_file.php" method="post" enctype="multipart/form-data" id="edit_form">

                <input type="hidden" name="id" id="formular_id">
                <label>Selectați un fișier pentru încărcare PDF:</label>
                <input type="file" name="file" accept=".pdf" id="file" class="form-control" />
                <br>

            </div>
            <div class="modal-footer">
              <button type="submit" name="btn-upload" class="btn-upload" class="btn btn-primary">Upload</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- /.modal-For upload file 2 -->
      <div id="upload_data_Modal_2" class="modal fade upload-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editati informația necesară</h4>
            </div>
            <div class="modal-body">

              <form action="upload_file_2.php" method="post" enctype="multipart/form-data" id="edit_form">

                <input type="hidden" name="id" id="formular_id2">
                <label>Selectați un fișier pentru încărcare PDF:</label>
                <input type="file" name="file" accept=".pdf" id="file" class="form-control" />
                <br>

            </div>
            <div class="modal-footer">
              <button type="submit" name="btn-upload2" class="btn-upload" class="btn btn-primary">Upload</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- /.modal-For upload file 3 -->
      <div id="upload_data_Modal_3" class="modal fade upload-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editati informația necesară</h4>
            </div>
            <div class="modal-body">

              <form action="upload_file_3.php" method="post" enctype="multipart/form-data" id="edit_form">

                <input type="hidden" name="id" id="formular_id3">
                <label>Selectați un fișier pentru încărcare PDF:</label>
                <input type="file" name="file" accept=".pdf" id="file" class="form-control" />
                <br>

            </div>
            <div class="modal-footer">
              <button type="submit" name="btn-upload3" class="btn-upload" class="btn btn-primary">Upload</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- /.modal-For upload file 4 -->
      <div id="upload_data_Modal_4" class="modal fade upload-modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editati informația necesară</h4>
            </div>
            <div class="modal-body">

              <form action="upload_file_4.php" method="post" enctype="multipart/form-data" id="edit_form">

                <input type="hidden" name="id" id="formular_id4">
                <label>Selectați un fișier pentru încărcare PDF:</label>
                <input type="file" name="file" accept=".pdf" id="file" class="form-control" />
                <br>

            </div>
            <div class="modal-footer">
              <button type="submit" name="btn-upload4" class="btn-upload" class="btn btn-primary">Upload</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- /.modal-For Update date form_1 -->
        <div id="edit_data_Modal_1" class="modal fade">
         <div class="modal-dialog modal-lg">
          <div class="modal-content">
           <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Editati informația necesară</h4>
           </div>
        		<div class="modal-body">

        			<form action="update_form_1.php" method="post" enctype="multipart/form-data" id="edit_form">
                <label>Date beneficiar:</label>
                <table class="table table-bordered">
                  <tr>
                    <th style="vertical-align: middle;">Cabinetul:</th>
                    <td>
                      <input type="text" name="cabinet" id="cabinet" class="form-control" required>
                    </td>
                    <th>Executor:</th>
                    <td>
                      <input type="text" name="executor" id="executor" class="form-control" required>
                    </td>
                  </tr>
                  <tr>
                    <th style="vertical-align: middle;">Sectia:</th>
                    <td>
                      <input type="hidden" name="id" id="edit-section-id" value="">
                      <select name="section_id" id="section_id" class="form-control" required>
                        <option value="">SELECT</option>
                        <?php
                          $sql="SELECT * FROM sectie";
                          $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                          while($row = mysqli_fetch_array ($result_set) )
                          {
                            echo "<option value=\"" . $row['id'] . "\">" . $row['section'] ."</option>";
                          }
                      ?>
                      </select>
                    </td>
                    <th style="vertical-align: middle;">Data efectuării:</th>
                    <td>
                      <input type="text" name="data1" id="data1" class="form-control datepicker-here" autocomplete="off" placeholder="yyyy-mm-dd" required>
                    </td>
                  </tr>
                </table>

                <label>Date dispozitiv medical:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Denumire dispozitiv:</td>
                    <td>
                      <input type="text" name="nume_dispozitiv" id="nume_dispozitiv" class="form-control">
                    </td>
                    <td>Anul producerii:</td>
                    <td>
                      <input type="text" name="anul_producerii_dispozitiv" id="anul_producerii_dispozitiv" autocomplete="off" class="form-control datepicker-here"  placeholder="yyyy-mm-dd">
                    </td>
                  </tr>
                  <tr>
                    <td>Model:</td>
                    <td>
                      <input type="text" name="model_dispozitiv" id="model_dispozitiv" class="form-control">
                    </td>
                    <td>Nr. serie:</td>
                    <td colspan="4">
                      <input type="text" name="nr_serie_dispozitiv" id="nr_serie_dispozitiv" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Producător:</td>
                    <td>
                      <input type="text" name="producator_dispozitiv" id="producator_dispozitiv" class="form-control">
                    </td>
                    <td>Număr inventar:</td>
                    <td colspan="4">
                      <input type="text" name="numar_inventar" id="numar_inventar" class="form-control" required>
                    </td>
                  </tr>
                </table>

                <label>Date piesa/accesoriu:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Denumire piesă/accesoriu:</td>
                    <td>
                      <input type="text" name="denumire_piesa" id="denumire_piesa" class="form-control">
                    </td>
                    <td>Anul producerii:</td>
                    <td>
                      <input type="text" name="anul_producerii_piesa" id="anul_producerii_piesa" autocomplete="off" class="form-control datepicker-here"  placeholder="yyyy-mm-dd">
                    </td>
                  </tr>
                  <tr>
                    <td>Model:</td>
                    <td>
                      <input type="text" name="model_piesa" id="model_piesa" class="form-control">
                    </td>
                    <td>Nr. serie:</td>
                    <td colspan="4">
                      <input type="text" name="nr_serie_dispozitiv_piesa" id="nr_serie_dispozitiv_piesa" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Producător:</td>
                    <td>
                      <input type="text" name="producator_piesa" id="producator_piesa" class="form-control">
                    </td>
                    <td>Part number:</td>
                    <td colspan="4">
                      <input type="text" name="part_number" id="part_number" class="form-control">
                    </td>
                  </tr>
                </table>

                <label>Date cu privire la dispozitivul medical pentru care a fost instalată piesa/accesoriul:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Denumire piesă/accesoriu:</td>
                    <td>
                      <input type="text" name="denumire_piesa_instal" id="denumire_piesa_instal" class="form-control">
                    </td>
                    <td>Anul producerii:</td>
                    <td>
                      <input type="text" name="anul_producerii_piesa_instal" id="anul_producerii_piesa_instal" autocomplete="off" class="form-control datepicker-here"  placeholder="yyyy-mm-dd">
                    </td>
                  </tr>
                  <tr>
                    <td>Model:</td>
                    <td>
                      <input type="text" name="model_piesa_instal" id="model_piesa_instal" class="form-control">
                    </td>
                    <td>Nr. serie:</td>
                    <td>
                      <input type="text" name="nr_serie_dispozitiv_instal" id="nr_serie_dispozitiv_instal" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Producător:</td>
                    <td>
                      <input type="text" name="producator_piesa_instal" id="producator_piesa_instal" class="form-control">
                    </td>
                    <td>Altele*:</td>
                    <td>
                      <input type="text" name="altele" id="altele" class="form-control">
                    </td>
                  </tr>
                </table>

                <label>Inspecție/Test de funcționalitate:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Data instalarii/ Montării:</td>
                    <td>
                      <input type="text" name="data_instalarii" id="data_instalarii" autocomplete="off" class="form-control datepicker-here"  placeholder="yyyy-mm-dd">
                    </td>
                    <td>Perioada de garanție:</td>
                    <td>
                      <input type="number" name="garantie" id="garantie" class="form-control" placeholder="luni">
                    </td>
                  </tr>
                  <tr>
                    <td>Test de operare (verificarea funcționalității)</td>
                    <td colspan="4">
                      <input name="net" type="radio" id="netDa" value="Da"> Da &nbsp;&nbsp;
                      <input name="net" type="radio" id="netNu" value="Nu"> Nu
                    </td>
                  </tr>
                </table>

                <label for="comment">Comentarii:</label>
                <textarea class="form-control" rows="3" name="comentarii" id="comentarii"></textarea>
                <br>

                <table class="table table-bordered">
                  <tr>
                    <td><strong>Beneficiar:</strong></td>
                    <td><strong>Executor/Furnizor:</strong></td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" name="beneficiar" id="beneficiar" class="form-control" placeholder="nume, prenume">
                    </td>
                    <td>
                      <input type="text" name="furnizor" id="furnizor" class="form-control" placeholder="nume, prenume">
                      <input type="text" name="furnizor1" id="furnizor1" class="form-control" placeholder="nume, prenume">
                      <input type="text" name="furnizor2" id="furnizor2" class="form-control" placeholder="nume, prenume">
                    </td>
                  </tr>
                </table>
        		</div>
        		<div class="modal-footer">
            <button type="submit" name="btn-update_1" id="update1" class="btn btn-primary">Editati</button>
        		 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </form>
        		</div>
        	 </div>
        	</div>
        </div>

        <!-- /.modal-For Update date form_2 -->
        <div id="edit_data_Modal_2" class="modal fade">
           <div class="modal-dialog modal-lg">
            <div class="modal-content">
             <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editati informația necesară</h4>
             </div>
             <div class="modal-body">
               <form action="update_form_2.php" method="post" enctype="multipart/form-data" id="edit_form_2">
                 <input type="hidden" name="id" id="id2" value="">
               <label>Date beneficiar:</label>
               <table class="table table-bordered">
                 <tr>
                   <th style="vertical-align: middle;">Cabinetul:</th>
                   <td>
                     <input type="text" name="cabinet2" id="cabinet2" class="form-control" required>
                   </td>
                   <th>Executor:</th>
                   <td>
                     <input type="text" name="executor2" id="executor2" class="form-control" required>
                   </td>
                 </tr>
                 <tr>
                   <th style="vertical-align: middle;">Sectia:</th>
                   <td>
                     <select name="section_id" id="section_id" class="form-control" required>
                       <option value="">SELECT</option>
                       <?php
                         $sql="SELECT * FROM sectie";
                         $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                         while($row = mysqli_fetch_array ($result_set) )
                         {
                           echo "<option value=\"" . $row['id'] . "\">" . $row['section'] ."</option>";
                         }
                     ?>
                     </select>
                   </td>
                   <th style="vertical-align: middle;">Data efectuării:</th>
                   <td>
                     <input type="text" name="data2" id="data2" class="form-control datepicker-here" autocomplete="off" placeholder="yyyy-mm-dd" required>
                   </td>
                 </tr>
               </table>


               <label>Date dispozitiv medical:</label>
               <table class="table table-bordered">
                 <tr>
                   <td>Denumire dispozitiv:</td>
                   <td>
                     <input type="text" name="nume_dispozitiv2" id="nume_dispozitiv2" class="form-control">
                   </td>
                   <td>Anul producerii:</td>
                   <td>
                     <input type="text" name="anul_producerii_dispozitiv2" id="anul_producerii_dispozitiv2" autocomplete="off" class="form-control datepicker-here">
                   </td>
                 </tr>
                 <tr>
                   <td>Model:</td>
                   <td>
                     <input type="text" name="model_dispozitiv2" id="model_dispozitiv2" class="form-control">
                   </td>
                   <td>Nr. serie:</td>
                   <td colspan="4">
                     <input type="text" name="nr_serie_dispozitiv2" id="nr_serie_dispozitiv2" class="form-control">
                   </td>
                 </tr>
                 <tr>
                   <td>Producator:</td>
                   <td>
                     <input type="text" name="producator_dispozitiv2" id="producator_dispozitiv2" class="form-control">
                   </td>
                   <td>Numar inventar:</td>
                   <td colspan="4">
                     <input type="text" name="numar_inventar2" id="numar_inventar2" class="form-control" required>
                   </td>
                 </tr>
               </table>

               <label for="comment">Descrierea defectiunii:</label>
               <textarea class="form-control" rows="2" name="desc_defect" id="desc_defect"></textarea>
               <br>

               <label for="comment">Cauza defectiunii:</label>
               <textarea class="form-control" rows="2" name="cauza_defect" id="cauza_defect"></textarea>
               <br>

               <label>Raport de reparatie:</label>
               <table class="table table-bordered">
                 <tr>
                   <td rowspan="2" style="vertical-align: middle;">Actiuni intreprinse:</td>
                   <td>
                     <textarea class="form-control" rows="4" name="actiuni" id="actiuni"></textarea>
                   </td>
                   <td style="vertical-align: middle;">Data: <br> Ore:</td>
                   <td>
                     <input type="text" name="data_instalarii2" id="data_instalarii2" autocomplete="off" class="form-control datepicker-here"><br>
                     <input type="number" name="ore" id="ore" class="form-control" placeholder="ore">
                   </td>
                 </tr>
                 <tr>
                   <td>Testarea functionarii dupa reparatie</td>
                   <td colspan="4">
                     <input name="chek" type="radio" id="functional" value="Functional"> Functional &nbsp;&nbsp;
                     <input name="chek" type="radio" id="nefunctional" value="Nefunctional"> Nefunctional
                   </td>
                 </tr>
               </table>

               <label for="materiale">Materiale utilizate:</label>
               <textarea class="form-control" rows="2" name="materiale" id="materiale"></textarea>
               <br>

               <label for="comentarii">Comentarii:</label>
               <textarea class="form-control" rows="2" name="comentarii2" id="comentarii2"></textarea>
               <br>

               <table class="table table-bordered">
                 <tr>
                   <td><strong>Sef sectie:</strong></td>
                   <td><strong>Executor / Inginer:</strong></td>
                 </tr>
                 <tr>
                   <td>
                     <input type="text" name="beneficiar2" id="beneficiar2" class="form-control" placeholder="nume, prenume">
                   </td>
                   <td>
                     <input type="text" name="inginer1" id="inginer1" class="form-control" placeholder="nume, prenume">
                     <input type="text" name="inginer2" id="inginer2" class="form-control" placeholder="nume, prenume">
                     <input type="text" name="inginer3" id="inginer3" class="form-control" placeholder="nume, prenume">
                   </td>
                 </tr>
               </table>
             </div>
              <div class="modal-footer">
              <button type="submit" name="btn-update_2" id="update" class="btn btn-primary">Editati</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </form>
              </div>
             </div>
            </div>
          </div>

        <!-- /.modal-For Update date form_3 -->
        <div id="edit_data_Modal_3" class="modal fade">
           <div class="modal-dialog modal-lg">
            <div class="modal-content">
             <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editati informația necesară</h4>
             </div>
             <div class="modal-body">
               <form action="update_form_3.php" method="post" enctype="multipart/form-data" id="edit_form">
                 <input type="hidden" name="id" id="id3" value="">
                 <label>Date beneficiar:</label>
                 <table class="table table-bordered">
                   <tr>
                     <th style="vertical-align: middle;">Cabinetul:</th>
                     <td>
                       <input type="text" name="cabinet3" id="cabinet3" class="form-control" required>
                     </td>
                     <th>Executor:</th>
                     <td>
                       <input type="text" name="executor3" id="executor3" class="form-control" required>
                     </td>
                   </tr>
                   <tr>
                     <th style="vertical-align: middle;">Sectia:</th>
                     <td>
                       <select name="section_id" id="section_id" class="form-control" required>
                         <option value="">SELECT</option>
                         <?php
                           $sql="SELECT * FROM sectie";
                           $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                           while($row = mysqli_fetch_array ($result_set) )
                           {
                             echo "<option value=\"" . $row['id'] . "\">" . $row['section'] ."</option>";
                           }
                       ?>
                       </select>
                     </td>
                     <th style="vertical-align: middle;">Data efectuării:</th>
                     <td>
                       <input type="text" name="data3" id="data3" class="form-control datepicker-here" autocomplete="off" placeholder="yyyy-mm-dd" required>
                     </td>
                   </tr>
                 </table>

                 <label>Date dispozitiv medical:</label>
                 <table class="table table-bordered">
                   <tr>
                     <td>Denumire dispozitiv:</td>
                     <td>
                       <input type="text" name="nume_dispozitiv3" id="nume_dispozitiv3" class="form-control">
                     </td>
                     <td>Anul producerii:</td>
                     <td>
                       <input type="text" name="anul_producerii_dispozitiv3" id="anul_producerii_dispozitiv3" autocomplete="off" class="form-control datepicker-here"  placeholder="yyyy-mm-dd">
                     </td>
                   </tr>
                   <tr>
                     <td>Model:</td>
                     <td>
                       <input type="text" name="model_dispozitiv3" id="model_dispozitiv3" class="form-control">
                     </td>
                     <td>Nr. serie:</td>
                     <td colspan="4">
                       <input type="text" name="nr_serie_dispozitiv3" id="nr_serie_dispozitiv3" class="form-control">
                     </td>
                   </tr>
                   <tr>
                     <td>Producător:</td>
                     <td>
                       <input type="text" name="producator_dispozitiv3" id="producator_dispozitiv3" class="form-control">
                     </td>
                     <td>Număr inventar:</td>
                     <td colspan="4">
                       <input type="text" name="numar_inventar3" id="numar_inventar3" class="form-control" required>
                     </td>
                   </tr>
                 </table>

                 <table class="table table-bordered">
                   <tr>
                     <td>Model:</td>
                     <td>
                       <input type="text" name="model_1_3" id="model_1_3" class="form-control">
                     </td>
                     <td>Nr. serie:</td>
                     <td>
                       <input type="text" name="nr_serie_1_3" id="nr_serie_1_3" class="form-control">
                     </td>
                   </tr>
                   <tr>
                     <td>Model:</td>
                     <td>
                       <input type="text" name="model_2_3" id="model_2_3" class="form-control">
                     </td>
                     <td>Nr. serie:</td>
                     <td colspan="4">
                       <input type="text" name="nr_serie_2_3" id="nr_serie_2_3" class="form-control">
                     </td>
                   </tr>
                   <tr>
                     <td>Model:</td>
                     <td>
                       <input type="text" name="model_3_3" id="model_3_3" class="form-control">
                     </td>
                     <td>Nr. serie:</td>
                     <td colspan="4">
                       <input type="text" name="nr_serie_3_3" id="nr_serie_3_3" class="form-control">
                     </td>
                   </tr>
                   <tr>
                     <td>Model:</td>
                     <td>
                       <input type="text" name="model_4_3" id="model_4_3" class="form-control">
                     </td>
                     <td>Nr. serie</td>
                     <td>
                       <input type="text" name="nr_serie_4_3" id="nr_serie_4_3" class="form-control">
                     </td>
                   </tr>
                 </table> <br>

                 <table class="table table-bordered">
                   <tr>
                     <th>Mentenața</th>
                     <th>Supus</th>
                     <th colspan="3">Rsponsabil, informații de contact:</th>
                   </tr>
                   <tr>
                     <td>Mentenața preventivă:</td>
                     <td>
                       <input name="chek1_3" type="radio" id="Da" value="Da"> Da &nbsp;&nbsp;
                       <input name="chek1_3" type="radio" id="Nu" value="Nu"> Nu
                     </td>
                     <td colspan="2"><input type="text" name="respons" id="respons" class="form-control"></td>
                   </tr>
                   <tr>
                     <td>Verificarea periodică:</td>
                     <td>
                       <input name="chek2_3" type="radio" id="Da3" value="Da"> Da &nbsp;&nbsp;
                       <input name="chek2_3" type="radio" id="Nu3" value="Nu"> Nu
                     </td>
                     <td>Periodicitatea:</td>
                     <td><input type="number" name="luni3" id="luni3" class="form-control" placeholder="luni"></td>
                   </tr>
                 </table>

                 <label for="comentarii">Comentarii:</label>
                 <textarea class="form-control" rows="2" name="comentarii3" id="comentarii3"></textarea>
                 <br>

                 <table class="table table-bordered">
                   <tr>
                     <td><strong>Șef secție:</strong></td>
                     <td><strong>Executor / Inginer:</strong></td>
                   </tr>
                   <tr>
                     <td>
                       <input type="text" name="beneficiar3" id="beneficiar3" class="form-control" placeholder="nume, prenume">
                     </td>
                     <td>
                       <input type="text" name="inginer1_3" id="inginer1_3" class="form-control" placeholder="nume, prenume">
                       <input type="text" name="inginer2_3" id="inginer2_3" class="form-control" placeholder="nume, prenume">
                       <input type="text" name="inginer3_3" id="inginer3_3" class="form-control" placeholder="nume, prenume">
                     </td>
                   </tr>
                 </table>
             </div>
              <div class="modal-footer">
              <button type="submit" name="btn-update_3" id="update3" class="btn btn-primary">Editati</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </form>
              </div>
             </div>
            </div>
          </div>

        <!-- /.modal-For Update date form_4 -->
        <div id="edit_data_Modal_4" class="modal fade">
             <div class="modal-dialog modal-lg">
              <div class="modal-content">
               <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Editati informația necesară</h4>
               </div>
               <div class="modal-body">

                 <form action="update_form_4.php" method="post" enctype="multipart/form-data" id="edit_form4">
                    <input type="hidden" name="id" id="id4" value="">
                   <label>Formular de:</label> &nbsp;&nbsp;
                   <input name="chek1_4" type="radio" value="defectare" id="defectare"> Defectare &nbsp;&nbsp;
                   <input name="chek1_4" type="radio" value="conservare" id="conservare"> Conservare &nbsp;&nbsp;
                   <input name="chek1_4" type="radio" value="casare" id="casare"> Casare &nbsp;&nbsp;

                   <label>Data efectuării:</label>
                   <label>
                   <input type="text" name="data4" id="data4" class="form-control datepicker-here" autocomplete="off" placeholder="yyyy-mm-dd" required>
                   </label><br>

                   <label>Se completează de către secția medicală:</label>
                   <table class="table table-bordered">
                     <tr>
                       <td>1</td>
                       <td width="40%">Denumirea instituției:</td>
                       <td>
                         <input type="text" name="institutia" id="institutia" class="form-control">
                       </td>
                     </tr>
                     <tr>
                       <td>2</td>
                       <td>Locația:</td>
                       <td>
                         <input type="text" name="locatia" id="locatia" class="form-control">
                       </td>
                     </tr>
                     <tr>
                       <td>3</td>
                       <td>Număr inventar:</td>
                       <td>
                         <input type="text" name="numar_inventar4" id="numar_inventar4" class="form-control" required>
                       </td>
                     </tr>
                     <tr>
                       <td>4</td>
                       <td>Data de non-utilizare a dispozitivului medical:</td>
                       <td><input type="text" name="data_non" id="data_non" autocomplete="off" class="form-control datepicker-here" placeholder="yyyy-mm-dd"></td>
                     </tr>
                   </table>

                   <label>Se completeaza de către departamentul/secția de inginerie biomedicală:</label>
                   <table class="table table-bordered">
                     <tr>
                       <td>5</td>
                       <td>Producător:</td>
                       <td><input type="text" name="producator" id="producator" class="form-control"></td>
                     </tr>
                     <tr>
                       <td>6</td>
                       <td>Anul producerii:</td>
                       <td><input type="text" name="anul_producerii" id="anul_producerii" autocomplete="off" class="form-control datepicker-here" placeholder="yyyy-mm-dd"></td>
                     </tr>
                     <tr>
                       <td>7</td>
                       <td>Nume dispozitiv:</td>
                       <td><input type="text" name="nume_dispozitiv4" id="nume_dispozitiv4" class="form-control"></td>
                     </tr>
                     <tr>
                       <td>8</td>
                       <td>Model:</td>
                       <td><input type="text" name="model" id="model" class="form-control"></td>
                     </tr>
                     <tr>
                       <td>9</td>
                       <td>Număr de serie:</td>
                       <td><input type="text" name="numar_serie" id="numar_serie" class="form-control"></td>
                     </tr>
                     <tr>
                       <td>10</td>
                       <td>Număr inventar:</td>
                       <td><input type="text" name="numar_inventar2_4" id="numar_inventar2_4" class="form-control"></td>
                     </tr>
                   </table>

                   <label>Se completează de către departamentul contabilitate:</label>
                   <table class="table table-bordered">
                     <tr>
                       <td>11</td>
                       <td>Uzura:</td>
                       <td><input type="text" name="uzura" id="uzura" class="form-control"></td>
                     </tr>
                     <tr>
                       <td>12</td>
                       <td>Data dării în exploatare:</td>
                       <td><input type="text" name="data_exploatare" id="data_exploatare" autocomplete="off" class="form-control datepicker-here" placeholder="yyyy-mm-dd"></td>
                     </tr>
                     <tr>
                       <td>13</td>
                       <td>Termenul de eploatare:</td>
                       <td><input type="text" name="termen" id="termen" class="form-control"></td>
                     </tr>
                     <tr>
                       <td>14</td>
                       <td>Preț nominal:</td>
                       <td><input type="text" name="pret" id="pret" class="form-control"></td>
                     </tr>
                     <tr>
                       <td>15</td>
                       <td>Valoarea curentă a dispozitivului:</td>
                       <td><input type="text" name="valoarea" id="valoarea" class="form-control"></td>
                     </tr>
                   </table>

                   <label>Descrierea stării tehnice a dispozitivului:</label>
                   <textarea class="form-control" rows="2" name="descrierea" id="descrierea"></textarea>
                   <br>

                   <label>Cauza neutralizarii:</label>
                   <textarea class="form-control" rows="2" name="cauza" id="cauza"></textarea>
                   <br>

                   <label>Notă:</label>
                   <textarea class="form-control" rows="2" name="nota" id="nota"></textarea>
                   <br>

                   <table class="table table-bordered">
                     <tr>
                       <td><strong>Șef secție:</strong></td>
                       <td><strong>Șef contabil:</strong></td>
                       <td><strong>Șef TI si TM:</strong></td>
                       <td><strong>Executor / Inginer:</strong></td>
                     </tr>
                     <tr>
                       <td>
                         <input type="text" name="beneficiar4" id="beneficiar4" class="form-control" placeholder="nume, prenume">
                       </td>
                       <td>
                         <input type="text" name="contabil" id="contabil" class="form-control" placeholder="nume, prenume">
                       </td>
                       <td>
                         <input type="text" name="it" id="it" class="form-control" placeholder="nume, prenume">
                       </td>
                       <td>
                         <input type="text" name="inginer1_4" id="inginer1_4" class="form-control" placeholder="nume, prenume">
                         <input type="text" name="inginer2_4" id="inginer2_4" class="form-control" placeholder="nume, prenume">
                         <input type="text" name="inginer3_4" id="inginer3_4" class="form-control" placeholder="nume, prenume">
                       </td>
                     </tr>
                   </table>
               </div>
                <div class="modal-footer">
                <button type="submit" name="btn-update_4" id="update_4" class="btn btn-primary">Editati</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </form>
                </div>
               </div>
              </div>
            </div>


      <?php
} // end of if user login
else {
 ?>
        <h3 class="jumbotron text-center"><a href="login.php"> Vă rugăm să vă logați cu drepturi de administrator ...</a></h3>
        <?php  }  ?>

          <!-- Modal Upload File -->
          <script type="text/javascript">
            $(".modal-edit").click(function() {
              id =  $(this).data('id');
              $('#formular_id').val(id);
              $('#formular_id2').val(id);
              $('#formular_id3').val(id);
              $('#formular_id4').val(id);
            });
          </script>


          <!-- Alert success -->
          <script type="text/javascript">
            setTimeout( () => {
              $(".alert").css("display", "none");
            }, 4000  )
          </script>

        <!-- Delete file -->
        <script type="text/javascript">
            $('.confirm-delete-file').on('click',
            function() {
              if(confirm("Stergeti fisierul?")) {
                id = $(this).data('id');
                  window.location.href= 'delete_file.php?id=' + id;
              } } );
        </script>

        <!-- Delete file 2 -->
        <script type="text/javascript">
            $('.confirm-delete-file2').on('click',
            function() {
              if(confirm("Stergeti fisierul?")) {
                id = $(this).data('id');
                  window.location.href= 'delete_file_2.php?id=' + id;
              } } );
        </script>

        <!-- Delete file 3 -->
        <script type="text/javascript">
            $('.confirm-delete-file3').on('click',
            function() {
              if(confirm("Stergeti fisierul?")) {
                id = $(this).data('id');
                  window.location.href= 'delete_file_3.php?id=' + id;
              } } );
        </script>

        <!-- Delete file 4 -->
        <script type="text/javascript">
            $('.confirm-delete-file4').on('click',
            function() {
              if(confirm("Stergeti fisierul?")) {
                id = $(this).data('id');
                  window.location.href= 'delete_file_4.php?id=' + id;
              } } );
        </script>

        <!-- datepicker -->
        <script type="text/javascript">
          	$(document).ready( function() {
                var currentDate = currentDate = new Date();
                $('.datepicker-here').datepicker({
                  dateFormat: 'yyyy-mm-dd',
                  language: 'ro',
                });
                // Access instance of plugin
                $('.datepicker').css('z-index', '9999999');
                $('.datepicker-here').click( function() {
                	if( $(this).val().length == 0 )
                		$(this).data('datepicker').selectDate(new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate()));
                })
              })
        </script>

        <!-- Modal Edit form_1 -->
        <script type="text/javascript">
          $(".modal-edit").click(function() {
            id = $(this).data('id');
            $.get("getFormular.php", {id: id}).done( function(data) {
              data = JSON.parse(data);
              $("#edit-section-id").val(data[0].id);
              $("#cabinet").val(data[0].cabinet);
              $(`#section_id option[value="${data[0].section_id}"]`).attr('selected', 'selected');
              $("#executor").val(data[0].executor);
              $("#data1").val(data[0].data1);
              $("#nume_dispozitiv").val(data[0].nume_dispozitiv);
              $("#anul_producerii_dispozitiv").val(data[0].anul_producerii_dispozitiv);
              $("#model_dispozitiv").val(data[0].model_dispozitiv);
              $("#nr_serie_dispozitiv").val(data[0].nr_serie_dispozitiv);
              $("#producator_dispozitiv").val(data[0].producator_dispozitiv);
              $("#numar_inventar").val(data[0].numar_inventar);
              $("#denumire_piesa").val(data[0].denumire_piesa);
              $("#model_piesa").val(data[0].model_piesa);
              $("#producator_piesa").val(data[0].producator_piesa);
              $("#anul_producerii_piesa").val(data[0].anul_producerii_piesa);
              $("#nr_serie_dispozitiv_piesa").val(data[0].nr_serie_dispozitiv_piesa);
              $("#part_number").val(data[0].part_number);
              $("#denumire_piesa_instal").val(data[0].denumire_piesa_instal);
              $("#model_piesa_instal").val(data[0].model_piesa_instal);
              $("#producator_piesa_instal").val(data[0].producator_piesa_instal);
              $("#anul_producerii_piesa_instal").val(data[0].anul_producerii_piesa_instal);
              $("#nr_serie_dispozitiv_instal").val(data[0].nr_serie_dispozitiv_instal);
              $("#altele").val(data[0].altele);
              $("#garantie").val(data[0].garantie);
              $("#data_instalarii").val(data[0].data_instalarii);
              $("#garantienet").val(data[0].garantienet);

              if (data[0].net == 'Da') {
                $("#netDa").prop("checked", true);
              }
              else {
                $("#netNu").prop("checked", true);
              }

              $("#comentarii").val(data[0].comentarii);
              $("#beneficiar").val(data[0].beneficiar);
              $("#furnizor").val(data[0].furnizor);
              $("#furnizor1").val(data[0].furnizor1);
              $("#furnizor2").val(data[0].furnizor2);
            });
          });
        </script>

        <!-- Modal Edit form_2 -->
        <script type="text/javascript">
          $(".modal-edit_2").click(function() {
            id = $(this).data('id');

            $.get("getFormular_2.php", {id: id}).done( function(data) {
              data = JSON.parse(data);
              $('#id2').val(data[0].id);

              $("#cabinet2").val(data[0].cabinet2);
              $(`#section_id option[value="${data[0].section_id}"]`).attr('selected', 'selected');
              $("#executor2").val(data[0].executor2);
              $("#data2").val(data[0].data2);
              $("#nume_dispozitiv2").val(data[0].nume_dispozitiv2);
              $("#anul_producerii_dispozitiv2").val(data[0].anul_producerii_dispozitiv2);
              $("#model_dispozitiv2").val(data[0].model_dispozitiv2);
              $("#nr_serie_dispozitiv2").val(data[0].nr_serie_dispozitiv2);
              $("#producator_dispozitiv2").val(data[0].producator_dispozitiv2);
              $("#numar_inventar2").val(data[0].numar_inventar2);
              $("#desc_defect").val(data[0].desc_defect);
              $("#cauza_defect").val(data[0].cauza_defect);
              $("#actiuni").val(data[0].actiuni);
              $("#data_instalarii2").val(data[0].data_instalarii2);
              $("#ore").val(data[0].ore);

              if (data[0].chek == 'Functional') {
                $("#functional").prop("checked", true);
              }
              else {
                $("#nefunctional").prop("checked", true);
              }

              $("#materiale").val(data[0].materiale);
              $("#comentarii2").val(data[0].comentarii2);
              $("#beneficiar2").val(data[0].beneficiar2);
              $("#inginer1").val(data[0].inginer1);
              $("#inginer2").val(data[0].inginer2);
              $("#inginer3").val(data[0].inginer3);
            });
          });
        </script>

        <!-- Modal Edit form_3 -->
        <script type="text/javascript">
          $(".modal-edit_3").click(function() {
            id = $(this).data('id');
            $.get("getFormular_3.php", {id: id}).done( function(data) {
              data = JSON.parse(data);
              $('#id3').val(data[0].id);

              $("#cabinet3").val(data[0].cabinet3);
              $(`#section_id option[value="${data[0].section_id}"]`).attr('selected', 'selected');
              $("#executor3").val(data[0].executor3);
              $("#data3").val(data[0].data3);
              $("#nume_dispozitiv3").val(data[0].nume_dispozitiv3);
              $("#anul_producerii_dispozitiv3").val(data[0].anul_producerii_dispozitiv3);
              $("#model_dispozitiv3").val(data[0].model_dispozitiv3);
              $("#nr_serie_dispozitiv3").val(data[0].nr_serie_dispozitiv3);
              $("#producator_dispozitiv3").val(data[0].producator_dispozitiv3);
              $("#numar_inventar3").val(data[0].numar_inventar3);

              $("#model_1_3").val(data[0].model_1_3);
              $("#model_2_3").val(data[0].model_2_3);
              $("#model_3_3").val(data[0].model_3_3);
              $("#model_4_3").val(data[0].model_4_3);

              $("#nr_serie_1_3").val(data[0].nr_serie_1_3);
              $("#nr_serie_2_3").val(data[0].nr_serie_2_3);
              $("#nr_serie_3_3").val(data[0].nr_serie_3_3);
              $("#nr_serie_4_3").val(data[0].nr_serie_4_3);

              $("#chek1_3").val(data[0].chek1_3);
              $("#respons").val(data[0].respons);
              $("#chek2_3").val(data[0].chek2_3);
              $("#luni3").val(data[0].luni3);

              if (data[0].chek1_3 == 'Da') {
                $("#Da").prop("checked", true);
              }
              else {
                $("#Nu").prop("checked", true);
              }

              if (data[0].chek2_3 == 'Da') {
                $("#Da3").prop("checked", true);
              }
              else {
                $("#Nu3").prop("checked", true);
              }

              $("#comentarii3").val(data[0].comentarii3);
              $("#beneficiar3").val(data[0].beneficiar3);
              $("#inginer1_3").val(data[0].inginer1_3);
              $("#inginer2_3").val(data[0].inginer2_3);
              $("#inginer3_3").val(data[0].inginer3_3);
            });
          });
        </script>

        <!-- Modal Edit form_4 -->
        <script type="text/javascript">
          $(".modal-edit_4").click(function() {
            id = $(this).data('id');
            $.get("getFormular_4.php", {id: id}).done( function(data) {
              data = JSON.parse(data);

              $('#id4').val(data[0].id);
              if(data[0].chek1_4.length > 0) {
                $('#' + data[0].chek1_4 ).prop("checked", true);
              }

              $("#institutia").val(data[0].institutia);
              $("#data4").val(data[0].data4);
              $("#locatia").val(data[0].locatia);
              $("#numar_inventar4").val(data[0].numar_inventar4);
              $("#data_non").val(data[0].data_non);
              $("#producator").val(data[0].producator);
              $("#anul_producerii").val(data[0].anul_producerii);
              $("#nume_dispozitiv4").val(data[0].nume_dispozitiv4);
              $("#model").val(data[0].model);
              $("#numar_serie").val(data[0].numar_serie);
              $("#numar_inventar2_4").val(data[0].numar_inventar2_4);
              $("#uzura").val(data[0].uzura);
              $("#data_exploatare").val(data[0].data_exploatare);
              $("#termen").val(data[0].termen);
              $("#pret").val(data[0].pret);
              $("#valoarea").val(data[0].valoarea);
              $("#descrierea").val(data[0].descrierea);
              $("#cauza").val(data[0].cauza);
              $("#nota").val(data[0].nota);
              $("#contabil").val(data[0].contabil);
              $("#it").val(data[0].it);

              $("#beneficiar4").val(data[0].beneficiar4);
              $("#inginer1_4").val(data[0].inginer1_4);
              $("#inginer2_4").val(data[0].inginer2_4);
              $("#inginer3_4").val(data[0].inginer3_4);
            });
          });
        </script>

  </body>
