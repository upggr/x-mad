
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php require_once('customize/meta.php'); ?>
<link rel="shortcut icon" href="http://x-mad.com/favicon.ico" />
<link rel="stylesheet" type="text/css" href="xmad.css" media="all" />
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/ui-lightness/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
<script type="text/javascript" src="xmadscript.js"></script>
</head>

<body>
<?php include('functions.php'); ?>

<div id="header" class="clickable" url="http://www.x-mad.com">
<div id="social">
<?php require_once('customize/socialbuttonstop.php'); ?>

</div>

</div>

 


<div id="content"><!-- content -->

      <div id="results">
        <div id="progressbar"></div>
        <div id="message"></div>
      </div>
 <?php
 
 if (isset($_GET["graburl"])){
        readpornxml($_GET["graburl"]);
    }
	else 
	//readpornxml('http://www.porndig.com/rss/top/videos.xml');

 ?>



                        
</div><!-- end content -->


<div id="sidebar"><!-- sidebar -->

<h3>Porn Categories</h3>

    <div class="navcontainer">
    <ul>
  <?php  
  
  //fetchxmllinksforporn('http://www.porndig.com/rss/');
  
   ?>

    </ul>
    </div>
    
  
 
</div>
<!--- end sidebar -->

<div id="footer">
<?php require_once('customize/footer.php'); ?>

</div>
<?php include('customize/analytics.php'); ?>
<a href="https://github.com/upggr/x-mad" target="new"><img style="position: absolute; top: 0; left: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_left_red_aa0000.png" alt="Fork me on GitHub">            </a>
</body>
</html>




 