<?php $css = file_get_contents("https://annuel.framapad.org/p/ws-valence-css/export/txt"); ?>

<!doctype html>
  <head>
    <meta charset="utf-8">
    <title>Restitution</title>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/fantasque-sans-mono" type="text/css"/>  
    <style>
    <?php echo $css ?>
    </style>
	  <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.lazyload.min.js"></script>
  </head>
  <body>

  <div class="infos">
    <?php include('infos.php'); ?>
  </div>

  <?php

      $dirProjet = array();
      $MyDirectory = opendir('data') or die('Erreur');
      while($Entry = readdir($MyDirectory)) {
        if(is_dir('data/'.$Entry)&& $Entry != '.' && $Entry != '..') {
          array_push($dirProjet,$Entry);
      }
      }
      closedir($MyDirectory);

      sort($dirProjet);
      $count=count($dirProjet);

      // boucle de tout les projets
      for ($i = 0; $i < $count; $i++){

      ?>
        <div class="projet projet<?php echo $i; ?>" >
      <?php

    $dir = 'data/'.$dirProjet[$i];
    $load_text = $dir.'/00texte.txt';
	  $info_read = file_get_contents($load_text);
	?>
  <div class="legende">
    <?php echo $info_read; ?>
  </div>
  <div class="slider">
  <?php
	if (is_dir($dir)) {
	  if ($dh = opendir($dir)) {
		$j=0;
		$images=array();
		while (($file = readdir($dh)) !== false) {
      $images[]=$file;
		}
		sort($images);
    $first = true;
    foreach($images as $file){

    if( $file != '.' && $file != '..' && preg_match('#\.(jpe?g|gif|png|svg|JPE?G)$#i', $file)) {
        ?>
          <img class="<?php echo $j; ?>" src="<?php echo $dir.'/'.$file; ?>" />
        <?php
        $j++;
      } 
    if( $file != '.' && $file != '..' && preg_match('#\.(mp4|MP4)$#i', $file)) {
        ?>
	 <video class="<?php echo $j; ?>" controls> <source src="<?php echo $dir.'/'.$file; ?>" type="video/mp4"></video> 
        <?php
        $j++;
      }
    }
    closedir($dh);
  }
}

?>	  
    </div>
	</div>
  <?php
  }
  ?>
  </body>
</html>