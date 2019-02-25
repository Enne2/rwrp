<!DOCTYPE html>
<html lang="en">
<head>
  <title>RWRP - Reliable Web Radio Player</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body {background: #fff url("radio-wallpaper-1.jpg") no-repeat top center;background-size:cover;}
	html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px;
}
.footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 60px;
  line-height: 60px; /* Vertically center the text there */
  background-color: #f5f5f5;
}


/* Custom page CSS
-------------------------------------------------- */
/* Not required for template or sticky footer method. */

.container {
  width: auto;
  text-align:center;
}

</style>
  </head>
<body>

<div class="container">
  <div class="well well-lg">
  <h1 style="text-align:center">RWRP - Reliable Web Radio Player</h1>      
	</div>
	<?php
	exec('sudo supervisorctl start radio.liq');
	exec('sudo supervisorctl stop rremote.liq');
	$a = json_decode(file_get_contents("http://fl.enne2.net/RWRP/radios.php"),1);
	if(!count($a))
		die("
	<div class=\"alert alert-danger\">
    <strong>Errore!</strong> Attenzione! Nessuna risposta dal Server! <hr /> Controllare la connessione Internet
  </div>".'
<a href="/close.php" type="button" class="btn btn-danger btn-lg btn-block">Esci da RWRP</a>');
	
	foreach($a as $k => $radio)
		echo '  <a href="test.php?k='.$k.'" type="button" class="btn btn-primary btn-lg btn-block">'.$radio[0].'</a>';
  ?>
<a href="/close.php" type="button" class="btn btn-danger btn-lg btn-block">Esci da RWRP</a>
</div>
   <footer class="footer">
      <div class="container">
        <span class="text-muted">Copyright 2017 Matteo Benedetto me@enne2.net</span>
      </div>
    </footer>
</body>
</html>

