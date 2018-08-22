<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>수정하기</title>
  </head>
  <style media="screen">
  .wrap {
    margin: 0 auto;
    width: 492px;
  }
  </style>
  <body>
    <div class="wrap">

      <h1>수정하기</h1>
      <?php
      echo "<form class=\"\" action=\"update_process.php?id=".$_GET['id']."&type=".$_GET['type']."\" method=\"post\" enctype=\"multipart/form-data\">";
      ?>
        <p>
          <input type="text" name="title" placeholder="Tilte" value="<?= $_GET['name']?>">
        </p>
        <p>
          <textarea name="description" rows="8" cols="80" placeholder="Description"><?php
            $data = file_get_contents('data/places/'.$_GET['id'].'/'.$_GET['type'].'/'.$_GET['name']);
            echo $data;
            ?></textarea>
            <input type="hidden" name="old_name" value="<?=$_GET['name'];?>">
        </p>
        <p>
          <input type="file" name="file_img[]" multiple />
          <input type="submit">
        </p>
      </form>
      
    </div>
  </body>
</html>
