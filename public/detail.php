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

<?php
require_once "dbdata.php";
shuffle($data);
$o=$data[0];
?>

<body>
	
	<nav class="navbar navbar-expand-lg">
		<div class="container">
  			<a class="navbar-brand" href="#">PIERRE BOQUET</a>
		</div>
	</nav>



	<div class="container">
		

		<div class="row">
			<div class="col-12">
				<div class="text-end">Tous les projets</div>
				
			</div>
		</div>
		
		<div class="row">
		
		<div class="col-6">
			<!-- photo -->
			<div class=imglarge>
			<?php
			if ($o->url_img) {
				echo "<img src=".$o->url_img.">";
			} else {
				echo '<img src="img/thumbnail-600x350.png">';
			}
			
			?>
			</div>
		</div>

		<div class="col-6">
			<!-- details -->
			<?php
			echo "<h1>" . $o->title . "</h1>";
			echo '<p><i class="text-muted">' . $o->tags . '</i></p>';
			echo '<p>'.$o->description_short.'</p>';
			
			if ($o->url) {
				echo '<a href="'.$o->url.'">'.$o->url.'</a>';
			}
			print_r($o);
			?>
		</div>	
		
		</div>	
		
    	
	</div>
	


	
	<div class="container">

		<div class="row">
			<?php require_once "cards.php"?>
		</div>
		<hr>
		<a class="navbar-brand" href="download.php">CV</a>
		<a class="navbar-brand" href="download.php">CONTACT</a>
	</div>


	
	
  </body>
</html>