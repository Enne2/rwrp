<!DOCTYPE html>
<html lang="en">
<head>
  <title>Avvio Stream</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="css/style.css"
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
  <h4 style="text-align:center">RWRP - Reliable Web Radio Player</h4>      
	</div>
<?php
	$a = json_decode(file_get_contents("http://fl.enne2.net/RWRP/radios.php"),1);
	if(!count($a))
		die("
	<div class=\"alert alert-danger\">
    <strong>Errore!</strong> Attenzione! Nessuna risposta dal Server! <hr /> Controllare la connessione Internet
  </div>  
  ");
  file_put_contents("url.conf",$a[$_GET['k']][1]);
  ?>
<div class="container">

    <?php
$url = file_get_contents('url.conf');
$file = file_get_contents('rremote.backup');
$data = str_replace("::url::",$url,$file);
file_put_contents("rremote.liq",$data);
exec('sudo supervisorctl restart rremote.liq');
?>



    <svg preserveAspectRatio="none" id="visualizer" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <mask id="mask">
                <g id="maskGroup"></g>
            </mask>
            <linearGradient id="gradient" x1="0%" y1="0%" x2="0%" y2="100%">
                <stop offset="0%" style="stop-color:#db6247;stop-opacity:1" />
                <stop offset="40%" style="stop-color:#f6e5d1;stop-opacity:1" />
                <stop offset="60%" style="stop-color:#5c79c7;stop-opacity:1" />
                <stop offset="85%" style="stop-color:#b758c0;stop-opacity:1" />
                <stop offset="100%" style="stop-color:#222;stop-opacity:1" />
            </linearGradient>
        </defs>
        <rect x="" y="0" width="100%" height="100%" fill="url(#gradient)" mask="url(#mask)"></rect>
    </svg>

    <h1 class="main-text"><?=$a[$_GET['k']][0]?></h1>


    <div class="button-container">
<a href="/" class="btn btn-danger" role="button"><button id="button" class="green-button">Stop</button></a></div>

    <script  src="js/index.js"></script>

</div></div><!--
<footer class="footer">
      <div class="container">
        <span class="text-muted">Copyright 2017 Matteo Benedetto me@enne2.net</span>
      </div>
    </footer>-->
</body>
</html>

