<?php

$host = 'danielpietersen.com';
$port = '2368';
$cron = true; // Set $cron = false to Stop cron

if(@$_SERVER['SERVER_PORT'] > 1){
	die('Not accesible via the web !');
}

if($cron == true){
	$checkconn = @fsockopen($host, $port, $errno, $errstr, 5);
	if(empty($checkconn)){
		exec('export HOME=/home/admin/web/danielpietersen.com/public_html; cd /home/admin/web/danielpietersen.com/public_html; npm start --production >> /home/admin/web/danielpietersen.com/public_html/ghost212.log 2>&1 &', $out, $ret);		
	}
}

?>
