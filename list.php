<?php
function print_heading(){
  if( $_GET['type']=="enter"){
    echo "<h1>".$_GET['id']."의 관광지</h1>";
  }
  elseif ($_GET['type']=="restaurant") {
    echo "<h1>".$_GET['id']."의 맛집</h1>";
  }
}

function print_menu(){
  echo "<li><a href=\"main.php\">Home</a></li>";
  if( $_GET['type']=="enter"){
    echo "<li><a href=\"list.php?id=".$_GET['id']."&type=restaurant\">맛집보기</a></li>";
  }
  elseif ($_GET['type']=="restaurant") {
    echo "<li><a href=\"list.php?id=".$_GET['id']."&type=enter\">관광지보기</a></li>";
  }
  echo "<li><a href=\"create.php?id=".$_GET['id']."&type=".$_GET['type']."\">추가하기</li></a>";
}

function print_list(){
  $id=$_GET['id'];
  $type=$_GET['type'];
  $place_list=scandir("data/places/$id/$type");
  $i = 2;
  while($i < count($place_list)){
    $img_list=scandir("images/places/$id/$type/$place_list[$i]");
    echo "<li>";
      echo "<div>";
        echo "<a href=\"introduction.php?id=$id&type=$type&name=$place_list[$i]\">";
          echo "<img src=\"images/places/$id/$type/$place_list[$i]/$img_list[2]\" alt=\"thumbnail\">";
          echo "<div class=\"text\">".$place_list[$i]."</div>";
        echo "</a>";
      echo "</div>";
    echo "</li>";
    $i = $i + 1;
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php
    if($_GET['type']=="enter"){
      echo "관광지 목록";
    }
    elseif($_GET['type']=="restaurant"){
      echo "맛집 목록";
    }?></title>
    <link rel="stylesheet" href="list.css">
  </head>
  <body>
    <div class="wrap">
      <div id="grid">
        <?php print_heading(); ?>

        <ul id="menu">
          <?php print_menu(); ?>
        </ul>

        <ul id="content">
          <?php print_list(); ?>
        </ul>
      </div>
    </div>
  </body>
</html>
