<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!--opengraph-->
	<meta property="og:url" content="https://www.jambonbill.org">
	<meta property="og:title" content="Pierre BOQUET Portfolio">
	<meta property="og:image" content="https://jambonbill.org/dist/img/jambonbill.png">
	<meta property="og:content" content="website">
	<meta property="og:description" content="Portfolio de Pierre BOQUET, Concepteur & Developpeur d'applications">

	<link href="css/style.css" rel="stylesheet">
	<link href="css/portfolio.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" refer></script>
	<script type="module" src="js/app.js" defer></script>
	<title>Pierre BOQUET - Portfolio</title>
</head>

<body>
	
	<nav class="navbar navbar-expand-lg">
		<div class="container">
  			<a class="navbar-brand" href="#">PIERRE BOQUET</a>
  			<a class="navbar-brand" href="download.php">CV</a>
		</div>
	</nav>



	<div class="container">
		<div class="row">
			
		<div class="col-12 col-md-9">
			<p class=description>Concepteur & Developpeur d'applications: depuis l’identification initiale des besoins, jusqu'à la production, le déploiement et la maintenance, j’aime me consacrer à un projet, et le voir se développer au fil du temps</p>
		</div>
		</div>
		
    	
	</div>
	
	<div class="container">

		
		<strong>Langages :</strong>  PHP7 & 8, JavaScript, Es6, Python, NodeJS, C#<br>
		<strong>Frameworks & libraries :</strong> Composer, Packagist, Symfony, Npm, React, JQuery, D3.js <br>
		<strong>Web Services :</strong> API REST, SOAP, Google API’s, AWS <br>
		<strong>DB :</strong> MySQL, SQLite, PostGres, MongoDB, Redis <br>
		<strong>Other :</strong> GIT, Docker, Composer, Postfix, Vagrant, Regexp, CRUD, PSR2 <br>
		<br>
		<br>
		<br>
	</div>


	
	<div class="container">

		<div class="row">
			<?php
			require_once "cards.php";
			printCards($data);
			?>
		</div>
		<hr>
		<a class="navbar-brand" href="download.php">CV</a>
		<a class="navbar-brand" href="download.php">CONTACT</a>
	</div>


	
	
  </body>
</html>