<?php

if (!defined('IN_DISCUZ')) {

	exit('Access Denied');

}

require_once DISCUZ_ROOT . './source/function/function_cache.php';



		

if($_G['inajax']){

	$up_url=$_G['config']['uploadcideo_yun'][mt_rand(0,1)];

	include template('pepsifile:api');

}

