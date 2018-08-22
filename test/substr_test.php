<?php
$str = "abc\n";
$rest = substr($str,-2);
echo nl2br($str);
echo nl2br("aa".$rest."bb");
 ?>
