<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script>
		function showCD() {
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
		    	document.getElementById("txtHint").innerHTML=this.responseText;
			}
			xmlhttp.open("POST","handler.php");
			xmlhttp.send();
		}
	</script>
</head>
<body>

<form>
	<input type="button" value="Загрузить" onclick="showCD()">
</form>
<br>
<div id="txtHint"></div>

</body>
</html>