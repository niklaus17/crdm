<?php
// include('header.php');
include('db_connect.php');
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<nav class="navbar navbar-inverse">
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
    <div class="collapse navbar-collapse">
      <?php if (isset($_SESSION['user'])) { ?>
      <ul class="nav navbar-nav">
        <li><a href="blancuri.php">Blancuri</a></li>
      <?php } else { ?>
  <?php } ?>
      </ul>

      <div class="dropdown">
                <ul class="nav navbar-nav navbar-right">

                  <?php if (isset($_SESSION['user'])) { ?>
                    <li class="dropdown"><a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown"><strong>Bun venit!</strong>
                      <strong style="color: white;"><?php echo $_SESSION['user']['username']?> </strong><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <?php if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) { ?>
                            <li><a href="home.php"><i class="icon-cog"></i> Setings</a></li>
                            <?php		}		?>
                            <li class="divider"></li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
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
