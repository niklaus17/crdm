<script>
		$('.confirm-delete').on('click', function(e) {
			e.preventDefault();
			var id = $(this).data('id');
			$('#myModal' + id).modal('show');
		});
</script>

<script>
		$(function() {
			$("#demo").ipv4_input();
			$(".ipv4-cell").attr("name", "ip[]");
			$(".ipv4-cell").css("width", "24%")
			$("#clear").click(function() {
			$("#demo").ipv4_input("clear");
			})
		});
</script>

<script>
	$(document).ready(function() {
		getData('usg');
	})

	function getData(type) {
		$.ajax({
		  url: "getData.php?type=" + type,
		  type: 'get',
        dataType: 'JSON',
		}).done(function(response) {
			for(let i =0; i < 5; i++) {
				if(response[i] != undefined) {

					$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(2)").text(response[i].cabinet);
					$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(3)").text(response[i].percentage);
				} else {
					$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(2)").text("");
					$("#sections tr:nth-child(" + (i + 1) + ") td:nth-child(3)").text("");
				}
			}
		});
	}
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
