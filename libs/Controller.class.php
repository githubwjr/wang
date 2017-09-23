<?php

namespace libs;

class Controller {
	public $viewObject;

	public function __construct(){
		// if(method_exists($this, "init")){
		// 	$this->init();
		// }
		// $this->viewObject = new View;
	}

	public function render($fileName='',$data=[]){
		//return "123";
		if (count($data)>0) {
			extract($data);
		}
		
		// 获取得到模板路径
		if (is_string($fileName)) {

			$c = Router::getInstance()->controller;
			
			if(empty($fileName)){
				$a = Router::getInstance()->action;
				$fileName = $c.DS.$a.'.php';
			}else{
				$fileName=$c.DS.$fileName.".php";
			}
			require "views".DS.$fileName;
		}
		
		// $this->viewObject->display($fileName); 
	}

	// public function assign($data){
	// 	extract($data);
	// 	$this->viewObject->assign($data);
	// }



}