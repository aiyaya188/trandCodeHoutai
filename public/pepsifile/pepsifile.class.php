<?php

if (!defined('IN_DISCUZ')) {

	exit('Access Denied');

}

require_once DISCUZ_ROOT . './source/function/function_cache.php';



class plugin_pepsifile {

	

}



class plugin_pepsifile_forum extends plugin_pepsifile {



	function post_editorctrl_left() {
		   global $_G;
		 $groups=$_G['cache']['plugin']['pepsifile']['upuser']; 
         $arr_groups=unserialize($groups);
		 if(in_array($_G['groupid'],$arr_groups)){
		return "<a href=\"javascript:;\" onclick=\"vshowAttachMenu()\"  id=\"fileup\" title=\"上传视频\" >".'上传视频'."</a>
<style>
.b1r #fileup{
	width:50px;
	background: transparent url(\"source/plugin/pepsifile/template/upfile.png\") no-repeat scroll center 0;
}
</style>
		<script type=\"text/javascript\">

				function vhideAttachMenu(id){

					if($(id)){

						$(id).style.display = 'none';

					}

				}

				function vshowAttachMenu(id){

					if($(id)){

						$(id).style.display = '';

					}else{

						showWindow('fwin_colaup', 'plugin.php?id=pepsifile:api&typeid=discuz','get',1);

					}

				}

			</script>";
		 }

	}



	function post_middle() {


		$uploadTemplate = ' ';

		return $uploadTemplate;

	}



}

class plugin_pepsifile_group extends plugin_pepsifile_forum {

}

