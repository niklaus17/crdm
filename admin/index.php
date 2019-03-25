<?php
session_start();
include('header.php');
include('navbar.php');
include_once("db_connect.php");
?>
<title>Bootstrap Example</title>
<body>

  <div class="container text-center">
	  <h3>What We Do</h3>
	</div><br>

  <div class="col-sm-12">

  <table class="table table-bordered table-striped text-center">
    <thead>
    <tr class="success" style="font-weight:bold">
      <td>Nr.</td>
      <td>IP</td>
      <td>Cabinetul</td>
      <td>Nume fișier</td>
      <td>Acțiuni</td>
    </tr>
    </thead>

        <?php
      $count=1;
      $sql="SELECT * FROM tbl_uploads order by id";
      $result_set=mysqli_query($conn, $sql) or die("database error: ". mysqli_error($conn));
      while($row = mysqli_fetch_array ($result_set) )
      {
        ?>
        <tr>
          <td><?= $count++ ?></td>
          <td><?= $row['first_name'] ?></td>
          <td><?= $row['last_name'] ?></td>
          <td><?= $row['file'] ?></td>
          <td>
            <a href="uploads/<?php echo $row['file'] ?>" target="_blank"><i class="glyphicon glyphicon-eye-open text-primary"></i></a>
          </td>
      </tr>
        <?php
  }
  ?>
    </table>
  </div>

  <div class="col-sm-12">

  	    <table class="table table-bordered table-striped text-center">
  	  <thead>
  	    <tr class="info text-center">
  	      <th>Sectia</th>
  	      <th>Cabinetul</th>
  	      <th>Procente %</th>
  				<th>Data</th>
  	    </tr>
  	  </thead>
  	  <tbody id="sections">
  	    <tr>
  	      <td class="rotate"><a href="#" onclick="getData('usg')"><div class="btn active">USG</div></td></a>
  	      <td></td>
  	      <td>
  				  <div class="progress">
  					  <div class="progress-bar" role="progressbar" aria-valuenow="70"
  					  aria-valuemin="0" aria-valuemax="100" style="width:70%">
  						70%
  					  </div>
  					</div>
  			</td>
  			<td></td>

  	    </tr>
  	    <tr>
  	      <td class="rotate"><a href="#" onclick="getData('df')"><div class="btn">DF</div></td></a>
  	      <td></td>
  	      <td>
  		  <div class="progress">
  			  <div class="progress-bar" role="progressbar" aria-valuenow="70"
  			  aria-valuemin="0" aria-valuemax="100" style="width:70%">
  				70%
  			  </div>
  			</div>
  			</td>
  			<td></td>
  	    </tr>
  	    <tr>
  	      <td class="rotate"><a href="#" onclick="getData('esvm')"><div class="btn">ESVM</div></td></a>
  	      <td></td>
  	      <td>
  		  <div class="progress">
  			  <div class="progress-bar" role="progressbar" aria-valuenow="70"
  			  aria-valuemin="0" aria-valuemax="100" style="width:70%">
  				70%
  			  </div>
  			</div>
  			</td>
  			<td></td>
  	    </tr>
  	    <tr>
  	      <td class="rotate"><a href="#" onclick="getData('lcd')"><div class="btn">LCD</div></td></a>
  	      <td></td>
  	      <td>
  		  <div class="progress">
  			  <div class="progress-bar" role="progressbar" aria-valuenow="70"
  			  aria-valuemin="0" aria-valuemax="100" style="width:70%">
  				70%
  			  </div>
  			</div>
  			</td>
  			<td></td>
  	    </tr>
  	    <tr>
  	      <td class="rotate"><a href="#" onclick="getData('lmn')"><div class="btn">LMN</div></td></a>
  	      <td></td>
  	      <td>
  		  <div class="progress">
  			  <div class="progress-bar" role="progressbar" aria-valuenow="70"
  			  aria-valuemin="0" aria-valuemax="100" style="width:70%">
  				70%
  			  </div>
  			</div>
  			</td>
  			<td></td>
  	    </tr>
  	  </tbody>
  	</table>
  </div>
  </div>


  <script>
  		$(document).ready(function() {
  			getData('usg');
  		})
  		var sectionList;
  		function getData(type) {
  			$.ajax({
  				url: "getData.php?type=" + type,
  				type: 'get',
  					dataType: 'JSON',
  			}).done(function(response) {
  				sectionList = response;
  				for(let i =0; i < 5; i++) {
  					if(response[i] != undefined) {
  						var color = '';
  						if(response[i].percentage < 50) color = 'red';
  						else if( response[i].percentage < 75) color = 'yellow';
  						else color = 'green';
  						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(2)").text(response[i].cabinet);
  						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(3) div div").css('width', response[i].percentage + '%')
  							.text(response[i].percentage + '%')
  							.css('background-color', color)
  							.css('color', '#000');
  						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(4)").text(response[i].data_insert);
  						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(5) a").data("id", response[i].id)
  							.css("display", "block");
  					} else {
  						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(2)").text("");
  						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(3) div div").css('width', 0).text(0);
  						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(4)").text("");
  						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(5) a").css("display", "none");
  					}
  				}
  			});
  		}
  </script>

  <script type="text/javascript">

  $(document).ready(function() {

  	setTimeout(function() {
  		for(let i = 0; i < sectionList.length; i++) {
  			var charge_date = +new Date(sectionList[i].data_insert);
  			var id = sectionList[i].id;
  			var percentage = sectionList[i].percentage;
  			var now = Date.now();
  			var interval = now - charge_date;

  			var newPercentage = -1;
  			if((percentage < 25 && interval > 1209600000) ||
  				(percentage < 75 && interval > 907200000) ||
  				(percentage < 100 && interval > 604800000) ||
  				(percentage == 100 && interval > 302400000)) {
  					newPercentage = percentage - 25;
  			}
  			for(let i = 0; i < 10000; i++) {}
  			if(newPercentage > -1 ) {
  				$.post("updateCartridge.php", { 'id': id, 'percentage': newPercentage})
  					.done(function(data) {
  						var color = '';
  						if(sectionList[i].percentage -25 < 50) color = 'red';
  						else if( sectionList[i].percentage -25 < 75) color = 'yellow';
  						else color = 'green';
  						$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(3) div div").css('width', sectionList[i].percentage -25 + '%')
  							.text(sectionList[i].percentage -25 + '%')
  							.css('background-color', color)
  							.css('color', '#000');
  					});
  			}
  		}
  	}, 2000);


  });

  </script>

  <script>
  		// Add active class to the current button (highlight it)
  		var header = document.getElementById("sections");
  		var btns = header.getElementsByClassName("btn");
  		for (var i = 0; i < btns.length; i++) {
  			btns[i].addEventListener("click", function() {
  			var current = document.getElementsByClassName("active");
  			current[0].className = current[0].className.replace(" active", "");
  			this.className += " active";
  			});
  		}
  </script>

  	<script type="text/javascript">
  		$(".modal-edit").click(function() {
  			id = $(this).data('id');
  			$.get("getSections.php", {id: id}).done( function(data) {
  				data = JSON.parse(data);
  				$("#id").val(data[0].id);
  				$("#section").val(data[0].name);
  				$("#cabinet").val(data[0].cabinet);
  				$("#procente").val(data[0].percentage);
  				$("#start").val(data[0].data_insert);
  			});
  		});
  	</script>


</body>
</html>
