<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait CurlController
{
	private $f;

    public function postCall(Request $request,$username,$_url){
    	//extract data from the post
		//set POST variables
		$url = $_url;
		$fields = array(
			'username' => urlencode($username),
			'domain' => urlencode($request->domain),
		);

		//url-ify the data for the POST
		foreach($fields as $key=>$value) { 
			$this->f = $this->f.=$key.'='.$value.'&'; 
		}

		rtrim($this->f, '&');

		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		//curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $this->f);

		//execute post
		$result = curl_exec($ch);

		//close connection
		curl_close($ch);

		return $result;
    }
}
