<?php
/*
 * by yeyuxingchen
 * index.php
 * 2017年5月27日17:27:47
*/
require './api.php';

$api = new API();

if ($_GET["type"] != NULL)
{
	//search
	if ($_GET["type"] == "search") 
	{
		$stype = $_GET["stype"];
		$s = $_GET["s"];
		$limit = $_GET["limit"];
		if ($stype == NULL && $s == NULL && $limit == NULL)
		{
			echo "参数错误3";
			exit();
		}
		$result = $api->search($stype,$s,$limit);
		echo $result;
	}
	//oldsearch
	else if ($_GET["type"] == "oldsearch") 
	{
		$stype = $_GET["stype"];
		$s = $_GET["s"];
		$limit = $_GET["limit"];
		if ($stype == NULL && $s == NULL && $limit == NULL)
		{
			echo "参数错误6";
			exit();
		}
		$result = $api->oldsearch($stype,$s,$limit);
		echo $result;
	}	
	//单曲
	else if ($_GET["type"] == "song") 
	{
		$id = $_GET["id"];
		 if ($id == NULL){
			echo "参数错误4";
			exit();
		}
		$result = $api->musicinfo($id);
		echo $result;
	}
	
	//专辑
	else if ($_GET["type"] == "album") 
	{
		$id = $_GET["id"];
		 if ($id == NULL){
			echo "参数错误7";
			exit();
		}
		$result = $api->musicalbum($id);
		echo $result;
	}
	//歌手
	else if ($_GET["type"] == "artist") 
	{
		$id = $_GET["id"];
		$limit = $_GET["limit"];
		 if ($id == NULL && $limit == NULL){
			echo "参数错误8";
			exit();
		}
		$result = $api->artistalbums($id, $limit);
		echo $result;
	}
	//music url
	else if ($_GET["type"] == "musicurl") 
	{
		$id = $_GET["id"];
		$br = $_GET["br"];
		if ($id == NULL && $id == NULL ){
			echo "参数错误5";
			exit();
		}
		$result = $api->downloadurl($id,$br);
		echo $result;
	}
	else
		{
		echo "参数错误2";
		exit();
	}
}
else 
{
	echo "参数错误1";
	exit();
}


?>