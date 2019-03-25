
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Portfolio</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="addinfo.php">Add info</a></li>
        <li><a href="blancuri.php">Blancuri</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

        <?php if (isset($_SESSION['userid'])) { ?>
  			<li><p class="navbar-text"><strong>Welcome!</strong> <strong style="color: white;"><?php echo $_SESSION['name']; ?></strong></p></li>

  			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
  			<?php } else { ?>
        <li><p class="navbar-text">You are Logged Out!</p></li>

  			<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
  			<?php } ?>
      </ul>
    </div>
  </div>
</nav>
