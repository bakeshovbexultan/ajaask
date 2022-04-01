<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
</head>
<body>

	<div id="demo">
		<button type="button" onclick="loadDoc()">Загрузить</button>
	</div>
	<div id="response"></div>

	<script type="text/javascript">

		function loadDoc() {
		  const xhttp = new XMLHttpRequest();
		  xhttp.onload = function() {myFunction(this);}
		  xhttp.open("GET", "catalog_ilab.xml");
		  xhttp.send();

		function myFunction(xml) {
			const xmlDoc = xml.responseXML;
			x = xmlDoc.getElementsByTagName("store");

			let text = "<br>";
			let cities = [];

			for (let i = 0; i < x.length; i++) {
				cities.push(x[i].getAttribute('postcode'));
			}

			let uniqueCities = Array.from(new Set(cities));

			uniqueCities.sort(function(a, b) {
				return a - b;
			});

			x = xmlDoc.getElementsByTagName("offer");

				uniqueCities.forEach(function(element) {
					text += element + "<br>";
					for (let i = 0; i < x.length; i++) {
				        if (element == xmlDoc.getElementsByTagName("store")[i].getAttribute('postcode')) {
							text += x[i].getAttribute('id') +
							", " + x[i].getElementsByTagName("name")[0].childNodes[0].nodeValue +
							", " + x[i].getElementsByTagName("vendor")[0].childNodes[0].nodeValue +
							", " + x[i].getElementsByTagName("price")[0].childNodes[0].nodeValue + 
							"<br>";
				        }
					}
					text += "<br>";
			    });

			document.getElementById("response").innerHTML = text;
			}
		}
	</script>
</body>
</html>