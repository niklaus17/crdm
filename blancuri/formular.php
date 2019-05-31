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
    <?php if (isset($_SESSION['user'])) { ?>

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
                    <th rowspan="2" style="vertical-align: middle;">Executor:</th>
                    <td rowspan="2" style="vertical-align: middle;">
                      <input type="text" name="executor" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <th style="vertical-align: middle;">Sectia:</th>
                    <td>
                      <input type="hidden" name="id" id="id" value="">
                      <select name="section_id" id="section_id" class="form-control">
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
                      <input type="text" name="anul_producerii_dispozitiv" autocomplete="off" class="form-control datepicker-here"  placeholder="yyyy-mm-dd">
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
                    <td><strong>Executor/Furnizor:</strong></td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" name="beneficiar" class="form-control" placeholder="nume, prenume">
                    </td>
                    <td>
                      <input type="text" name="furnizor" class="form-control" placeholder="nume, prenume">
                      <input type="text" name="furnizor1" class="form-control" placeholder="nume, prenume">
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
                      <input type="text" name="cabinet" class="form-control" required>
                    </td>
                    <th rowspan="2" style="vertical-align: middle;">Executor:</th>
                    <td rowspan="2" style="vertical-align: middle;">
                      <input type="text" name="executor" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <th style="vertical-align: middle;">Sectia:</th>
                    <td>
                      <input type="hidden" name="id" id="id" value="">
                      <select name="section_id" id="section_id" class="form-control">
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
                      <input type="text" name="anul_producerii_dispozitiv" autocomplete="off" class="form-control datepicker-here">
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
                    <td>Producator:</td>
                    <td>
                      <input type="text" name="producator_dispozitiv" class="form-control">
                    </td>
                    <td>Numar inventar:</td>
                    <td colspan="4">
                      <input type="text" name="numar_inventar" class="form-control" required>
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
                      <input type="text" name="data_instalarii" autocomplete="off" class="form-control datepicker-here"><br>
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
                <textarea class="form-control" rows="2" name="comentarii"></textarea>
                <br>

                <table class="table table-bordered">
                  <tr>
                    <td><strong>Sef sectie:</strong></td>
                    <td><strong>Executor / Inginer:</strong></td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" name="beneficiar" class="form-control" placeholder="nume, prenume">
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
                      <input type="text" name="cabinet" class="form-control" required>
                    </td>
                    <th rowspan="2" style="vertical-align: middle;">Executor:</th>
                    <td rowspan="2" style="vertical-align: middle;">
                      <input type="text" name="executor" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <th style="vertical-align: middle;">Sectia:</th>
                    <td>
                      <input type="hidden" name="id" id="id" value="">
                      <select name="section_id" id="section_id" class="form-control">
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
                      <input type="text" name="anul_producerii_dispozitiv" autocomplete="off" class="form-control datepicker-here"  placeholder="yyyy-mm-dd">
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

                <label for="comment">Durata de exploatare a dispozitivului medical:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Data de procurare:</td>
                    <td><input type="text" name="data_proc" autocomplete="off" class="form-control datepicker-here" placeholder="yyyy-mm-dd"></td>
                    <td>Data de instalare:</td>
                    <td><input type="text" name="data_inst" autocomplete="off" class="form-control datepicker-here" placeholder="yyyy-mm-dd"></td>
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
                      <input name="chek" type="radio" value="Da"> Da &nbsp;&nbsp;
                      <input name="chek" type="radio" value="Nu"> Nu
                    </td>
                    <td colspan="2"><input type="text" name="respons" class="form-control"></td>
                  </tr>
                  <tr>
                    <td>Verificarea periodică:</td>
                    <td>
                      <input name="chek1" type="radio" value="Da"> Da &nbsp;&nbsp;
                      <input name="chek1" type="radio" value="Nu"> Nu
                    </td>
                    <td>Periodicitatea:</td>
                    <td><input type="number" name="luni" class="form-control" placeholder="luni"></td>
                  </tr>
                </table>

                <label for="comentarii">Comentarii:</label>
                <textarea class="form-control" rows="2" name="comentarii"></textarea>
                <br>

                <table class="table table-bordered">
                  <tr>
                    <td><strong>Șef secție:</strong></td>
                    <td><strong>Executor / Inginer:</strong></td>
                  </tr>
                  <tr>
                    <td>
                      <input type="text" name="beneficiar" class="form-control" placeholder="nume, prenume">
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

      <!-- /.modal-For insert date 4 -->
      <div id="add_data_Modal_4" class="modal fade">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Formular de defectare, conservare, casare a dispozitivului medical</h4>
            </div>
            <form action="upload_formular_4.php" method="post" enctype="multipart/form-data" id="insert_form_3">

              <div class="modal-body">

                <label>Formular de:</label> &nbsp;&nbsp;
                <input name="chek1" type="radio" value="defectare"> Defectare &nbsp;&nbsp;
                <input name="chek1" type="radio" value="conservare"> Conservare &nbsp;&nbsp;
                <input name="chek1" type="radio" value="casare"> Casare<br>

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
                      <input type="text" name="numar_inventar" class="form-control" required>
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
                    <td><input type="text" name="nume_dispozitiv" class="form-control"></td>
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
                    <td><input type="text" name="numar_inventar_2" class="form-control"></td>
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
                      <input type="text" name="beneficiar" class="form-control" placeholder="nume, prenume">
                    </td>
                    <td>
                      <input type="text" name="contabil" class="form-control" placeholder="nume, prenume">
                    </td>
                    <td>
                      <input type="text" name="it" class="form-control" placeholder="nume, prenume">
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

      <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
          <div class="panel-body">

            <ul class="nav nav-tabs">
              <li class="active"><a href="#A" data-toggle="tab">Formular de instalare</a></li>
              <li><a href="#B" data-toggle="tab">Fisa de deservire</a></li>
              <li><a href="#C" data-toggle="tab">Fisa de mentenanta</a></li>
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
                            Add New Card
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
                                <span>Adaugat de : <?= $row['name'] ?></span>
                                <a href="#" class="confirm-delete" data-toggle="modal" data-target="#delete_Modal<?= $row['id']?>" data-id="<?php  echo $row[" id "] ?>"><span class="glyphicon glyphicon-trash pull-right text-danger"></span></a>
                                <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#edit_data_Modal_1"><span class="glyphicon glyphicon-edit pull-right text-primary"></span></a>
                              </div>
                              <div class='col-lg-12 well well-add-card'>
                                <h4>Cabinetul: <?= $row['cabinet'] ?></h4>
                                <h4>Nr. inventar: <?= $row['numar_inventar'] ?></h4>
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
                      Add New Card 2
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
                          <a href="#" class="confirm-delete" data-toggle="modal" data-target="#delete_Modal_2<?= $row['id']?>" data-id="<?php  echo $row[" id "] ?>"><span class="glyphicon glyphicon-trash pull-right text-primary"></span></a>
                        </div>
                        <div class='col-lg-12 well well-add-card'>
                          <h4>Cabinetul: <?= $row['cabinet'] ?></h4>
                          <h4>Nr. inventar: <?= $row['numar_inventar'] ?></h4>
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

                <a href="raport_deservire.php?id=<?php echo $row['id'] ?>" target="_blank">
                  <button type="button" class="btn btn-danger btn-xs">Print raport</button>
                </a>
                <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#upload_data_Modal">
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
                    <?php echo '<span class="text-danger" >Cabinetul: ' . $row["cabinet"] . ', Executor: ' . $row["executor"] . '</span> '; ?></p>
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
                      Add New Card 3
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
                          <a href="#" class="confirm-delete" data-toggle="modal" data-target="#delete_Modal_3<?= $row['id']?>" data-id="<?php  echo $row[" id "] ?>"><span class="glyphicon glyphicon-trash pull-right text-primary"></span></a>
                        </div>
                        <div class='col-lg-12 well well-add-card'>
                          <h4>Cabinetul: <?= $row['cabinet'] ?></h4>
                          <h4>Nr. inventar: <?= $row['numar_inventar'] ?></h4>
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

                <a href="raport_mentenanta.php?id=<?php echo $row['id'] ?>" target="_blank">
                  <button type="button" class="btn btn-danger btn-xs">Print raport</button>
                </a>
                <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#upload_data_Modal">
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
                    <?php echo '<span class="text-danger" >Cabinetul: ' . $row["cabinet"] . ', Executor: ' . $row["executor"] . '</span> '; ?></p>
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
                      Add New Card 4
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
                          <a href="#" class="confirm-delete" data-toggle="modal" data-target="#delete_Modal_4<?= $row['id']?>" data-id="<?php  echo $row[" id "] ?>"><span class="glyphicon glyphicon-trash pull-right text-primary"></span></a>
                        </div>
                        <div class='col-lg-12 well well-add-card'>
                          <h4>Numar inventar: <?= $row['numar_inventar'] ?></h4>
                          <h4>Nume dispozitiv: <?= $row['nume_dispozitiv'] ?></h4>
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

                <a href="raport_defectare.php?id=<?php echo $row['id'] ?>" target="_blank">
                  <button type="button" class="btn btn-danger btn-xs">Print raport</button>
                </a>
                <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#upload_data_Modal">
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
                    <?php echo '<span class="text-danger" >Nr. inventar: ' . $row["numar_inventar"] . ', Nume dispozitiv: ' . $row["nume_dispozitiv"] . '</span> '; ?></p>
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
                    <th rowspan="2" style="vertical-align: middle;">Executor:</th>
                    <td rowspan="2" style="vertical-align: middle;">
                      <input type="text" name="executor" id="executor" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <th style="vertical-align: middle;">Sectia:</th>
                    <td>
                      <input type="hidden" name="id" id="edit-section-id" value="">
                      <select name="section_id" id="section_id" class="form-control">
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
                    </td>
                  </tr>
                </table>
        		</div>
        		<div class="modal-footer">
            <button type="submit" name="btn-update_1" id="update" class="btn btn-primary">Editati</button>
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
        <h3 class="jumbotron text-center"><a href="login.php"> Va rugam sa va logati ...</a></h3>
        <?php  }  ?>

          <!-- Modal Edit -->
          <script type="text/javascript">
            $(".modal-edit").click(function() {
              id =  $(this).data('id');
              console.log("clicked " +id + ".");
              $('#formular_id').val(id);
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
            });
          });
        </script>

        <!-- Modal Edit form_1 -->
        <script type="text/javascript">
          $(".modal-edit").click(function() {
            id = $(this).data('id');
            $.get("getFormular_2.php", {id: id}).done( function(data) {
              data = JSON.parse(data);
              $("#edit-section-id").val(data[0].id);
              $("#cabinet").val(data[0].cabinet);
              $(`#section_id option[value="${data[0].section_id}"]`).attr('selected', 'selected');
              $("#executor").val(data[0].executor);
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
            });
          });
        </script>

  </body>
