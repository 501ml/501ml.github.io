<!DOCTYPE html>
<html>
  <head>
    <title>Wwwahou</title>
    <link rel="stylesheet" type="text/css" href="style/main.css" />
  </head>
  <body>

 <?php

   $url = file_get_contents('https://api.zotero.org/groups/2409777/items?limit=1000');

   $array = json_decode($url, TRUE);

   $items = array_merge($array);

   $allTags = [];
   $authors = [];
   foreach ($items as $item) {
     $tags = $item['data']['tags'];
     foreach ($tags as $tag) {
         array_push($allTags, $tag['tag']);
     }
   }

   $allTags = array_unique($allTags);

    echo '<div class="items">';
     foreach ($items as $item) {
       $data = $item['data'];
       if (is_array($data)) {
         $title = $data['title'];
         $url = $data['url'];
         $date = substr($data['dateAdded'], 0, 10);
         $abstract = $data['abstractNote'];
         $tags = $data['tags'];
         if ($url) {
           echo '<div class="item';
           foreach ($tags as $tag) {
              echo ' ' . $tag['tag'];
           }
           echo '">';
             echo '<span class="infos">';
               echo '<span>' . $date . ' </span>';
               echo '<a href=" ' . $url . '" target="_blank">' . ($title ? $title : '----') . '</a>';
               echo '<sup>';
                foreach ($tags as $tag) {
                  echo ' <span>' . $tag['tag'] . '</span>';
                }
               echo '</sup>';
             echo '</span>';
             echo ' <p>'. $abstract . '</p>';
           echo '</div>';
         }
       }
     }
   echo '</div>';

  ?>
  <script type="text/javascript" src="js/lib/jquery-3.2.1.min.js"></script>

</body>
</html>
