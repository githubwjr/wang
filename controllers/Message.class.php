<?php 
 namespace controllers;
 use libs\Controller;
 use models\Mess;
 use libs\Upload;
 class Message extends Controller{
 	public function index(){
 		echo $this->render();
 	}
 	public function add(){
 		var_dump($_FILES['file']);
 		$upload=new Upload();
 		$rs=$upload->uploads($_FILES);
 		if ($rs) {
 			echo $rs;
 		}die;
 		if ($_POST) {
 			$model=new Mess();
 			$rs=$model->insert(['user'=>$_POST['user'],'content'=>$_POST['content']]);
 			if ($rs) {
 				echo "留言成功";
 			}else{
 				echo "失败";
 			}
 		}
 	}
 	public function show(){
 		$model=new Mess();
 		$data=$model->select();

 		$this->render('show',['data'=>$data]);
 		
 	}
 }





 ?>