<?php
function make_link($id){
  //echo $id."<br>";
  $data = file_get_contents("data/regions/".$id);
  $list = explode("\n",$data);

  echo "<img src=\"images/$id.png\" alt=\"$id\" usemap=\"#krmap\">\n";
  echo "<map name=\"krmap\">\n";
  $i = 0;
  //var_dump($list);
  while( $i < count($list)-1 ){
    list($shape, $link, $coords) = explode("/",$list[$i]);
    echo "<area shape=\"$shape\" alt=\"$link\" coords=\"$coords\" href=\"$link\">\n<br>";
    $i = $i+1;
  }
  echo "</map>";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Main</title>
    <link rel="stylesheet" href="./main.css">
    <meta charset="utf-8">
  </head>

  <body>
    <div class="wrap">

      <h1><a href="main.php">맛집! 관광지! 총집합!</a></h1>
      <div id="grid">

        <div id="article">
          <?php
          if(isset($_GET['id'])){
            make_link($_GET['id']);
          } else {
            make_link("kr");
          }
          ?>
        </div>
      </div>

    </div>
  </body>
</html>
