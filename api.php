<?php
//*关闭警告显示
//error_reporting(E_ALL || ~E_NOTICE);
class API {
	protected $headers = ['Accept: */*', 'appver=1.5.2;','Accept-Encoding: gzip,deflate,sdch', 'Accept-Language: zh-CN,zh;q=0.8,gl;q=0.6,zh-TW;q=0.4','Connection: keep-alive', 'Content-Type: application/x-www-form-urlencoded', 'Host: music.163.com', 'Referer: http://music.163.com/search/', 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.152 Safari/537.36'];
	protected $oldheaders = ["appver=1.5.2;"];
	protected $refer = "http://music.163.com/";
	protected $connecttimeout = 10;
	protected $timeout = 30;
	
    protected function curl($url, $data)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $this->connecttimeout);
		curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($curl, CURLOPT_REFERER, $this->refer);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($curl, CURLOPT_ENCODING, 'application/json');
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
	protected function oldcurl($url){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $this->connecttimeout);
		curl_setopt($curl, CURLOPT_TIMEOUT, $this->timeout);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $this->oldheaders);
		curl_setopt($curl, CURLOPT_REFERER, $this->refer);
		$output = curl_exec($curl);
		curl_close($curl);
		//echo $output;
		return $output; 
	}
	//搜索
	public function search($stype, $s, $limit){
        $url = 'http://music.163.com/api/search/get/web?';
        $data =  "type=".$stype."&s=".$s."&limit=".$limit."&offset=0";
		return $this->curl($url, $data);	
	}
	//歌曲信息
	public function musicinfo($music_id){
        $url = 'http://music.163.com/api/song/detail/?';
        $data =  "id=" . $music_id . "&ids=%5B" . $music_id . "%5D";
		return $this->curl($url, $data);
    }
	//专辑信息
	public function musicalbum($album_id){
		$url = "http://music.163.com/api/album/".$album_id."/";
		return $this->oldcurl($url);
    }
	//歌手专辑信息
	public function artistalbums($artistalbums_id,$limit){
		$url = "http://music.163.com/api/artist/albums/".$artistalbums_id."/?limit=".$limit;
		return $this->oldcurl($url);
    }
	//歌单信息
	//我的闽南语歌单721782642
	public function playlist($playlist_id){
		$url = "http://music.163.com/api/playlist/detail?id=".$playlist_id;
		return $this->oldcurl($url);
    }
	//歌单信息
	//喜欢你==！
	//id=93920
	public function lyricinfo($music_id,$lv,$kv){
		$url = "http://music.163.com/api/song/lyric?os=pc&id=".$music_id."&lv=".$lv."&kv=".$kv;
		return $this->oldcurl($url);
    }
	//mv链接
	//诛仙恋==！
	//id=5324450
	public function mvinfo($music_id,$mvtype){
		$url = "http://music.163.com/api/mv/detail?id=".$music_id."&type=".$mvtype;
		return $this->oldcurl($url);
    }
	//歌手top50
	public function artisttop50($artist_id){
		$url = "http://music.163.com/api/artist/".$artist_id."?ext=true&top=50&id=".$artist_id;
		return $this->oldcurl($url);
    }
	//download
	public function downloadurl($music_id,$br){
		$url = "http://music.163.com/api/song/enhance/download/url?br=".$br."&id=".$music_id;
		return $this->oldcurl($url);
    }

}

//http://music.163.com/api/song/enhance/download/url?br=320000&id=95396
//下载

?>
