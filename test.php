
<?php include("functions.php"); ?>

<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
$url = "http://kickass.to/tv/";
$encoding = "gzip";
scrapmagnets($url,$encoding);
echo "--------------";
?>