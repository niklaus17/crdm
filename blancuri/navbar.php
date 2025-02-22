<?php
include('db_connect.php');
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<nav class="navbar navbar-inverse" style="z-index: 999;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="img/logo_white.png"  width="" height="25" alt="">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <?php if (isset($_SESSION['user'])) { ?>
      <ul class="nav navbar-nav">
        <li><a href="blancuri.php">Blancuri</a></li>
        <li><a href="ip.php">IP</a></li>
        <li><a href="formular.php">Formular</a></li>
        <li><a href="violin.php">Violin</a></li>
      <?php } else { ?>
  <?php } ?>
      </ul>

      <div class="dropdown">
                <ul class="nav navbar-nav navbar-right">

                  <?php if (isset($_SESSION['user'])) { ?>
                    <li class="dropdown"><a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown"  style="border: none;"><strong>Bun venit!</strong>
                      <strong style="color: white;"><?php echo $_SESSION['user']['username']?> </strong><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <?php if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) { ?>
                            <li><a href="home.php"><i class="icon-cog"></i> Setări</a></li>
                            <?php		}		?>
                            <li class="divider"></li>
                            <li><a href="logout.php" class="confirm-logout"><span class="glyphicon glyphicon-log-out"></span>Log out</a></li>
                          <?php } else { ?>
                            <li><p class="navbar-text">Sunteți delogat!</p></li>
                            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>
                         <?php } ?>
                        </ul>
                    </li>
                </ul>
              </div>
    </div>
  </div>
</nav>

<!-- /.modal-For logout -->
	<div id="logout_Modal" class="modal fade">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title">Logout <i class="glyphicon glyphicon-lock"></i></h4>
		  </div>
		  <div class="modal-body">
			<h3>Sigur doriți să vă deconectați?</h3>
		  </div>
		  <div class="modal-footer">
			 <a class="btn btn-success" href="logout.php">Confirmă</a>
			  <a href="#" data-dismiss="modal" class="btn btn-danger btn-cancel">Anulează</a>
		  </div>
		</div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


  <!-- Confirm pentru logout modal -->
  <script>
  		$('.confirm-logout').on('click', function(e) {
  			e.preventDefault();
  			$('#logout_Modal').modal('show');
  		});
  </script>
