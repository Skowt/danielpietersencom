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
		exec('cd /home/admin/web/danielpietersen.com/public_html; npm start --production >> /home/admin/web/danielpietersen.com/public_html/ghost_log.log 2>&1 &', $out, $ret);		
	}
}

?>
