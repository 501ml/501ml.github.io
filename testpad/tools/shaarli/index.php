<!DOCTYPE html>
<html>
  <head>
    <title>Ressources</title>
    <link rel="stylesheet" type="text/css" href="style/main.css" />
    <script type="text/javascript" src="js/lib/jquery-3.2.1.min.js"></script>
  </head>
  <body>

<?php

  // Here goes your feeds:
  $file = "http://www.luuse.io/workshop/valence/shaarli/?do=rss";
  $content = file_get_contents($file);
  $content = new SimpleXmlElement($content);

  include('inc/functions.php');

?>

<section id="content">
  <?php
    echo "<ul class='liste searchList'>";

    foreach($content->channel->item as $entry) {
       $link        = $entry->link;
       $titleSlug   = slug($entry->title);
       $categories  = $entry->category;
       $dateParsed  = date_parse($entry->pubDate);
       echo "<li data-title='".$titleSlug."' class='";
       foreach($categories as $category){
         echo $category . ' ';
       }
       echo"'>";
       echo "<span class='date'><sup>&nbsp;". $dateParsed['day'] . "/" . $dateParsed['month'] . "/" . $dateParsed['year'] . "</sup></span>";
       echo "<span class='title'>" . $entry->title . " </span>";
       echo "<span class='description'>".$entry->description."</span>";
       echo "<span class='theUrl'>";


      echo "<a class='link' href='$entry->link'>" . $link . "</a>";

      $categories = $entry->category;
        $nb = count($categories);
        foreach($categories as $category){
          echo '<span> '.$category.' </span>';
        }

      echo "</li>";
    }
    echo "</ul>";

  ?>
</section>

  </body>
</html>
