<?php
require dirname(__FILE__) . './api.php';

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