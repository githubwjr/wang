<?php

namespace libs;

class View {

	// 属性
	public $templateFile ; // 默认为当前控制器文件夹下方法名.html

	public $data='';

 	public function assign($item){
 			$this->data = $item;
	}
	public function display($templateFile=''){
		$data = $this->data;
		if(is_array($data)){
			extract($data);
		}
		$fileContent = file_get_contents(VIEWS.$templateFile);
		$filename = md5($templateFile);
		$file = $this->parseTemplate($fileContent,$filename);
		include $file;
	}


	public function parseTemplate($content,$filename){
		$filename = RUNTIME.$filename.'.php';
			// 解析文件
			// 其他规则放到前面
			$content = preg_replace('#\{foreach#', '<?php foreach', $content);
			$content = preg_replace('#\{endforeach\}#', '<?php endforeach; ?>', $content);
			$content = preg_replace('#\{#iU','<?= ', $content);
			$content = preg_replace('#\}#iU','?>', $content);

			file_put_contents($filename,$content);
		
		return $filename;
	}


}