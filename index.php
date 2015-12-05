<?php
error_reporting(E_ALL);
setlocale(LC_ALL, "ja_JP.utf8");

$src = ""; // image src

dispatch();

function dispatch(){
    if(isset($_REQUEST["submit"])){
        $kind = $_REQUEST["submit"];
        if($kind == "get"){
            get();
        }
    }
}

function get(){
    global $src;
    $url = $_REQUEST["geturl"];
    $src = dirname(__FILE__) . "/img/shot.png";
    $command = '/usr/local/bin/wkhtmltoimage "' . $url . '" "' . $src . '"';
    system($command);
    $src = "img/shot.png";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes"/>    
<title>Screen Shot Service</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
  <h1>Screen Shot Service</h1>
  <p>だめなサイトも有るよ！フレームのサイトとかね！あとターンアラウンドタイムがだいぶかかるよ！</p>
  <hr>
  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
  <form method="POST">
    <input placeholder="http://google.co.jp" required class="input-lg col-xs-8 col-sm-8 col-md-8 col-lg-8" type="text" name="geturl" value="<?php echo isset($_REQUEST['geturl']) ? $_REQUEST['geturl'] : '' ?>"/>
    <input style="margin-top:7px" class="btn btn-primary col-xs-offset-1 col-xs-3 col-sm-offset-1 col-sm-3 col-md-offset-1 col-md-3 col-lg-offset-1 col-lg-2" type="submit" name="submit" value="get"/>
  </form>
  </div>
  <?php if($src != ""){ ?>
  <div style="margin-top:20px;" class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    <img class="img" src="img/shot.png"/>                    
  </div>
  <?php } ?>                       
</div>


