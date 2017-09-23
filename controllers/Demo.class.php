<?php
namespace controllers;
use libs\Controller;
use models\Joke;
use libs\Pagenation;
class Demo extends Controller{

	public function show(){
		$pag=isset($_GET['page']) ? $_GET['page'] : 1;
		$page=new Pagenation();
		$data=$page->pages("login",$pag,1);
		$this->render('show',['data'=>$data]);
	}

}