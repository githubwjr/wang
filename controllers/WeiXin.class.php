<?php

namespace controllers;
use libs\Controller;
use libs\WeChat;
class  Weixin extends Controller {
	private $weixin;
	public function init(){
		$this->weixin = new WeChat;
	}
	public function index(){

		// 调用对应的方法实现与微信通
		$this->weixin->parseMessage();

	}

	
}