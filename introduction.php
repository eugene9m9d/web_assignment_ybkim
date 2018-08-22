<?php
function print_heading(){
  $name=$_GET['name'];
  echo "<h1>".$name."</h1>";
}

function print_menu(){
  echo "<li><a href=\"main.php\">Home</a></li>";
  echo "<li><a href=\"list.php?id=".$_GET['id']."&type=".$_GET['type']."\">목록보기</a></li>";
  echo "<li><a href=\"update.php?id=".$_GET['id']."&type=".$_GET['type']."&name=".$_GET['name']."\">수정하기</a></li>";
}

function print_content(){
  $id=$_GET['id'];
  $type=$_GET['type'];
  $name=$_GET['name'];
  $data=file_get_contents("data/places/$id/$type/$name");
  $data_list=explode("\n",$data);
  $image_list=scandir("images/places/$id/$type/$name");
  $i = 0;
  echo "<ul id=\"content\">";
  while($i < count($data_list)-1){
    echo "<li>".$data_list[$i]."</li>";
    $i = $i+1;
  }
  echo "</ul>";

  $i=2;
  while($i < count($image_list)){
    echo "<img src=\"images/places/$id/$type/$name/$image_list[$i]\" alt=\"img_$i\">";
    $i = $i+1;
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $_GET['name'] ?></title>
    <link rel="stylesheet" href="intro.css">
  </head>
  <body>
    <div class="wrap">
      <div id="grid">
        <?php print_heading(); ?>
        <ul id="menu">
          <?php print_menu(); ?>
        </ul>
        <div id="content">
          <?php print_content(); ?>
        </div>
      </div>
    </div>
  </body>
</html>
