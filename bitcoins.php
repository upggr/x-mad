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
<li><a href="bitcoin.php">Bit Coins</a></li>
</ul><!-- close menu -->


<div id="content"><!-- content -->

      <div id="results">
        <div id="progressbar"></div>
        <div id="message"></div>
      </div>
<div class="helper">
Donate to my cause...   
<h1>1CCzeFidgPEkCWQLaM6AGJnNvfTD72wyPD</h1>
<br />
<iframe width="560" height="315" src="http://www.youtube.com/embed/Um63OQz3bjo?rel=0" frameborder="0" allowfullscreen></iframe>
<?php // require_once('customize/homepage.php'); ?>
</div>



                        
</div><!-- end content -->


<div id="sidebar"><!-- sidebar -->

<h3>Free Bit Coins</h3>

    <div class="navcontainer">
    <ul>
    <li>
      <a href="https://coinurl.com/index.php?ref=058c32fe64c159cf7a5725ceb234ccc7" title="Earn bitcoins as I do, by driving traffic. If you want to make 1 bitcoin a month like me, click on ALL the links bellow, grab the real urls, xonvert them to coinurls and see the flow :)" target="new">Coinurl.com</a></li>
  
  
    <li><a href="http://cur.lv/yklj" title="Just enter your bitcoin address, hit send and wait for the money" target="new">dailybitcoins.org</a></li>
    
    
    <li><a href="http://cur.lv/ykmu" title="earn uBTC for watching ads" target="new">bitvisitor.com</a></li>
   
   
    <li><a href="http://cur.lv/ykn9" title="Earn bitcoins now." target="new">bitcoiner.in</a></li>

    </ul>
    </div>
    
    <h3>Bitcoin Software</h3>

    <div class="navcontainer">
    <ul>
    <li><a href="http://bitcoin.org/en/download" title="Bitcoin-Qt is a wallet app you can download for Windows, Mac, and Linux." target="new">Bitcoin-QT</a></li>
    <li><a href="https://play.google.com/store/apps/details?id=de.schildbach.wallet" title="Bitcoin Wallet for Android runs on your phone or tablet." target="new">BitCoin Wallet</a></li>
    </ul>
    </div>
    
  <!--   start recents
<h3>Recent Searches</h3>

    <div class="navcontainer">
    <ul>
       <?php //readerecents() ?>
    </ul>
    </div>
<!--- end recents -->
</div>
<!--- end sidebar -->

<div id="footer">
<?php require_once('customize/footer.php'); ?>

</div>
<?php include('customize/analytics.php'); ?>

</body>
</html>
