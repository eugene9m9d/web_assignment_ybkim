<?php
$descript = $_POST['description'];
$descript = rtrim($descript,"\n\n\n\n\n");
file_put_contents('data/places/'.$_GET['id'].'/'.$_GET['type'].'/'.$_POST['title'], $descript."\n");
mkdir("./images/places/".$_GET['id']."/".$_GET['type']."/".$_POST['title'], 0700);
for($i=0; $i<count($_FILES["file_img"]["name"]); $i++){
  $filetmp = $_FILES["file_img"]["tmp_name"][$i];
  $filename = $_FILES["file_img"]["name"][$i];
  $filetype = $_FILES["file_img"]["type"][$i];
  $filepath = "./images/places/".$_GET['id']."/".$_GET['type']."/".$_POST['title']."/".$filename;

  move_uploaded_file($filetmp,$filepath);
}
header('Location: list.php?id='.$_GET['id'].'&type='.$_GET['type']);
?>
