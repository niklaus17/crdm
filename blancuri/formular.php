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
                      <input type="date" name="anul_producerii_dispozitiv" class="form-control datepicker">
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

                <label>Date piesa/accesoriu:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Denumire piesa/accesoriu:</td>
                    <td>
                      <input type="text" name="denumire_piesa" class="form-control">
                    </td>
                    <td>Anul producerii:</td>
                    <td>
                      <input type="date" name="anul_producerii_piesa" class="form-control datepicker">
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
                    <td>Producator:</td>
                    <td>
                      <input type="text" name="producator_piesa" class="form-control">
                    </td>
                    <td>Part number:</td>
                    <td colspan="4">
                      <input type="text" name="part_number" class="form-control">
                    </td>
                  </tr>
                </table>

                <label>Date cu privire la dispozitivul medical pentru care a fost instalata piesa/accesoriul:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Denumire piesa/accesoriu:</td>
                    <td>
                      <input type="text" name="denumire_piesa_instal" class="form-control">
                    </td>
                    <td>Anul producerii:</td>
                    <td>
                      <input type="date" name="anul_producerii_piesa_instal" class="form-control datepicker">
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
                    <td>Producator:</td>
                    <td>
                      <input type="text" name="producator_piesa_instal" class="form-control">
                    </td>
                    <td>Altele*:</td>
                    <td>
                      <input type="text" name="altele" class="form-control">
                    </td>
                  </tr>
                </table>

                <label>Inspectie/Test de functionalitate:</label>
                <table class="table table-bordered">
                  <tr>
                    <td>Data instalarii/ Monatarii:</td>
                    <td>
                      <input type="date" name="data_instalarii" class="form-control datepicker">
                    </td>
                    <td>Perioada de garantie:</td>
                    <td>
                      <input type="number" name="garantie" class="form-control" placeholder="luni">
                    </td>
                  </tr>
                  <tr>
                    <td>Test de operare (verificarea functionalitatii)</td>
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
                      <input type="date" name="anul_producerii_dispozitiv" class="form-control datepicker">
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
                      <input type="date" name="data_instalarii" class="form-control datepicker"><br>
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


      <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
          <div class="panel-heading"><a href="#" class="pull-right">View all</a>
            <h4>Tabs</h4>
          </div>
          <div class="panel-body">

            <ul class="nav nav-tabs">
              <li class="active"><a href="#A" data-toggle="tab">Section 1</a></li>
              <li><a href="#B" data-toggle="tab">Section 2</a></li>
              <li><a href="#C" data-toggle="tab">Section 3</a></li>
            </ul>

            <div class="tabbable">
              <div class="tab-content">
                <div class="tab-pane active" id="A">
                  <div class="well well-sm">
                    <div class="container" id="tourpackages-carousel">

                      <div class="row">
                        <div class="col-lg-12">
                          <h1>My Card
                            <a class="btn icon-btn btn-primary pull-right"
                            data-toggle="modal" data-target="#add_data_Modal">
                            <span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span>
                            Add New Card
                          </a>
                          </h1>
                        </div>

                        <?php
                           $sql="SELECT * FROM formular order by id DESC";
                          $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                          while($row = mysqli_fetch_array ($result_set) )
                          {
                        ?>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
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
        </div>

        <div class="tab-pane" id="B">
          <div class="well well-sm">
              <div class="container" id="tourpackages-carousel">
                <div class="row">
                  <div class="col-lg-12">
                    <h1>My Card 2
                      <a class="btn icon-btn btn-primary pull-right"
                      data-toggle="modal" data-target="#add_data_Modal_2">
                      <span class="glyphicon btn-glyphicon glyphicon-plus img-circle"></span>
                      Add New Card 2
                    </a>
                    </h1>
                  </div>

                  <?php
                     $sql="SELECT * FROM formular_2 order by id DESC";
                    $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
                    while($row = mysqli_fetch_array ($result_set) )
                    {
                  ?>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
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
        </div>

        <div class="tab-pane" id="C">
          <div class="well well-sm">I've decided that I like wells.</div>
        </div>
      </div>
      </div>
      <!-- /tabbable -->

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
          $(document).ready(function(){
            $('.datepicker').datepicker();
          });
        </script>
  </body>
