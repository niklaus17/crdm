
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
    <div class="collapse navbar-collapse" id="myNavbar">
      <?php if (isset($_SESSION['userid'])) { ?>
      <ul class="nav navbar-nav">
        <li><a href="blancuri.php">Blancuri</a></li>
        <li><a href="section.php">Add section</a></li>
        <li><a href="type.php">Add type</a></li>
      <?php } else { ?>
  <?php } ?>
      </ul>

      <ul class="nav navbar-nav navbar-right">

        <?php if (isset($_SESSION['userid'])) { ?>
  			<li><p class="navbar-text"><strong>Bun venit!</strong> <strong style="color: white;"><?php echo $_SESSION['name']; ?></strong></p></li>

  			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Log out</a></li>
  			<?php } else { ?>
        <li><p class="navbar-text">Sunteți delogat!</p></li>

  			<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Log In</a></li>
  			<?php } ?>
      </ul>
    </div>
  </div>
</nav>
