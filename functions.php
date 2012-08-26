<?php
function getrecents() {
$file = "recent.txt";
$f = fopen($file, "r");
while ( $line = fgets($f, 1000) ) {
echo '<li><a class="recents" href="#'.$line.'">'.$line.'</a></li>';
}
}

?>