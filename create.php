<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>추가하기</title>
    <style media="screen">
    .wrap {
      margin: 0 auto;
      width: 492px;
    }
    </style>
  </head>
  <body>
    <div class="wrap">

      <h1>추가하기</h1>
      <?php
      echo "<form class=\"\" action=\"create_process.php?id=".$_GET['id']."&type=".$_GET['type']."\" method=\"post\" enctype=\"multipart/form-data\">";
      ?>
        <p>
          <input type="text" name="title" placeholder="Tilte">
        </p>
        <p>
          <textarea name="description" rows="8" cols="80" placeholder="Description"></textarea>
        </p>
        <p>
          <input type="file" name="file_img[]" multiple />
          <input type="submit">
        </p>
      </form>

    </div>
  </body>
</html>
