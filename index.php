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

  

<ul class="dropdown"><!-- menu -->
<li> <div id="searchContainer">
    <form method="get" id="target">
      <input type="text" name="download" id="field" />
      <div id="delete"><span id="x">x</span></div>
      <input type="submit" id="submit" value="Search" name="search"/>
    </form>
  </div> 
  </li>
<?php generateMenu(); ?>

</ul><!-- close menu -->


<div id="content"><!-- content -->

      <div id="results">
        <div id="progressbar"></div>
        <div id="message"></div>
      </div>
<div class="helper"><?php require_once('customize/homepage.php'); ?>
</div>



                        
</div><!-- end content -->


<div id="sidebar"><!-- sidebar -->

<h3>Socialize</h3>

    <div class="navcontainer">
    <ul>
    <li><?php include('customize/social.php'); ?></li>

    </ul>
    </div>
    
    <h3>Download Software</h3>

    <div class="navcontainer">
    <ul>
    <li>You need a torrent client to download</li>
	<li><a href="http://www.utorrent.com/utorrent-plus/index/frmrvh" target="_blank"><img src="images/utorrent.png" alt="Download utorrent client" width="60" height="60" />      </a><a href="http://cf1.vuze.com/files/Vuze_Installer.exe" target="_blank"><img src="images/vuze.png" alt="Download vuze client" width="60" height="60" />        </a></li>
    </ul>
    </div>
    
    
<h3>Recent Searches</h3>

    <div class="navcontainer">
    <ul>
       <?php readerecents() ?>
    </ul>
    </div>

</div><!-- end sidebar -->


<div id="footer">
<?php require_once('customize/footer.php'); ?>

</div>
<?php include('customize/analytics.php'); ?>
<a href="https://github.com/upggr/x-mad" target="new"><img style="position: absolute; top: 0; left: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_left_red_aa0000.png" alt="Fork me on GitHub">            </a>
</body>
</html>
