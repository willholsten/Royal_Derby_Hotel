<?php 

DEFINE('ANALYTICS','UA-33570877-1');
DEFINE('SITE_TITLE','Royal Derby Hotel');

$p=$_REQUEST['p'];
if($p=='') { $page='home'; } else { $page = $p; }
if(!file_exists('pages/'.$page.'.php')) $page='home';
if(file_exists('content/'.$page.'.php')) include_once('/content/'.$page.'php');
