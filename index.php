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
		if ($stype == NULL || $s == NULL || $limit == NULL)
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
		if ($stype == NULL || $s == NULL || $limit == NULL)
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
		 if ($id == NULL || $limit == NULL){
			echo "参数错误8";
			exit();
		}
		$result = $api->artistalbums($id, $limit);
		echo $result;
	}
	//歌单info
	else if ($_GET["type"] == "playlist") 
	{
		$id = $_GET["id"];
		 if ($id == NULL){
			echo "参数错误9";
			exit();
		}
		$result = $api->playlist($id);
		echo $result;
	}
	//歌词
	else if ($_GET["type"] == "lyric") 
	{
		$id = $_GET["id"];
		$lv = $_GET["lv"];
		$kv = $_GET["kv"];
		if ($id == NULL || $lv == NULL || $kv == NULL)
		{
			echo "参数错误10";
			exit();
		}
		$result = $api->lyricinfo($id,$lv,$kv);
		echo $result;
	}
	//歌手top50
	else if ($_GET["type"] == "atop50") 
	{
		$id = $_GET["id"];
		 if ($id == NULL){
			echo "参数错误11";
			exit();
		}
		$result = $api->artisttop50($id);
		echo $result;
	}

	//music url
	else if ($_GET["type"] == "musicurl") 
	{
		$id = $_GET["id"];
		$br = $_GET["br"];
		if ($id == NULL || $br == NULL ){
			echo "参数错误12";
			exit();
		}
		$result = $api->downloadurl($id,$br);
		echo $result;
	}
	//mvurl
	else if ($_GET["type"] == "mv") 
	{
		$id = $_GET["id"];
		$mvtype = $_GET["mvtype"];
		if ($id == NULL || $mvtype == NULL ){
			echo "参数错误13";
			exit();
		}
		$result = $api->mvinfo($id,$mvtype);
		echo $result;
	}
	//排行榜info
	else if ($_GET["type"] == "top") 
	{
		$id = $_GET["id"];
		 if ($id == NULL){
			echo "参数错误14";
			exit();
		}
		$result = $api->playlist($id);
		echo $result;
	}
	/*
	id: 71385702	//云音乐ACE音乐榜	
	id: 19723756     // 云音乐飙升榜 o
	id: 2884035     // 网易原创歌曲榜 o
	id: 10520166	//云音乐电音榜
	id：71384707	//云音乐古典音乐榜
	id: 3778678     // 云音乐热歌榜 o
	id: 3779629     // 云音乐新歌榜 o
	id：71384707	//Beatport全球电子舞曲榜
	id：60131	//日本Oricon周榜
	id: 180106	//UK排行榜周榜
	id:	60198	//美国Billboard周榜
	id:	271135204	//法国 NRJ Vos Hits 周榜
	id:	11641012	//iTunes榜
	id：120001	//Hit FM Top榜
	id：21845217	//KTV唛榜
	id：1899724	//中国嘻哈榜
	id: 4395559     // 华语金曲榜
	id: 64016     // 中国TOP排行榜（内地榜）
	id: 112504     // 中国TOP排行榜（港台榜）
	*/

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