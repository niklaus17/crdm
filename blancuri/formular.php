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
        <strong>Success!</strong> Success alert.
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
                      <input type="text" name="cabinet" class="form-control">
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
                    <td>Producător:</td>
                    <td>
                      <input type="text" name="producator_dispozitiv" class="form-control">
                    </td>
                    <td>Număr inventar:</td>
                    <td colspan="4">
                      <input type="text" name="numar_inventar" class="form-control">
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
                      <input type="text" name="anul_producerii_piesa" autocomplete="off" class="form-control datepicker-here">
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
                      <input type="text" name="anul_producerii_piesa_instal" autocomplete="off" class="form-control datepicker-here">
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
                      <input type="text" name="data_instalarii" autocomplete="off" class="form-control datepicker-here">
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
                      <input type="text" name="cabinet" class="form-control">
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
                      <input type="text" name="numar_inventar" class="form-control">
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
                      <input type="text" name="cabinet" class="form-control">
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
                    <td>Producător:</td>
                    <td>
                      <input type="text" name="producator_dispozitiv" class="form-control">
                    </td>
                    <td>Număr inventar:</td>
                    <td colspan="4">
                      <input type="text" name="numar_inventar" class="form-control">
                    </td>
                  </tr>
                </table>

                <label for="comment">Durata de exploatare a dispozitivului medical:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Data de procurare:</td>
                    <td><input type="text" name="data_proc" autocomplete="off" class="form-control datepicker-here"></td>
                    <td>Data de instalare:</td>
                    <td><input type="text" name="data_inst" autocomplete="off" class="form-control datepicker-here"></td>
                    <td>Termen de exploatare:</td>
                    <td><input type="number" name="term_expl" class="form-control" placeholder="luni"></td>
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
                    <td><input type="text" name="data_non" class="form-control datepicker" placeholder="mm/dd/yyyy"></td>
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
                    <td><input type="text" name="anul_producerii" class="form-control datepicker" placeholder="mm/dd/yyyy"></td>
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
                    <td><input type="text" name="data_exploatare" class="form-control datepicker" placeholder="mm/dd/yyyy"></td>
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
          <div class="panel-heading"><a href="#" class="pull-right">View all</a>
            <h4>Tabs</h4>
          </div>
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
                                <a href="#" class="confirm-delete" data-toggle="modal" data-target="#delete_Modal<?= $row['id']?>" data-id="<?php  echo $row[" id "] ?>"><span class="glyphicon glyphicon-trash pull-right text-primary"></span></a>
                              </div>
                              <div class='col-lg-12 well well-add-card'>
                                <h4>Cabinetul: <?= $row['cabinet'] ?></h4>
                                <h4>Nr. serie: <?= $row['nr_serie_dispozitiv'] ?></h4>
                              </div>
                              <div class='col-lg-12'>

                              <?php
                                $sql="SELECT * FROM uploads where formular_id = " .   $row['id'];
                                $result_set_files=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                                echo '<ul>';
                                while($rowIn = mysqli_fetch_array ($result_set_files) )
                                {
                                  echo "<li><a href=\"uploads/" . $rowIn['file'] . "\" target=\"blank\" > " . $rowIn['file'] . "</a> din " .  explode(' ', $rowIn['data_upload'])[0] .
                                  "<span class='glyphicon glyphicon-trash pull-right text-primary confirm-delete-file' data-id=" . $rowIn['id'] . " style='cursor:pointer'></span>"."</li>";
                                }
                                echo '</ul>'
                              ?>
                      </div>

                      <a href="raport_instal.php?id=<?php echo $row['id'] ?>" target="_blank">
                        <button type="button" class="btn btn-danger btn-xs">Print raport</button>
                      </a>
                      <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#upload_data_Modal">
                        <button type="button" class="btn btn-primary btn-xs btn-add-file">Add file</button>
                      </a>

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
                          <h4>Nr. serie: <?= $row['nr_serie_dispozitiv'] ?></h4>
                        </div>
                        <div class='col-lg-12'>

                        <?php
                          $sql="SELECT * FROM uploads where formular_id = " .   $row['id'];
                          $result_set_files=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                          echo '<ul>';
                          while($rowIn = mysqli_fetch_array ($result_set_files) )
                          {
                            echo "<li><a href=\"uploads/" . $rowIn['file'] . "\" target=\"blank\" > " . $rowIn['file'] . "</a> din " .  explode(' ', $rowIn['data_upload'])[0] .
                            "<span class='glyphicon glyphicon-trash pull-right text-primary confirm-delete-file' data-id=" . $rowIn['id'] . " style='cursor:pointer'></span>"."</li>";
                          }
                          echo '</ul>'
                        ?>

                  </p>
                </div>

                <a href="raport_deservire.php?id=<?php echo $row['id'] ?>" target="_blank">
                  <button type="button" class="btn btn-danger btn-xs">Print raport</button>
                </a>
                <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#upload_data_Modal">
                  <button type="button" class="btn btn-primary btn-xs btn-add-file">Add file</button>
                </a>

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
                          <a href="#" class="confirm-delete" data-toggle="modal" data-target="#delete_Modal_2<?= $row['id']?>" data-id="<?php  echo $row[" id "] ?>"><span class="glyphicon glyphicon-trash pull-right text-primary"></span></a>
                        </div>
                        <div class='col-lg-12 well well-add-card'>
                          <h4>Cabinetul: <?= $row['cabinet'] ?></h4>
                          <h4>Nr. serie: <?= $row['nr_serie_dispozitiv'] ?></h4>
                        </div>
                        <div class='col-lg-12'>

                        <?php
                          $sql="SELECT * FROM uploads where formular_id = " .   $row['id'];
                          $result_set_files=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                          echo '<ul>';
                          while($rowIn = mysqli_fetch_array ($result_set_files) )
                          {
                            echo "<li><a href=\"uploads/" . $rowIn['file'] . "\" target=\"blank\" > " . $rowIn['file'] . "</a> din " .  explode(' ', $rowIn['data_upload'])[0] .
                            "<span class='glyphicon glyphicon-trash pull-right text-primary confirm-delete-file' data-id=" . $rowIn['id'] . " style='cursor:pointer'></span>"."</li>";
                          }
                          echo '</ul>'
                        ?>

                  </p>
                </div>

                <a href="raport_mentenanta.php?id=<?php echo $row['id'] ?>" target="_blank">
                  <button type="button" class="btn btn-danger btn-xs">Print raport</button>
                </a>
                <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#upload_data_Modal">
                  <button type="button" class="btn btn-primary btn-xs btn-add-file">Add file</button>
                </a>

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
                      <a class="btn icon-btn btn-primary pull-right"
                      data-toggle="modal" data-target="#add_data_Modal_4">
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
                          <a href="#" class="confirm-delete" data-toggle="modal" data-target="#delete_Modal_2<?= $row['id']?>" data-id="<?php  echo $row[" id "] ?>"><span class="glyphicon glyphicon-trash pull-right text-primary"></span></a>
                        </div>
                        <div class='col-lg-12 well well-add-card'>
                          <h4>Numar inventar: <?= $row['numar_inventar'] ?></h4>
                          <h4>Nume dispozitiv: <?= $row['nume_dispozitiv'] ?></h4>
                        </div>
                        <div class='col-lg-12'>

                        <?php
                          $sql="SELECT * FROM uploads where formular_id = " .   $row['id'];
                          $result_set_files=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                          echo '<ul>';
                          while($rowIn = mysqli_fetch_array ($result_set_files) )
                          {
                            echo "<li><a href=\"uploads/" . $rowIn['file'] . "\" target=\"blank\" > " . $rowIn['file'] . "</a> din " .  explode(' ', $rowIn['data_upload'])[0] .
                            "<span class='glyphicon glyphicon-trash pull-right text-primary confirm-delete-file' data-id=" . $rowIn['id'] . " style='cursor:pointer'></span>"."</li>";
                          }
                          echo '</ul>'
                        ?>

                  </p>
                </div>

                <a href="raport_defectare.php?id=<?php echo $row['id'] ?>" target="_blank">
                  <button type="button" class="btn btn-danger btn-xs">Print raport</button>
                </a>
                <a href="#" class="modal-edit" data-id="<?= $row['id'] ?>" type="button" data-toggle="modal" data-target="#upload_data_Modal">
                  <button type="button" class="btn btn-primary btn-xs btn-add-file">Add file</button>
                </a>

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
                    <?php echo '<span class="text-danger" >Nr. inventar: ' . $row["numar_inventar"] . ', Nume dispozitiv: ' . $row["nume_dispozitiv"] . '</span> '; ?></p>
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
        </div><!-- End #D -->


      </div>
      </div><!-- /tabbable -->

      </div>
      </div>
      </div>

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

          <script>
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
          }
        }
        );
        </script>

        <script>
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
  </body>
